@extends('fronend.main')
@section('content')
    <div class="post-detail">

        <div class="page-breadcrumb background">
            <div class="uk-container uk-container-center">
                <ul class="uk-list uk-clearfix">
                    <li><a href="/"><i class="fa fa-home"></i>Trang chủ</a></li>
                    <li><a href="{{ route('policy') }}" title="Chính sách">Chính sách</a></li>
                </ul>
            </div>
        </div>
        <div class="uk-container uk-container-center">
            <div class="uk-grid uk-grid-medium">
                <div class="uk-width-large-3-4">
                    @yield('content-chinhsach')
                </div>
                <div class="uk-width-large-1-4">
                    <aside class="aside">
                        <div class="aside-news">
                            <div class="aside-heading">Tin tức mới nhất</div>
                            <div class="aside-body">
                                <div class="aside-post-item uk-clearfix">
                                    <div class="info">
                                        <h3 class="title"><a href="{{ route('giaohang') }}"
                                                title="CHÍNH SÁCH GIAO HÀNG">CHÍNH SÁCH GIAO HÀNG</a></h3>
                                    </div>
                                </div>
                                <div class="aside-post-item uk-clearfix">
                                    <div class="info">
                                        <h3 class="title"><a href="{{ route('baohanh') }}"
                                                title="CHÍNH SÁCH BẢO HÀNH">CHÍNH SÁCH BẢO HÀNH</a></h3>
                                    </div>
                                </div>
                                <div class="aside-post-item uk-clearfix">
                                    <div class="info">
                                        <h3 class="title"><a href="{{ route('baomat') }}" title="CHÍNH SÁCH BẢO MẬT">CHÍNH
                                                SÁCH BẢO MẬT</a></h3>
                                    </div>
                                </div>
                                <div class="aside-post-item uk-clearfix">
                                    <div class="info">
                                        <h3 class="title"><a href="{{ route('doitra') }}" title="CHÍNH SÁCH ĐỔI TRẢ">CHÍNH
                                                SÁCH ĐỔI TRẢ</a></h3>
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
