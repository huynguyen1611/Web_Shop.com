@extends('dashboard.main')
@section('content')
    <link href="backend/css/plugins/switchery/switchery.css" rel="stylesheet">

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>QUẢN LÍ SẢN PHẨM</h2>
            <ol class="breadcrumb" style="margin-bottom: 10px">
                <li>
                    <a href="{{ route('dashboard.index') }}">Dashboard</a>
                </li>
                <li class="active"><strong>Sản phẩm</strong></li>
            </ol>
        </div>
    </div>
    <div class="col-lg-12 mb20">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Danh sách sản phẩm </h5>
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
                                    <form action="{{ route('list_product') }}" method="GET"
                                        class="uk-flex uk-flex-middle mb-3">
                                        <select name="category_id" class="form-control mr-2" onchange="this.form.submit()">
                                            <option value="0">-- Chọn danh mục phụ --</option>
                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat->id }}"
                                                    {{ $cat->id == $category_id ? 'selected' : '' }}>
                                                    {{ $cat->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <input type="text" name="keyword" class="form-control mr-2"
                                            placeholder="Nhập tên sản phẩm..." value="{{ $keyword }}"
                                            style="width: 250px">

                                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                                    </form>
                                    <a href="{{ route('add_product') }}" class="btn btn-danger"><i
                                            class="fa fa-plus mr5"></i>Thêm mới sản
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
                            <th colspan="6" style="width: 70%;">Tên sản phẩm</th>
                            <th class="text-center">Tình trạng</th>
                            <th class="text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>
                                    <input type="checkbox" value="" name=""
                                        class="input-checkbox checkBoxItem ">
                                </td>

                                <td colspan="6">
                                    <p style="font-size: 20px ; color: blue">{{ $product->name }}</p>
                                    <p><span style="color: red;">Nguồn hiển thị:</span>
                                        {{ $product->category->name ?? 'Không có danh mục cha' }} -
                                        {{ $product->subCategories->pluck('name')->implode(', ') ?? 'Không có danh mục phụ' }}
                                    </p>
                                </td>

                                <td class="text-center">
                                    <input type="checkbox" class="js-switch" checked />
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('edit_product', $product->id) }}" class="btn btn-success"><i
                                            class="fa fa-edit"></i></a>
                                    <a href="{{ route('delete_product', $product->id) }}"
                                        onclick="return confirm('Bạn có muốn xóa sản phẩm này không?')"
                                        class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $users->links('pagination::bootstrap-5') }} --}}

            </div>
        </div>
    </div>
    </div>
    <script src="backend/js/plugins/switchery/switchery.js"></script>
@endsection
