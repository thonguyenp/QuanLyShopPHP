<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function showOrder ($id)
    {
        return view('clients.pages.order-detail');
    }
}
