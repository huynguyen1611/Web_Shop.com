@extends('fronend.main')
@section('content')
    <div class="product-catalogue page-wrapper">
        <div class="page-breadcrumb background">
            <div class="uk-container uk-container-center">
                <ul class="uk-list uk-clearfix">
                    <li><a href="/"><i class="fa fa-home mr5"></i>Trang chủ</a></li>
                    <li><a href="{{ route('mobile') }}" title="Sản phẩm">Sản phẩm</a></li>
                </ul>
            </div>
        </div>
        <div class="uk-container uk-container-center mt20">
            <div class="panel-body">
                <div class="uk-grid uk-grid-medium">
                    <div class="uk-width-large-1-4 uk-hidden-small">
                        @include('fronend.product.hot_product')
                    </div>
                    <div class="uk-width-large-3-4">
                        <div class="wrapper ">
                            <div class="uk-flex uk-flex-middle uk-flex-space-between mb20">
                                <h1 class="heading-2"><span>Sản phẩm</span></h1>
                                <div class="filter">
                                    <div class="uk-flex uk-flex-middle">
                                        <div class="filter-widget mr20">
                                            <div class="uk-flex uk-flex-middle">
                                                <div class="filter-button ml10 mr20">
                                                    <a href="" class="btn-filter uk-flex uk-flex-middle">
                                                        <i class="fa fa-filter mr5"></i>
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
                                        X
                                    </div>
                                    <div class="filter-content-container">
                                        <div class="filter-item filter-price slider-box">
                                            <div class="filter-heading" for="priceRange">Lọc Theo Giá:</div>
                                            <div class="filter-price-content">
                                                <input type="text" id="priceRange" readonly="" class="uk-hidden">
                                                <div id="price-range"
                                                    class="slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                    <div class="ui-slider-range ui-widget-header ui-corner-all"
                                                        style="left: 0%; width: 100%;">
                                                    </div><span class="ui-slider-handle ui-state-default ui-corner-all"
                                                        tabindex="0" style="left: 0%;"></span><span
                                                        class="ui-slider-handle ui-state-default ui-corner-all"
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
                                            <a type="text" class="input-value" data-from="0" data-to="499.999">Dưới
                                                500.000đ</a>
                                            <a type="text" class="input-value" data-from="500.000" data-to="1.000.000">Từ
                                                500-1 triệu</a>
                                            <a type="text" class="input-value" data-from="1.000.000"
                                                data-to="2.000.000">Từ 1-2 triệu</a>
                                            <a type="text" class="input-value" data-from="2.000.000"
                                                data-to="4.000.000">Từ 2-4 triệu</a>
                                            <a type="text" class="input-value" data-from="4.000.000"
                                                data-to="7.000.000">Từ 4-7 triệu</a>
                                            <a type="text" class="input-value" data-from="7.000.000"
                                                data-to="13.000.000">Từ 7-13 triệu</a>
                                            <a type="text" class="input-value" data-from="13.000.000"
                                                data-to="20.000.000">Từ 13-20 triệu</a>
                                        </div>
                                        <div class="filter-review">
                                            <div class="filter-heading">Lọc theo đánh giá</div>
                                            <div class="filter-choose uk-flex uk-flex-middle">
                                                <input id="input-rate-5" type="checkbox" name="rate[]" value="5"
                                                    class="input-checkbox filtering">
                                                <label for="input-rate-5 uk-flex uk-flex-middle">
                                                    <div class="filter-star">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </label>
                                                <span class="totalProduct ml5 mb5">(5)</span>
                                            </div>
                                            <div class="filter-choose uk-flex uk-flex-middle">
                                                <input id="input-rate-5" type="checkbox" name="rate[]" value="4"
                                                    class="input-checkbox filtering">
                                                <label for="input-rate-5 uk-flex uk-flex-middle">
                                                    <div class="filter-star">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </label>
                                                <span class="totalProduct ml5 mb5">(4)</span>
                                            </div>
                                            <div class="filter-choose uk-flex uk-flex-middle">
                                                <input id="input-rate-5" type="checkbox" name="rate[]" value="3"
                                                    class="input-checkbox filtering">
                                                <label for="input-rate-5 uk-flex uk-flex-middle">
                                                    <div class="filter-star">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </label>
                                                <span class="totalProduct ml5 mb5">(3)</span>
                                            </div>
                                            <div class="filter-choose uk-flex uk-flex-middle">
                                                <input id="input-rate-5" type="checkbox" name="rate[]" value="2"
                                                    class="input-checkbox filtering">
                                                <label for="input-rate-5 uk-flex uk-flex-middle">
                                                    <div class="filter-star">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </label>
                                                <span class="totalProduct ml5 mb5">(2)</span>
                                            </div>
                                            <div class="filter-choose uk-flex uk-flex-middle">
                                                <input id="input-rate-5" type="checkbox" name="rate[]" value="1"
                                                    class="input-checkbox filtering">
                                                <label for="input-rate-5 uk-flex uk-flex-middle">
                                                    <div class="filter-star">
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </label>
                                                <span class="totalProduct ml5 mb5">(1)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" class="product_catalogue_id" value="17">
                            @yield('content-product')
                            <div class="uk-flex uk-flex-center">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
