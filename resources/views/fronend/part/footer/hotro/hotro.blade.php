@extends('fronend.main')
@section('content')
    <div class="post-detail">

        <div class="page-breadcrumb background">
            <div class="uk-container uk-container-center">
                <ul class="uk-list uk-clearfix">
                    <li><a href="/"><i class="fa fa-home mr5"></i>Trang chủ</a></li>
                    <li><a href="{{ route('support') }}" title="Hỗ trợ khách hàng">Hỗ trợ
                            khách hàng</a></li>
                </ul>
            </div>
        </div>
        <div class="uk-container uk-container-center">
            <div class="uk-grid uk-grid-medium">
                <div class="uk-width-large-3-4">
                    @yield('content-hotro')
                </div>
                <div class="uk-width-large-1-4">
                    <aside class="aside">
                        <div class="aside-news">
                            <div class="aside-heading">Tin tức mới nhất</div>
                            <div class="aside-body">
                                <div class="aside-post-item uk-clearfix">

                                    <div class="info">
                                        <h3 class="title"><a href="{{ route('huongdan') }}"
                                                title="HƯỚNG DẪN MUA HÀNG">HƯỚNG
                                                DẪN MUA HÀNG</a></h3>
                                    </div>
                                </div>
                                <div class="aside-post-item uk-clearfix">

                                    <div class="info">
                                        <h3 class="title"><a href="{{ route('thanhtoan') }}"
                                                title="HƯỚNG DẪN THANH TOÁN">HƯỚNG DẪN THANH TOÁN</a></h3>
                                    </div>
                                </div>
                                <div class="aside-post-item uk-clearfix">
                                    {{-- <a href="{{ route('quydinh') }}" class="image img-cover"><img
                                            src="backend/img/not-found.jpg" alt="QUY ĐỊNH MUA HÀNG"></a> --}}
                                    <div class="info">
                                        <h3 class="title"><a href="{{ route('quydinh') }}" title="QUY ĐỊNH MUA HÀNG">QUY
                                                ĐỊNH MUA HÀNG</a></h3>
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
