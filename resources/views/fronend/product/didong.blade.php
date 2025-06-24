@extends('fronend.product.product')
@section('content-product')
    <div class="product-list">
        <div class="uk-grid uk-grid-medium">
            @foreach ($mobiles as $mobile)
                <div class="uk-width-1-2 uk-width-small-1-2 uk-width-medium-1-3 uk-width-large-1-4 mb20">
                    <div class="product-item product">

                        <a href="{{ route('product.show', $mobile->id) }}" class="image img-scaledown img-zoomin"><img
                                src="{{ asset('storage/' . $mobile->thumbnail->file_path) }}" alt="{{ $mobile->name }}"></a>
                        <div class="info">

                            <h3 class="title"><a href="https://laptop.themedemo.site/iphone-16-pro-max.html"
                                    title="{{ $mobile->name }}">{{ $mobile->name }}</a></h3>

                            <div class="product-group">
                                <div class="price uk-flex uk-flex-middle mt10">
                                    <div class="price-sale">
                                        {{ number_format($mobile->sale_price, 0, ',', '.') }}<sup>đ</sup></div>
                                    <div class="price-old uk-flex uk-flex-middle">
                                        {{ number_format($mobile->price, 0, ',', '.') }}<sup>đ</sup>
                                        <div class="percent">
                                            <div class="percent-value">-{{ $mobile->discount_percent }}%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
