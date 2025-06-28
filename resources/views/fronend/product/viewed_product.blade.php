@if ($viewedProducts->isNotEmpty())
    <div class="product-related" id="viewed-wrapper">
        <div class="uk-container uk-container-center">
            <div class="panel-product">
                <div class="main-heading">
                    <div class="panel-head">
                        <div class="uk-flex uk-flex-middle uk-flex-space-between">
                            <h2 class="heading-1"><span>Sản phẩm đã xem</span></h2>
                        </div>
                    </div>
                </div>
                <style>
                    .close-btn {
                        background-color: white;
                        color: rgb(236, 20, 20);
                        border: none;
                        cursor: pointer;
                        padding: 2px 6px;
                        font-size: 18px;
                        line-height: 1;
                        margin-bottom: 10px;
                    }

                    .close {
                        background: rgba(255, 0, 0, 0.7);
                        color: white;
                        border: none;
                        cursor: pointer;
                        padding: 2px 6px;
                        border-radius: 50%;
                        font-size: 18px;
                        line-height: 1;
                        text-align: center;
                        justify-content: center;
                        align-items: center;
                    }
                </style>
                {{-- Nút xóa tất cả --}}
                <button id="clear-all" class="btn close-btn btn-danger btn-sm">Xóa tất cả >></button>

                <div class="panel-body list-product">
                    <div class="uk-grid uk-grid-medium">

                        @foreach ($viewedProducts as $product)
                            <div class="uk-width-1-2 uk-width-small-1-2 uk-width-medium-1-3 uk-width-large-1-5 mb20 product-column"
                                data-id="{{ $product->id }}">
                                <div class="product-item product">
                                    <button class="close close-btn" title="Xóa">&times;</button>
                                    <a href="{{ route('product.show', $product->id) }}"
                                        class="image img-scaledown img-zoomin">
                                        <img src="{{ asset('storage/' . $product->thumbnail->file_path) }}"
                                            alt="{{ $product->name }}">
                                    </a>
                                    <div class="info">
                                        <h3 class="title">
                                            <a href="{{ route('product.show', $product->id) }}"
                                                title="{{ $product->name }}">{{ $product->name }}</a>
                                        </h3>
                                        <div class="price">
                                            <div class="price-sale">
                                                {{ number_format($product->price) }}<sup>đ</sup></div>
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
@endif
