<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VoucherController extends Controller
{
    public function voucher(Request $request)
    {
        $query = Voucher::query();

        if ($request->keyword) {
            $query->where('name', 'LIKE', '%' . $request->keyword . "%");
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        $vouchers = $query->latest()->paginate(10);

        return view('fronend.voucher.list_voucher', compact('vouchers'));
    }

    public function voucher_create()
    {
        return view('fronend.voucher.add_voucher');
    }

    public function insert_voucher(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:vouchers,code',
            'name' => 'required',
            'type' => 'required|in:percent,fixed',
            'value' => 'required|integer|min:1',
            'max_discount' => 'nullable|integer|min:0',
            'quantity' => 'required|integer|min:0',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ], [
            'code.required' => 'Mã voucher là bắt buộc.',
            'code.unique' => 'Mã voucher đã tồn tại.',

            'name.required' => 'Tên chương trình là bắt buộc.',

            'type.required' => 'Vui lòng chọn loại giảm giá.',
            'type.in' => 'Loại giảm giá không hợp lệ.',

            'value.required' => 'Giá trị giảm là bắt buộc.',
            'value.integer' => 'Giá trị giảm phải là số nguyên.',
            'value.min' => 'Giá trị giảm phải lớn hơn 0.',

            'max_discount.integer' => 'Số tiền giảm tối đa phải là số nguyên.',
            'max_discount.min' => 'Số tiền giảm tối đa không được âm.',

            'quantity.required' => 'Số lượng là bắt buộc.',
            'quantity.integer' => 'Số lượng phải là số nguyên.',
            'quantity.min' => 'Số lượng không được âm.',

            'start_date.date' => 'Ngày bắt đầu không đúng định dạng.',

            'end_date.date' => 'Ngày kết thúc không đúng định dạng.',
            'end_date.after_or_equal' => 'Ngày kết thúc phải sau hoặc bằng ngày bắt đầu.',
        ]);

        Voucher::create($request->all());

        return redirect()->route('voucher')->with('success', 'Thêm voucher thành công');
    }

    public function voucher_edit($id)
    {
        $voucher = Voucher::findOrFail($id);
        return view('fronend.voucher.edit_voucher', compact('voucher'));
    }

    public function voucher_update(Request $request, Voucher $voucher, $id)
    {
        try {
            $request->validate([
                'code' => 'required|unique:vouchers,code,' . $id,
                'name' => 'required',
                'type' => 'required|in:percent,fixed',
                'value' => 'required|integer|min:1',
                'max_discount' => 'nullable|integer|min:0',
                'quantity' => 'required|integer|min:0',
                'start_date' => 'nullable|date',
                'end_date' => 'nullable|date|after_or_equal:start_date',
            ], [
                'code.required' => 'Mã voucher là bắt buộc.',
                'code.unique' => 'Mã voucher đã tồn tại.',

                'name.required' => 'Tên chương trình là bắt buộc.',

                'type.required' => 'Vui lòng chọn loại giảm giá.',
                'type.in' => 'Loại giảm giá không hợp lệ.',

                'value.required' => 'Giá trị giảm là bắt buộc.',
                'value.integer' => 'Giá trị giảm phải là số nguyên.',
                'value.min' => 'Giá trị giảm phải lớn hơn 0.',

                'max_discount.integer' => 'Số tiền giảm tối đa phải là số nguyên.',
                'max_discount.min' => 'Số tiền giảm tối đa không được âm.',

                'quantity.required' => 'Số lượng là bắt buộc.',
                'quantity.integer' => 'Số lượng phải là số nguyên.',
                'quantity.min' => 'Số lượng không được âm.',

                'start_date.date' => 'Ngày bắt đầu không đúng định dạng.',

                'end_date.date' => 'Ngày kết thúc không đúng định dạng.',
                'end_date.after_or_equal' => 'Ngày kết thúc phải sau hoặc bằng ngày bắt đầu.',
            ]);
            $voucher = Voucher::findOrFail($id);
            $voucher->update($request->all());

            return redirect()->route('voucher')->with('success', 'Cập nhật voucher thành công');
        } catch (Exception $e) {
            Log::error('Lỗi khi chỉnh sửa voucher', $e->getMessage());
            DB::rollBack();
            return back()->route('voucher_edit')->with('error', 'Lỗi cập nhật voucher !' . $e->getMessage());
        }
    }

    public function voucher_delete(Voucher $voucher)
    {
        $voucher->delete();
        return redirect()->route('vouchers.index')->with('success', 'Xóa voucher thành công');
    }
}
