<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    //Đăng nhập khách hàng **
    public function login()
    {
        return view('fronend.account.login');
    }
    //Xử lí đăng nhập khách hàng **
    public function check_login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email không được để trống.',
            'password.required' => 'Mật khẩu không được để trống.',
        ]);
        $customer = Customer::where('email', $request->email)->first();
        // if (!$customer) {
        //     dd('Không tìm thấy customer.');
        // }

        // Log::info('Plain password login:', [$request->password]);
        // Log::info('Hashed password DB:', [$customer->password]);
        // Log::info('Hash::check():', [Hash::check($request->password, $customer->password)]);

        // dd(
        //     'Debug login',
        //     $request->password,
        //     $customer->password,
        //     Hash::check($request->password, $customer->password)
        // );

        if ($customer && Hash::check($request->password, $customer->password)) {
            // Lưu session khách hàng
            session(['customer_id' => $customer->id]);

            // Lấy intended URL
            $intended = session('url.intended', '/');
            session()->forget('url.intended'); // clear sau khi lấy

            return redirect($intended)->with('success', 'Đăng nhập thành công!');
        }
        return redirect()->back()->withInput()->with('error', 'Email hoặc mật khẩu không chính xác');
    }
    //Chỉnh sửa thông tin khách hàng **
    public function edit_customer()
    {
        $customer = Customer::find(session('customer_id'));
        if (!$customer) {
            // Xử lý khi không tìm thấy, ví dụ:
            return redirect()->route('login')->with('error', 'Bạn chưa đăng nhập');
        }
        return view('fronend.account.edit_user', [
            'customer' => $customer,
        ]);
    }
    public function update_customer(Request $request)
    {
        $customer = Customer::findOrFail(session('customer_id'));

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('customers', 'email')->ignore($customer->id),
            ],
            'phone' => 'required|string|max:20',
            'city' => 'required|string|max:100',
            'district' => 'required|string|max:100',
            'ward' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'password' => 'nullable|min:3|confirmed',
        ], [
            'name.required' => 'Vui lòng nhập họ tên.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email đã tồn tại.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'city.required' => 'Vui lòng chọn tỉnh/thành phố.',
            'district.required' => 'Vui lòng chọn quận/huyện.',
            'ward.required' => 'Vui lòng chọn phường/xã.',
            'address.required' => 'Vui lòng nhập địa chỉ.',
            'password.min' => 'Mật khẩu ít nhất 3 ký tự.',
            'password.confirmed' => 'Mật khẩu nhập lại không khớp.',
        ]);

        try {
            // Lấy data
            $data = $request->only(['name', 'email', 'phone', 'city', 'district', 'ward', 'address']);

            // Nếu có mật khẩu thì hash
            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->password);
            }

            $customer->update($data);

            return redirect()->route('home')->with('success', 'Cập nhật thông tin thành công!');
        } catch (\Exception $e) {
            Log::error('Đã có lỗi khi cập nhật thông tin khách hàng :' . $e->getMessage());
            return redirect()->route('update_customer')->with('error', 'Không thể cập nhập thông tin');
        }
    }
    //Đăng kí khách hàng **
    public function register()
    {
        return view('fronend.account.register');
    }
    //Xử lí đăng kí khách hàng **
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|min:3|confirmed',
            'phone' => 'required|string|max:20',
            'city' => 'required|string|max:100',
            'district' => 'required|string|max:100',
            'ward' => 'required|string|max:100',
            'address' => 'required|string|max:255',
        ], [
            'name.required' => 'Vui lòng nhập họ tên.',
            'email.required' => 'Vui lòng nhập email.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'city.required' => 'Vui lòng chọn tỉnh/thành phố.',
            'district.required' => 'Vui lòng chọn quận/huyện.',
            'ward.required' => 'Vui lòng chọn phường/xã.',
            'address.required' => 'Vui lòng nhập địa chỉ.',

            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email đã được sử dụng.',
            'password.min' => 'Mật khẩu phải ít nhất 3 ký tự.',
            'password.confirmed' => 'Mật khẩu nhập lại không khớp.',
        ]);
        // $plainPassword = $request->password;
        // $hashedPassword = Hash::make($plainPassword);

        // // Debug ra log
        // Log::info('Plain password đăng ký:', [$plainPassword]);
        // Log::info('Hash password đăng ký:', [$hashedPassword]);
        // dd('Đăng ký debug', $plainPassword, $hashedPassword);
        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'city' => $request->city,
            'district' => $request->district,
            'ward' => $request->ward,
            'address' => $request->address,
        ]);

        session(['customer_id' => $customer->id]);
        $intended = session('url.intended', '/');
        session()->forget('url.intended');

        return redirect($intended)->with('success', 'Đăng ký thành công!');
    }
    //Đăng xuất khách hàng **
    public function logout()
    {
        session()->forget('customer_id');
        return redirect('/')->with('success', 'Bạn đã đăng xuất.');
    }
}
