<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
}
