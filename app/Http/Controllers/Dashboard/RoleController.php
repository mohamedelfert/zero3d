<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $title = trans('main.roles');
//        $roles = Role::where('name', '!=', 'super_admin')->orderBy('id', 'DESC')->paginate(10);
        $roles = Role::where(function ($q) use ($request) {
            return $q->when($request->search, function ($query) use ($request) {
                return $query->where('name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('display_name', 'LIKE', '%' . $request->search . '%');
            });
        })->latest()->paginate(10);
        return view('dashboard.roles.index', compact('roles', 'title'));
    }

    public function create()
    {
        $title = trans('main.roles');
        $permissions = Permission::all();
        return view('dashboard.roles.create', compact('permissions', 'title'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:roles,name',
            'display_name' => 'required',
            'permissions' => 'required|array'
        ];

        $validation = $this->validate($request, $rules);

        $data = Role::create(['name' => $request->input('name'), 'display_name' => $request->input('display_name')]);
        $data->syncPermissions($request->input('permissions'));

        toastr()->success(trans('main.data_added_successfully'));
        return redirect()->route('dashboard.roles.index');
    }

    public function show($id)
    {
        $title = trans('main.roles');
        $role = Role::findOrFail($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)->get();
        return view('dashboard.roles.show', compact('role', 'rolePermissions', 'title'));
    }

    public function edit($id)
    {
        $title = trans('main.roles');
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $rolePermissions = DB::table("role_has_permissions")
            ->where("role_has_permissions.role_id", $id)
            ->pluck("role_has_permissions.permission_id", "role_has_permissions.permission_id")
            ->all();
        return view('dashboard.roles.edit', compact('role', 'rolePermissions', 'title', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|unique:roles,name,' . $id,
            'display_name' => 'required',
            'permissions' => 'required|array'
        ];

        $validation = $this->validate($request, $rules);

        $role = Role::findOrFail($id);
        $role->name = $request->input('name');
        $role->display_name = $request->input('display_name');
        $role->save();

        $role->syncPermissions($request->input('permissions'));

        toastr()->warning(trans('main.data_updated_successfully'));
        return redirect()->route('dashboard.roles.index');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        Role::findOrFail($id)->delete();
        toastr()->error(trans('main.data_deleted_successfully'));
        return back();
    }

}
