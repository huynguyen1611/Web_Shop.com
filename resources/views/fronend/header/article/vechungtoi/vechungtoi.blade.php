@extends('fronend.main')
@section('content')
    <div class="post-detail">

        <div class="page-breadcrumb background">
            <div class="uk-container uk-container-center">
                <ul class="uk-list uk-clearfix">
                    <li><a href="/"><i class="fi-rs-home mr5"></i>Trang chủ</a></li>
                    <li><a href="{{ route('news') }}" title="Tin tức nổi bật">Tin tức
                            nổi bật</a></li>
                </ul>
            </div>
        </div>
        <div class="uk-container uk-container-center">
            <div class="uk-grid uk-grid-medium">
                <div class="uk-width-large-3-4">
                    @yield('content-news')
                </div>
                <div class="uk-width-large-1-4">
                    <aside class="aside">
                        <div class="aside-news">
                            <div class="aside-heading">Tin tức mới nhất</div>
                            <div class="aside-body">
                                <div class="aside-post-item uk-clearfix">
                                    <a href="https://laptop.themedemo.site/lien-he-tu-van.html" class="image img-cover"><img
                                            src="/userfiles/image/bai-viet/3lien-he-vigamart.png" alt="LIÊN HỆ TƯ VẤN"></a>
                                    <div class="info">
                                        <h3 class="title"><a href="https://laptop.themedemo.site/lien-he-tu-van.html"
                                                title="LIÊN HỆ TƯ VẤN">LIÊN HỆ TƯ VẤN</a></h3>
                                    </div>
                                </div>
                                <div class="aside-post-item uk-clearfix">
                                    <a href="https://laptop.themedemo.site/quy-dinh-mua-hang.html"
                                        class="image img-cover"><img
                                            src="/userfiles/image/bai-viet/6011quy-dinh-mua-hang-vigamart.png"
                                            alt="QUY ĐỊNH MUA HÀNG"></a>
                                    <div class="info">
                                        <h3 class="title"><a href="https://laptop.themedemo.site/quy-dinh-mua-hang.html"
                                                title="QUY ĐỊNH MUA HÀNG">QUY ĐỊNH MUA HÀNG</a></h3>
                                    </div>
                                </div>
                                <div class="aside-post-item uk-clearfix">
                                    <a href="https://laptop.themedemo.site/huong-dan-thanh-toan.html"
                                        class="image img-cover"><img
                                            src="/userfiles/image/bai-viet/5158huong-dan-thanh-toan-vigamart.png"
                                            alt="HƯỚNG DẪN THANH TOÁN"></a>
                                    <div class="info">
                                        <h3 class="title"><a href="https://laptop.themedemo.site/huong-dan-thanh-toan.html"
                                                title="HƯỚNG DẪN THANH TOÁN">HƯỚNG DẪN THANH TOÁN</a></h3>
                                    </div>
                                </div>
                                <div class="aside-post-item uk-clearfix">
                                    <a href="https://laptop.themedemo.site/huong-dan-mua-hang.html"
                                        class="image img-cover"><img
                                            src="/userfiles/image/bai-viet/9530huong-dan-mua-hang-vigamart-3.jpg"
                                            alt="HƯỚNG DẪN MUA HÀNG"></a>
                                    <div class="info">
                                        <h3 class="title"><a href="https://laptop.themedemo.site/huong-dan-mua-hang.html"
                                                title="HƯỚNG DẪN MUA HÀNG">HƯỚNG DẪN MUA HÀNG</a></h3>
                                    </div>
                                </div>
                                <div class="aside-post-item uk-clearfix">
                                    <a href="https://laptop.themedemo.site/nhung-cau-hoi-thuong-gap-ve-vphome.html"
                                        class="image img-cover"><img
                                            src="/userfiles/image/bai-viet/3315tin-tuc-vigamart-4.jpg"
                                            alt="NHỮNG CÂU HỎI THƯỜNG GẶP VỀ VPHome"></a>
                                    <div class="info">
                                        <h3 class="title"><a
                                                href="https://laptop.themedemo.site/nhung-cau-hoi-thuong-gap-ve-vphome.html"
                                                title="NHỮNG CÂU HỎI THƯỜNG GẶP VỀ VPHome">NHỮNG CÂU HỎI THƯỜNG GẶP VỀ
                                                VPHome</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
@endsection
