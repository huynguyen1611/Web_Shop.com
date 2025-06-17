@extends('dashboard.main')
@section('content')
    <link href="backend/css/plugins/switchery/switchery.css" rel="stylesheet">

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>QUẢN LÍ LOẠI SẢN PHẨM</h2>
            <ol class="breadcrumb" style="margin-bottom: 10px">
                <li>
                    <a href="{{ route('dashboard.index') }}">Dashboard</a>
                </li>
                <li class="active"><strong>Quản lí bài viết</strong></li>
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
                                    <form method="GET" action="{{ route('list_category') }}" class="mb-3 form-inline">
                                        <select name="group" class="form-control mr-2" onchange="this.form.submit()"
                                            style="max-width: 200px;">
                                            <option value="">Tất cả</option>
                                            <option value="parent" {{ request('group') == 'parent' ? 'selected' : '' }}>Danh
                                                mục cha</option>
                                            <option value="child" {{ request('group') == 'child' ? 'selected' : '' }}>Danh
                                                mục phụ</option>
                                        </select>

                                        <input type="text" name="keyword" value="{{ request('keyword') }}"
                                            placeholder="Nhập từ khóa tìm kiếm..." class="form-control mr-2"
                                            style="max-width: 300px;">

                                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                                    </form>

                                    <a href="{{ route('add_category') }}" class="btn btn-danger"><i
                                            class="fa fa-plus mr5"></i>Thêm mới nhóm sản
                                        phẩm</a>
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
                            <th colspan="6" style="width: 70%;">Tên nhóm sản phẩm</th>
                            <th class="text-center">Tình trạng</th>
                            <th class="text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td><input type="checkbox" class="input-checkbox checkBoxItem"></td>
                                <td colspan="6">
                                    @if ($category->parent_id == null)
                                        |--- {{ $category->name }}
                                    @else
                                        |-------- {{ $category->name }}
                                    @endif
                                </td>
                                <td class="text-center"><input type="checkbox" class="js-switch" checked /></td>
                                <td class="text-center">
                                    <a href="{{ route('edit_category', $category->id) }}" class="btn btn-success"><i
                                            class="fa fa-edit"></i></a>
                                    <a href="{{ route('delete_category', $category->id) }}"
                                        onclick="return confirm('Bạn chắc chắn muốn xóa danh mục này không?')"
                                        class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    {{-- {{ $users->links('pagination::bootstrap-5') }} --}}
            </div>
        </div>
    </div>
    </div>
    <script src="backend/js/plugins/switchery/switchery.js"></script>
@endsection
