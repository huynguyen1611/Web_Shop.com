@extends('dashboard.main')
@section('content')
    <link href="backend/css/plugins/switchery/switchery.css" rel="stylesheet">

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2> QUẢN LÍ KHÁCH HÀNG</h2>
            <ol class="breadcrumb" style="margin-bottom: 10px">
                <li>
                    <a href="{{ route('dashboard.index') }}">Dashboard</a>
                </li>
                <li class="active"><strong>Quản lí khách hàng</strong></li>
            </ol>
        </div>
    </div>
    <div class="col-lg-12 mb20">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{ config('apps.user.headingTabel') }} </h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#">Config option 1</a>
                        </li>
                        <li><a href="#">Config option 2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="filter">
                    <div class="perpage">
                        <div class="uk-flex uk-flex-middle uk-flex-space-between">
                            <select name="perpage" id="" class="form-control input-sm perpage filter mr16">
                                @for ($i = 20; $i <= 200; $i += 20)
                                    <option value="{{ $i }}">bản ghi</option>
                                @endfor
                            </select>
                            <div class="action">
                                <div class="uk-flex ul-flex-middle">
                                    <form action="{{ route('customer') }}" method="get" class="form-inline mb-3"
                                        id="attribute-filter-form">
                                        {{-- <select name="role_id" class="form-control mr-2" style="width: 200px;"
                                            onchange="document.getElementById('attribute-filter-form').submit();">
                                            <option value="0">-- Chọn nhóm khách hàng --</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}"
                                                    {{ request('role_id') == $role->id ? 'selected' : '' }}>
                                                    {{ $role->display_name ?? $role->name }}
                                                </option>
                                            @endforeach
                                        </select> --}}

                                        <input type="text" name="keyword" value="{{ request('keyword') }}"
                                            placeholder="Nhập từ khóa bạn muốn tìm kiếm..." class="form-control mr-2">

                                        <button type="submit" name="search" value="search" class="btn btn-primary">Tìm
                                            kiếm</button>
                                    </form>

                                    {{-- <a href="{{ route('register') }}" class="btn btn-danger"><i
                                            class="fa fa-plus mr5"></i>Thêm mới khách hàng</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
                        @if (isset($customers) && is_object($customers))
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>
                                        <input type="checkbox" value="" name=""
                                            class="input-checkbox checkBoxItem ">
                                    </td>

                                    <td>
                                        {{ $customer->name }}
                                    </td>
                                    <td>
                                        {{ $customer->email }}
                                    </td>
                                    <td>
                                        {{ $customer->phone }}
                                    </td>
                                    <td>
                                        {{ $customer->address }}
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" class="js-switch" checked />
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('customer_edit', $customer->id) }}" class="btn btn-success"><i
                                                class="fa fa-edit"></i></a>
                                        <a href="{{ route('customer_delete', $customer->id) }}"
                                            onclick="return confirm('Bạn chắc chắn muốn xóa khách hàng này không?') "
                                            class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                {{ $customers->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
    </div>
    <script src="backend/js/plugins/switchery/switchery.js"></script>
@endsection
