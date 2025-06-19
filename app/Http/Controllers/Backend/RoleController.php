<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // Nhóm thành viên **
    public function index()
    {
        $roles = Role::all();
        return view('backend.user.list_role', compact('roles'));
    }
    //Thêm nhóm thành viên **
    public function create_role()
    {
        return view('backend.user.add_role');
    }

    public function store_role(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'display_name' => 'required|string|max:255',
        ], [
            'name.required' => 'Vui lòng nhập tên nhóm quyền.',
            'name.unique' => 'Tên nhóm quyền đã tồn tại.',
            'display_name.string' => 'Tên hiển thị phải là chuỗi ký tự.',
            'display_name.max' => 'Tên hiển thị không được vượt quá 255 ký tự.',
            'display_name.required' => 'Vui lòng nhập tên hiện thị',
        ]);

        Role::create([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);

        return redirect()->route('roles.index')->with('success', 'Thêm quyền thành công!');
    }
    //Chỉnh sửa nhóm thành viên
    public function edit_role($id)
    {
        $role = Role::findOrFail($id);
        return view('backend.user.edit_role', compact('role'));
    }

    // Cập nhật nhóm thành viên **
    public function update_role(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $request->validate(
            [
                'name' => 'required|unique:roles,name,' . $role->id,
                //Kiểm tra tên quyền không được trùng trong bảng roles, cột name, ngoại trừ bản ghi đang chỉnh sửa có id = $role->id.
                'display_name' => 'required|string|max:255',
            ],
            [
                'name.required' => 'Vui lòng nhập tên nhóm quyền.',
                'name.unique' => 'Tên nhóm quyền đã tồn tại.',
                'display_name.string' => 'Tên hiển thị phải là chuỗi ký tự.',
                'display_name.max' => 'Tên hiển thị không được vượt quá 255 ký tự.',
                'display_name.required' => 'Vui lòng nhập tên hiện thị',
            ]
        );

        $role->update($request->only('name', 'display_name'));

        return redirect()->route('roles.index')->with('success', 'Cập nhật quyền thành công!');
    }

    // Xóa nhóm thành viên **
    public function delete_role($id)
    {
        $role = Role::findOrFail($id);

        // Nếu role đã gán user thì có thể kiểm tra và ngăn xóa nếu cần
        if ($role->users()->exists()) {
            return redirect()->back()->with('error', 'Không thể xóa quyền đang được sử dụng.');
        }

        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Xóa nhóm thành viên thành công!');
    }
}
