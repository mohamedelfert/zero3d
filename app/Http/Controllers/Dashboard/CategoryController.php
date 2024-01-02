<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $title = trans('main.categories');
        $categories = Category::where(function ($q) use ($request) {
            return $q->when($request->search, function ($query) use ($request) {
                return $query->where('name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('slug', 'LIKE', '%' . $request->search . '%');
            });
        })->latest()->paginate(20);
        return view('dashboard.categories.index', compact('title', 'categories'));
    }

    public function store(CategoryRequest $request)
    {
//        $validation = Validator::make($request->all(), [
//            'name' => 'required',
//            'parent_id' => 'sometimes|nullable|int|exists:categories,id',
//            'status' => 'required|in:active,archived',
//            'image' => 'sometimes|nullable|image|mimes:png,jpg,jpeg,gif'
//        ]);
//
//        if ($validation->fails()) {
//            return redirect()->back()->withErrors($validation)->withInput();
//        }

        $request->merge([
            'slug' => Str::slug($request->post('name'))
        ]);

        $data = $request->except(['image']);

        if ($request->image) {
            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/images/' . $request->image->hashName()));

            $data['image'] = $request->image->hashName();
        }

        Category::create($data);
        toastr()->success(trans('main.data_added_successfully'));
        return redirect()->route('dashboard.categories.index');
    }

    public function create()
    {
        $title = trans('main.categories');
        return view('dashboard.categories.create', compact('title'));
    }

    public function show(Category $category)
    {
        $title = trans('main.category_details');
        return view('dashboard.categories.show', compact('title', 'category'));
    }

    public function edit(Category $category)
    {
        $title = trans('main.categories');
        $parents = Category:: where('id', '!=', $category->id)
            ->where(function ($query) use ($category) {
                $query->whereNull('parent_id')
                    ->orWhere('parent_id', '!=', $category->id);
            })->get();
        return view('dashboard.categories.edit', compact('title', 'category', 'parents'));
    }

    public function update(Request $request, Category $category)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'parent_id' => 'sometimes|nullable|int|exists:categories,id',
            'status' => 'required|in:active,archived',
            'image' => 'sometimes|nullable|image|mimes:png,jpg,jpeg,gif'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $request->merge([
            'slug' => Str::slug($request->post('name'))
        ]);

        $data = $request->except(['image']);

        if ($request->image){

            if ($category->image){
                Storage::disk('public_uploads')->delete('/images/' . $category->image);
            }
            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/images/' . $request->image->hashName()));

            $data['image'] = $request->image->hashName();

        }

        $category->update($data);
        toastr()->success(trans('main.data_updated_successfully'));
        return redirect()->route('dashboard.categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        toastr()->error(trans('main.data_deleted_successfully'));
        return redirect()->route('dashboard.categories.index');
    }
}
