<div class="panel-flash-sale" id="#flash-sale">
    <div class="uk-container uk-container-center">
        <div class="main-heading">
            <div class="panel-head">
                <h2 class="heading-1"><span>Flash Sale</span></h2>
            </div>
        </div>
        <div class="panel-body">
            <div class="uk-grid uk-grid-medium">
                @foreach ($products as $product)
                    <div class="uk-width-1-2 uk-width-small-1-2 uk-width-medium-1-3 uk-width-large-1-5 mb20">
                        <div class="product-item product">
                            <a href="https://laptop.themedemo.site/iphone-16-pro-max.html"
                                class="image img-scaledown img-zoomin">
                                @if ($product->thumbnail)
                                    <img src="{{ asset('storage/' . $product->thumbnail->file_path) }}"
                                        alt="{{ $product->name }}" width="200">
                                @else
                                    <img src="{{ asset('frontend/img/nophoto.jpg') }}" alt="No image" width="200">
                                @endif
                            </a>
                            <div class="info">
                                <h3 class="title"><a href="https://laptop.themedemo.site/iphone-16-pro-max.html"
                                        title="{{ $product->name }}">{{ $product->name }}</a></h3>
                                <div class="product-group">
                                    <div class="price uk-flex uk-flex-middle mt10">
                                        <div class="price-sale">
                                            {{ number_format($product->sale_price, 0, ',', '.') }}<sup>đ</sup></div>
                                        <div class="price-old uk-flex uk-flex-middle">
                                            {{ number_format($product->price, 0, ',', '.') }} <sup>đ</sup>
                                            <div class="percent">
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
    </div>
</div>
