<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    //
    public function showRegisterForm ()
    {
        return view('clients.pages.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'name.required' => 'Tên là bắt buộc',
            'email.required' => 'Email là bắt buộc',
            'email.unique' => 'Email đã được dùng',
            'password.required' => 'Mật khẩu là bắt buộc',
            'password.min' => 'Mật khẩu có ít nhất 6 ký tự',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp',
        ]);

        // Check if email exists
        $existingEmail = User::where('email', $request->email)->first();

        if ($existingEmail)
        {
            if ($existingEmail->isPending())
            {
                toastr()->error('Email đã được đăng ký và đang đợi kích hoạt');
                return redirect()->route('register');
            }
            return redirect()->route('register');
        }

        // Create active token
        $token = Str::random(64);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->name),
            'status' => 'pending',
            'role_id' => 3,
            'activation_token' => $token,
        ]);

        toastr()->success('Đăng ký tài khoản thành công. Vui lòng kiểm tra email để kích hoạt tài khoản');
        return redirect()->back();
    }
}
