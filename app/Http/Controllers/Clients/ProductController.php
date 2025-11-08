<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index ()
    {
        // Lấy danh sách category
        $categories = Category::with('products')->get();
        // Lấy danh sách manufacturers
        $manufacturers = Manufacturer::with('products')->get();
        // Lấy danh sách sản phẩm
        $productsForGrid = Product::with('firstImage', 'category')->where('status','in_stock')->paginate(9);
        foreach ($productsForGrid as $product) {
            $product->image_url = $product->firstImage?->image
            ? asset('storage/upload/products/'.$product->firstImage->image)
            : asset('storage/upload/products/default-product.png');
        }
        

        return view('clients.pages.products', compact('categories', 'manufacturers','productsForGrid'));
    }
}
