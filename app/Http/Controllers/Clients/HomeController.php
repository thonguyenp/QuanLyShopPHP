<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index ()
    {
        $categories = Category::with('products')->get();
       
        $categoriesWithTwoProducts = $categories->map(function ($category) {
            // Lấy 2 sản phẩm đầu tiên của mỗi danh mục
            $category->two_products = $category->products->take(2);
            return $category;
        });

        foreach($categoriesWithTwoProducts as $index => $category)
        {
            foreach ($category ->products as $product)
            {
                $product->image_url = $product->firstImage?->image
                ? asset('storage/upload/products/' . $product->firstImage->image) 
                : asset('storage/upload/products/default-product.png');
            }
        }
        return view('clients.pages.home', compact('categories', 'categoriesWithTwoProducts'));
    }
}
