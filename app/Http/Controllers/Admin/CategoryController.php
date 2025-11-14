<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Str;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        return view('admin.pages.categories',compact('categories'));
    }

    public function showFormAddCategories()
    {
        return view('admin.pages.categories-add');
    }

    public function addCategory(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image');
            $fileName = now()->timestamp . '_' . uniqid() . '.' . $imagePath->getClientOriginalExtension();
            $imagePath = $imagePath->storeAs('upload/categories',$fileName, 'public');
        }

        Category::create(attributes: [
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
            'description' => $request->input('description'),
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.category.add')->with('success','Danh mục đã được thêm thành công!');

    }
}
