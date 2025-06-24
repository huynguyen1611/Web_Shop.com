@extends('fronend.product.product')
@section('content-product')
    <div class="product-list">
        <div class="uk-grid uk-grid-medium">
            @foreach ($products as $product)
                <div class="uk-width-1-2 uk-width-small-1-2 uk-width-medium-1-3 uk-width-large-1-4 mb20">
                    <div class="product-item product">

                        <a href="{{ route('product.show', $product->id) }}" class="image img-scaledown img-zoomin"><img
                                src="{{ asset('storage/' . $product->thumbnail->file_path) }}" alt="{{ $product->name }}"></a>
                        <div class="info">
                            <h3 class="title"><a href="{{ route('product.show', $product->id) }}"
                                    title="{{ $product->name }}">{{ $product->name }}</a></h3>
                            <div class="product-group">
                                <div class="price uk-flex uk-flex-middle mt10">
                                    <div class="price-sale">{{ number_format($product->sale_price, 0, ',', '.') }}
                                    </div>
                                    <div class="price-old uk-flex uk-flex-middle">
                                        {{ number_format($product->price, 0, ',', '.') }} <div class="percent">
                                            <div class="percent-value">-{{ $product->discount_percent }}%</div>
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
