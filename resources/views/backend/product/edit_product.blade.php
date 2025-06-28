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
                <h5>Chỉnh sửa sản phẩm </h5>
            </div>
            <div class="ibox-content">
                <form id="product-form" action="{{ route('update_product', $product->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="content-left">
                        <div class="tieude">
                            <label for="">Tiêu đề <span style="color: red">*</span></label>
                            <input type="text" name="name" value="{{ $product->name }}">
                        </div>

                        <div class="mota">
                            <label for="">Mô tả ngắn <span style="color: red">*</span></label>
                            <textarea name="short_description" cols="30" rows="10">{{ $product->short_description }}</textarea>
                        </div>

                        <div class="noidung">
                            <label for="">Nội dung <span style="color: red">*</span></label>
                            <textarea name="content" cols="30" rows="10">{{ $product->content }}</textarea>
                        </div>

                        <div class="album-container">
                            <div class="album-header">
                                <span style="font-size: 15px ">ALBUM</span>
                                <p id="select-images-btn" style="color: blue">Chọn hình</p>
                            </div>
                            <div id="image-preview-container" class="image-preview-container">
                                <div class="placeholder" id="placeholder">
                                    {{-- <img src="{{ asset('frontend/img/chonanh.webp') }}" alt="Không có hình" /> --}}
                                    @foreach ($product->images->where('is_thumbnail', false) as $img)
                                        <img src="{{ asset('storage/' . $img->file_path) }}" alt="Ảnh album" />
                                    @endforeach
                                    <p style="font-size: 15px; color: rgb(11, 125, 231)">
                                        Sử dụng nút chọn hình hoặc click vào đây để thêm hình ảnh
                                    </p>
                                </div>
                            </div>
                            <input type="file" id="image-input" name="album_images[]" multiple accept="image/*"
                                style="display: none;" />
                        </div>

                        <span>SẢN PHẨM CÓ NHIỀU PHIÊN BẢN</span>
                        <p>Cho phép bạn bán các phiên bản khác nhau của sản phẩm.</p>

                        {{-- Bỏ toggle checkbox, bảng luôn hiển thị --}}
                        <div class="content-attribute" id="content-attribute">

                            <div class="content-attribute-left">
                                <p>Chọn thuộc tính</p>
                                <p>Chọn giá trị của thuộc tính</p>
                            </div>
                            <div id="attribute-wrapper"></div>

                            <button class="button-attribute" type="button" id="add-version-btn">Thêm phiên bản mới</button>

                            <template id="attribute-template">
                                <div class="content-attribute-content">
                                    <select class="form-control attribute-group">
                                        <option value="">Chọn nhóm thuộc tính</option>
                                        @foreach ($attributes as $attribute)
                                            <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                        @endforeach
                                    </select>
                                    <select class="form-control attribute-values" multiple></select>
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
                                    <tbody></tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                    <div class="content-right">
                        <div class="danhmuc">
                            <span>CHỌN DANH MỤC CHA</span>
                            <select name="parent_category" id="parent-category" class="form-control">
                                <option value="0">-- Chọn danh mục cha --</option>
                                @foreach ($parentCategories as $parent)
                                    <option value="{{ $parent->id }}"
                                        {{ $parent->id == $selectedCategoryId ? 'selected' : '' }}>
                                        {{ $parent->name }}
                                    </option>
                                @endforeach
                            </select>
                            <p class="flex">Chọn danh mục phụ nếu có <span style="color: red"> *</span></p>
                            <select name="sub_categories[]" id="sub-category" class="form-control" multiple>
                                @foreach ($subCategories as $sub)
                                    <option value="{{ $sub->id }}"
                                        {{ in_array($sub->id, $selectedSubCategoryIds) ? 'selected' : '' }}>
                                        {{ $sub->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="thongtin">
                            <span>THÔNG TIN CHUNG</span>
                            <p>Mã sản phẩm</p>
                            <input type="text" name="product_code" value="{{ $product->main_sku }}">
                            <p>Xuất xứ</p>
                            <input type="text" name="origin" value="{{ $product->origin }}">
                            <p>Giá gốc sản phẩm</p>
                            <input type="text" name="price" id="price"
                                value=" {{ number_format($product->price, 0, ',', '.') }}">
                            <p>Giá giảm sản phẩm</p>
                            <input type="text" name="sale_price" id="sale_price"
                                value=" {{ number_format($product->sale_price, 0, ',', '.') }}">
                            <p>Số tiết kiệm</p>
                            <input type="number" name="discount_percent" value="{{ $product->discount_percent }}">
                        </div>

                        <div class="anh">
                            <label for="image">CHỌN ẢNH ĐẠI DIỆN</label>
                            <div class="admin-content-main-content-right-imgs">
                                @php
                                    $thumbnail = $product->images->where('is_thumbnail', true)->first();
                                @endphp

                                <img id="preview"
                                    src="{{ $thumbnail ? asset('storage/' . $thumbnail->file_path) : asset('frontend/img/nophoto.jpg') }}"
                                    alt="Ảnh đại diện" style="cursor: pointer;" />

                                <input id="thumbnail" type="file" name="thumbnail" accept="image/*"
                                    style="display: none;" />

                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn-secondary" onclick="history.back()">Quay lại</button>
                        <button type="submit" class="btn-primary">Cập nhật sản phẩm</button>
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
            document.getElementById('thumbnail').click(); // mở dialog file input
        });

        document.getElementById('thumbnail').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    document.getElementById('preview').src = event.target.result; // preview ảnh
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

        let selectedFiles = [];

        // Khi click vào nút chọn hình
        selectBtn.addEventListener('click', () => fileInput.click());
        placeholder.addEventListener('click', () => fileInput.click());

        fileInput.addEventListener('change', function() {
            const files = Array.from(this.files);
            selectedFiles = selectedFiles.concat(files);
            renderPreviews();
            this.value = ''; // Cho phép chọn lại cùng file
        });

        function renderPreviews() {
            previewContainer.innerHTML = '';

            if (selectedFiles.length === 0) {
                previewContainer.appendChild(placeholder);
            }

            selectedFiles.forEach((file, index) => {
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
                        selectedFiles.splice(index, 1);
                        renderPreviews();
                    });

                    imageBox.appendChild(deleteBtn);
                    imageBox.appendChild(img);
                    previewContainer.appendChild(imageBox);
                };
                reader.readAsDataURL(file);
            });
        }

        // Trước khi submit form, gán lại files vào input
        document.getElementById('product-form').addEventListener('submit', function(e) {
            const dataTransfer = new DataTransfer();
            selectedFiles.forEach(file => dataTransfer.items.add(file));
            fileInput.files = dataTransfer.files;
        });
    </script>
    {{-- Thiết lập token cho tất cả các request Ajax --}}
    <script>
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
        const existingVariants = @json($variantData);
        const allAttributes = @json($attributes);
    </script>
    <script>
        $(document).ready(function() {
            const existingVariants = @json($variantData);
            const allAttributes = @json($attributes);

            // Thêm nhóm thuộc tính
            $('#add-version-btn').on('click', function() {
                addAttributeGroup();
            });

            // Khi edit: tự load thuộc tính + giá trị
            if (existingVariants.length > 0) {
                const addedAttr = {};

                existingVariants.forEach(variant => {
                    variant.attributes.forEach(attr => {
                        if (!addedAttr[attr.attribute_id]) {
                            addedAttr[attr.attribute_id] = [];
                        }
                        if (!addedAttr[attr.attribute_id].includes(attr.attribute_value_id)) {
                            addedAttr[attr.attribute_id].push(attr.attribute_value_id);
                        }
                    });
                });

                Object.keys(addedAttr).forEach(attrId => {
                    addAttributeGroup(attrId, addedAttr[attrId]);
                });

                setTimeout(() => {
                    generateCombinations();

                    existingVariants.forEach((variant, index) => {
                        const row = document.querySelector(
                            `#productTable tbody tr:nth-child(${index + 1})`);
                        if (row) {
                            row.querySelector(`input[name="variants[${index}][stock]"]`).value =
                                variant.stock_quantity || 0;
                            row.querySelector(`input[name="variants[${index}][price]"]`).value = (
                                variant.price || 0).toLocaleString('vi-VN');
                            row.querySelector(`input[name="variants[${index}][sku]"]`).value =
                                variant.sku || '';
                        }
                    });
                }, 300);
            }

            function addAttributeGroup(selectedAttrId = null, selectedValueIds = []) {
                const template = document.getElementById('attribute-template');
                const clone = template.content.cloneNode(true);
                const wrapper = document.getElementById('attribute-wrapper');
                const selectGroup = clone.querySelector('.attribute-group');
                const selectValues = clone.querySelector('.attribute-values');

                // Đổ nhóm thuộc tính
                selectGroup.innerHTML = '<option value="">-- Chọn nhóm --</option>';
                allAttributes.forEach(attr => {
                    const option = new Option(attr.name, attr.id, false, false);
                    selectGroup.appendChild(option);
                });

                $(selectValues).select2({
                    tags: false,
                    width: '100%',
                    placeholder: "Chọn giá trị"
                });

                selectGroup.addEventListener('change', function() {
                    const attrId = this.value;
                    const attribute = allAttributes.find(a => a.id == attrId);
                    $(selectValues).empty();

                    if (attribute && attribute.values) {
                        attribute.values.forEach(val => {
                            const option = new Option(val.value, val.id, false, false);
                            $(selectValues).append(option);
                        });
                    }

                    $(selectValues).trigger('change');
                    generateCombinations();
                });

                $(selectValues).on('change', function() {
                    generateCombinations();
                });

                clone.querySelector('.remove-attribute').addEventListener('click', function() {
                    this.closest('.content-attribute-content').remove();
                    generateCombinations();
                });

                wrapper.appendChild(clone);

                if (selectedAttrId) {
                    $(selectGroup).val(selectedAttrId).trigger('change');

                    // Append option value trước khi set value
                    const attribute = allAttributes.find(a => a.id == selectedAttrId);
                    if (attribute && attribute.values) {
                        attribute.values.forEach(val => {
                            if ($(selectValues).find(`option[value="${val.id}"]`).length === 0) {
                                const option = new Option(val.value, val.id, false, false);
                                $(selectValues).append(option);
                            }
                        });
                    }

                    $(selectValues).val(selectedValueIds).trigger('change');
                    generateCombinations();
                }
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
                    mainRow.classList.add('main-row');
                    mainRow.innerHTML = `
                        <td>
                            <div style="position: relative; width: 50px; height: 50px;">
                                <img src="{{ asset('frontend/img/nophoto.jpg') }}" class="preview-img"
                                    style="width:50px; height:50px; object-fit:cover;" />
                                <input type="file" name="variants[${index}][image]"
                                    class="image-input" style="opacity:0; width:50px; height:50px; position:absolute; top:0; left:0; cursor:pointer;">
                            </div>
                        </td>
                        ${attrTexts.map(text => `<td>${text}</td>`).join('')}
                        <td><input type="text" name="variants[${index}][stock]" class="form-control" value="0"></td>
                        <td><input type="text" name="variants[${index}][price]" class="form-control" value="100.000"></td>
                        <td><input type="text" name="variants[${index}][sku]" class="form-control" value="SP-${skuParts.join('-')}"></td>
                        ${hiddenInputs}
                    `;

                    tableBody.appendChild(mainRow);
                    // 🟢 Gán preview ảnh khi chọn ảnh mới
                    const fileInput = mainRow.querySelector('input[type="file"]');
                    const previewImg = mainRow.querySelector('img.preview-img');

                    fileInput.addEventListener('change', function(e) {
                        const file = e.target.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function(event) {
                                previewImg.src = event.target.result;
                            };
                            reader.readAsDataURL(file);
                        }
                    });
                });

                // 🟢 Nếu đang edit thì gán ảnh & thông tin
                if (existingVariants.length > 0) {
                    existingVariants.forEach((variant, index) => {
                        const row = document.querySelector(
                            `#productTable tbody tr:nth-of-type(${index + 1})`);
                        if (row) {
                            // Gán preview ảnh
                            const img = row.querySelector('img.preview-img');
                            if (variant.variant_image) {
                                img.src = `/storage/${variant.variant_image}`;
                            }

                            // Gán thông tin
                            row.querySelector(`input[name="variants[${index}][stock]"]`).value = variant
                                .stock_quantity || 0;
                            row.querySelector(`input[name="variants[${index}][price]"]`).value = (variant
                                .price || 0).toLocaleString('vi-VN');
                            row.querySelector(`input[name="variants[${index}][sku]"]`).value = variant
                                .sku || '';

                            // Thêm ID variant để controller update
                            const input = document.createElement('input');
                            input.type = 'hidden';
                            input.name = `variants[${index}][id]`;
                            input.value = variant.id;
                            row.appendChild(input);
                        }
                    });
                }
            }


            function cartesian(arr) {
                return arr.reduce((a, b) => a.flatMap(d => b.map(e => [...d, e])), [
                    []
                ]);
            }
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
    {{-- Xử lí chọn danh mục  --}}
    <script>
        const allSubCategories = @json(\App\Models\Category::whereNotNull('parent_id')->get());

        $('#parent-category').on('change', function() {
            const parentId = $(this).val();
            $('#sub-category').empty();

            allSubCategories.forEach(sub => {
                if (sub.parent_id == parentId) {
                    $('#sub-category').append(`<option value="${sub.id}">${sub.name}</option>`);
                }
            });
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
