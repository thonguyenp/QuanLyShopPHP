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

        return view('clients.pages.products', compact('categories', 'manufacturers'));
    }
}
