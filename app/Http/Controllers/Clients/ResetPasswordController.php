<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    //
    public function showResetForm ($token)
    {
        return view ('clients.auth.reset-password', ['token' => $token]);
    }
}
