@extends('fronend.main')
@section('content')
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
                                        <div class="swiper-slide" data-swiper-autoplay="2000">
                                            <a href="/userfiles/image/phone/redmi-note-14-pro-plus-xanh.jpg"
                                                data-uk-lightbox="{group:'my-group'}" class="image img-scaledown"><img
                                                    src="/userfiles/image/phone/redmi-note-14-pro-plus-xanh.jpg"
                                                    alt="/userfiles/image/phone/redmi-note-14-pro-plus-xanh.jpg"></a>
                                        </div>
                                        <div class="swiper-slide" data-swiper-autoplay="2000">
                                            <a href="/userfiles/image/phone/thiet-ke-mat-lung-xiaomi-redmi-n.jpg"
                                                data-uk-lightbox="{group:'my-group'}" class="image img-scaledown"><img
                                                    src="/userfiles/image/phone/thiet-ke-mat-lung-xiaomi-redmi-n.jpg"
                                                    alt="/userfiles/image/phone/thiet-ke-mat-lung-xiaomi-redmi-n.jpg"></a>
                                        </div>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                                <div class="swiper-container-thumbs">
                                    <div class="swiper-wrapper pic-list">
                                        <div class="swiper-slide">
                                            <span class="image img-scaledown"><img
                                                    src="/userfiles/image/phone/redmi-note-14-pro-plus-xanh.jpg"
                                                    alt="/userfiles/image/phone/redmi-note-14-pro-plus-xanh.jpg"></span>
                                        </div>
                                        <div class="swiper-slide">
                                            <span class="image img-scaledown"><img
                                                    src="/userfiles/image/phone/thiet-ke-mat-lung-xiaomi-redmi-n.jpg"
                                                    alt="/userfiles/image/phone/thiet-ke-mat-lung-xiaomi-redmi-n.jpg"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-large-1-2">
                            <div class="popup-product">
                                <h2 class="title product-main-title" style="line-height: 1.4">
                                    {{ $product->name }}
                                    <span></span>
                                </h2>
                                <div class="rating">
                                    <div class="uk-flex uk-flex-middle">
                                        <div class="author">Đánh giá: </div>
                                        <div class="star-rating">
                                            <div class="stars" style="--star-width: 88%"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-specs">
                                    <div class="spec-row">Mã sản phẩm: <strong></strong></div>
                                    <div class="spec-row">Tình Trạng: <strong>Còn hàng</strong></div>
                                </div>
                                <div class="uk-grid uk-grid-small">
                                    <div class="uk-width-large-1-2">
                                        <div class="a-left">
                                            <div class="price uk-flex uk-flex-middle mt10">
                                                <div class="price-sale">
                                                    {{ number_format($product->sale_price, 0, ',', '.') }}</div>
                                                <div class="price-old uk-flex uk-flex-middle">
                                                    {{ number_format($product->price, 0, ',', '.') }} <div class="percent">
                                                        <div class="percent-value">-10%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-save">
                                                Tiết kiệm: <strong>15.000</strong> (<span
                                                    style="color:red">-{{ $product->discount_percent }}%</span>)
                                            </div>
                                            <input type="hidden" name="product_id" value="83">
                                            <input type="hidden" name="language_id" value="1">
                                            <input type="hidden" name="product_gallery"
                                                value="[&quot;\/userfiles\/image\/phone\/redmi-note-14-pro-plus-xanh.jpg&quot;,&quot;\/userfiles\/image\/phone\/thiet-ke-mat-lung-xiaomi-redmi-n.jpg&quot;]">
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
                                                            <a href="" title="">Mua ngay</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="margin: 15px 0px;"></div>
                                            </div>
                                            <div class="btn-item btn-1 addToCart mobile" data-id="83">
                                                <a href="" title="">Mua ngay</a>
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
                                    <p>Miễn ph&iacute; vận chuyển:Đơn h&agrave;ng từ 498k</p>
                                    <p>Giao hàng:Từ 3 - 5 ng&agrave;y tr&ecirc;n cả nước</p>
                                    <p>Miễn ph&iacute; đổi trả:Tại 267+ cửa h&agrave;ng trong 15 ng&agrave;y</p>
                                    <p>Sử dụng mã giảm giá ở bước thanh toán</p>
                                    <p>Th&ocirc;ng tin bảo m&acirc;̣t và mã hoá</p>
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
                                        {{ $product->content }}
                                    </div>
                                </div>
                                <div class="review-container">
                                    <div class="panel-head">
                                        <h2 class="review-heading">Đánh giá sản phẩm</h2>
                                        <div class="review-statistic">
                                            <div class="uk-grid uk-grid-medium uk-flex uk-flex-middle">
                                                <div class="uk-width-large-1-3">
                                                    <div class="review-averate review-item">
                                                        <div class="title">Đánh giá trung bình</div>
                                                        <div class="score">0.0/5</div>
                                                        <div class="star-rating">
                                                            <div class="stars" style="--star-width: 0%"></div>
                                                        </div>
                                                        <div class="total-rate">0 đánh giá</div>
                                                    </div>
                                                </div>
                                                <div class="uk-width-large-1-3">
                                                    <div class="progress-block review-item">
                                                        <div class="progress-item">
                                                            <div class="uk-flex uk-flex-middle">
                                                                <span class="text">5</span>
                                                                <i class="fa fa-star"></i>
                                                                <div class="uk-progress">
                                                                    <div class="uk-progress-bar" style="width: 0%;">
                                                                    </div>
                                                                </div>
                                                                <span class="text">0</span>
                                                            </div>
                                                        </div>
                                                        <div class="progress-item">
                                                            <div class="uk-flex uk-flex-middle">
                                                                <span class="text">4</span>
                                                                <i class="fa fa-star"></i>
                                                                <div class="uk-progress">
                                                                    <div class="uk-progress-bar" style="width: 0%;">
                                                                    </div>
                                                                </div>
                                                                <span class="text">0</span>
                                                            </div>
                                                        </div>
                                                        <div class="progress-item">
                                                            <div class="uk-flex uk-flex-middle">
                                                                <span class="text">3</span>
                                                                <i class="fa fa-star"></i>
                                                                <div class="uk-progress">
                                                                    <div class="uk-progress-bar" style="width: 0%;">
                                                                    </div>
                                                                </div>
                                                                <span class="text">0</span>
                                                            </div>
                                                        </div>
                                                        <div class="progress-item">
                                                            <div class="uk-flex uk-flex-middle">
                                                                <span class="text">2</span>
                                                                <i class="fa fa-star"></i>
                                                                <div class="uk-progress">
                                                                    <div class="uk-progress-bar" style="width: 0%;">
                                                                    </div>
                                                                </div>
                                                                <span class="text">0</span>
                                                            </div>
                                                        </div>
                                                        <div class="progress-item">
                                                            <div class="uk-flex uk-flex-middle">
                                                                <span class="text">1</span>
                                                                <i class="fa fa-star"></i>
                                                                <div class="uk-progress">
                                                                    <div class="uk-progress-bar" style="width: 0%;">
                                                                    </div>
                                                                </div>
                                                                <span class="text">0</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="uk-width-large-1-3">
                                                    <div class="review-action review-item">
                                                        <div class="text">Bạn đã dùng sản phẩm này?</div>
                                                        <button class="btn btn-review"
                                                            data-uk-modal="{target:'#review'}">Gửi đánh giá</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="review-filter">
                                            <div class="uk-flex uk-flex-middle">
                                                <span class="filter-text">Lọc xem theo: </span>
                                                <div class="filter-item">
                                                    <span>Đã mua hàng</span>
                                                    <span>5 sao</span>
                                                    <span>4 sao</span>
                                                    <span>3 sao</span>
                                                    <span>2 sao</span>
                                                    <span>1 sao</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="review-wrapper">
                                        </div>
                                    </div>
                                </div>

                                <div id="review" class="uk-modal">
                                    <div class="uk-modal-dialog">
                                        <a class="uk-modal-close uk-close"></a>
                                        <div cl ass="review-popup-wrapper">
                                            <div class="panel-head">Đánh giá sản phẩm</div>
                                            <div class="panel-body">
                                                <div class="product-preview">
                                                    <span class="image img-scaledown"><img
                                                            src="/userfiles/image/phone/redmi-note-14-pro-plus-xanh.jpg"
                                                            alt="Xiaomi Redmi Note 14 Pro Plus"></span>
                                                    <div class="product-title uk-text-center">Xiaomi Redmi Note 14 Pro
                                                        Plus</div>
                                                    <div class="popup-rating uk-clearfix uk-text-center">
                                                        <div class="rate uk-clearfix ">
                                                            <input type="radio" id="star5" name="rate"
                                                                class="rate" value="5" />
                                                            <label for="star5" title="Tuyệt vời">5 stars</label>
                                                            <input type="radio" id="star4" name="rate"
                                                                class="rate" value="4" />
                                                            <label for="star4" title="Hài lòng">4 stars</label>
                                                            <input type="radio" id="star3" name="rate"
                                                                class="rate" value="3" />
                                                            <label for="star3" title="Bình thường">3 stars</label>
                                                            <input type="radio" id="star2" name="rate"
                                                                class="rate" value="2" />
                                                            <label for="star2" title="Tạm được">2 stars</label>
                                                            <input type="radio" id="star1" name="rate"
                                                                class="rate" value="1" />
                                                            <label for="star1" title="Không thích">1 star</label>
                                                        </div>
                                                        <div class="rate-text uk-hidden">
                                                            Không thích
                                                        </div>
                                                    </div>
                                                    <div class="review-form">
                                                        <div action="" class="uk-form form">
                                                            <div class="form-row">
                                                                <textarea name="" id="" class="review-textarea"
                                                                    placeholder="Hãy chia sẻ cảm nhận của bạn về sản phẩm..."></textarea>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="uk-flex uk-flex-middle">
                                                                    <div class="gender-item uk-flex uk-flex-middle">
                                                                        <input type="radio" name="gender"
                                                                            class="gender" value="Nam" id="male">
                                                                        <label for="male">Nam</label>
                                                                    </div>
                                                                    <div class="gender-item uk-flex uk-flex-middle">
                                                                        <input type="radio" name="gender"
                                                                            class="gender" value="Nữ" id="femail">
                                                                        <label for="femail">Nữ</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="uk-grid uk-grid-medium">
                                                                <div class="uk-width-large-1-2">
                                                                    <div class="form-row">
                                                                        <input type="text" name="fullname"
                                                                            value="" class="review-text"
                                                                            placeholder="Nhập vào họ tên">
                                                                    </div>
                                                                </div>
                                                                <div class="uk-width-large-1-2">
                                                                    <div class="form-row">
                                                                        <input type="text" name="phone"
                                                                            value="" class="review-text"
                                                                            placeholder="Nhập vào số điện thoại">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <input type="text" name="email" value=""
                                                                    class="review-text" placeholder="Nhập vào email">
                                                            </div>
                                                            <div class="uk-text-center">
                                                                <button type="submit" value="send"
                                                                    class="btn-send-review" name="create">Hoàn
                                                                    tất</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" class="reviewable_type" value="App\Models\Product">
                                <input type="hidden" class="reviewable_id" value="83">
                                <input type="hidden" class="review_parent_id" value="0">
                            </div>
                        </div>
                        <div class="uk-width-large-1-4 uk-visible-large">
                            @include('fronend.product.hot_product')
                        </div>
                    </div>
                    <div class="product-related">
                        <div class="uk-container uk-container-center">
                            @include('fronend.product.same_product')
                        </div>
                    </div>
                    <div class="product-related">
                        <div class="uk-container uk-container-center">
                            <div class="panel-product">
                                <div class="main-heading">
                                    <div class="panel-head">
                                        <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                            <h2 class="heading-1"><span>Sản phẩm đã xem</span></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body list-product">
                                    <div class="uk-grid uk-grid-medium">
                                        <div
                                            class="uk-width-1-2 uk-width-small-1-2 uk-width-medium-1-3 uk-width-large-1-5 mb20">
                                            <div class="product-item product">
                                                <a href="dien-thoai-xiaomi-redmi-note-14-pro-plus.html"
                                                    class="image img-scaledown img-zoomin"><img
                                                        src="/userfiles/image/phone/redmi-note-14-pro-plus-xanh.jpg"
                                                        alt="Xiaomi Redmi Note 14 Pro Plus"></a>
                                                <div class="info">
                                                    <h3 class="title"><a
                                                            href="dien-thoai-xiaomi-redmi-note-14-pro-plus.html"
                                                            title="Xiaomi Redmi Note 14 Pro Plus">Xiaomi Redmi Note 14
                                                            Pro Plus</a></h3>
                                                    <div class="price">
                                                        <div class="price-sale">150.000</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" class="productName" value="">
                <input type="hidden" class="attributeCatalogue" value="[]">
                <input type="hidden" class="productCanonical" value="https://laptop.themedemo.site/.html">
            </div>
        </div>
    </div>
    <div id="qrcode" class="uk-modal">
        <div class="uk-modal-dialog">
            <a class="uk-modal-close uk-close"></a>
            <div class="qrcode-container">
                <?xml version="1.0" encoding="UTF-8"?>
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="400" height="400"
                    viewBox="0 0 400 400">
                    <rect x="0" y="0" width="400" height="400" fill="#ffffff" />
                    <g transform="scale(12.121)">
                        <g transform="translate(0,0)">
                            <path fill-rule="evenodd"
                                d="M10 0L10 2L11 2L11 0ZM12 0L12 1L14 1L14 2L15 2L15 3L13 3L13 2L12 2L12 4L14 4L14 8L13 8L13 9L12 9L12 7L13 7L13 5L11 5L11 6L10 6L10 4L11 4L11 3L8 3L8 4L9 4L9 5L8 5L8 7L9 7L9 8L6 8L6 9L7 9L7 10L5 10L5 11L4 11L4 12L3 12L3 11L2 11L2 10L1 10L1 9L3 9L3 10L4 10L4 9L5 9L5 8L0 8L0 11L2 11L2 12L1 12L1 13L0 13L0 14L1 14L1 15L0 15L0 16L3 16L3 15L2 15L2 13L4 13L4 12L5 12L5 11L7 11L7 10L9 10L9 9L10 9L10 11L11 11L11 9L12 9L12 10L13 10L13 11L12 11L12 13L13 13L13 14L11 14L11 17L9 17L9 16L8 16L8 15L10 15L10 14L4 14L4 15L7 15L7 16L5 16L5 18L4 18L4 19L5 19L5 21L2 21L2 20L0 20L0 25L1 25L1 21L2 21L2 24L3 24L3 25L7 25L7 24L8 24L8 27L9 27L9 28L8 28L8 33L9 33L9 31L10 31L10 33L13 33L13 32L12 32L12 31L13 31L13 30L14 30L14 31L15 31L15 33L19 33L19 32L16 32L16 31L17 31L17 30L20 30L20 31L21 31L21 32L22 32L22 33L23 33L23 32L24 32L24 33L25 33L25 32L24 32L24 31L27 31L27 32L28 32L28 33L29 33L29 31L30 31L30 32L31 32L31 33L32 33L32 32L31 32L31 31L32 31L32 30L31 30L31 29L30 29L30 28L33 28L33 27L32 27L32 26L33 26L33 24L32 24L32 26L31 26L31 25L30 25L30 24L31 24L31 23L32 23L32 22L33 22L33 21L32 21L32 20L31 20L31 19L32 19L32 18L33 18L33 17L32 17L32 16L31 16L31 15L32 15L32 14L33 14L33 13L31 13L31 15L30 15L30 13L29 13L29 10L28 10L28 8L27 8L27 9L26 9L26 8L24 8L24 7L25 7L25 3L22 3L22 2L23 2L23 1L24 1L24 0L16 0L16 1L14 1L14 0ZM8 1L8 2L9 2L9 1ZM16 1L16 3L18 3L18 4L21 4L21 5L22 5L22 6L21 6L21 7L22 7L22 8L20 8L20 5L19 5L19 7L18 7L18 5L17 5L17 8L15 8L15 10L14 10L14 9L13 9L13 10L14 10L14 11L13 11L13 12L14 12L14 14L16 14L16 15L12 15L12 17L11 17L11 20L8 20L8 21L6 21L6 22L5 22L5 23L4 23L4 22L3 22L3 24L5 24L5 23L6 23L6 24L7 24L7 23L8 23L8 24L9 24L9 27L11 27L11 29L10 29L10 28L9 28L9 29L10 29L10 31L11 31L11 30L13 30L13 29L12 29L12 27L13 27L13 28L14 28L14 26L16 26L16 27L17 27L17 28L19 28L19 27L20 27L20 26L18 26L18 25L19 25L19 24L20 24L20 25L21 25L21 26L22 26L22 28L20 28L20 29L21 29L21 30L22 30L22 31L24 31L24 27L23 27L23 26L24 26L24 25L23 25L23 26L22 26L22 24L20 24L20 22L19 22L19 20L20 20L20 21L21 21L21 22L23 22L23 23L24 23L24 24L27 24L27 22L25 22L25 21L27 21L27 20L28 20L28 19L26 19L26 18L25 18L25 17L28 17L28 18L29 18L29 17L30 17L30 19L29 19L29 20L30 20L30 21L28 21L28 24L30 24L30 23L29 23L29 22L30 22L30 21L31 21L31 20L30 20L30 19L31 19L31 16L30 16L30 15L29 15L29 13L28 13L28 16L26 16L26 14L25 14L25 13L27 13L27 12L28 12L28 11L27 11L27 10L25 10L25 9L24 9L24 10L23 10L23 9L22 9L22 8L23 8L23 7L24 7L24 5L23 5L23 4L22 4L22 3L20 3L20 2L21 2L21 1ZM15 4L15 5L16 5L16 4ZM9 6L9 7L10 7L10 6ZM11 6L11 7L12 7L12 6ZM15 6L15 7L16 7L16 6ZM22 6L22 7L23 7L23 6ZM10 8L10 9L11 9L11 8ZM17 8L17 10L15 10L15 11L14 11L14 12L15 12L15 11L16 11L16 12L17 12L17 13L16 13L16 14L17 14L17 15L18 15L18 16L13 16L13 17L12 17L12 18L14 18L14 17L16 17L16 18L15 18L15 20L13 20L13 19L12 19L12 21L14 21L14 23L15 23L15 24L13 24L13 25L12 25L12 23L13 23L13 22L11 22L11 21L9 21L9 23L10 23L10 22L11 22L11 25L10 25L10 26L11 26L11 25L12 25L12 26L14 26L14 25L15 25L15 24L17 24L17 25L18 25L18 24L19 24L19 23L18 23L18 24L17 24L17 21L18 21L18 20L16 20L16 18L17 18L17 19L18 19L18 18L20 18L20 19L21 19L21 20L23 20L23 19L22 19L22 18L20 18L20 16L22 16L22 17L23 17L23 18L24 18L24 19L25 19L25 18L24 18L24 17L25 17L25 15L24 15L24 16L23 16L23 15L22 15L22 13L23 13L23 14L24 14L24 13L25 13L25 12L26 12L26 11L25 11L25 12L24 12L24 13L23 13L23 10L22 10L22 11L21 11L21 12L20 12L20 11L19 11L19 12L20 12L20 13L18 13L18 12L17 12L17 10L21 10L21 9L19 9L19 8ZM29 8L29 9L30 9L30 8ZM31 8L31 10L33 10L33 9L32 9L32 8ZM30 11L30 12L31 12L31 11ZM6 12L6 13L7 13L7 12ZM8 12L8 13L11 13L11 12ZM21 12L21 13L22 13L22 12ZM18 14L18 15L19 15L19 16L18 16L18 17L19 17L19 16L20 16L20 14ZM7 16L7 17L6 17L6 18L5 18L5 19L6 19L6 20L7 20L7 19L9 19L9 17L8 17L8 16ZM28 16L28 17L29 17L29 16ZM0 17L0 19L2 19L2 18L3 18L3 17ZM6 18L6 19L7 19L7 18ZM24 20L24 21L23 21L23 22L24 22L24 21L25 21L25 20ZM15 21L15 22L16 22L16 21ZM6 22L6 23L7 23L7 22ZM25 25L25 28L28 28L28 25ZM29 25L29 28L30 28L30 27L31 27L31 26L30 26L30 25ZM26 26L26 27L27 27L27 26ZM22 28L22 29L23 29L23 28ZM14 29L14 30L17 30L17 29ZM25 29L25 30L28 30L28 31L29 31L29 30L28 30L28 29ZM30 30L30 31L31 31L31 30ZM0 0L0 7L7 7L7 0ZM1 1L1 6L6 6L6 1ZM2 2L2 5L5 5L5 2ZM26 0L26 7L33 7L33 0ZM27 1L27 6L32 6L32 1ZM28 2L28 5L31 5L31 2ZM0 26L0 33L7 33L7 26ZM1 27L1 32L6 32L6 27ZM2 28L2 31L5 31L5 28Z"
                                fill="#000000" />
                        </g>
                    </g>
                </svg>

            </div>
        </div>
    </div>
@endsection
