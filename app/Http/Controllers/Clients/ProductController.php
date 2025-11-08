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
        $products = Product::with('firstImage', 'category')->where('status','in_stock')->paginate(9);
        foreach ($products as $product) {
            $product->image_url = $product->firstImage?->image
            ? asset('storage/upload/products/'.$product->firstImage->image)
            : asset('storage/upload/products/default-product.png');
        }
        

        return view('clients.pages.products', compact('categories', 'manufacturers','products'));
    }

    public function filter(Request $request)
    {
        $query = Product::query();
        // Filter categories
        if ($request->has('category_id') &&  $request->category_id != '')
        {
            $query->where('category_id', $request->category_id);
        }

        // Filter price
        if ($request->has('min_price') &&  $request->has('max_price'))
        {
            $query->whereBetween('price', [$request->min_price, $request->max_price]);
        }

        // Filter sort_by
        if ($request->has('sort_by'))
        {
            switch ($request->sort_by) {
                case 'price_asc':
                    $query->orderBy(column: 'price', direction: 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy(column: 'price', direction: 'desc');
                    break;
                case 'latest':
                    $query->orderBy(column: 'created_at', direction: 'desc');
                    break;
                default:
                    $query->orderBy(column: 'id', direction: 'desc');
                    break;
            }
        }
        $products = $query->paginate(9);

        return response()->json([
            'products' => view('clients.components.products_grid', compact('products'))->render()
        ]);
    }
}
