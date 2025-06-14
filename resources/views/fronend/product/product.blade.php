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
                        @yield('content-product')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
