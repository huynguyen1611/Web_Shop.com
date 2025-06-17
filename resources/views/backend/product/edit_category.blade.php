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
                <li class="active"><strong>Danh mục sản phẩm</strong></li>
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
                    <h5>Chỉnh sửa danh mục sản phẩm </h5>
                </div>
                <div class="ibox-content">
                    <div class="container">
                        <form action="{{ route('update_category', $category->id) }}" method="POST">
                            @csrf

                            <label>Tên danh mục:</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $category->name) }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <label style="font-size: 15px">Chọn danh mục cha (nếu có):</label>
                            <select name="parent_id" class="form-control">
                                <option value="">-- Là danh mục cha --</option>
                                @foreach ($parentCategories as $parent)
                                    <option value="{{ $parent->id }}"
                                        {{ old('parent_id', $category->parent_id) == $parent->id ? 'selected' : '' }}>
                                        {{ $parent->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('parent_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <button type="button" class="btn-secondary" onclick="history.back()">Quay lại</button>
                            <button type="submit">Cập nhật danh mục</button>
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
