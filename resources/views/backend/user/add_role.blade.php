@extends('dashboard.main')
@section('content')
    <link href="backend/css/plugins/switchery/switchery.css" rel="stylesheet">
    <!-- Bao gồm jQuery và Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('backend/css/product.css') }}">
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>QUẢN LÍ NHÓM THÀNH VIÊN</h2>
            <ol class="breadcrumb" style="margin-bottom: 10px">
                <li>
                    <a href="{{ route('dashboard.index') }}">Dashboard</a>
                </li>
                <li class="active"><strong>Quản lí nhóm thành viên</strong></li>
            </ol>
        </div>
    </div>
    <div class="col-lg-12 mb20">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Thêm mới nhóm thành viên </h5>
            </div>
            <div class="ibox-content">
                <form id="product-form" action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="content-left">
                        <div class="tieude">
                            <label for="">Tên nhóm thành viện <span style="color: red">*</span></label>
                            <input type="text" name="name" placeholder="Nhập nhóm thành viên...">
                        </div>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="content-right">
                        <div class="tieude">
                            <label for="">Tên hiển thị <span style="color: red">*</span></label>
                            <input type="text" name="display_name" placeholder="Nhập tên hiển thị...">
                        </div>
                        @error('display_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn-secondary" onclick="history.back()">Quay lại</button>
                        <button type="submit" class="btn-primary">Thêm nhóm thuộc tính</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script src="backend/js/plugins/switchery/switchery.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection
