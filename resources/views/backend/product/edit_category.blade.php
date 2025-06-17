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
        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                margin: 0;
                padding: 0;
            }

            .container {
                margin: 40px auto;
                background: #ffffff;
                padding: 30px;
                border-radius: 12px;
                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            }

            h2 {
                text-align: center;
                color: #2c3e50;
                margin-bottom: 30px;
            }

            .form-group {
                margin-bottom: 20px;
            }

            label {
                display: block;
                margin-bottom: 8px;
                font-weight: 600;
                color: #34495e;
            }

            input[type="text"],
            select {
                width: 100%;
                padding: 12px 15px;
                border: 1px solid #ccc;
                border-radius: 8px;
                font-size: 16px;
                transition: 0.3s ease;
            }

            input[type="text"]:focus,
            select:focus {
                border-color: #2980b9;
                outline: none;
            }

            button {
                width: 100%;
                padding: 12px;
                background-color: #3498db;
                border: none;
                color: white;
                font-size: 16px;
                border-radius: 8px;
                cursor: pointer;
                transition: background-color 0.3s ease;
                margin-top: 20px
            }

            button:hover {
                background-color: #2980b9;
            }
        </style>
        <div class="col-lg-12 mb20">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Thêm mới danh mục sản phẩm </h5>
                </div>
                <div class="ibox-content">
                    <div class="container">
                        <form action="{{ route('category_store') }}" method="POST">
                            @csrf

                            <label>Tên danh mục:</label>
                            <input type="text" name="name">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label style="font-size: 15px">Chọn danh mục cha (nếu có):</label>
                            <select name="parent_id">
                                <option value="">-- Là danh mục cha --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('parent_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <button type="submit">Thêm danh mục</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <script src="backend/js/plugins/switchery/switchery.js"></script>
@endsection
