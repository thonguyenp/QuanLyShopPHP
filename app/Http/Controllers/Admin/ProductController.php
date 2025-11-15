<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Str;

class ProductController extends Controller
{
    //
    public function showFormAddProducts()
    {
        $categories = Category::all();

        return view('admin.pages.product-add', compact('categories'));
    }

    public function addProduct(Request $request)
    {
        // dd($request->all());
        $request->validate(rules: [
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'gpu' => 'nullable|string',
            'cpu' => 'nullable|string',
            'ram' => 'nullable|string',
            'rom' => 'nullable|string',
            'connection_port' => 'nullable|string',
            'camera' => 'nullable|string',
            'battery' => 'nullable|string',
            'monitor_size' => 'nullable|string',
            'monitor-resolution' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $slug = Str::slug(title: $request->name).'_'.time();
        if ($request->isArrival)
        {
            $request->isArrival = 1;
        } 
        else $request->isArrival = 0;
        // Create product
        $product = Product::create(attributes: [
            'name' => $request->name,
            'slug' => $slug,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'gpu' => $request->gpu,
            'cpu' => $request->cpu,
            'ram' => $request->ram,
            'rom' => $request->rom,
            'connection_port' => $request->connection_port,
            'camera' => $request->gpu,
            'battery' => $request->gpu,
            'monitor_size' => $request->monitor_size,
            'monitor_resolution' => $request->monitor_resolution,
            'isArrival' => $request->isArrival,
            'price' => $request->price,
            'stock' => $request->stock ?? 0,
            'status' => 'in_stock',
        ]);
        // dd($product);

        // Handle images upload
        if ($request->hasFile(key: 'images')) {
            foreach ($request->file(key: 'images') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $path = "uploads/products/" . $imageName;

                $resizedImage = Image::make($image)
                    ->resize(600, 600)
                    ->encode();

                Storage::disk(name: 'public')->put(path: $path, contents: $resizedImage);

                ProductImage::create(attributes: [
                    'product_id' => $product->id,
                    'image' => $path,
                ]);
            }
        }


        return redirect()->route('admin.product.add')->with('success', 'Thêm sản phẩm thành công');
    }
}
