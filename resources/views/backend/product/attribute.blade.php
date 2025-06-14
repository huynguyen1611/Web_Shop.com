@extends('dashboard.main')
@section('content')
    <link href="backend/css/plugins/switchery/switchery.css" rel="stylesheet">

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>QUẢN LÍ THUỘC TÍNH</h2>
            <ol class="breadcrumb" style="margin-bottom: 10px">
                <li>
                    <a href="{{ route('dashboard.index') }}">Dashboard</a>
                </li>
                <li class="active"><strong>Thuộc tính</strong></li>
            </ol>
        </div>
    </div>
    <div class="col-lg-12 mb20">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Danh sách thuộc tính </h5>
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
                                    <select name="user-catalogue_id" class="form-control mr10">
                                        <option value="0" selected="selected">Chọn nhóm thuộc tính<main></main>
                                        </option>
                                        <option value="1">Dung lượng</option>
                                        <option value="1">Màu sắc</option>
                                    </select>
                                    <div class="uk-search uk-flex uk-flex-middle mr10">
                                        <div class="input-group">
                                            <input type="text" name="keyword" value=""
                                                placeholder="Nhập từ khóa bạn muốn tìm kiếm..." class="form-control">
                                            <span class="input-group-btn">
                                                <button type="submit" name="search" value="search"
                                                    class="btn btn-primary mb0 btn-sm">Tìm kiếm</button>
                                            </span>
                                        </div>
                                    </div>
                                    <a href="" class="btn btn-danger"><i class="fa fa-plus mr5"></i>Thêm mới thuộc
                                        tính</a>
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

                            th[colspan="6"] {
                                width: 60%;
                            }
                        </style>
                        <tr>
                            <th><input type="checkbox" value="" name="" id="checkAll" class="input-checkbox">
                            </th>
                            <th colspan="6" style="width: 70%;">Tên thuộc tính </th>
                            <th class="text-center">Tình trạng</th>
                            <th class="text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="checkbox" value="" name="" class="input-checkbox checkBoxItem ">
                            </td>

                            <td colspan="6">
                                <p style="font-size: 20px ; color: blue">Trắng</p>
                                <p><span style="color: red;">Nguồn hiển thị:</span>Màu sắc</p>
                            </td>

                            <td class="text-center">
                                <input type="checkbox" class="js-switch" checked />
                            </td>
                            <td class="text-center">
                                <a href="" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" value="" name="" class="input-checkbox checkBoxItem ">
                            </td>

                            <td colspan="6">
                                <p style="font-size: 20px ; color: blue">512GB</p>
                                <p><span style="color: red;">Nguồn hiển thị:</span>Dung lượng</p>
                            </td>

                            <td class="text-center">
                                <input type="checkbox" class="js-switch" checked />
                            </td>
                            <td class="text-center">
                                <a href="" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                {{-- {{ $users->links('pagination::bootstrap-5') }} --}}

            </div>
        </div>
    </div>
    </div>
    <script src="backend/js/plugins/switchery/switchery.js"></script>
@endsection
