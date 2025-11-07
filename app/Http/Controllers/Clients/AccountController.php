<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        // dd($user);
        return view('clients.pages.account', compact('user'));
    }

    // Update information
    public function update(Request $request)
    {
        $request->validate([
            'ltn_name' => 'required|string|max:255',
            'ltn_phone_number' => 'nullable|string|max:15',
            'ltn_address' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        /** @var \App\Models\User $user */ //hàng này giúp editor hiểu rằng biến user là 1 đối tượng của User model
        $user = Auth::user();
        // handle avatar
        if ($request->hasFile('avatar')) {
            // Delete 
            if ($user->avatar && Storage::disk('public')->exists($user->avatar))
            {
                Storage::disk('public')->delete($user->avatar);
            }
            $file = $request->file('avatar');
            // Create new name with timestamp
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            // Save img to folder
            $avatarPath = $file->storeAs('upload/users', $filename, 'public');
            $user->avatar = $avatarPath;
        }

        $user->name = $request->input('ltn_name');
        $user->phone_number = $request->input('ltn_phone_number');
        $user->address = $request->input('ltn_address');
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Cập nhập thông tin thành công',
            'avatar' => asset('storage/' . $user->avatar)
        ]);

    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_new_password' => 'required|same:new_password',
        ],[
            'current_password.required' => 'Vui lòng nhập mật khẩu hiện tại.',
            'new_password.required' => 'Mật khẩu mới không được để trống.',
            'new_password.min' => 'Mật khẩu mới phải có ít nhất 6 ký tự.',
            'confirm_new_password.required' => 'Vui lòng nhập lại mật khẩu mới.',
            'confirm_new_password.same' => 'Mật khẩu nhập lại không khớp.',
        ]);

        $user = Auth::user();

        // Check if current password is correct
        if (!Hash::check($request->current_password, $user->password))
        {
            return response()->json([
                'error' => ['current_password' => ['Mật khẩu hiện tại không đúng']]
            ], 422);    //422 = unprocessable content
        }

        $user->update(['password' => Hash::make($request->new_password)]);
        
        return response()->json([
            'success' => true,
            'message' => 'Đổi mật khẩu thành công',
        ]);
    }
}
