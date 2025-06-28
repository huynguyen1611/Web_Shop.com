<div class="panel-general page">
    <div class="uk-container uk-container-center">
        <div class="panel-product">
            <div class="main-heading">
                <div class="panel-head">
                    <div class="uk-flex uk-flex-middle uk-flex-space-between">
                        <h2 class="heading-1"><a href="{{ route('screen') }}" title="Màn hình">Màn
                                hình</a></h2>
                        <a href="{{ route('screen') }} "class="readmore">Tất cả sản
                            phẩm</a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="uk-grid uk-grid-medium">
                    @foreach ($manhinhs as $manhinh)
                        <div class="uk-width-1-2 uk-width-small-1-2 uk-width-medium-1-3 uk-width-large-1-5 mb20">
                            <div class="product-item product">

                                <a href="{{ route('product.show', $manhinh->id) }}"
                                    class="image img-scaledown img-zoomin"><img
                                        src="{{ asset('storage/' . $manhinh->thumbnail->file_path) }}"
                                        alt="{{ $manhinh->name }}"></a>
                                <div class="info">

                                    <h3 class="title"><a href="{{ route('product.show', $manhinh->id) }}"
                                            title="{{ $manhinh->name }}">{{ $manhinh->name }}</a></h3>
                                    <div class="product-group">
                                        <div class="price uk-flex uk-flex-middle mt10">
                                            <div class="price-sale">
                                                {{ number_format($manhinh->sale_price, 0, ',', '.') }}<sup>đ</sup></div>
                                            <div class="price-old uk-flex uk-flex-middle">
                                                {{ number_format($manhinh->price, 0, ',', '.') }} <sup>đ</sup>
                                                <div class="percent">
                                                    <div class="percent-value">-{{ $manhinh->discount_percent }}%</div>
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
        <div class="panel-product">
            <div class="main-heading">
                <div class="panel-head">
                    <div class="uk-flex uk-flex-middle uk-flex-space-between">
                        <h2 class="heading-1"><a href="{{ route('mobile') }}" title="Điện thoại">Điện thoại</a></h2>
                        <a href="{{ route('mobile') }}" class="readmore">Tất cả sản
                            phẩm</a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="uk-grid uk-grid-medium">
                    @foreach ($dienthoais as $dienthoai)
                        <div class="uk-width-1-2 uk-width-small-1-2 uk-width-medium-1-3 uk-width-large-1-5 mb20">
                            <div class="product-item product">

                                <a href="{{ route('product.show', $dienthoai->id) }}"
                                    class="image img-scaledown img-zoomin"><img
                                        src="{{ asset('storage/' . $dienthoai->thumbnail->file_path) }}"
                                        alt="{{ $dienthoai->name }}"></a>
                                <div class="info">

                                    <h3 class="title"><a href="{{ route('product.show', $dienthoai->id) }}"
                                            title="{{ $dienthoai->name }}">{{ $dienthoai->name }}</a></h3>
                                    <div class="product-group">
                                        <div class="price uk-flex uk-flex-middle mt10">
                                            <div class="price-sale">
                                                {{ number_format($dienthoai->sale_price, 0, ',', '.') }}<sup>đ</sup>
                                            </div>
                                            <div class="price-old uk-flex uk-flex-middle">
                                                {{ number_format($dienthoai->price, 0, ',', '.') }} <sup>đ</sup>
                                                <div class="percent">
                                                    <div class="percent-value">-{{ $dienthoai->discount_percent }}%
                                                    </div>
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
        <div class="panel-product">
            <div class="main-heading">
                <div class="panel-head">
                    <div class="uk-flex uk-flex-middle uk-flex-space-between">
                        <h2 class="heading-1"><a href="{{ route('computer') }}" title="Laptop - Máy tính">Laptop - Máy
                                tính</a></h2>
                        <a href="{{ route('computer') }}" class="readmore">Tất cả sản
                            phẩm</a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="uk-grid uk-grid-medium">
                    @foreach ($laptops as $laptop)
                        <div class="uk-width-1-2 uk-width-small-1-2 uk-width-medium-1-3 uk-width-large-1-5 mb20">
                            <div class="product-item product">

                                <a href="{{ route('product.show', $laptop->id) }}"
                                    class="image img-scaledown img-zoomin"><img
                                        src="{{ asset('storage/' . $laptop->thumbnail->file_path) }}"
                                        alt="{{ $laptop->name }}"></a>
                                <div class="info">

                                    <h3 class="title"><a href="{{ route('product.show', $laptop->id) }}"
                                            title="{{ $laptop->name }}">{{ $laptop->name }}</a></h3>
                                    <div class="product-group">
                                        <div class="price uk-flex uk-flex-middle mt10">
                                            <div class="price-sale">
                                                {{ number_format($laptop->sale_price, 0, ',', '.') }}<sup>đ</sup>
                                            </div>
                                            <div class="price-old uk-flex uk-flex-middle">
                                                {{ number_format($laptop->price, 0, ',', '.') }} <sup>đ</sup>
                                                <div class="percent">
                                                    <div class="percent-value">-{{ $laptop->discount_percent }}%
                                                    </div>
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
</div>
