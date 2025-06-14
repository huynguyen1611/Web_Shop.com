@extends('fronend.main')
@section('content')
    <div class="cart-container">
        <div class="page-breadcrumb background">
            <div class="uk-container uk-container-center">
                <ul class="uk-list uk-clearfix">
                    <li><a href="/"><i class="fa fa-home mr5"></i>Trang chủ</a></li>
                    <li><a title="Hệ thống phân phối">Thanh toán</a></li>
                </ul>
            </div>
        </div>
        <div class="uk-container uk-container-center">
            <form action="https://laptop.themedemo.site/cart/create" class="uk-form form" method="post">
                <input type="hidden" name="_token" value="yx70wi9X4uPjhxRMdWcuKLzKRtqfVqZQzzsd3im7">
                <h2 class="heading-1"><span>Thông tin đặt hàng</span></h2>
                <div class="cart-wrapper">
                    <div class="uk-grid uk-grid-medium">
                        <div class="uk-width-large-2-5">
                            <div class="panel-cart cart-left">
                                <div class="panel-head">
                                    <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                        <h2 class="cart-heading">
                                            <span>Thông tin giao hàng</span>
                                        </h2>

                                    </div>

                                </div>
                                <div class="panel-body mb30">
                                    <div class="cart-information">
                                        <div class="uk-grid uk-grid-medium mb20">
                                            <div class="uk-width-large-1-2">
                                                <div class="form-row">
                                                    <input type="text" name="fullname" value=""
                                                        placeholder="Nhập vào Họ Tên" class="input-text">
                                                </div>
                                            </div>
                                            <div class="uk-width-large-1-2">
                                                <div class="form-row">
                                                    <input type="text" name="phone" value=""
                                                        placeholder="Nhập vào Số điện thoại" class="input-text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row mb20">
                                            <input type="text" name="email" value="" placeholder="Nhập vào Email"
                                                class="input-text">
                                        </div>

                                        <div class="uk-grid uk-grid-medium mb20">
                                            <div class="uk-width-large-1-3">
                                                <select required name="province_id" id=""
                                                    class="province location setupSelect2" data-target="districts">
                                                    <option value="0">[Chọn Thành Phố]</option>
                                                    <option value="01">Hà Nội</option>
                                                    <option value="02">Hà Giang</option>
                                                    <option value="04">Cao Bằng</option>
                                                    <option value="06">Bắc Kạn</option>
                                                    <option value="08">Tuyên Quang</option>
                                                    <option value="10">Lào Cai</option>
                                                    <option value="11">Điện Biên</option>
                                                    <option value="12">Lai Châu</option>
                                                    <option value="14">Sơn La</option>
                                                    <option value="15">Yên Bái</option>
                                                    <option value="17">Hoà Bình</option>
                                                    <option value="19">Thái Nguyên</option>
                                                    <option value="20">Lạng Sơn</option>
                                                    <option value="22">Quảng Ninh</option>
                                                    <option value="24">Bắc Giang</option>
                                                    <option value="25">Phú Thọ</option>
                                                    <option value="26">Vĩnh Phúc</option>
                                                    <option value="27">Bắc Ninh</option>
                                                    <option value="30">Hải Dương</option>
                                                    <option value="31">Hải Phòng</option>
                                                    <option value="33">Hưng Yên</option>
                                                    <option value="34">Thái Bình</option>
                                                    <option value="35">Hà Nam</option>
                                                    <option value="36">Nam Định</option>
                                                    <option value="37">Ninh Bình</option>
                                                    <option value="38">Thanh Hóa</option>
                                                    <option value="40">Nghệ An</option>
                                                    <option value="42">Hà Tĩnh</option>
                                                    <option value="44">Quảng Bình</option>
                                                    <option value="45">Quảng Trị</option>
                                                    <option value="46">Thừa Thiên Huế</option>
                                                    <option value="48">Đà Nẵng</option>
                                                    <option value="49">Quảng Nam</option>
                                                    <option value="51">Quảng Ngãi</option>
                                                    <option value="52">Bình Định</option>
                                                    <option value="54">Phú Yên</option>
                                                    <option value="56">Khánh Hòa</option>
                                                    <option value="58">Ninh Thuận</option>
                                                    <option value="60">Bình Thuận</option>
                                                    <option value="62">Kon Tum</option>
                                                    <option value="64">Gia Lai</option>
                                                    <option value="66">Đắk Lắk</option>
                                                    <option value="67">Đắk Nông</option>
                                                    <option value="68">Lâm Đồng</option>
                                                    <option value="70">Bình Phước</option>
                                                    <option value="72">Tây Ninh</option>
                                                    <option value="74">Bình Dương</option>
                                                    <option value="75">Đồng Nai</option>
                                                    <option value="77">Bà Rịa - Vũng Tàu</option>
                                                    <option value="79">Hồ Chí Minh</option>
                                                    <option value="80">Long An</option>
                                                    <option value="82">Tiền Giang</option>
                                                    <option value="83">Bến Tre</option>
                                                    <option value="84">Trà Vinh</option>
                                                    <option value="86">Vĩnh Long</option>
                                                    <option value="87">Đồng Tháp</option>
                                                    <option value="89">An Giang</option>
                                                    <option value="91">Kiên Giang</option>
                                                    <option value="92">Cần Thơ</option>
                                                    <option value="93">Hậu Giang</option>
                                                    <option value="94">Sóc Trăng</option>
                                                    <option value="95">Bạc Liêu</option>
                                                    <option value="96">Cà Mau</option>
                                                </select>
                                            </div>
                                            <div class="uk-width-large-1-3">
                                                <select required name="district_id" id=""
                                                    class="setupSelect2 districts location" data-target="wards">
                                                    <option value="0">Chọn Quận Huyện</option>
                                                </select>
                                            </div>
                                            <div class="uk-width-large-1-3">
                                                <select required name="ward_id" id=""
                                                    class="setupSelect2 wards">
                                                    <option value="0">Chọn Phường Xã</option>
                                                </select>
                                            </div>
                                        </div>



                                        <div class="form-row mb20">
                                            <input type="text" name="address" value=""
                                                placeholder="Địa chỉ chi tiết (Số nhà, ấp...)" class="input-text">
                                        </div>

                                        <div class="form-row">
                                            <input type="text" name="description" value=""
                                                placeholder="Ghi chú " class="input-text">
                                        </div>
                                    </div>


                                </div>
                                <div class="panel-foot">
                                    <h2 class="cart-heading"><span>Phương thức thanh toán</span></h2>
                                    <div class="cart-method mb30">
                                        <label for="cod" class="uk-flex uk-flex-middle method-item">
                                            <input type="radio" name="method" value="cod" checked id="cod">
                                            <span class="image"><img src="frontend/resources/core/img/COD.svg"
                                                    alt=""></span>
                                            <span class="title">Thanh toán khi nhận hàng (COD)</span>
                                        </label>
                                        <label for="momo" class="uk-flex uk-flex-middle method-item">
                                            <input type="radio" name="method" value="momo" id="momo">
                                            <span class="image"><img src="frontend/resources/core/img/momo-icon.webp"
                                                    alt=""></span>
                                            <span class="title">Thanh toán qua Ví Momo</span>
                                        </label>
                                        <label for="vnpay" class="uk-flex uk-flex-middle method-item">
                                            <input type="radio" name="method" value="vnpay" id="vnpay">
                                            <span class="image"><img src="frontend/resources/core/img/vnpay.webp"
                                                    alt=""></span>
                                            <span class="title">Thanh toán ví điện tử VNPAY</span>
                                        </label>
                                        <label for="paypal" class="uk-flex uk-flex-middle method-item">
                                            <input type="radio" name="method" value="paypal" id="paypal">
                                            <span class="image"><img src="frontend/resources/core/img/paypal.ico"
                                                    alt=""></span>
                                            <span class="title">Thanh toán qua Paypal</span>
                                        </label>
                                    </div>
                                    <div class="cart-return mb10">
                                        <span>Nếu bạn không hài lòng với sản phẩm của chúng tôi? Bạn hoàn toàn có thể
                                            trả lại sản phẩm <a href="" title="Trả sản phẩm">Tại đây</a></span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="uk-width-large-3-5">
                            <div class="panel-cart">
                                <div class="panel-head">
                                    <h2 class="cart-heading"><span>Đơn hàng</span></h2>
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
                                                        <span class="cart-item-number">5</span>
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
                                                        <span class="cart-item-number">1</span>
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
                                        <input type="text" placeholder="Chọn mã giảm giá" name="voucher"
                                            value="" readonly>
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
                                        <div class="buy-more">
                                            <a href="https://laptop.themedemo.site/san-pham.html" class="btn-buymore">Chọn
                                                thêm sản phẩm khác</a>
                                        </div>
                                    </div>
                                </div> <button type="submit" class="cart-checkout" value="create" name="create">Thanh
                                    toán đơn hàng</button>
                                <div class="box-info mt-3">
                                    <div class="box-title">Thông tin bổ sung</div>
                                    <div class="info">
                                        <div class="content-style">
                                            <h3><strong>Chính sách trả hàng, đổi hàng:</strong></h3>
                                            <p>Ngoại trừ lỗi do nhà sản xuất hoặc khác mẫu yêu cầu, những trường hợp còn
                                                lại Quý khách không được đổi-trả hàng.</p>
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
