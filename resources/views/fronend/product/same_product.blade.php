<div class="product-related">
    <div class="uk-container uk-container-center">
        @if ($relatedProducts->isNotEmpty())
            <div class="panel-product">
                <div class="main-heading">
                    <div class="panel-head">
                        <div class="uk-flex uk-flex-middle uk-flex-space-between">
                            <h2 class="heading-1"><span>Sản phẩm cùng danh mục</span></h2>
                        </div>
                    </div>
                </div>
                <div class="panel-body list-product">
                    <div class="uk-grid uk-grid-medium">
                        @foreach ($relatedProducts as $related)
                            <div class="uk-width-1-2 uk-width-small-1-2 uk-width-medium-1-3 uk-width-large-1-5 mb20">
                                <div class="product-item product">

                                    <a href="{{ route('product.show', $related->id) }}"
                                        class="image img-scaledown img-zoomin"><img
                                            src="{{ asset('storage/' . $related->thumbnail->file_path) }}"
                                            alt="{{ $related->name }}"></a>
                                    <div class="info">

                                        <h3 class="title"><a href="{{ route('product.show', $related->id) }}"
                                                title="{{ $related->name }}">{{ $related->name }}</a>
                                        </h3>

                                        <div class="product-group">
                                            <div class="price uk-flex uk-flex-middle mt10">
                                                <div class="price-sale">
                                                    {{ number_format($related->sale_price, 0, ',', '.') }}<sup>đ</sup>
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
        @endif
    </div>
</div>
