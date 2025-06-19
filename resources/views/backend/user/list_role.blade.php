@extends('dashboard.main')
@section('content')
    <link href="backend/css/plugins/switchery/switchery.css" rel="stylesheet">

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>QUẢN LÍ NHÓM THÀNH VIÊN</h2>
            <ol class="breadcrumb" style="margin-bottom: 10px">
                <li>
                    <a href="{{ route('dashboard.index') }}">Dashboard</a>
                </li>
                <li class="active"><strong>Quản lí thành viên</strong></li>
            </ol>
        </div>
    </div>
    <div class="col-lg-12 mb20">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Danh sách nhóm thành viên </h5>
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
                                    <div class="uk-search uk-flex uk-flex-middle mr10">
                                        <form action="{{ route('roles.index') }}" method="get" class="mb-3 form-inline">
                                            <div class="input-group">
                                                <input type="text" name="keyword" value="{{ request('keyword') }}"
                                                    placeholder="Nhập từ khóa bạn muốn tìm kiếm..." class="form-control">
                                                <span class="input-group-btn">
                                                    <button type="submit" name="search" value="search"
                                                        class="btn btn-primary mb0 btn-sm">Tìm kiếm</button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                    <a href="{{ route('roles.create') }}" class="btn btn-danger"><i
                                            class="fa fa-plus mr5"></i>Thêm mới nhóm
                                        thành viên</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table table-striped">
                    <thead>
                        <style>
                            table {
                                table-layout: auto !important;
                            }
                        </style>
                        <tr>
                            <th><input type="checkbox" value="" id="checkAll" class="input-checkbox"></th>
                            <th>Tên nhóm thuộc tính</th>
                            <th>Tên hiển thị</th>
                            <th class="text-center">Tình trạng</th>
                            <th class="text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>
                                    <input type="checkbox" value="" class="input-checkbox checkBoxItem">
                                </td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->display_name }}</td>
                                <td class="text-center">
                                    <input type="checkbox" class="js-switch" checked />
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-success"><i
                                            class="fa fa-edit"></i></a>
                                    <a href="{{ route('roles.delete', $role->id) }}"
                                        onclick="return confirm('Bạn có muốn xóa nhóm thành viên này không?')"
                                        class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $attributes->links('pagination::bootstrap-4') }} --}}

            </div>
        </div>
    </div>
    </div>
    <script src="backend/js/plugins/switchery/switchery.js"></script>
@endsection
