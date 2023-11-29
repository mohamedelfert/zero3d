<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $title = trans('main.users');
        $users = User::where('role_name', '!=', 'super_admin')->where(function ($q) use ($request) {
            return $q->when($request->search, function ($query) use ($request) {
                return $query->where('first_name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('email', 'LIKE', '%' . $request->search . '%');
            });
        })->latest()->paginate(20);
//        $users = User::orderBy('id', 'DESC')->paginate(20);
        return view('dashboard.users.index', compact('title', 'users'));
    }

    public function create()
    {
        $title = trans('main.add_user');
        $roles = Role::pluck('name', 'name')->all();
        return view('dashboard.users.create', compact('roles', 'title'));
    }

    public function store(Request $request)
    {
        $rules = [
            'first_name' => 'required|unique:users,first_name',
            'last_name' => 'required|unique:users,last_name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'status' => 'required',
            'role_name' => 'required',
            'image' => 'sometimes|nullable|image|mimes:png,jpg,jpeg,gif'
        ];

        $validation = $this->validate($request, $rules);

        $data = $request->except(['password','password_confirmation','image']);
        $data['password'] = Hash::make($request->password);

        if ($request->image){
            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/users_images/' . $request->image->hashName()));

            $data['image'] = $request->image->hashName();
        }

        $user = User::create($data);
        $user->assignRole($request->input('role_name'));

        toastr()->success(trans('main.data_added_successfully'));
        return redirect()->route('dashboard.users.index');
    }

    public function show(User $user)
    {
        if ($user->id !== auth()->user()->id) {
            return view('404');
        }
        $title = trans('main.user_details');
        return view('dashboard.users.show', compact('title', 'user'));
    }

    public function edit($id)
    {
        $title = trans('main.edit_user');
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'name')->all();
        return view('dashboard.users.edit', compact('roles', 'title', 'user'));
    }

    public function update(Request $request ,User $user)
    {
        $rules = [
            'first_name' => 'required|unique:users,first_name,' . $user->id,
            'last_name' => 'required|unique:users,last_name,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'status' => 'required',
            'role_name' => 'required',
            'image' => 'sometimes|nullable|image|mimes:png,jpg,jpeg,gif'
        ];

        $validation = $this->validate($request, $rules);

        $data = $request->except(['image']);

        if ($request->image){

            if ($user->image != 'default.png'){
                Storage::disk('public_uploads')->delete('/users_images/' . $user->image);
            }
            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/users_images/' . $request->image->hashName()));

            $data['image'] = $request->image->hashName();

        }

        $user->update($data);
        DB::table('model_has_roles')->where('model_id', $user->id)->delete();
        $user->assignRole($request->input('role_name'));

        toastr()->warning(trans('main.data_updated_successfully'));
        return redirect()->route('dashboard.users.index');
    }

    public function destroy(User $user)
    {
        if ($user->image != 'default.png'){
            Storage::disk('public_uploads')->delete('/users_images/' . $user->image);
        }
        $user->delete();
        toastr()->error(trans('main.data_deleted_successfully'));
        return back();
    }

    public function showProfile($id)
    {
        $title = trans('main.edit_profile');
        $user = User::findOrFail($id);

        if ($user->id !== auth()->user()->id) {
            return view('404');
        }

        return view('dashboard.users.edit_profile', compact('title', 'user'));
    }

    public function profile(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
//            'email' => ['required', Rule::unique('users')->ignore($id)],
            'password' => 'sometimes|nullable|confirmed',
            'image' => 'sometimes|nullable|image|mimes:png,jpg,jpeg,gif',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $data = $request->except(['password', 'password_confirmation', 'image']);

        if ($request->password != null){
            $data['password'] = bcrypt($request->password);
        }

        $user = User::findOrFail($id);

        if ($request->image) {

            if ($user->image != 'default.png') {
                Storage::disk('public_uploads')->delete('/users_images/' . $user->image);
            }

            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/uploads/users_images/' . $request->image->hashName()));

            $data['image'] = $request->image->hashName();

        }

        $user->update($data);

        toastr()->warning(trans('main.data_deleted_successfully'));
        return redirect()->route('dashboard.users.index');
    }
}
