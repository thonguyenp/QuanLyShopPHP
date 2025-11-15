<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Manufacturer;
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
        $manufacturers = Manufacturer::all();

        return view('admin.pages.product-add', compact('categories', 'manufacturers'));
    }

    public function addProduct(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'manufacturer_id' => 'required|exists:manufacturers,id',
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
    
        $slug = Str::slug($request->name).'_'.time();
        if ($request->isArrival)
        {
            $request->isArrival = 1;
        } 
        else $request->isArrival = 0;
        // Create product
        $product = Product::create([
            'name' => $request->name,
            'slug' => $slug,
            'category_id' => $request->category_id,
            'manufacturer_id' => $request->manufacturer_id,
            'description' => $request->description,
            'gpu' => $request->gpu,
            'cpu' => $request->cpu,
            'ram' => $request->ram,
            'rom' => $request->rom,
            'connection_port' => $request->connection_port,
            'camera' => $request->camera,
            'battery' => $request->battery,
            'monitor_size' => $request->monitor_size,
            'monitor_resolution' => $request->monitor_resolution,
            'isArrival' => $request->isArrival,
            'price' => $request->price,
            'stock' => $request->stock ?? 0,
            'status' => 'in_stock',
        ]);
        // dd($product);

        // Handle images upload
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $path = "upload/products/" . $imageName;

                $resizedImage = Image::make($image)
                    ->resize(600, 600)
                    ->encode();

                Storage::disk('public')->put(path: $path, contents: $resizedImage);

                ProductImage::create(attributes: [
                    'product_id' => $product->id,
                    'image' => $path,
                ]);
            }
        }


        return redirect()->route('admin.product.add')->with('success', 'Thêm sản phẩm thành công');
    }

    public function index()
    {
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
        $products = Product::with('category', 'images')->get();
        // dd($products);
        return view('admin.pages.products', compact('products', 'categories', 'manufacturers'));
    }

    public function updateProduct(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'manufacturer_id' => 'required|exists:manufacturers,id',
            'description' => 'nullable|string',
            'gpu' => 'nullable|string',
            'cpu' => 'nullable|string',
            'ram' => 'nullable|string',
            'rom' => 'nullable|string',
            'connection_port' => 'nullable|string',
            'camera' => 'nullable|string',
            'battery' => 'nullable|string',
            'monitor_size' => 'nullable|string',
            'monitor_resolution' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $product= Product::findOrFail($request->product_id);
        $slug = Str::slug($request->name).'_'.time();
        $product->update([
            'name' => $request->name,
            'slug' => $slug,
            'category_id' => $request->category_id,
            'manufacturer_id' => $request->manufacturer_id,
            'description' => $request->description,
            'gpu' => $request->gpu,
            'cpu' => $request->cpu,
            'ram' => $request->ram,
            'rom' => $request->rom,
            'connection_port' => $request->connection_port,
            'camera' => $request->camera,
            'battery' => $request->battery,
            'monitor_size' => $request->monitor_size,
            'monitor_resolution' => $request->monitor_resolution,
            'isArrival' => $request->isArrival,
            'price' => $request->price,
            'stock' => $request->stock ?? 0,
            'status' => 'in_stock',
        ]);
        // Handle images upload
        if ($request->hasFile('images')) {
            $oldImage = ProductImage::where('product_id', $product->id)->get();
            foreach($oldImage as $image)
            {
                Storage::disk('public')->delete('storage/'. $image->image);
                $image->delete();
            }
            // Xóa các bảng ghi ảnh trong db
            ProductImage::where('product_id', $product->id)->delete();

            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $path = "upload/products/" . $imageName;

                $resizedImage = Image::make($image)
                    ->resize(600, 600)
                    ->encode();

                Storage::disk('public')->put(path: $path, contents: $resizedImage);

                ProductImage::create(attributes: [
                    'product_id' => $product->id,
                    'image' => $path,
                ]);
            }
        }
        return response()->json([
            'status' => true,
            'message' => 'Sửa sản phẩm thành công'
        ]);    
    }
}
