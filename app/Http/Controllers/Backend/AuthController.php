<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function __construct() {}

    //Dashboard **
    public function index()
    {
        if (Auth::id() > 0) {
            return redirect()->route('dashboard.index');
        }
        return view('backend.account.login');
    }
    //Đăng nhập **
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email không được để trống.',
            'password.required' => 'Mật khẩu không được để trống.',
        ]);
        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ])) {
            return redirect()->route('dashboard.index')->with('success', 'Đăng nhập thành công');
        }

        return redirect()->back()->with('error', 'Email hoặc mật khẩu không chính xác');
        // return redirect()->route('auth.admin')->with('success', 'Email hoặc mật khẩu không chính xác');
    }
    //Đăng xuất **
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.admin');
    }
    public function register()
    {
        return view('backend.user.add_user');
    }
    public function register_store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:users,email',
            'password'      => 'required|string|min:3|confirmed',
            'phone'         => 'required|string|max:20',
            'province_id'   => 'required|string|max:10',
            'district_id'   => 'required|string|max:10',
            'ward_id'       => 'required|string|max:10',
            'address'       => 'required|string|max:500',
            'birthday'      => 'required|date',
            'description'   => 'required|string',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'agree'         => 'accepted',
        ], [

            'name.required'         => 'Vui lòng nhập họ tên.',
            'email.required'        => 'Vui lòng nhập email.',
            'email.email'           => 'Email không hợp lệ.',
            'email.unique'          => 'Email đã tồn tại.',
            'password.required'     => 'Vui lòng nhập mật khẩu.',
            'password.min'          => 'Mật khẩu phải có ít nhất 3 ký tự.',
            'password.confirmed'    => 'Mật khẩu xác nhận không khớp.',
            'phone.required'        => 'Vui lòng nhập số điện thoại.',
            'province_id.required'  => 'Vui lòng nhập tỉnh/thành phố.',
            'district_id.required'  => 'Vui lòng nhập quận/huyện.',
            'ward_id.required'      => 'Vui lòng nhập phường/xã.',
            'address.required'      => 'Vui lòng nhập địa chỉ.',
            'birthday.required'     => 'Vui lòng nhập ngày sinh.',
            'birthday.date'         => 'Ngày sinh không hợp lệ.',
            'description.required'  => 'Vui lòng nhập mô tả bản thân.',
            'agree.accepted'        => 'Bạn phải đồng ý với điều khoản.',
            'image.image'           => 'Tệp tải lên phải là hình ảnh.',
            'image.mimes'           => 'Ảnh phải có định dạng jpeg, png, jpg hoặc gif.',
            'image.max'             => 'Kích thước ảnh không được vượt quá 2MB.',

        ]);

        // Xử lý ảnh đại diện
        $avatarPath = null;
        if ($request->hasFile('image')) {
            $avatarPath = $request->file('image')->store('avatars', 'public');
        }

        // Tạo user
        $user = User::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'phone'         => $request->phone,
            'province_id'   => $request->province_id,
            'district_id'   => $request->district_id,
            'ward_id'       => $request->ward_id,
            'address'       => $request->address,
            'birthday'      => $request->birthday,
            'description'   => $request->description,
            'image'   => $avatarPath,
            'ip'            => $request->ip(),
            'user_agent'    => $request->userAgent(),
        ]);

        Auth::login($user); // Đăng nhập luôn sau khi tạo

        return redirect()->route('user.index')->with('success', 'Đăng ký và đăng nhập thành công!');
    }
    //Chỉnh sửa thành viên **
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.user.edit_user', compact('user'));
    }

    //Xóa thành viên **
    public function delete($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->route('user.index')->with('success', 'Xóa thành viên thành công!');
        } catch (\Exception $e) {
            Log::error('Lỗi khi xóa thành viên:' . $id . '- ' . $e->getMessage());
            return redirect()->back()->with('error', 'Xóa thành viên không thành công.Vui lòng thử lại!');
        }
    }
}
