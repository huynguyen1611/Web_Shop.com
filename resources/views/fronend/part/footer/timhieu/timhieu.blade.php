@extends('fronend.main')
@section('content')
    <div class="post-detail">
        <div class="page-breadcrumb background">
            <div class="uk-container uk-container-center">
                <ul class="uk-list uk-clearfix">
                    <li><a href="/"><i class="fa fa-home mr5"></i>Trang chủ</a></li>
                    <li><a href="{{ route('news') }}" title="Về chúng tôi">Về chúng
                            tôi</a></li>
                </ul>
            </div>
        </div>
        <div class="uk-container uk-container-center">
            <div class="uk-grid uk-grid-medium">
                <div class="uk-width-large-3-4">
                    @yield('content-timhieu')
                </div>
                <div class="uk-width-large-1-4">
                    <aside class="aside">
                        <div class="aside-news">
                            <div class="aside-heading">Tin tức mới nhất</div>
                            <div class="aside-body">
                                <div class="aside-post-item uk-clearfix">
                                    {{-- <a href="{{ route('lienhe') }}"><img
                                            src="backend/img/not-found.jpg" alt="Liên Hệ"></a> --}}
                                    <div class="info">
                                        <h3 class="title"><a href="{{ route('lienhe') }}" title="Liên Hệ">Liên Hệ</a></h3>
                                    </div>
                                </div>
                                <div class="aside-post-item uk-clearfix">
                                    {{-- <a href="{{ route('cauhoi') }}"
                                        class="image img-cover"><img src="backend/img/not-found.jpg"
                                            alt="NHỮNG CÂU HỎI THƯỜNG GẶP VỀ VPHOME24"></a> --}}
                                    <div class="info">
                                        <h3 class="title"><a href="{{ route('cauhoi') }}"
                                                title="NHỮNG CÂU HỎI THƯỜNG GẶP VỀ VPHOME24">NHỮNG CÂU HỎI THƯỜNG GẶP
                                                VỀ VPHOME24</a></h3>
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
