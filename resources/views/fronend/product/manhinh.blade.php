@extends('fronend.product.product')
@section('content-product')
    <div class="wrapper ">
        <div class="uk-flex uk-flex-middle uk-flex-space-between mb20">
            <h1 class="heading-2"><span>Màn hình</span></h1>
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

        <input type="hidden" class="product_catalogue_id" value="16">
        <div class="product-list">
            <div class="uk-grid uk-grid-medium">
                <div class="uk-width-1-2 uk-width-small-1-2 uk-width-medium-1-3 uk-width-large-1-4 mb20">
                    <div class="product-item product">

                        <a href="https://laptop.themedemo.site/man-hinh-asus-vu249cfe-24-inch.html"
                            class="image img-scaledown img-zoomin"><img src="/userfiles/image/phone/group_807_1.jpg"
                                alt="Màn hình ASUS VU249CFE 24 inch"></a>
                        <div class="info">

                            <h3 class="title"><a href="https://laptop.themedemo.site/man-hinh-asus-vu249cfe-24-inch.html"
                                    title="Màn hình ASUS VU249CFE 24 inch">Màn hình ASUS VU249CFE
                                    24 inch</a></h3>

                            <div class="product-group">
                                <div class="price uk-flex uk-flex-middle mt10">
                                    <div class="price-sale">1.550.000đ</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-2 uk-width-small-1-2 uk-width-medium-1-3 uk-width-large-1-4 mb20">
                    <div class="product-item product">

                        <a href="https://laptop.themedemo.site/man-hinh-gaming-gigabyte-gs27fa27inch-fhd-1920x1080ips-180hz.html"
                            class="image img-scaledown img-zoomin"><img
                                src="/userfiles/image/phone/Man_hinh_Gaming_Gigabyte_GS_27_F.jpg"
                                alt="Màn hình Gaming Gigabyte GS27FA/27inch FHD (1920x1080)/IPS 180Hz"></a>
                        <div class="info">

                            <h3 class="title"><a
                                    href="https://laptop.themedemo.site/man-hinh-gaming-gigabyte-gs27fa27inch-fhd-1920x1080ips-180hz.html"
                                    title="Màn hình Gaming Gigabyte GS27FA/27inch FHD (1920x1080)/IPS 180Hz">Màn
                                    hình Gaming Gigabyte GS27FA/27inch FHD (1920x1080)/IPS 180Hz</a>
                            </h3>

                            <div class="product-group">
                                <div class="price uk-flex uk-flex-middle mt10">
                                    <div class="price-sale">250.000đ</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-2 uk-width-small-1-2 uk-width-medium-1-3 uk-width-large-1-4 mb20">
                    <div class="product-item product">

                        <a href="https://laptop.themedemo.site/edra-egm27f180pv-27-inch-fhd-ips-180hz.html"
                            class="image img-scaledown img-zoomin"><img
                                src="/userfiles/image/phone/edra_egm27f180pv_1_0bde8ec61a.jpg"
                                alt="Màn hình Gaming Edra EGM27F180PV/27inch FHD (1920x1080)/IPS 180Hz"></a>
                        <div class="info">

                            <h3 class="title"><a
                                    href="https://laptop.themedemo.site/edra-egm27f180pv-27-inch-fhd-ips-180hz.html"
                                    title="Màn hình Gaming Edra EGM27F180PV/27inch FHD (1920x1080)/IPS 180Hz">Màn
                                    hình Gaming Edra EGM27F180PV/27inch FHD (1920x1080)/IPS
                                    180Hz</a></h3>

                            <div class="product-group">
                                <div class="price uk-flex uk-flex-middle mt10">
                                    <div class="price-sale">150.000đ</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-2 uk-width-small-1-2 uk-width-medium-1-3 uk-width-large-1-4 mb20">
                    <div class="product-item product">

                        <a href="https://laptop.themedemo.site/man-hinh-acer-ek251q-g-24-5-inch.html"
                            class="image img-scaledown img-zoomin"><img
                                src="/userfiles/image/phone/acer_ek251q_g_1_ea3522a248.jpg"
                                alt="Màn hình Acer EK251Q G/24.5inch/FHD (1920X1080)/IPS 120Hz"></a>
                        <div class="info">

                            <h3 class="title"><a
                                    href="https://laptop.themedemo.site/man-hinh-acer-ek251q-g-24-5-inch.html"
                                    title="Màn hình Acer EK251Q G/24.5inch/FHD (1920X1080)/IPS 120Hz">Màn
                                    hình Acer EK251Q G/24.5inch/FHD (1920X1080)/IPS 120Hz</a></h3>

                            <div class="product-group">
                                <div class="price uk-flex uk-flex-middle mt10">
                                    <div class="price-sale">500.000đ</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-2 uk-width-small-1-2 uk-width-medium-1-3 uk-width-large-1-4 mb20">
                    <div class="product-item product">

                        <a href="https://laptop.themedemo.site/man-hinh-viewsonic-va2714-h-27inch-fhd-ips-100hz.html"
                            class="image img-scaledown img-zoomin"><img
                                src="/userfiles/image/phone/2021_9_28_637684179255513116_man.jpg"
                                alt="Màn hình Viewsonic VA2714-H/27inch FHD (1920x1080)/IPS 100Hz"></a>
                        <div class="info">

                            <h3 class="title"><a
                                    href="https://laptop.themedemo.site/man-hinh-viewsonic-va2714-h-27inch-fhd-ips-100hz.html"
                                    title="Màn hình Viewsonic VA2714-H/27inch FHD (1920x1080)/IPS 100Hz">Màn
                                    hình Viewsonic VA2714-H/27inch FHD (1920x1080)/IPS 100Hz</a>
                            </h3>

                            <div class="product-group">
                                <div class="price uk-flex uk-flex-middle mt10">
                                    <div class="price-sale">450.000đ</div>
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
