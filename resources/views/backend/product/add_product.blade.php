@extends('dashboard.main')
@section('content')
    <link href="backend/css/plugins/switchery/switchery.css" rel="stylesheet">
    <!-- Bao gồm jQuery và Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('backend/css/product.css') }}">
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>QUẢN LÍ SẢN PHẨM</h2>
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
                <h5>Thêm mới sản phẩm </h5>
            </div>
            <div class="ibox-content">
                <div class="content-left">
                    <form class="tieude">
                        <div class="tieude">
                            <label for="">Tiêu đề <span style="color: red">*</span></label>
                            <input type="text" name="">
                        </div>
                        <div class="mota">
                            <label for="">Mô tả <span style="color: red">*</span></label>
                            <textarea name="" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="noidung">
                            <label for="">Nội dung <span style="color: red">*</span></label>
                            <textarea name="" id="" cols="30" rows="10"></textarea>
                        </div>
                    </form>
                    <form>
                        <div class="album-container">
                            <div class="album-header">
                                <span style="font-size: 15px ">ALBUM</span>
                                {{-- <button id="select-images-btn">Chọn hình</button> --}}
                                <p id="select-images-btn" style="color: blue">Chọn hình</p>
                            </div>
                            <div id="image-preview-container" class="image-preview-container">
                                <div class="placeholder" id="placeholder">
                                    <img src="{{ asset('frontend/img/chonanh.webp') }}" alt="Không có hình" />
                                    <p>Sử dụng nút chọn hình hoặc click vào đây để thêm hình ảnh</p>
                                </div>
                            </div>
                            <input type="file" id="image-input" multiple accept="image/*" style="display: none;" />
                        </div>
                    </form>
                    <form action="">
                        <span>SẢN PHẨM CÓ NHIỀU PHIÊN BẢN</span>
                        <p>Cho phép bạn bán các phiên bản khác nhau của sản phẩm ,ví dụ : như điện thoại có các màu sắc và
                            dung lượng khác nhau. Mỗi phiên bản sẽ là 1 dòng danh sách phiên bản phía dưới</p>

                        <div class="attribute">
                            <input type="checkbox" id="toggle-attribute">
                            <p>Sản phẩm này có nhiều biến thể. Ví dụ như khác nhau về màu sắc , kích thước</p>
                        </div>

                        <div class="content-attribute" id="content-attribute" style="display: none;">
                            <div class="content-attribute-left">
                                <p>Chọn thuộc tính</p>
                                <p>Chọn giá trị của thuộc tính</p>
                            </div>

                            <!-- Nơi chứa các dòng thuộc tính -->
                            <div id="attribute-wrapper"></div>

                            <!-- Nút thêm dòng -->
                            <button type="button" id="add-version-btn">Thêm phiên bản mới</button>

                            <!-- Template dòng thuộc tính -->
                            <template id="attribute-template">
                                <div class="content-attribute-content"
                                    style="display: flex; gap: 10px; margin-bottom: 10px;">
                                    <select class="form-control attribute-group">
                                        <option value="">Chọn nhóm thuộc tính</option>
                                        <option value="color">Màu sắc</option>
                                        <option value="capacity">Dung lượng</option>
                                    </select>

                                    <select class="form-control attribute-values" multiple="multiple" style="width: 250px;">
                                        <option>512GB</option>
                                        <option>Titan</option>
                                        <option>1T</option>
                                        <option>Hồng</option>
                                    </select>

                                    <i class="fa fa-trash remove-attribute"
                                        style="cursor: pointer; color: red; margin-top: 7px;"></i>
                                </div>
                            </template>
                        </div>
                    </form>
                    <form>
                        <div class="danhsach">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Hình ảnh</th>
                                        <th>Màu sắc</th>
                                        <th>Dung lượng</th>
                                        <th>Số lượng</th>
                                        <th>Giá tiền</th>
                                        <th>SKU</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="" alt="">
                                        </td>
                                        <td>Titan</td>
                                        <td>521GB</td>
                                        <td>0</td>
                                        <td>100.000</td>
                                        <td>12426452-2-3</td>
                                    </tr>
                                    <div class="chitiet">
                                        <div class="chitiet-top">
                                            <p>CẬP NHẬT THÔNG TIN CƠ BẢN </p>
                                            <button>Hủy bỏ</button>
                                            <button>Lưu lại</button>
                                        </div>
                                        <img src="" alt="">
                                        <div class="chitiet-botton">
                                            <p>Tồn kho</p>
                                            <input type="checkbox" class="js-switch" checked />

                                        </div>
                                    </div>
                                    <tr>
                                        <td>
                                            <img src="" alt="">
                                        </td>
                                        <td>Titan</td>
                                        <td>1T</td>
                                        <td>0</td>
                                        <td>100.000</td>
                                        <td>12426452-2-4</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
                <div class="content-right">
                    <div class="danhmuc">
                        <form action="">
                            <span>CHỌN DANH MỤC CHA</span>
                            <select class="form-control" id="parent-category">
                                <option value="">Điện thoại</option>
                                <option value="">Máy tính</option>
                            </select>
                            <span>Chọn danh mục phụ nếu có</span>
                            <select class="form-control" id="sub-category" multiple="multiple">
                                <option>│-----Laptop - Máy tính</option>
                                <option>│-----Laptop</option>
                                <option>│-----Phụ kiện</option>
                            </select>
                        </form>
                    </div>
                    <form action="" class="thongtin">
                        <span>THÔNG TIN CHUNG </span>
                        <p>Mã sản phẩm </p>
                        <input type="text">
                        <p>Xuất xứ</p>
                        <input type="text">
                        <P>Giá bán sản phẩm</P>
                        <input type="number">
                        <p>Số tiết kiệm</p>
                        <input type="number">
                    </form>
                    <form action="" class="anh">
                        <label for="image">CHỌN ẢNH ĐẠI DIỆN</label>
                        <div class="admin-content-main-content-right-imgs">
                            <img id="preview" src="{{ asset('frontend/img/nophoto.jpg') }}" alt="Ảnh đại diện"
                                class="image-preview" />
                            <input id="image" type="file" name="image" accept="image/*"
                                style="display: none;" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="backend/js/plugins/switchery/switchery.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('#sub-category').select2({
            placeholder: "Chọn danh mục phụ",
            width: '100%'
        });
        $('.select2-multi').select2({
            tags: true,
            width: '100%'
        });
    </script>
    {{-- Xử lí ảnh đại diện --}}
    <script>
        document.getElementById('preview').addEventListener('click', function() {
            document.getElementById('image').click();
        });
        document.getElementById('image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    document.getElementById('preview').src = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
    {{-- Xử lí abum ảnh --}}
    <script>
        const selectBtn = document.getElementById('select-images-btn');
        const fileInput = document.getElementById('image-input');
        const previewContainer = document.getElementById('image-preview-container');
        const placeholder = document.getElementById('placeholder');

        selectBtn.addEventListener('click', () => fileInput.click());
        placeholder.addEventListener('click', () => fileInput.click());

        fileInput.addEventListener('change', function() {
            const files = Array.from(this.files);

            // Xóa placeholder nếu có
            if (placeholder) {
                placeholder.remove();
            }

            files.forEach(file => {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const imageBox = document.createElement('div');
                    imageBox.className = 'image-box';

                    const img = document.createElement('img');
                    img.src = event.target.result;
                    img.className = 'image-preview';

                    const deleteBtn = document.createElement('button');
                    deleteBtn.className = 'delete-btn';
                    deleteBtn.textContent = '×';

                    deleteBtn.addEventListener('click', () => {
                        imageBox.remove();

                        // Nếu không còn ảnh nào, hiển thị lại placeholder
                        if (previewContainer.children.length === 0) {
                            previewContainer.appendChild(placeholder);
                        }
                    });

                    imageBox.appendChild(deleteBtn);
                    imageBox.appendChild(img);
                    previewContainer.appendChild(imageBox);
                };
                reader.readAsDataURL(file);
            });

            // Reset input để cho phép chọn lại cùng ảnh
            this.value = '';
        });
    </script>
    <script>
        // Toggle Hiện/Ẩn khối thuộc tính
        document.getElementById('toggle-attribute').addEventListener('change', function() {
            document.getElementById('content-attribute').style.display = this.checked ? 'block' : 'none';
        });

        // Xử lý thêm phiên bản mới
        document.getElementById('add-version-btn').addEventListener('click', function() {
            const template = document.getElementById('attribute-template');
            const clone = template.content.cloneNode(true);
            const wrapper = document.getElementById('attribute-wrapper');

            // Gắn xử lý xóa
            const removeBtn = clone.querySelector('.remove-attribute');
            removeBtn.addEventListener('click', function() {
                this.closest('.content-attribute-content').remove();
            });

            // Gắn Select2 cho mỗi dòng mới
            const select = clone.querySelector('.attribute-values');
            $(select).select2({
                tags: true,
                width: '100%',
                placeholder: "Chọn hoặc nhập giá trị"
            });

            wrapper.appendChild(clone);
        });

        // Khởi tạo select2 cho các dropdown hiện có (nếu có)
        $(document).ready(function() {
            $('.select2-multi').select2({
                tags: true,
                width: '100%',
                placeholder: "Chọn hoặc nhập giá trị"
            });
        });
    </script>
@endsection
