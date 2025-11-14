<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Str;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();

        return view('admin.pages.categories', compact('categories'));
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
            $fileName = now()->timestamp.'_'.uniqid().'.'.$imagePath->getClientOriginalExtension();
            $imagePath = $imagePath->storeAs('upload/categories', $fileName, 'public');
        }

        Category::create(attributes: [
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
            'description' => $request->input('description'),
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.category.add')->with('success', 'Danh mục đã được thêm thành công!');
    }

    public function updateCategory(Request $request)
    {
        try {
            $category = Category::findOrFail(id: $request->category_id);
            if (! $category) {
                return response()->json(data: [
                    'status' => false,
                    'message' => 'Danh mục không tồn tại!',
                ], status: 404);
            }

            $category->name = $request->name;
            $category->description = $request->description;

            if ($request->hasFile('image')) {

                // Xóa ảnh cũ nếu có
                if ($category->image) {
                    Storage::disk('public')->delete($category->image);
                }

                $image = $request->file('image');
                $fileName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

                // Lưu vào storage/public/upload/categories
                $path = $image->storeAs('upload/categories', $fileName, 'public');

                $category->image = $path;
            }
            $category->save();

            return response()->json([
                'status' => true,
                'message' => 'Cập nhật danh mục thành công!'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Đã có lỗi, vui lòng thử lại sau!'
            ]);
        }
    }
}
