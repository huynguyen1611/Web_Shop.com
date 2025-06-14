@extends('fronend.main')
@section('content')
    <div class="post-catalogue page-wrapper intro-wrapper">
        <div class="page-breadcrumb background">
            <div class="uk-container uk-container-center">
                <ul class="uk-list uk-clearfix">
                    <li><a href="/"><i class="fa fa-home mr5"></i>Trang chủ</a></li>
                    <li><a href="{{ route('support') }}" title="Hỗ trợ khách hàng">Hỗ trợ khách
                            hàng</a></li>
                </ul>
            </div>
        </div>
        <div class="uk-container uk-container-center">
            <div class="post-container">
                <h1 class="heading-1" style="margin: 10px 0;"><span>Hỗ trợ khách hàng</span></h1>
                <div class="uk-grid uk-grid-medium" style="margin-top: 5px">
                    <div class="uk-width-medium-1-1 uk-width-large-1-3 mb20">
                        <div class="blog-item uk-clearfix">
                            <a href="{{ route('huongdan') }}" class="image img-cover"><img src="backend/img/not-found.jpg"
                                    alt="HƯỚNG DẪN MUA HÀNG"></a>
                            <div class="info">
                                <h3 class="title"><a href="{{ route('huongdan') }}" title="HƯỚNG DẪN MUA HÀNG">HƯỚNG DẪN
                                        MUA HÀNG</a></h3>
                                <div class="description">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-1 uk-width-large-1-3 mb20">
                        <div class="blog-item uk-clearfix">
                            <a href="{{ route('thanhtoan') }}" class="image img-cover"><img src="backend/img/not-found.jpg"
                                    alt="HƯỚNG DẪN THANH TOÁN"></a>
                            <div class="info">
                                <h3 class="title"><a href="{{ route('thanhtoan') }}" title="HƯỚNG DẪN THANH TOÁN">HƯỚNG DẪN
                                        THANH TOÁN</a></h3>
                                <div class="description">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-1 uk-width-large-1-3 mb20">
                        <div class="blog-item uk-clearfix">
                            <a href="{{ route('quydinh') }}" class="image img-cover"><img src="backend/img/not-found.jpg"
                                    alt="QUY ĐỊNH MUA HÀNG"></a>
                            <div class="info">
                                <h3 class="title"><a href="{{ route('quydinh') }}" title="QUY ĐỊNH MUA HÀNG">QUY ĐỊNH MUA
                                        HÀNG</a></h3>
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
