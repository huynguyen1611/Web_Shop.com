@extends('dashboard.main')
@section('content')
    <link href="{{ asset('backend/css/plugins/switchery/switchery.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('backend/css/product.css') }}">

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>QUẢN LÍ THUỘC TÍNH</h2>
            <ol class="breadcrumb" style="margin-bottom: 10px">
                <li><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                <li class="active"><strong>Thuộc tính</strong></li>
            </ol>
        </div>
    </div>

    <div class="col-lg-12 mb20">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Cập nhật thuộc tính</h5>
            </div>
            <div class="ibox-content">
                <form id="product-form" action="{{ route('attri_value_update', $attributeValue->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="content-left">
                        <div class="tieude">
                            <label for="value">Tiêu đề <span style="color: red">*</span></label>
                            <input type="text" name="value" value="{{ old('value', $attributeValue->value) }}"
                                placeholder="Nhập tên thuộc tính...">
                        </div>
                        @error('value')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="content-right">
                        <div class="form-group">
                            <label for="attribute_id">Nhóm thuộc tính <span class="text-danger">*</span></label>
                            <select name="attribute_id" id="attribute_id" class="form-control">
                                <option value="">-- Chọn nhóm thuộc tính --</option>
                                @foreach ($attributes as $attr)
                                    <option value="{{ $attr->id }}"
                                        {{ $attributeValue->attribute_id == $attr->id ? 'selected' : '' }}>
                                        {{ $attr->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('attribute_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="anh">
                            <label for="image">Ảnh đại diện</label>
                            <div class="admin-content-main-content-right-imgs">
                                <img id="preview"
                                    src="{{ $attributeValue->image ? asset('storage/' . $attributeValue->image) : asset('frontend/img/nophoto.jpg') }}"
                                    width="80" style="cursor: pointer;">
                                <input id="image" type="file" name="image" accept="image/*"
                                    style="display: none;" />
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn-secondary" onclick="history.back()">Quay lại</button>
                        <button type="submit" class="btn-primary">Cập nhật loại thuộc tính</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('backend/js/plugins/switchery/switchery.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    {{-- Xử lý ảnh đại diện --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const preview = document.getElementById('preview');
            const imageInput = document.getElementById('image');

            if (preview && imageInput) {
                preview.addEventListener('click', function() {
                    imageInput.click();
                });

                imageInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(event) {
                            preview.src = event.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }
        });
    </script>
@endsection
