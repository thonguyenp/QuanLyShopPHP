<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    //
    public function index()
    {
        $categories = Category::with('products')->get();
        // Hiển thị ảnh cho product
        foreach ($categories as $index => $category) {
            foreach ($category->products as $product) {
                $product->image_url = $product->firstImage?->image
                ? asset('storage/upload/products/'.$product->firstImage->image)
                : asset('storage/upload/products/default-product.png');
            }
        }
        // hiển thị thông tin cho best seller
        $bestSellingProducts = Product::with('category')
            ->join('order_items', 'products.id', '=', 'order_items.product_id')
            ->select('products.*')
            ->selectRaw('SUM(order_items.quantity) as total_sold')
            ->groupBy('products.id', 'products.name', 'products.slug', 'products.category_id',
                'products.description', 'products.price', 'products.stock', 'products.status',
                'products.created_at', 'products.updated_at')
            ->orderByDesc('total_sold')
            ->limit(10)
            ->get();
        // hiển thị thông tin cho right banner
        $productRightBanner = Product::with('category')
            ->where('name', 'iPhone 15 Pro Max')
            ->first();
        
        // hiển thị thông tin cho All Product Section
        $allProductSection = Product::with('category')
            ->take(8)                   // chỉ lấy 8 sản phẩm
            ->get();
        // Gán đường dẫn ảnh cho phần allProductSection
        foreach ($allProductSection as $product) {
            $product->image_url = $product->firstImage?->image
                ? asset('storage/upload/products/' . $product->firstImage->image)
                : asset('storage/upload/products/default-product.png');
        }

        return view('clients.pages.home', compact(
            'categories',
            'bestSellingProducts',
            'productRightBanner',
            'allProductSection'));
    }
}
