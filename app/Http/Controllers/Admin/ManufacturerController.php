<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Str;
use Throwable;

class ManufacturerController extends Controller
{
    //
    public function showFormAddManufacturers()
    {
        return view('admin.pages.manufacturers-add');

    }

    public function addManufacturers(Request $request)
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
            $imagePath = $imagePath->storeAs('upload/manufacturers', $fileName, 'public');
        }
        // dd($imagePath);
        Manufacturer::create(attributes: [
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
            'description' => $request->input('description'),
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.manufacturer.addForm')->with('success', 'Nhãn hàng đã được thêm thành công!');

    }

    public function index()
    {
        $manufacturers = Manufacturer::all();

        return view('admin.pages.manufacturers', compact('manufacturers'));

    }

    public function updateManufacturer(Request $request)
    {
        try {
            $manufacturer = Manufacturer::findOrFail(id: $request->manufacturer_id);
            if (! $manufacturer) {
                return response()->json(data: [
                    'status' => false,
                    'message' => 'Danh mục không tồn tại!',
                ], status: 404);
            }

            $manufacturer->name = $request->name;
            $manufacturer->description = $request->description;

            if ($request->hasFile('image')) {

                // Xóa ảnh cũ nếu có
                if ($manufacturer->image) {
                    Storage::disk('public')->delete($manufacturer->image);
                }

                $image = $request->file('image');
                $fileName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();

                // Lưu vào storage/public/upload/manufacturers
                $path = $image->storeAs('upload/manufacturers', $fileName, 'public');

                $manufacturer->image = $path;
            }
            $manufacturer->save();

            return response()->json([
                'status' => true,
                'message' => 'Cập nhật danh mục thành công!',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Đã có lỗi, vui lòng thử lại sau!',
            ]);
        }

    }

    public function deleteManufacturer(Request $request)
    {
        try {
            $manufacturer = Manufacturer::findOrFail($request->manufacturer_id);
            if (! $manufacturer) {
                return response()->json([
                    'status' => false,
                    'message' => 'Danh mục không tồn tại',
                ], 404);
            }

            // Nếu có hình
            if ($manufacturer->image) {
                Storage::disk('public')->delete($manufacturer->image);
            }

            $manufacturer->delete();

            return response()->json([
                'status' => true,
                'message' => 'Xóa danh mục thành công',
            ]);
        }
        catch (Throwable $th)
        {
            return response()->json([
                'status' => false,
                'message' => 'Đã có lỗi xảy ra, vui lòng thử lại sau',
            ], 500);

        }

    }
}
