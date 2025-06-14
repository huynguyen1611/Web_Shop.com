@extends('fronend.main')
@section('content')
    <div class="contact-page">
        <div class="page-breadcrumb background">
            <div class="uk-container uk-container-center">
                <ul class="uk-list uk-clearfix">
                    <li><a href="/"><i class="fi-rs-home mr5"></i>Trang chủ</a></li>
                    <li><a href="{{ route('contact') }}" title="Hệ thống phân phối">Liên Hệ</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="uk-container uk-container-center">
            <div class="contact-container-1">
                <div class="uk-grid uk-grid-medium uk-flex uk-flex-middle">
                    <div class="uk-width-large-1-2">
                        <div class="contact-infor">
                            <span class="image"><img src="{{ asset('frontend/img/logo2.png') }}" alt=""></span>
                            <div class="brand mb10 mt10">Xin chào các bạn</div>
                            <div class="footer-contact">
                                <p class="address">Văn Phòng : Đông ba, Q. PHú xuân , Tp Huế</p>
                                <p class="phone">Hotline: 0368965148</p>
                                <p class="email">Email: huycuteo16112003@gmail.com</p>
                            </div>
                            <div class="short">
                                <p>Khi khách hàng đặt mua sản phẩm sẽ có nhân viên tư vấn đầy đủ chi tiết theo từng mã sản
                                    phẩm, Quý khách hàng cứ yên tâm về điều này.s.</p>
                                <div class="ddict_btn" style="top: 33px; left: 650.963px;">&nbsp;</div>
                            </div>
                        </div>

                    </div>
                    <div class="uk-width-large-1-2">
                        <form onsubmit="return false;" action="" method="post" class="uk-form form contact-form">
                            <div class="heading-form">Liên hệ ngay với chúng tôi để nhận tư vấn tốt Nhất</div>
                            <div class="uk-grid uk-grid-medium">
                                <div class="uk-width-large-1-2 mb20">
                                    <div class="form-row">
                                        <input type="text" name="fullname" class="input-text" placeholder="Tên của bạn">
                                    </div>
                                </div>
                                <div class="uk-width-large-1-2 mb20">
                                    <div class="form-row">
                                        <input type="text" name="phone" class="input-text"
                                            placeholder="Số điện thoại của bạn">
                                    </div>
                                </div>
                                <div class="uk-width-large-1-2 ">
                                    <div class="form-row">
                                        <input type="text" name="email" class="input-text" placeholder="Email của bạn">
                                    </div>
                                </div>
                                <div class="uk-width-large-1-2 ">
                                    <div class="form-row">
                                        <input type="text" name="phone" class="input-text" placeholder="Chủ đề">
                                    </div>
                                </div>
                            </div>
                            <textarea style="padding:10px;" name="" id="" placeholder="Nội dung" class=""></textarea>
                            <button type="submit" name="send" value="create">Liên Hệ Ngay</button>
                        </form>
                    </div>
                </div>
                <div class="mape mt20">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15643.282978244138!2d107.5791678!3d16.4637134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3141a115e1a7935f%3A0xbf3b50af70b5c7b7!2sHu%E1%BA%BF%2C%20Thua%20Thien%20Hue%2C%20Vietnam!5e0!3m2!1sen!2s!4v1717742251455!5m2!1sen!2s"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
