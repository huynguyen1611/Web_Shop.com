@php
    use App\Models\Product;
    $products = Product::with('thumbnail')->latest()->limit(5)->get();
@endphp
<div class="aside">
    <div class="aside-category aside-product mt20">
        <div class="aside-heading">Sản phẩm nổi bật</div>
        <div class="aside-body">
            @foreach ($products as $product)
                <div class="aside-product uk-clearfix">
                    <a href="" class="image img-cover"><img
                            src="{{ asset('storage/' . $product->thumbnail->file_path) }}"
                            alt="Laptop Gaming Acer Nitro V ANV15-51-58AN"></a>
                    <div class="info">
                        <h3 class="title"><a href="{{ route('product_store', $product->id) }}"
                                title="{{ $product->name }}">{{ $product->name }}</a></h3>
                        <div class="price uk-flex uk-flex-middle mt10">
                            <div class="price-sale">{{ number_format($product->sale_price, 0, ',', '.') }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
