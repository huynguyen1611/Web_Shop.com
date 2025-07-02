<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    public function customer(Request $request)
    {
        $query = Customer::query();
        if ($request->keyword) {
            $query->where('name', 'LIKE', '%' . $request->keyword . '%');
        }

        $customers = $query->latest()->paginate(15);
        return view('backend.customer.list_customer', [
            'customers' => $customers,
        ]);
    }
    //Chỉnh sửa thành viên **
    public function customer_edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('backend.customer.edit_customer', compact('customer'));
    }
    public function customer_update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:customers,email,' . $customer->id . ',id',
            'password'    => 'nullable|string|min:3|confirmed',
            'phone'       => 'required|string|min:9|max:11',
            'city' => 'required|string',
            'district' => 'required|string',
            'ward'     => 'required|string',
            'address'     => 'required|string|max:500',
        ], [
            'name.required' => 'Vui lòng nhập họ tên.',
            'name.max' => 'Họ tên không được vượt quá 255 ký tự.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email này đã được sử dụng.',
            'password.min' => 'Mật khẩu phải có ít nhất 3 ký tự.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'phone.min' => 'Số điện thoại quá ngắn.',
            'phone.max' => 'Số điện thoại quá dài.',
            'city.required' => 'Vui lòng chọn Tỉnh/Thành phố.',
            'district.required' => 'Vui lòng chọn Quận/Huyện.',
            'ward.required' => 'Vui lòng chọn Phường/Xã.',
            'address.required' => 'Vui lòng nhập địa chỉ.',
            'address.max' => 'Địa chỉ không được vượt quá 500 ký tự.',
        ]);
        if ($request->filled('password')) {
            $customer->password = Hash::make($request->password);
        }
        // Cập nhật dữ liệu khác
        $customer->update([
            'name'        => $request->name,
            'email'       => $request->email,
            'phone'       => $request->phone,
            'province_id' => $request->province_id,
            'district_id' => $request->district_id,
            'ward_id'     => $request->ward_id,
            'address'     => $request->address,
        ]);

        return redirect()->route('customer')->with('success', 'Cập nhật khách hàng thành công!');
    }
    //Xóa khách hàng **
    public function customer_delete($id)
    {
        try {
            $customer = Customer::findOrFail($id);
            $customer->delete();

            return redirect()->route('customer')->with('success', 'Xóa khách hàng thành công!');
        } catch (\Exception $e) {
            Log::error('Lỗi khi xóa thành viên:' . $id . '- ' . $e->getMessage());
            return redirect()->back()->with('error', 'Xóa khách hàng không thành công.Vui lòng thử lại!');
        }
    }
}
