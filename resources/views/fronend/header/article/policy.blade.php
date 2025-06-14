@extends('fronend.main')
@section('content')
    <div class="post-catalogue page-wrapper intro-wrapper">
        <div class="page-breadcrumb background">
            <div class="uk-container uk-container-center">
                <ul class="uk-list uk-clearfix">
                    <li><a href="/"><i class="fa fa-home mr5"></i>Trang chủ</a></li>
                    <li><a href="{{ route('policy') }}" title="Chính sách">Chính sách</a></li>
                </ul>
            </div>
        </div>
        <div class="uk-container uk-container-center">
            <div class="post-container">
                <h1 class="heading-1" style="margin: 10px 0;"><span>Chính sách</span></h1>
                <div class="uk-grid uk-grid-medium" style="margin-top: 5px">
                    <div class="uk-width-medium-1-1 uk-width-large-1-3 mb20">
                        <div class="blog-item uk-clearfix">
                            <a href="{{ route('giaohang') }}" class="image img-cover"><img
                                    src="/userfiles/image/quanao/bai-viet/chinh-sach/chinh-sach-giao-hang.png"
                                    alt="CHÍNH SÁCH GIAO HÀNG"></a>
                            <div class="info">
                                <h3 class="title"><a href="{{ route('giaohang') }}" title="CHÍNH SÁCH GIAO HÀNG">CHÍNH SÁCH
                                        GIAO HÀNG</a></h3>
                                <div class="description">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-1 uk-width-large-1-3 mb20">
                        <div class="blog-item uk-clearfix">
                            <a href="{{ route('baohanh') }}" class="image img-cover"><img
                                    src="/userfiles/image/quanao/bai-viet/chinh-sach/chinh-sach-bao-hanh.png"
                                    alt="CHÍNH SÁCH BẢO HÀNH"></a>
                            <div class="info">
                                <h3 class="title"><a href="{{ route('baohanh') }}" title="CHÍNH SÁCH BẢO HÀNH">CHÍNH SÁCH
                                        BẢO HÀNH</a></h3>
                                <div class="description">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-1 uk-width-large-1-3 mb20">
                        <div class="blog-item uk-clearfix">
                            <a href="{{ route('baomat') }}" class="image img-cover"><img
                                    src="/userfiles/image/quanao/bai-viet/chinh-sach/chinh-sach-bao-mat.png"
                                    alt="CHÍNH SÁCH BẢO MẬT"></a>
                            <div class="info">
                                <h3 class="title"><a href="{{ route('baomat') }}" title="CHÍNH SÁCH BẢO MẬT">CHÍNH SÁCH BẢO
                                        MẬT</a></h3>
                                <div class="description">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-1 uk-width-large-1-3 mb20">
                        <div class="blog-item uk-clearfix">
                            <a href="{{ route('doitra') }}" class="image img-cover"><img
                                    src="/userfiles/image/quanao/bai-viet/chinh-sach/chinh-sach-doi-tra.png"
                                    alt="CHÍNH SÁCH ĐỔI TRẢ"></a>
                            <div class="info">
                                <h3 class="title"><a href="{{ route('doitra') }}" title="CHÍNH SÁCH ĐỔI TRẢ">CHÍNH SÁCH ĐỔI
                                        TRẢ</a></h3>
                                <div class="description">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
