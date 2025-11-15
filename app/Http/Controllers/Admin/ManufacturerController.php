<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Str;

class ManufacturerController extends Controller
{
    //
    public function showFormAddManufacturers ()
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
}
