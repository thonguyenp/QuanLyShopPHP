<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function showFormAddProducts()
    {
        $categories = Category::all();

        return view('admin.pages.product-add', compact('categories'));
    }
}
