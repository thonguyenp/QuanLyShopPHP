<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    //
    public function index()
    {
        $user = Auth::guard('admin')->user();
        // dd($user);
        return view('admin.pages.profile', compact('user'));
    }
}
