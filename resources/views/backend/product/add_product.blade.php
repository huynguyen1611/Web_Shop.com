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
                <li class="active"><strong>Sản phẩm</strong></li>
            </ol>
        </div>
    </div>
    <div class="col-lg-12 mb20">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Thêm mới sản phẩm </h5>
            </div>
            <div class="ibox-content">
                <form id="product-form" action="{{ route('product_store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="content-left">
                        <div class="tieude">
                            <label for="">Tiêu đề <span style="color: red">*</span></label>
                            <input type="text" name="name" value="{{ old('name') }}">
                        </div>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="mota">
                            <label for="">Mô tả ngắn <span style="color: red">*</span></label>
                            <textarea name="short_description" cols="30" rows="10">{{ old('short_description') }}</textarea>
                        </div>
                        @error('short_description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="noidung">
                            <label for="">Nội dung <span style="color: red">*</span></label>
                            <textarea name="content" cols="30" rows="10">{{ old('content') }}</textarea>
                        </div>
                        @error('content')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="album-container">
                            <div class="album-header">
                                <span style="font-size: 15px ">ALBUM</span>
                                <p id="select-images-btn" style="color: blue">Chọn hình</p>
                            </div>
                            <div id="image-preview-container" class="image-preview-container">
                                <div class="placeholder" id="placeholder">
                                    <img src="{{ asset('frontend/img/chonanh.webp') }}" alt="Không có hình" />
                                    <p style="font-size: 15px; color: rgb(11, 125, 231)">
                                        Sử dụng nút chọn hình hoặc click vào đây để thêm hình ảnh
                                    </p>
                                </div>
                            </div>
                            <input type="file" id="image-input" name="album_images[]" multiple accept="image/*"
                                style="display: none;" />
                        </div>
                        @error('album_images')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <span>SẢN PHẨM CÓ NHIỀU PHIÊN BẢN</span>
                        <p>Cho phép bạn bán các phiên bản khác nhau của sản phẩm ,ví dụ : như điện thoại có các màu sắc và
                            dung lượng khác nhau.</p>

                        <div class="attribute">
                            <input type="checkbox" id="toggle-attribute" name="has_variants">
                            <p>Sản phẩm này có nhiều biến thể. Ví dụ như khác nhau về màu sắc , kích thước</p>
                        </div>

                        <div class="content-attribute" id="content-attribute" style="display: none;">
                            <div class="content-attribute-left">
                                <p>Chọn thuộc tính</p>
                                <p>Chọn giá trị của thuộc tính</p>
                            </div>
                            <div id="attribute-wrapper"></div>

                            <button class="button-attribute" type="button" id="add-version-btn">Thêm phiên bản
                                mới</button>
                            <template id="attribute-template">
                                <div class="content-attribute-content">
                                    <select class="form-control attribute-group">
                                        <option value="">Chọn nhóm thuộc tính</option>
                                        @foreach ($attributes as $attribute)
                                            <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                        @endforeach
                                    </select>

                                    <select class="form-control attribute-values" multiple>
                                        {{-- option sẽ được JS gán động --}}
                                    </select>

                                    <i class="fa fa-trash remove-attribute"></i>
                                </div>
                            </template>
                            <div class="danhsach">
                                <table id="productTable">
                                    <thead>
                                        <tr>
                                            <th>Ảnh</th>
                                            <th>Màu sắc</th>
                                            <th>Dung lượng</th>
                                            <th>Số lượng</th>
                                            <th>Giá</th>
                                            <th>SKU</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="content-right">
                        <div class="danhmuc">
                            <span>CHỌN DANH MỤC CHA</span>
                            {{-- <select class="form-control" id="parent-category" name="parent_category">
                                @foreach ($parentCategories as $parent)
                                    <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                @endforeach
                            </select> --}}
                            <select class="form-control" id="parent-category" name="parent_category">
                                <option value="0">-- Chọn danh mục cha --</option>
                                @foreach ($parentCategories as $parent)
                                    <option value="{{ $parent->id }}"
                                        {{ old('parent_category') == $parent->id || $parent->id == ($selectedCategoryId ?? 0) ? 'selected' : '' }}>
                                        {{ $parent->name }}
                                    </option>
                                @endforeach
                            </select>
                            <p class="flex">Chọn danh mục phụ nếu có <span style="color: red"> *</span></p>
                            {{-- <select class="form-control" id="sub-category" name="sub_categories[]" multiple="multiple">
                                @foreach ($subCategories as $sub)
                                    <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                                @endforeach
                            </select> --}}
                            <select class="form-control" id="sub-category" name="sub_categories[]" multiple="multiple">
                                <!-- JS sẽ fill danh mục phụ tương ứng -->
                            </select>

                        </div>

                        <div class="thongtin">
                            <span>THÔNG TIN CHUNG</span>
                            <p>Mã sản phẩm</p>
                            <input type="text" name="product_code" value="{{ old('product_code') }}">
                            @error('product_code')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <p>Xuất xứ</p>
                            <input type="text" name="origin" value="{{ old('origin') }}">
                            @error('origin')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <p>Giá gốc sản phẩm</p>
                            <input type="text" name="price" id="price" value="{{ old('price') }}">
                            @error('price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <p>Giá giảm sản phẩm</p>
                            <input type="text" name="sale_price" id="sale_price" value="{{ old('sale_price') }}">
                            @error('sale_price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <p>Số tiết kiệm</p>
                            <input type="number" name="discount_percent" value="{{ old('discount_percent') }}">
                            @error('discount_percent')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="anh">
                            <label for="image">CHỌN ẢNH ĐẠI DIỆN</label>
                            <div class="admin-content-main-content-right-imgs">
                                <img id="preview" src="{{ asset('frontend/img/nophoto.jpg') }}"
                                    class="image-preview" />
                                <input id="image" type="file" name="thumbnail" accept="image/*"
                                    style="display: none;" />
                            </div>
                        </div>
                        @error('thumbnail')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn-secondary" onclick="history.back()">Quay lại</button>
                        <button type="submit" class="btn-primary">Thêm sản phẩm</button>
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

            // Không reset this.value ở đây
            if (placeholder) placeholder.remove();

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

                        // Nếu không còn ảnh nào
                        if (previewContainer.querySelectorAll('.image-box').length === 0) {
                            previewContainer.appendChild(placeholder);
                        }
                    });

                    imageBox.appendChild(deleteBtn);
                    imageBox.appendChild(img);
                    previewContainer.appendChild(imageBox);
                };
                reader.readAsDataURL(file);
            });

            // ❌ KHÔNG reset input tại đây nếu muốn submit file
            // this.value = '';
        });
    </script>
    <script>
        // Thiết lập token cho tất cả các request Ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    {{-- Xử lí khi click và danh sách thuộc tính --}}
    <script>
        // Gắn sự kiện click cho bảng, sử dụng event delegation
        document.querySelector('#productTable').addEventListener('click', function(e) {
            const row = e.target.closest('.main-row');
            if (row) {
                const nextRow = row.nextElementSibling;
                if (nextRow && nextRow.classList.contains('detail-row')) {
                    nextRow.style.display = nextRow.style.display === 'none' ? 'table-row' : 'none';
                }
            }
        });
    </script>
    {{-- Xử lí danh sách khi chọn thuộc tính --}}

    <script>
        $(document).ready(function() {
            const allAttributes = @json($attributes);

            $('.select2-multi').select2({
                tags: true,
                width: '100%',
                placeholder: "Chọn hoặc nhập giá trị"
            });

            // Toggle khối thuộc tính
            $('#toggle-attribute').on('change', function() {
                $('#content-attribute').toggle(this.checked);
            });

            // Click "Thêm phiên bản"
            $('#add-version-btn').on('click', function() {
                const selectedAttrIds = getSelectedAttributeIds();
                const template = document.getElementById('attribute-template');
                const clone = template.content.cloneNode(true);
                const wrapper = document.getElementById('attribute-wrapper');
                const selectGroup = clone.querySelector('.attribute-group');
                const selectValues = clone.querySelector('.attribute-values');

                selectGroup.innerHTML = '<option value="">-- Chọn nhóm --</option>';
                allAttributes.forEach(attr => {
                    if (!selectedAttrIds.includes(attr.id.toString())) {
                        const option = new Option(attr.name, attr.id);
                        selectGroup.appendChild(option);
                    }
                });

                $(selectValues).select2({
                    tags: true,
                    width: '100%',
                    placeholder: "Chọn hoặc nhập giá trị"
                });

                selectGroup.addEventListener('change', function() {
                    const attrId = this.value;
                    const attribute = allAttributes.find(a => a.id == attrId);
                    $(selectValues).empty();
                    if (attribute?.values) {
                        attribute.values.forEach(val => {
                            const option = new Option(val.value, val.id, false, false);
                            $(selectValues).append(option);
                        });
                        $(selectValues).trigger('change');
                    }

                    checkHideAddButton();
                });

                $(selectValues).on('change', function() {
                    generateCombinations();
                });

                clone.querySelector('.remove-attribute').addEventListener('click', function() {
                    this.closest('.content-attribute-content').remove();
                    generateCombinations();
                    checkHideAddButton();
                });

                wrapper.appendChild(clone);
                checkHideAddButton();
            });

            // Bắt toàn bộ click trong #productTable
            $('#productTable').on('click', function(e) {
                const target = e.target;

                // Mở dòng chi tiết
                if ($(target).closest('.main-row').length) {
                    const clickedRow = $(target).closest('.main-row');
                    const detailRow = clickedRow.next('.detail-row');

                    $('.detail-row').hide(); // Ẩn hết trước

                    if (detailRow.length) {
                        const quantity = clickedRow.find('input[name$="[stock]"]').val() || '';
                        const price = clickedRow.find('input[name$="[price]"]').val() || '';
                        const sku = clickedRow.find('input[name$="[sku]"]').val() || '';

                        detailRow.find('.soluong input').val(quantity);
                        detailRow.find('.giatien input').val(price);
                        detailRow.find('.sku input').val(sku);

                        detailRow.show();
                    }
                }

                // Lưu lại
                if ($(target).hasClass('save-btn')) {
                    const detailRow = $(target).closest('.detail-row');
                    const mainRow = detailRow.prev('.main-row');

                    const quantity = detailRow.find('.soluong input').val();
                    const price = detailRow.find('.giatien input').val();
                    const sku = detailRow.find('.sku input').val();

                    mainRow.find('input[name$="[stock]"]').val(quantity);
                    mainRow.find('input[name$="[price]"]').val(price);
                    mainRow.find('input[name$="[sku]"]').val(sku);

                    detailRow.hide();
                }

                // Hủy
                if ($(target).hasClass('cancel-btn')) {
                    $(target).closest('.detail-row').hide();
                }
            });

            // ===== Hàm hỗ trợ =====
            function getSelectedAttributeIds() {
                const selects = document.querySelectorAll('.attribute-group');
                return Array.from(selects).map(sel => sel.value).filter(Boolean);
            }

            function checkHideAddButton() {
                const selectedAttrIds = getSelectedAttributeIds();
                const allAttrIds = allAttributes.map(a => a.id.toString());
                const hidden = allAttrIds.every(id => selectedAttrIds.includes(id));
                document.getElementById('add-version-btn').style.display = hidden ? 'none' : 'inline-block';
            }

            function cartesian(arr) {
                return arr.reduce((a, b) =>
                    a.flatMap(d => b.map(e => [...d, e])),
                    [
                        []
                    ]
                );
            }

            function generateCombinations() {
                const wrapper = document.getElementById('attribute-wrapper');
                const attributeGroups = wrapper.querySelectorAll('.content-attribute-content');
                const selectedValues = [];


                attributeGroups.forEach(group => {
                    const attrSelect = group.querySelector('.attribute-group');
                    const valueSelect = $(group.querySelector('.attribute-values'));

                    const attrId = attrSelect.value;
                    const attrName = attrSelect.options[attrSelect.selectedIndex]?.text;
                    const values = valueSelect.val() || [];

                    if (attrId && values.length > 0) {
                        selectedValues.push({
                            id: attrId,
                            name: attrName,
                            values: values.map(valId => {
                                const text = valueSelect.find(`option[value="${valId}"]`)
                                    .text();
                                return {
                                    id: valId,
                                    text
                                };
                            })
                        });
                    }
                });

                const combinations = cartesian(selectedValues.map(g => g.values));
                const tableHead = document.querySelector('#productTable thead tr');
                const tableBody = document.querySelector('#productTable tbody');

                tableHead.innerHTML = '<th>Ảnh</th>' +
                    selectedValues.map(a => `<th>${a.name}</th>`).join('') +
                    '<th>Số lượng</th><th>Giá</th><th>SKU</th>';

                tableBody.innerHTML = '';

                combinations.forEach((combo, index) => {
                    const skuParts = combo.map(c => c.id);
                    const attrTexts = combo.map(c => c.text);
                    const hiddenInputs = combo.map((c, i) =>
                        `<input type="hidden" name="variants[${index}][attributes][${selectedValues[i].id}]" value="${c.id}">`
                    ).join('');

                    const mainRow = document.createElement('tr');
                    const productCode = document.querySelector('input[name="product_code"]').value ?? 'SP';
                    mainRow.classList.add('main-row');
                    mainRow.innerHTML = `
                            <td>
                                <div style="position: relative; width: 30px; height: 30px;">
                                    <img src="{{ asset('frontend/img/nophoto.jpg') }}" class="preview-img" style="width:30px; height:30px; object-fit:cover;" />
                                    <input type="file" name="variants[${index}][image]" class="image-input" style="opacity:0; width:30px; height:30px; position:absolute; top:0; left:0; cursor:pointer;">
                                </div>
                            </td>
                            ${attrTexts.map((text) => `<td>${text}</td>`).join('')}
                            <td><input type="text" name="variants[${index}][stock]" class="form-control" value="0" ></td>
                            <td><input type="text" name="variants[${index}][price]" class="form-control" value="100.000" ></td>
                            <td><input type="text"  name="variants[${index}][sku]"  class="form-control" value="${productCode}-${skuParts.join('-')}" ></td>
                            ${hiddenInputs}
                        `;
                    const detailRow = document.createElement('tr');

                    detailRow.classList.add('detail-row');
                    detailRow.style.display = 'none';
                    //     detailRow.innerHTML = `
                //     <td colspan="${selectedValues.length + 4}">
                //         <div class="chitiet">
                //             <div class="chitiet-top">
                //                 <p>CẬP NHẬT THÔNG TIN CƠ BẢN</p>
                //                 <div class="button">
                //                     <button type="button" class="save-btn">Lưu</button>
                //                     <button type="button" class="cancel-btn">Hủy</button>
                //                 </div>
                //             </div>
                //             <div class="chitiet-botton">
                //                 <div class="tonkho">
                //                     <p>Tồn kho</p>
                //                     <input type="checkbox" class="js-switch" checked />
                //                 </div>
                //                 <div class="soluong grip">
                //                     <label>Số lượng</label>
                //                     <input type="text" name="">
                //                 </div>
                //                 <div class="giatien grip">
                //                     <label>Giá tiền</label>
                //                     <input type="text" name="">
                //                 </div>
                //                 <div class="sku grip">
                //                     <label>SKU</label>
                //                     <input type="text" name="">
                //                 </div>
                //             </div>
                //         </div>
                //     </td>
                // `;

                    tableBody.appendChild(mainRow);
                    tableBody.appendChild(detailRow);
                });
            }
        });
    </script>
    {{-- Xử lí thêm ảnh ở bản thuộc tính --}}
    <script>
        document.addEventListener('change', function(e) {
            if (e.target.classList.contains('image-input')) {
                const file = e.target.files[0];
                const img = e.target.closest('td').querySelector('.preview-img');
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        img.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
    </script>
    {{-- Xử lí nhập giá --}}
    <script>
        function formatNumber(input) {
            let selectionStart = input.selectionStart;
            let selectionEnd = input.selectionEnd;

            // Lấy giá trị hiện tại và loại dấu chấm
            let rawValue = input.value.replace(/\./g, '').replace(/\D/g, '');

            // Format lại thành chuỗi có dấu chấm
            let formattedValue = '';
            for (let i = rawValue.length - 1, j = 1; i >= 0; i--, j++) {
                formattedValue = rawValue[i] + formattedValue;
                if (j % 3 === 0 && i !== 0) {
                    formattedValue = '.' + formattedValue;
                }
            }

            // Đếm số chấm trước khi format và sau khi format
            let oldDots = (input.value.substr(0, selectionStart).match(/\./g) || []).length;
            let newDots = (formattedValue.substr(0, selectionStart).match(/\./g) || []).length;

            input.value = formattedValue;

            // Cập nhật vị trí con trỏ
            let newPos = selectionStart + (newDots - oldDots);
            input.setSelectionRange(newPos, newPos);
        }

        // Gắn sự kiện
        document.getElementById('price').addEventListener('input', function() {
            formatNumber(this);
        });

        document.getElementById('sale_price').addEventListener('input', function() {
            formatNumber(this);
        });

        // Xử lý khi submit form: loại dấu chấm
        document.getElementById('product-form')?.addEventListener('submit', function(e) {
            let priceInput = document.getElementById('price');
            let salePriceInput = document.getElementById('sale_price');
            priceInput.value = priceInput.value.replace(/\./g, '');
            salePriceInput.value = salePriceInput.value.replace(/\./g, '');
        });
    </script>
    {{-- Xử lí nhập giá --}}
    <script>
        function formatNumber(input) {
            let selectionStart = input.selectionStart;

            // Lấy số thuần (bỏ dấu chấm)
            let rawValue = input.value.replace(/\./g, '').replace(/\D/g, '');

            // Tạo chuỗi format mới
            let formattedValue = '';
            for (let i = rawValue.length - 1, j = 1; i >= 0; i--, j++) {
                formattedValue = rawValue[i] + formattedValue;
                if (j % 3 === 0 && i !== 0) {
                    formattedValue = '.' + formattedValue;
                }
            }

            // Đếm dấu chấm trước và sau vị trí con trỏ
            let oldDots = (input.value.substr(0, selectionStart).match(/\./g) || []).length;
            input.value = formattedValue;
            let newDots = (input.value.substr(0, selectionStart).match(/\./g) || []).length;

            // Cập nhật con trỏ
            let newPos = selectionStart + (newDots - oldDots);
            input.setSelectionRange(newPos, newPos);
        }

        // Gắn cho cả price và sale_price
        document.getElementById('price').addEventListener('input', function() {
            formatNumber(this);
        });
        document.getElementById('sale_price').addEventListener('input', function() {
            formatNumber(this);
        });

        // Khi submit: loại dấu chấm
        document.getElementById('product-form')?.addEventListener('submit', function() {
            document.getElementById('price').value = document.getElementById('price').value.replace(/\./g, '');
            document.getElementById('sale_price').value = document.getElementById('sale_price').value.replace(/\./g,
                '');
        });
    </script>
    {{-- Xử lí chọn danh mục --}}
    <script>
        const allSubs = @json($subCategories);
        $(document).ready(function() {
            $('#parent-category').on('change', function() {
                const parentId = $(this).val();
                $('#sub-category').empty();
                if (parentId == 0) return;

                allSubs.filter(s => s.parent_id == parentId).forEach(s => {
                    $('#sub-category').append(`<option value="${s.id}">${s.name}</option>`);
                });
            });

            // Auto trigger khi edit load lại
            $('#parent-category').trigger('change');
        });
    </script>
    {{-- Xử lí nhập giá thuộc tính --}}
    <script>
        function formatNumber(input) {
            let selectionStart = input.selectionStart;

            let rawValue = input.value.replace(/\./g, '').replace(/\D/g, '');

            let formattedValue = '';
            for (let i = rawValue.length - 1, j = 1; i >= 0; i--, j++) {
                formattedValue = rawValue[i] + formattedValue;
                if (j % 3 === 0 && i !== 0) {
                    formattedValue = '.' + formattedValue;
                }
            }

            let oldDots = (input.value.substr(0, selectionStart).match(/\./g) || []).length;
            input.value = formattedValue;
            let newDots = (input.value.substr(0, selectionStart).match(/\./g) || []).length;

            let newPos = selectionStart + (newDots - oldDots);
            input.setSelectionRange(newPos, newPos);
        }

        // Gắn sự kiện cho các trường cụ thể (giá chính)
        document.getElementById('price')?.addEventListener('input', function() {
            formatNumber(this);
        });
        document.getElementById('sale_price')?.addEventListener('input', function() {
            formatNumber(this);
        });

        // Gắn cho tất cả input price khi nhập (bao gồm variant)
        document.addEventListener('input', function(e) {
            if (e.target.matches('input[name^="variants"][name$="[price]"]')) {
                formatNumber(e.target);
            }
        });

        // Khi submit: loại dấu chấm
        document.getElementById('product-form')?.addEventListener('submit', function() {
            // Giá chính
            ['price', 'sale_price'].forEach(id => {
                const input = document.getElementById(id);
                if (input) input.value = input.value.replace(/\./g, '');
            });

            // Variant prices
            document.querySelectorAll('input[name$="[price]"]').forEach(input => {
                input.value = input.value.replace(/\./g, '');
            });
        });
    </script>
@endsection
