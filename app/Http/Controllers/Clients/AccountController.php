<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\ShippingAddress;
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
        $addresses = ShippingAddress::where('user_id', Auth::id())->get();
        $orders = Order::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        // dd($orders);
        return view('clients.pages.account', compact('user', 'addresses', 'orders'));
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
        /** @var \App\Models\User $user */
        $user->update(['password' => Hash::make($request->new_password)]);
        
        return response()->json([
            'success' => true,
            'message' => 'Đổi mật khẩu thành công',
        ]);
    }

    public function addAddress (Request $request)
    {
        $request->validate(rules: [
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100'
        ]);
        //nếu tick vào chọn địa chỉ mặc định, cập nhật địa chỉ mặc định
        if ($request->has('default'))
        {
            ShippingAddress::where('user_id', Auth::id())->update(['default' => 0]);
        }

        ShippingAddress::create(attributes: [
            'user_id' => Auth::id(),
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'default' => $request->has('default') ? 1 : 0
        ]);

        return back()->with('success', 'Địa chỉ đã được thêm');
    }

    public function updatePrimaryAddress ($id)
    {
        $address = ShippingAddress::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        ShippingAddress::where('user_id', Auth::id())->update(['default' => 0]);

        $address->update(['default' => 1]);

        toastr()->success('Địa chỉ mặc định đã được cập nhật');
        return back();
    }
    
    public function deleteAddress ($id)
    {
        ShippingAddress::where('id', $id)->where('user_id', Auth::id())->delete();
        toastr()->success('Địa chỉ đã được xóa!');
        return back();
    }

}
