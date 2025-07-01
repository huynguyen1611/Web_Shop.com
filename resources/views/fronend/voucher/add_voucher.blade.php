@extends('dashboard.main')
@section('content')
    <link href="backend/css/plugins/switchery/switchery.css" rel="stylesheet">
    <!-- Bao gồm jQuery và Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('backend/css/product.css') }}">
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>QUẢN LÍ VOUCHER</h2>
            <ol class="breadcrumb" style="margin-bottom: 10px">
                <li>
                    <a href="{{ route('dashboard.index') }}">Dashboard</a>
                </li>
                <li class="active"><strong>voucher</strong></li>
            </ol>
        </div>
    </div>
    <style>

    </style>
    <div class="col-lg-12 mb20">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Thêm mới voucher </h5>
            </div>
            <div class="ibox-content">
                <form id="product-form" action="{{ route('insert_voucher') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="content-left">
                        <div class="form-group">
                            <label for="code">Mã voucher <span style="color: red">*</span></label>
                            <input type="text" name="code" class="form-control" value="{{ old('code') }}"
                                placeholder="Nhập mã voucher...">
                        </div>
                        @error('code')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="name">Tên chương trình <span style="color: red">*</span></label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                placeholder="Nhập tên chương trình...">
                        </div>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="type">Loại giảm giá <span style="color: red">*</span></label>
                            <select name="type" class="form-control" id="discount-type">
                                <option value="percent" {{ old('type') == 'percent' ? 'selected' : '' }}>Giảm theo phần trăm
                                </option>
                                <option value="fixed" {{ old('type') == 'fixed' ? 'selected' : '' }}>Giảm số tiền cố định
                                </option>
                            </select>
                        </div>
                        @error('type')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group" id="max-discount-group">
                            <label for="max_discount">Số tiền giảm tối đa (chỉ dùng khi giảm theo %)</label>
                            <input type="number" name="max_discount" class="form-control"
                                value="{{ old('max_discount') }}">
                        </div>
                        @error('max_discount')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="value">Giá trị giảm <span style="color: red">*</span></label>
                            <input type="number" name="value" class="form-control" value="{{ old('value') }}">
                            <small style="color: rgb(70, 68, 68) ;font-family: inherit" class="text-muted">(Nếu giảm theo
                                phần trăm, nhập giá trị
                                từ 1 đến 100)</small>
                        </div>
                        @error('value')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="quantity">Số lượng còn lại <span style="color: red">*</span></label>
                            <input type="number" name="quantity" class="form-control" value="{{ old('quantity', 10) }}">
                        </div>
                    </div>
                    @error('quantity')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="content-right">
                        <div class="form-group">
                            <label for="start_date">Ngày bắt đầu (tùy chọn) <span style="color: red">*</span></label>
                            {{-- <input type="datetime-local" name="start_date" class="form-control" max="9999-12-31T23:59"
                                value="{{ old('start_date') ? \Carbon\Carbon::parse(old('start_date'))->format('Y-m-d\TH:i') : \Carbon\Carbon::now()->format('Y-m-d\TH:i') }}"> --}}
                            <input type="datetime-local" name="start_date" id="start_date" class="form-control"
                                max="9999-12-31T23:59" value="{{ old('start_date') }}">
                        </div>
                        @error('start_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="end_date">Ngày kết thúc (tùy chọn) <span style="color: red">*</span></label>
                            <input type="datetime-local" name="end_date" class="form-control" max="9999-12-31T23:59"
                                value="{{ old('end_date') ? \Carbon\Carbon::parse(old('end_date'))->format('Y-m-d\TH:i') : '' }}">
                        </div>
                        @error('end_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="status">Trạng thái <span style="color: red">*</span></label>
                            <select name="status" class="form-control">
                                <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Kích hoạt</option>
                                <option value="0" {{ old('status', 1) == 0 ? 'selected' : '' }}>Vô hiệu hóa</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn-secondary" onclick="history.back()">Quay lại</button>
                        <button type="submit" class="btn-primary">Thêm mới voucher</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    </div>
    <script src="backend/js/plugins/switchery/switchery.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            function toggleMaxDiscount() {
                const type = $('#discount-type').val();
                if (type === 'percent') {
                    $('#max-discount-group').show();
                } else {
                    $('#max-discount-group').hide();
                    $('input[name="max_discount"]').val(''); // xóa nếu không cần
                }
            }

            // Gọi khi trang load
            toggleMaxDiscount();

            // Gọi khi người dùng thay đổi loại giảm
            $('#discount-type').on('change', function() {
                toggleMaxDiscount();
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const startInput = document.getElementById('start_date');

            // Nếu chưa có giá trị (lần đầu mở form), tự động điền giờ hiện tại theo giờ máy
            if (!startInput.value) {
                const now = new Date();

                // Chuyển về chuỗi ISO và lấy định dạng yyyy-MM-ddTHH:mm
                const localDateTime = new Date(now.getTime() - now.getTimezoneOffset() * 60000)
                    .toISOString().slice(0, 16);

                startInput.value = localDateTime;
            }
        });
    </script>
@endsection
