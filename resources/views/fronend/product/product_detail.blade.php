@extends('fronend.main')
@section('content')
    @php
        $thumbnail = $product->images->firstWhere('is_thumbnail', true);
        $album = $product->images->where('is_thumbnail', false); // Lấy tất cả ảnh không phải thumbnail
    @endphp
    <div class="product-container">
        <div class="page-breadcrumb background">
            <div class="uk-container uk-container-center">
                <ul class="uk-list uk-clearfix">
                    <li><a href="/"><i class="fi-rs-home mr5"></i>Trang chủ</a></li>
                    <li><a href="{{ route('product') }}" title="Sản phẩm">Sản phẩm</a></li>
                    <li><a href="{{ route('mobile') }}" title="Điện thoại">Điện thoại</a></li>
                </ul>
            </div>
        </div>
        <div class="uk-container uk-container-center mt30">
            <div class="panel-body">
                <div class="panel-body">
                    <div class="uk-grid uk-grid-medium">
                        <div class="uk-width-large-1-2">
                            <div class="popup-gallery">
                                <div class="swiper-container">
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-wrapper big-pic">
                                        {{-- Hiển thị thumbnail trước --}}
                                        @if ($thumbnail)
                                            <div class="swiper-slide">
                                                <a href="{{ asset('storage/' . $thumbnail->file_path) }}"
                                                    data-uk-lightbox="{group:'my-group'}" class="image img-scaledown">
                                                    {{-- <img src="{{ asset('storage/' . $thumbnail->file_path) }}"
                                                        alt="{{ $product->name }}"> --}}
                                                    <img id="variant-image"
                                                        src="{{ $firstVariant && $firstVariant->variant_image ? asset('storage/' . $firstVariant->variant_image) : asset('frontend/img/nophoto.jpg') }}"
                                                        alt="Ảnh sản phẩm" />
                                                </a>
                                            </div>
                                        @endif

                                        {{-- Hiển thị các ảnh album còn lại --}}
                                        @foreach ($album as $image)
                                            <div class="swiper-slide">
                                                <a href="{{ asset('storage/' . $image->file_path) }}"
                                                    data-uk-lightbox="{group:'my-group'}" class="image img-scaledown">
                                                    <img src="{{ asset('storage/' . $image->file_path) }}"
                                                        alt="{{ $product->name }}">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                                <div class="swiper-container-thumbs">
                                    <div class="swiper-wrapper pic-list">
                                        {{-- thumbnail --}}
                                        @if ($thumbnail)
                                            <div class="swiper-slide">
                                                <span class="image img-scaledown">
                                                    {{-- <img src="{{ asset('storage/' . $thumbnail->file_path) }}"
                                                        alt="{{ $product->name }}"> --}}
                                                    <img id="variant-image"
                                                        src="{{ $firstVariant && $firstVariant->variant_image ? asset('storage/' . $firstVariant->variant_image) : asset('frontend/img/nophoto.jpg') }}"
                                                        alt="Ảnh sản phẩm" />
                                                </span>
                                            </div>
                                        @endif

                                        {{-- album --}}
                                        @foreach ($album as $image)
                                            <div class="swiper-slide">
                                                <span class="image img-scaledown">
                                                    <img src="{{ asset('storage/' . $image->file_path) }}"
                                                        alt="{{ $product->name }}">
                                                </span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-large-1-2">
                            <div class="popup-product">
                                {{-- <h2 class="title product-main-title" style="line-height: 1.4">
                                    {{ $product->name }}
                                    <span></span>
                                </h2> --}}
                                @foreach ($product->variants as $key => $item)
                                    <h2 class="title product-main-title {{ $key != 0 ? 'hidden' : '' }}"
                                        id="title-for-variants-{{ $item->id }}" style="line-height: 1.4">
                                        {{ $product->name }}
                                        <span id="variant-title">
                                            @if ($item)
                                                -
                                                {{ $item->variantAttributes->pluck('attributeValue.value')->join(' - ') }}
                                            @endif
                                        </span>
                                    </h2>
                                @endforeach
                                <div class="rating">
                                    <div class="uk-flex uk-flex-middle">
                                        <div class="author">Đánh giá: </div>
                                        <div class="star-rating">
                                            <div class="stars" style="--star-width: 88%"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-specs">
                                    <div class="spec-row">Mã sản phẩm:{{ $product->sku }} <strong></strong></div>
                                    <div class="spec-row">Tình Trạng: <strong>Còn hàng</strong></div>
                                </div>
                                <div class="uk-grid uk-grid-small">
                                    <div class="uk-width-large-1-2">
                                        <div class="a-left">
                                            <div class="price uk-flex uk-flex-middle mt10">
                                                {{-- <div class="price-sale">
                                                    {{ number_format($product->sale_price, 0, ',', '.') }}</div> --}}
                                                <div class="price-sale" id="variant-sale-price">
                                                    {{ number_format($firstVariant->sale_price ?? ($firstVariant->price ?? 0), 0, ',', '.') }}
                                                </div>
                                                <div class="price-old uk-flex uk-flex-middle">
                                                    {{ number_format($product->price, 0, ',', '.') }} <div class="percent">
                                                        <div class="percent-value">-10%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-save">
                                                Tiết kiệm:
                                                <strong>{{ number_format($product->sale_price * (($product->discount_percent ?? 0) / 100), 0, ',', '.') }}
                                                    đ
                                                </strong> (<span
                                                    style="color:red">-{{ $product->discount_percent }}%</span>)
                                            </div>
                                            <!-- .attribute -->
                                            <div class="attribute">
                                                <div class="attribute-item attribute-color">
                                                    <div class="label">Màu sắc: <span></span></div>
                                                    <div class="attribute-value">
                                                        @foreach ($colorValues as $color)
                                                            <a class="choose-attribute color-item"
                                                                data-attribute-group-id="{{ $color->attributeValue->attribute_id }}"
                                                                data-attribute-id="{{ $color->attributeValue->id }}"
                                                                title="{{ $color->attributeValue->value }}">
                                                                <img src="{{ asset('storage/' . $color->attributeValue->image) }}"
                                                                    alt="{{ $color->attributeValue->value }}">
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Dung lượng -->
                                            <div class="attribute">
                                                <div class="attribute-item attribute-color">
                                                    <div class="label">Dung lượng: <span></span></div>
                                                    <div class="attribute-value">
                                                        @foreach ($capacityValues as $capacity)
                                                            <a class="choose-attribute"
                                                                data-attribute-group-id="{{ $capacity->attributeValue->attribute_id }}"
                                                                data-attribute-id="{{ $capacity->attributeValue->id }}">
                                                                {{ $capacity->attributeValue->value }}
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- .attribute -->
                                            <div class="quantity mt10">
                                                <div class="uk-flex uk-flex-middle">
                                                    <div class="quantitybox uk-flex uk-flex-middle">
                                                        <div class="minus quantity-button">-</div>
                                                        <input type="text" name="" value="1"
                                                            class="quantity-text">
                                                        <div class="plus quantity-button">+</div>
                                                    </div>
                                                    <div class="btn-group uk-flex uk-flex-middle">
                                                        <div class="btn-item btn-1 addToCart mua-ngay" data-id="83">
                                                            <a href="{{ route('pay') }}" title="">Mua ngay</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="margin: 15px 0px;"></div>
                                            </div>
                                            <div class="btn-item btn-1 addToCart mobile" data-id="83">
                                                <a href="{{ route('pay') }}" title="">Mua ngay</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-width-large-1-2">
                                        <div class="a-right">
                                            <div class="mb20"><strong>Dịch vụ của chúng tôi</strong></div>
                                            <div class="panel-body">
                                                <div class="right-item">
                                                    <div class="label">Cam kết bán hàng</div>
                                                    <div class="desc">✅Chính hãng có thẻ bảo hành đầy đủ</div>
                                                </div>
                                                <div class="right-item">
                                                    <div class="label">CHĂM SÓC KHÁCH HÀNG</div>
                                                    <div class="desc">✅Tư vấn nhiệt tình, lịch sự, trung thực</div>
                                                </div>
                                                <div class="right-item">
                                                    <div class="label">CHÍNH SÁCH GIAO HÀNG</div>
                                                    <div class="desc">✅Đồng kiểm →Thử hàng →Hài lòng thanh toán</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-description">
                                    {!! $product->short_description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="uk-grid uk-grid-medium">
                        <div class="uk-width-large-3-4">
                            <div class="product-wrapper">
                                <div class="panel-product-detail mt30">
                                    <h2 class="heading-4 mb20"><span>Thông tin chi tiết</span></h2>
                                    <div class="productContent">
                                        {!! $product->content !!}
                                    </div>
                                </div>
                                {{-- Hiển thị sao đánh giá --}}
                                @include('fronend.product.review_content')
                                {{-- form  đánh giá  --}}
                                @include('fronend.product.review')
                            </div>
                        </div>
                        <div class="uk-width-large-1-4 uk-visible-large">
                            @include('fronend.product.hot_product')
                        </div>
                    </div>
                    {{-- Sản phẩm cùng danh mục --}}
                    @include('fronend.product.same_product')
                    {{-- Sản phảm đã xem --}}
                    @include('fronend.product.viewed_product')
                </div>
            </div>
        </div>
    </div>

    @php
        $variantData = $product->variants->map(function ($variant) {
            return [
                'id' => $variant->id,
                'price' => $variant->price,
                'sale_price' => $variant->sale_price,
                'image' => $variant->variant_image ? asset('storage/' . $variant->variant_image) : null,
                'attributes' => $variant->variantAttributes->mapWithKeys(function ($attr) {
                    return [$attr->attribute_id => $attr->attribute_value_id];
                }),
                'title' => $variant->variantAttributes->pluck('attributeValue.value')->join(' - '),
            ];
        });
    @endphp


    <script>
        const variants = @json($variantData); // Biến Laravel chuyển sang JS

        console.log(variants);

        const selectedAttributes = {}; // Lưu các thuộc tính đã chọn
        const variantTitleEl = document.getElementById('variant-title');
        const variantPriceEl = document.getElementById('variant-sale-price');

        // Gán sự kiện khi click vào thuộc tính
        document.querySelectorAll('.choose-attribute').forEach(el => {
            el.addEventListener('click', function() {
                const groupId = this.dataset.attributeGroupId;
                const valueId = parseInt(this.dataset.attributeId);

                // Xoá class active trong nhóm
                this.closest('.attribute-value').querySelectorAll('.choose-attribute')
                    .forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');

                selectedAttributes[groupId] = valueId;
                updateVariantDisplay();
            });
        });

        // Mặc định: chọn giá trị đầu tiên trong mỗi nhóm thuộc tính
        document.querySelectorAll('.attribute-value').forEach(group => {
            const first = group.querySelector('.choose-attribute');
            if (first) {
                first.classList.add('active');
                const groupId = first.dataset.attributeGroupId;
                const valueId = parseInt(first.dataset.attributeId);
                selectedAttributes[groupId] = valueId;
            }
        });
        updateVariantDisplay();

        // Cập nhật giao diện sản phẩm khi chọn thuộc tính
        function updateVariantDisplay() {
            const variant = variants.find(v => {
                return Object.entries(v.attributes).every(([groupId, valueId]) => {
                    return selectedAttributes[groupId] == valueId;
                });
            });

            if (variant) {
                variantTitleEl.textContent = ' - ' + variant.title;
                variantPriceEl.textContent = Number(variant.sale_price || variant.price).toLocaleString('vi-VN') + ' đ';

                // Cập nhật ảnh đại diện nếu có
                const img = document.querySelector('.product-main-image img');
                if (img && variant.image) {
                    img.src = variant.image;
                }
            }
        }
    </script>


    {{-- Xử lí xóa sản phẩm đã xem  --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const csrf = '{{ csrf_token() }}';
            const viewedWrapper = document.getElementById('viewed-wrapper');

            // Xóa từng sản phẩm
            document.querySelectorAll('.product-column .close-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const column = this.closest('.product-column');
                    const id = column.dataset.id;

                    fetch(`{{ url('/viewed-products') }}/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': csrf
                            }
                        })
                        .then(res => res.json())
                        .then(res => {
                            if (res.status === 'ok') {
                                column.remove();

                                // Nếu không còn sản phẩm nào, ẩn khối "Sản phẩm đã xem"
                                if (viewedWrapper.querySelectorAll('.product-column').length ===
                                    0) {
                                    viewedWrapper.remove();
                                }
                            }
                        })
                })
            });

            // Xóa tất cả sản phẩm đã xem
            const clearAllButton = document.getElementById('clear-all');
            if (clearAllButton) {
                clearAllButton.addEventListener('click', function() {
                    fetch(`{{ url('/viewed-products') }}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': csrf
                            }
                        })
                        .then(res => res.json())
                        .then(res => {
                            if (res.status === 'ok' && viewedWrapper) {
                                viewedWrapper.remove();
                            }
                        })
                })
            }
        });
    </script>
    {{-- Xử lí chọn thuộc tính --}}
    <script>
        $(document).ready(function() {
            $('.choose-attribute').on('click', function(e) {
                e.preventDefault();

                // Lấy ra attrId và valueId của option mình vừa chọn
                let attrId = $(this).data('attribute-id');
                let valueId = $(this).data('value-id');

                console.log(attrId);

                // Toggle active class cho chính nhóm đó
                $(this).closest('.attribute-value')
                    .find('.choose-attribute')
                    .removeClass('active');
                $(this).addClass('active');

                // Gather tất cả các lựa chọn active
                let selections = {};
                $('.choose-attribute.active').each((i, el) => {
                    selections[$(el).data('attribute-id')] = $(el).data('value-id');
                });

                // Tìm biến thể khớp
                let matchedVariant = variants.find(variant => {
                    return Object.keys(selections).every(attrIdSelected => {
                        console.log(variant);

                        // return variant.attributes.some(a =>
                        //     a.attribute_id == attrIdSelected &&
                        //     a.attribute_value_id == selections[attrIdSelected]
                        // );
                    });
                });

                // Nếu tìm được biến thể thì hiển thị
                if (matchedVariant) {
                    $('#price').text(
                        new Intl.NumberFormat('vi-VN').format(matchedVariant.price) + '₫'
                    );
                    $('#sku').text(matchedVariant.sku);
                } else {
                    $('#price').text('Liên hệ'); // hoặc thông báo không có biến thể
                    $('#sku').text('');
                }
            });
        });
    </script>

    {{-- Xử lí quantity --}}
    <script>
        $(document).ready(function() {
            // Xử lý nút cộng
            $('.plus').on('click', function() {
                let $input = $(this).siblings('.quantity-text');
                let currentVal = parseInt($input.val()) || 0;
                $input.val(currentVal + 1); // tăng 1
            });

            // Xử lý nút trừ
            $('.minus').on('click', function() {
                let $input = $(this).siblings('.quantity-text');
                let currentVal = parseInt($input.val()) || 0;
                if (currentVal > 1) {
                    $input.val(currentVal - 1); // không giảm dưới 1
                }
            });
        });
    </script>
@endsection
