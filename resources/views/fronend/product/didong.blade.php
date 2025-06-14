@extends('fronend.product.product')
@section('content-product')
    <div class="wrapper ">
        <div class="uk-flex uk-flex-middle uk-flex-space-between mb20">
            <h1 class="heading-2"><span>Điện thoại</span></h1>
            <div class="filter">
                <div class="uk-flex uk-flex-middle">
                    <div class="filter-widget mr20">
                        <div class="uk-flex uk-flex-middle">


                            <div class="filter-button ml10 mr20">
                                <a href="" class="btn-filter uk-flex uk-flex-middle">
                                    <i class="fi-rs-filter mr5"></i>
                                    <span>Bộ Lọc</span>
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="perpage uk-flex uk-flex-middle">
                        <div class="filter-text">Hiển thị</div>
                        <select name="perpage" id="perpage" class="nice-select">
                            <option value="20"> 20 sản phẩm </option>
                            <option value="40"> 40 sản phẩm </option>
                            <option value="60"> 60 sản phẩm </option>
                            <option value="80"> 80 sản phẩm </option>
                            <option value="100"> 100 sản phẩm </option>
                        </select>
                    </div>

                </div>
            </div>
        </div>
        <div class="filter-content filter-minimize">
            <div class="filter-overlay">
                <div class="filter-close">
                    <i class="fi fi-rs-cross"></i>
                </div>
                <div class="filter-content-container">

                    <div class="filter-item filter-price slider-box">
                        <div class="filter-heading" for="priceRange">Lọc Theo Giá:</div>
                        <div class="filter-price-content">
                            <input type="text" id="priceRange" readonly="" class="uk-hidden">
                            <div id="price-range"
                                class="slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                <div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;">
                                </div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"
                                    style="left: 0%;"></span><span class="ui-slider-handle ui-state-default ui-corner-all"
                                    tabindex="0" style="left: 100%;"></span>
                            </div>
                        </div>
                        <div class="filter-input-value mt5">
                            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                <input type="text" class="min-value input-value" value="0đ">
                                <input type="text" class="max-value input-value" value="20.000.000đ">
                            </div>
                        </div>
                    </div>


                    <div class="filter-input-value-mobile mt5">
                        <div class="filter-heading" for="priceRange">Lọc Theo Giá:</div>
                        <a type="text" class="input-value" data-from="0" data-to="499.999">Dưới 500.000đ</a>
                        <a type="text" class="input-value" data-from="500.000" data-to="1.000.000">Từ 500-1 triệu</a>
                        <a type="text" class="input-value" data-from="1.000.000" data-to="2.000.000">Từ 1-2 triệu</a>
                        <a type="text" class="input-value" data-from="2.000.000" data-to="4.000.000">Từ 2-4 triệu</a>
                        <a type="text" class="input-value" data-from="4.000.000" data-to="7.000.000">Từ 4-7 triệu</a>
                        <a type="text" class="input-value" data-from="7.000.000" data-to="13.000.000">Từ 7-13 triệu</a>
                        <a type="text" class="input-value" data-from="13.000.000" data-to="20.000.000">Từ 13-20 triệu</a>
                    </div>





                    <div class="filter-review">
                        <div class="filter-heading">Lọc theo đánh giá</div>
                        <div class="filter-choose uk-flex uk-flex-middle">
                            <input id="input-rate-5" type="checkbox" name="rate[]" value="5"
                                class="input-checkbox filtering">
                            <label for="input-rate-5 uk-flex uk-flex-middle">
                                <div class="filter-star">
                                    <i class="fi-rs-star"></i>
                                    <i class="fi-rs-star"></i>
                                    <i class="fi-rs-star"></i>
                                    <i class="fi-rs-star"></i>
                                    <i class="fi-rs-star"></i>
                                </div>
                            </label>
                            <span class="totalProduct ml5 mb5">(5)</span>
                        </div>
                        <div class="filter-choose uk-flex uk-flex-middle">
                            <input id="input-rate-5" type="checkbox" name="rate[]" value="4"
                                class="input-checkbox filtering">
                            <label for="input-rate-5 uk-flex uk-flex-middle">
                                <div class="filter-star">
                                    <i class="fi-rs-star"></i>
                                    <i class="fi-rs-star"></i>
                                    <i class="fi-rs-star"></i>
                                    <i class="fi-rs-star"></i>
                                </div>
                            </label>
                            <span class="totalProduct ml5 mb5">(4)</span>
                        </div>
                        <div class="filter-choose uk-flex uk-flex-middle">
                            <input id="input-rate-5" type="checkbox" name="rate[]" value="3"
                                class="input-checkbox filtering">
                            <label for="input-rate-5 uk-flex uk-flex-middle">
                                <div class="filter-star">
                                    <i class="fi-rs-star"></i>
                                    <i class="fi-rs-star"></i>
                                    <i class="fi-rs-star"></i>
                                </div>
                            </label>
                            <span class="totalProduct ml5 mb5">(3)</span>
                        </div>
                        <div class="filter-choose uk-flex uk-flex-middle">
                            <input id="input-rate-5" type="checkbox" name="rate[]" value="2"
                                class="input-checkbox filtering">
                            <label for="input-rate-5 uk-flex uk-flex-middle">
                                <div class="filter-star">
                                    <i class="fi-rs-star"></i>
                                    <i class="fi-rs-star"></i>
                                </div>
                            </label>
                            <span class="totalProduct ml5 mb5">(2)</span>
                        </div>
                        <div class="filter-choose uk-flex uk-flex-middle">
                            <input id="input-rate-5" type="checkbox" name="rate[]" value="1"
                                class="input-checkbox filtering">
                            <label for="input-rate-5 uk-flex uk-flex-middle">
                                <div class="filter-star">
                                    <i class="fi-rs-star"></i>
                                </div>
                            </label>
                            <span class="totalProduct ml5 mb5">(1)</span>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <input type="hidden" class="product_catalogue_id" value="7">
        <div class="product-list">
            <div class="uk-grid uk-grid-medium">
                <div class="uk-width-1-2 uk-width-small-1-2 uk-width-medium-1-3 uk-width-large-1-4 mb20">
                    <div class="product-item product">

                        <a href="https://laptop.themedemo.site/iphone-16-pro-max.html"
                            class="image img-scaledown img-zoomin"><img src="/userfiles/image/phone/iphone-16-pro-max.jpg"
                                alt="iPhone 16 | Chính hãng VN/A"></a>
                        <div class="info">

                            <h3 class="title"><a href="https://laptop.themedemo.site/iphone-16-pro-max.html"
                                    title="iPhone 16 | Chính hãng VN/A">iPhone 16 | Chính hãng
                                    VN/A</a></h3>

                            <div class="product-group">
                                <div class="price uk-flex uk-flex-middle mt10">
                                    <div class="price-sale">2.869.000đ</div>
                                    <div class="price-old uk-flex uk-flex-middle">3.069.000đ <div class="percent">
                                            <div class="percent-value">-7%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-2 uk-width-small-1-2 uk-width-medium-1-3 uk-width-large-1-4 mb20">
                    <div class="product-item product">

                        <a href="https://laptop.themedemo.site/xiaomi-14t.html"
                            class="image img-scaledown img-zoomin"><img src="/userfiles/image/phone/xiaomi_14t_2.jpg"
                                alt="Xiaomi 14T |  Chính hãng Bảo hành 24 tháng"></a>
                        <div class="info">

                            <h3 class="title"><a href="https://laptop.themedemo.site/xiaomi-14t.html"
                                    title="Xiaomi 14T |  Chính hãng Bảo hành 24 tháng">Xiaomi 14T |
                                    Chính hãng Bảo hành 24 tháng</a></h3>

                            <div class="product-group">
                                <div class="price uk-flex uk-flex-middle mt10">
                                    <div class="price-sale">360.000đ</div>
                                    <div class="price-old uk-flex uk-flex-middle">400.000đ <div class="percent">
                                            <div class="percent-value">-10%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-2 uk-width-small-1-2 uk-width-medium-1-3 uk-width-large-1-4 mb20">
                    <div class="product-item product">

                        <a href="https://laptop.themedemo.site/oppo-reno10-pro-plus.html"
                            class="image img-scaledown img-zoomin"><img
                                src="/userfiles/image/phone/oppo-reno10-pro-plus-tim.png" alt="OPPO Reno10 Pro+ 5G"></a>
                        <div class="info">

                            <h3 class="title"><a href="https://laptop.themedemo.site/oppo-reno10-pro-plus.html"
                                    title="OPPO Reno10 Pro+ 5G">OPPO Reno10 Pro+ 5G</a></h3>

                            <div class="product-group">
                                <div class="price uk-flex uk-flex-middle mt10">
                                    <div class="price-sale">337.500đ</div>
                                    <div class="price-old uk-flex uk-flex-middle">375.000đ <div class="percent">
                                            <div class="percent-value">-10%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-2 uk-width-small-1-2 uk-width-medium-1-3 uk-width-large-1-4 mb20">
                    <div class="product-item product">

                        <a href="https://laptop.themedemo.site/dien-thoai-xiaomi-redmi-note-14-pro-plus.html"
                            class="image img-scaledown img-zoomin"><img
                                src="/userfiles/image/phone/redmi-note-14-pro-plus-xanh.jpg"
                                alt="Xiaomi Redmi Note 14 Pro Plus"></a>
                        <div class="info">

                            <h3 class="title"><a
                                    href="https://laptop.themedemo.site/dien-thoai-xiaomi-redmi-note-14-pro-plus.html"
                                    title="Xiaomi Redmi Note 14 Pro Plus">Xiaomi Redmi Note 14 Pro
                                    Plus</a></h3>

                            <div class="product-group">
                                <div class="price uk-flex uk-flex-middle mt10">
                                    <div class="price-sale">135.000đ</div>
                                    <div class="price-old uk-flex uk-flex-middle">150.000đ <div class="percent">
                                            <div class="percent-value">-10%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-2 uk-width-small-1-2 uk-width-medium-1-3 uk-width-large-1-4 mb20">
                    <div class="product-item product">

                        <a href="https://laptop.themedemo.site/macbook-air-m2-2022-16gb.html"
                            class="image img-scaledown img-zoomin"><img src="/userfiles/image/phone/image_1396_1.jpg"
                                alt="Apple MacBook Air M2 2024 8CPU 8GPU 16GB 256GB I Chính hãng Apple Việt Nam"></a>
                        <div class="info">

                            <h3 class="title"><a href="https://laptop.themedemo.site/macbook-air-m2-2022-16gb.html"
                                    title="Apple MacBook Air M2 2024 8CPU 8GPU 16GB 256GB I Chính hãng Apple Việt Nam">Apple
                                    MacBook Air M2 2024 8CPU 8GPU 16GB 256GB I Chính hãng Apple Việt
                                    Nam</a></h3>

                            <div class="product-group">
                                <div class="price uk-flex uk-flex-middle mt10">
                                    <div class="price-sale">450.000đ</div>
                                    <div class="price-old uk-flex uk-flex-middle">500.000đ <div class="percent">
                                            <div class="percent-value">-10%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="uk-flex uk-flex-center">
        </div>
    </div>
@endsection
