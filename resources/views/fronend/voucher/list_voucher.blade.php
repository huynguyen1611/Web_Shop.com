@extends('dashboard.main')
@section('content')
    <link href="backend/css/plugins/switchery/switchery.css" rel="stylesheet">

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>QUẢN LÍ VOUCHER</h2>
            <ol class="breadcrumb" style="margin-bottom: 10px">
                <li>
                    <a href="{{ route('dashboard.index') }}">Dashboard</a>
                </li>
                <li class="active"><strong>Voucher</strong></li>
            </ol>
        </div>
    </div>
    <div class="col-lg-12 mb20">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Danh sách voucher </h5>
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
                                    <form action="{{ route('voucher') }}" method="GET"
                                        class="uk-flex uk-flex-middle mb-3">
                                        <select name="type" class="form-control mr-2" onchange="this.form.submit()">
                                            <option value="">-- Chọn loại voucher --</option>
                                            <option value="percent" {{ request('type') == 'percent' ? 'selected' : '' }}>
                                                Giảm theo %</option>
                                            <option value="fixed" {{ request('type') == 'fixed' ? 'selected' : '' }}>Giảm
                                                số tiền cố định</option>
                                        </select>

                                        <input type="text" name="keyword" class="form-control mr-2"
                                            placeholder="Nhập tên voucher..." value="{{ request('keyword') }}"
                                            style="width: 250px">

                                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                                    </form>
                                    <a href="{{ route('voucher_create') }}" class="btn btn-danger"><i
                                            class="fa fa-plus mr5"></i>Thêm mới voucher</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table table-striped">
                    <thead>
                        <style>

                        </style>
                        <tr>
                            <th><input type="checkbox" value="" name="" id="checkAll" class="input-checkbox">
                            </th>
                            <th class="text-center">Mã voucher</th>
                            <th class="text-center">Tên voucher</th>
                            <th class="text-center">Loại giảm</th>
                            <th class="text-center">Giá trị giảm</th>
                            <th class="text-center">Số lượng còn lại</th>
                            <th class="text-center">Tình trạng</th>
                            <th class="text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vouchers as $voucher)
                            <tr>
                                <td>
                                    <input type="checkbox" value="" name=""
                                        class="input-checkbox checkBoxItem ">
                                </td>

                                <td class="text-center">
                                    <p style="">{{ $voucher->code }}</p>
                                </td>
                                <td class="text-center">
                                    <p>{{ $voucher->name }}</p>
                                </td>
                                <td class="text-center">
                                    @if ($voucher->type == 'percent')
                                        <span>Giảm theo %</span>
                                    @elseif ($voucher->type == 'fixed')
                                        <span>Giảm số tiền cố định</span>
                                    @else
                                        <span>Không xác định</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <p>{{ $voucher->type == 'fixed' ? number_format($voucher->value, 0, ',', '.') . 'đ' : $voucher->value . '%' }}
                                    </p>
                                </td>
                                <td class="text-center">
                                    <p>{{ $voucher->quantity }}</p>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" class="js-switch" checked />
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('voucher_edit', $voucher->id) }}" class="btn btn-success"><i
                                            class="fa fa-edit"></i></a>
                                    <a href="{{ route('voucher_delete', $voucher->id) }}"
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
