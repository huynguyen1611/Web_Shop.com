@extends('fronend.main')
@section('content')
    <div class="cart-container">
        <div class="page-breadcrumb background">
            <div class="uk-container uk-container-center">
                <ul class="uk-list uk-clearfix">
                    <li><a href="/"><i class="fa fa-home mr5"></i>Trang chủ</a></li>
                    <li><a title="Hệ thống phân phối">Giỏ hàng</a></li>
                </ul>
            </div>
        </div>
        <div class="uk-container uk-container-center">
            <form action="https://laptop.themedemo.site/cart/create" class="uk-form form" method="post">
                <input type="hidden" name="_token" value="yx70wi9X4uPjhxRMdWcuKLzKRtqfVqZQzzsd3im7">
                <h2 class="heading-1"><span>Giỏ hàng</span></h2>
                <div class="cart-wrapper">
                    <div class="uk-grid uk-grid-medium">
                        <div class="uk-width-large-5-5">
                            <div class="panel-cart">
                                <div class="panel-head">
                                    <h2 class="cart-heading"><span>Sản phẩm</span></h2>
                                </div>
                                <div class="panel-body">
                                    <div class="cart-list">
                                        <div class="cart-item">
                                            <div class="uk-grid uk-grid-medium">
                                                <div class="uk-width-small-1-1 uk-width-medium-1-5">
                                                    <div class="cart-item-image">
                                                        <img class="image img-scaledown"
                                                            src="/userfiles/image/phone/oppo-reno10-pro-plus-xam.jpg"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div class="uk-width-small-1-1 uk-width-medium-4-5">
                                                    <div class="cart-item-info">
                                                        <h3 class="title"><span>OPPO Reno10 Pro+ 5G 512GB</span></h3>
                                                        <div
                                                            class="cart-item-action uk-flex uk-flex-middle uk-flex-space-between">
                                                            <div class="cart-item-qty">
                                                                <button type="button" class="btn-qty minus">-</button>
                                                                <input type="text" class="input-qty" value="5">
                                                                <input type="hidden" class="rowId"
                                                                    value="7b883de15a6ad42d968e465cf6f0ad93">
                                                                <button type="button" class="btn-qty plus">+</button>
                                                            </div>
                                                            <div class="cart-item-price">
                                                                <div class="uk-flex uk-flex-bottom">
                                                                    <span class="cart-price-sale">2.375.000đ</span>
                                                                </div>
                                                            </div>
                                                            <div class="cart-item-remove"
                                                                data-row-id="7b883de15a6ad42d968e465cf6f0ad93">
                                                                <span>X</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart-item">
                                            <div class="uk-grid uk-grid-medium">
                                                <div class="uk-width-small-1-1 uk-width-medium-1-5">
                                                    <div class="cart-item-image">
                                                        <img class="image img-scaledown"
                                                            src="/userfiles/image/phone/oppo-reno10-pro-plus-tim.png"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div class="uk-width-small-1-1 uk-width-medium-4-5">
                                                    <div class="cart-item-info">
                                                        <h3 class="title"><span>OPPO Reno10 Pro+ 5G 256GB</span></h3>
                                                        <div
                                                            class="cart-item-action uk-flex uk-flex-middle uk-flex-space-between">
                                                            <div class="cart-item-qty">
                                                                <button type="button" class="btn-qty minus">-</button>
                                                                <input type="text" class="input-qty" value="1">
                                                                <input type="hidden" class="rowId"
                                                                    value="59b598c7381995bba549d767e75f3d16">
                                                                <button type="button" class="btn-qty plus">+</button>
                                                            </div>
                                                            <div class="cart-item-price">
                                                                <div class="uk-flex uk-flex-bottom">

                                                                    <span class="cart-price-sale">337.500đ</span>
                                                                </div>
                                                            </div>
                                                            <div class="cart-item-remove"
                                                                data-row-id="59b598c7381995bba549d767e75f3d16">
                                                                <span>X</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-voucher uk-hidden">
                                    <div class="voucher-list">
                                        <div class="voucher-item active">
                                            <div class="voucher-left"></div>
                                            <div class="voucher-right">
                                                <div class="voucher-title">5AFDSFFD34 <span>(Còn 20)</span> </div>
                                                <div class="voucher-description">
                                                    <p>Khuyến mãi nhân dịp Noel 24/12, giảm giá đến 50% sản phẩm</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="voucher-item ">
                                            <div class="voucher-left"></div>
                                            <div class="voucher-right">
                                                <div class="voucher-title">5AFDSFFD34 <span>(Còn 20)</span> </div>
                                                <div class="voucher-description">
                                                    <p>Khuyến mãi nhân dịp Noel 24/12, giảm giá đến 50% sản phẩm</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="voucher-form">
                                        <input type="text" placeholder="Chọn mã giảm giá" name="voucher" value=""
                                            readonly>
                                        <a href="" class="apply-voucher">Áp dụng</a>
                                    </div>
                                </div>
                                <div class="panel-foot mt30 pay">
                                    <div class="cart-summary mb20">
                                        <div class="cart-summary-item">
                                            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                                <span class="summay-title">Giảm giá</span>
                                                <div class="summary-value discount-value">-0đ</div>
                                            </div>
                                        </div>
                                        <div class="cart-summary-item">
                                            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                                <span class="summay-title">Phí giao hàng</span>
                                                <div class="summary-value">Miễn phí</div>
                                            </div>
                                        </div>
                                        <div class="cart-summary-item">
                                            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                                <span class="summay-title bold">Tổng tiền</span>
                                                <div class="summary-value cart-total">2.712.500đ</div>
                                            </div>
                                        </div>
                                        <div class="buy-more" style="display: flex">
                                            <a href="https://laptop.themedemo.site/san-pham.html" class="btn-buymore">Chọn
                                                thêm sản phẩm khác</a>

                                            <a style="margin-left: 10px"
                                                href="https://laptop.themedemo.site/thanh-toan.html"
                                                class="btn-buymore">Thanh toán ngay</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
