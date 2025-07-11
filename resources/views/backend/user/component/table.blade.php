    <table class="table table-striped">
        <thead>
            <tr>
                <th><input type="checkbox" value="" name="" id="checkAll" class="input-checkbox">
                </th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th class="text-center">Tình trạng</th>
                <th class="text-center">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($users) && is_object($users))
                @foreach ($users as $user)
                    <tr>
                        <td>
                            <input type="checkbox" value="" name="" class="input-checkbox checkBoxItem ">
                        </td>

                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            {{ $user->phone }}
                        </td>
                        <td>
                            {{ $user->address }}
                        </td>
                        <td class="text-center">
                            <input type="checkbox" class="js-switch" checked />
                        </td>
                        <td class="text-center">
                            <a href="{{ route('auth.edit', $user->id) }}" class="btn btn-success"><i
                                    class="fa fa-edit"></i></a>
                            <a href="{{ route('auth.delete', $user->id) }}"
                                onclick="return confirm('Bạn chắc chắn muốn xóa thành viên này không?') "
                                class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{ $users->links('pagination::bootstrap-5') }}
