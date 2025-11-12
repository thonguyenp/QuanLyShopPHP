<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function index(Request $request) 
    {
        $keyword = $request->input('keyword');
        if(!$keyword)
        {
            return redirect()->back()->with('error', 'Vui lòng nhập từ khóa tìm kiếm.');
        }

        $products = Product::where('name', 'LIKE', "%$keyword%")->where('status','in_stock')
        ->orWhere('description', 'LIKE', "%$keyword%")
        ->paginate(2);
        // dd($products);
        // Lấy lại hết data từ request
        $products->appends($request->all());

        return view('clients.pages.products-search', compact('products'));
    }
}
