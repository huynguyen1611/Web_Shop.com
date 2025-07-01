@extends('fronend.main')
@section('content')
    <div class="cart-container">
        <div class="page-breadcrumb background">
            <div class="uk-container uk-container-center">
                <ul class="uk-list uk-clearfix">
                    <li><a href="/"><i class="fa fa-home mr5"></i>Trang chủ</a></li>
                    <li><a title="Hệ thống phân phối">Giỏ hàng</a></li>
                </ul>
            </div>
        </div>
        <div class="uk-container uk-container-center">
            <form action="https://laptop.themedemo.site/cart/create" class="uk-form form" method="post">
                <input type="hidden" name="_token" value="yx70wi9X4uPjhxRMdWcuKLzKRtqfVqZQzzsd3im7">
                <h2 class="heading-1"><span>Giỏ hàng</span></h2>
                <div class="cart-wrapper">
                    <div class="uk-grid uk-grid-medium">
                        <div class="uk-width-large-5-5">
                            <div class="panel-cart">
                                <div class="panel-head">
                                    <h2 class="cart-heading"><span>Sản phẩm</span></h2>
                                </div>
                                <div class="panel-body">
                                    <div class="cart-list">
                                        @foreach ($cart as $item)
                                            <div class="cart-item cart-item_{{ $item['variant_id'] }}">
                                                <div class="uk-grid uk-grid-medium">
                                                    <div class="uk-width-small-1-1 uk-width-medium-1-5">
                                                        <div class="cart-item-image">
                                                            <img class="image img-scaledown"
                                                                src="{{ asset($item['image']) }}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="uk-width-small-1-1 uk-width-medium-4-5">
                                                        <div class="cart-item-info">
                                                            <h3 class="title"><span>{{ $item['title'] }}</span></h3>
                                                            <div
                                                                class="cart-item-action uk-flex uk-flex-middle uk-flex-space-between">
                                                                <div class="cart-item-qty">
                                                                    <button type="button" class="btn-qty minus"
                                                                        data-id="{{ $item['variant_id'] }}">-</button>
                                                                    <input type="text"
                                                                        class="input-qty quantity-input_{{ $item['variant_id'] }}"
                                                                        value="{{ $item['qty'] }}">
                                                                    <input type="hidden" class="rowId"
                                                                        value="{{ $item['variant_id'] }}">
                                                                    <button type="button" class="btn-qty plus"
                                                                        data-id="{{ $item['variant_id'] }}">+</button>
                                                                </div>
                                                                <div class="cart-item-price">
                                                                    <div class="uk-flex uk-flex-bottom">
                                                                        <span
                                                                            class="cart-price-sale line-total line-total_{{ $item['variant_id'] }}"
                                                                            data-price="{{ $item['qty'] * $item['price'] }}">
                                                                            {{ number_format($item['qty'] * $item['price'], 0, ',', '.') }}<sup>đ</sup>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="cart-item-remove"
                                                                    data-row-id="{{ $item['variant_id'] }}">
                                                                    <span>X</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="panel-voucher uk-hidden">
                                    <div class="voucher-list">
                                        <div class="voucher-item active">
                                            <div class="voucher-left"></div>
                                            <div class="voucher-right">
                                                <div class="voucher-title">5AFDSFFD34 <span>(Còn 20)</span> </div>
                                                <div class="voucher-description">
                                                    <p>Khuyến mãi nhân dịp Noel 24/12, giảm giá đến 50% sản phẩm</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="voucher-item ">
                                            <div class="voucher-left"></div>
                                            <div class="voucher-right">
                                                <div class="voucher-title">5AFDSFFD34 <span>(Còn 20)</span> </div>
                                                <div class="voucher-description">
                                                    <p>Khuyến mãi nhân dịp Noel 24/12, giảm giá đến 50% sản phẩm</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="voucher-form">
                                        <input type="text" placeholder="Chọn mã giảm giá" name="voucher" value=""
                                            readonly>
                                        <a href="" class="apply-voucher">Áp dụng</a>
                                    </div>
                                </div>
                                <div class="panel-foot mt30 pay">
                                    <div class="cart-summary mb20">
                                        <div class="cart-summary-item">
                                            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                                <span class="summay-title">Giảm giá</span>
                                                <div class="summary-value discount-value">-0đ
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart-summary-item">
                                            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                                <span class="summay-title">Phí giao hàng</span>
                                                <div class="summary-value">Miễn phí</div>
                                            </div>
                                        </div>
                                        @php
                                            $total = collect($cart)->sum(fn($item) => $item['qty'] * $item['price']);
                                        @endphp
                                        <div class="cart-summary-item">
                                            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                                <span class="summay-title bold">Tổng tiền</span>
                                                <div class="summary-value cart-total" id="total-price"
                                                    data-price="{{ $total }}">
                                                    {{ number_format($total, 0, ',', '.') }}₫
                                                </div>
                                            </div>
                                        </div>
                                        <div class="buy-more" style="display: flex">
                                            <a href="{{ route('product') }}" class="btn-buymore">Chọn
                                                thêm sản phẩm khác</a>

                                            <a style="margin-left: 10px" href="{{ route('pay') }}"
                                                class="btn-buymore">Thanh toán ngay</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const formatCurrency = number =>
                new Intl.NumberFormat('vi-VN').format(number) + '₫';

            // Cập nhật số lượng
            document.querySelectorAll('.btn-qty').forEach(btn => {
                btn.addEventListener('click', function() {
                    const variantId = this.dataset.id;
                    const input = document.querySelector('.quantity-input_' + variantId);
                    let qty = parseInt(input.value);

                    if (this.classList.contains('plus')) {
                        qty++;
                    } else if (this.classList.contains('minus')) {
                        qty--;
                        if (qty < 1) {
                            // Hiện confirm hỏi có muốn xóa không
                            if (confirm("Bạn có muốn xóa sản phẩm này không?")) {
                                removeItemFromCart(variantId);
                            } else {
                                qty = 1;
                            }
                        }
                    }

                    input.value = qty;
                    if (qty >= 1) {
                        updateCartQty(variantId, qty);
                    }
                });
            });

            // Xóa sản phẩm
            document.querySelectorAll('.cart-item-remove').forEach(btn => {
                btn.addEventListener('click', function() {
                    const variantId = this.dataset.rowId;
                    removeItemFromCart(variantId);
                });
            });

            // Hàm update số lượng
            function updateCartQty(variantId, qty) {
                fetch("{{ route('cart.update.ajax') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            product_id: variantId,
                            product_qty: qty
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        // Cập nhật lại thành tiền cho sản phẩm
                        const lineTotalSpan = document.querySelector('.line-total_' + variantId);
                        lineTotalSpan.innerHTML = formatCurrency(data.price);
                        lineTotalSpan.dataset.price = data.price;

                        // Cập nhật tổng tiền
                        document.querySelector('#total-price').innerHTML = formatCurrency(data.total);
                        //thông báo lỗi
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: 'Thông báo từ hệ thống!',
                            text: 'Cập nhật số lượng thành công',
                            showConfirmButton: false,
                            timer: 700,
                            timerProgressBar: true,
                            customClass: {
                                popup: 'swal-custom-toast'
                            }
                        });
                    })
                    .catch(err => {
                        console.error('Lỗi khi cập nhật giỏ hàng:', err);
                    });
            }

            // Hàm xóa sản phẩm
            function removeItemFromCart(variantId) {
                // Hỏi trước khi gọi API
                Swal.fire({
                    title: 'Bạn muốn xóa sản phẩm khỏi giỏ hàng?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Xóa',
                    cancelButtonText: 'Hủy',
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Gửi request xoá nếu người dùng xác nhận
                        fetch("{{ route('cart.remove.item') }}", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                },
                                body: JSON.stringify({
                                    variant_id: variantId
                                })
                            })
                            .then(res => res.json())
                            .then(data => {
                                if (data.success) {
                                    const item = document.querySelector('.cart-item_' + variantId);
                                    if (item) item.remove();

                                    updateTotalPriceAfterRemove();

                                    Swal.fire({
                                        toast: true,
                                        position: 'top-end',
                                        icon: 'success',
                                        title: 'Đã xóa sản phẩm khỏi giỏ hàng',
                                        showConfirmButton: false,
                                        timer: 2000
                                    });
                                }
                            });
                    }
                });
            }

            function updateTotalPriceAfterRemove() {
                // Tính lại tổng
                let total = 0;
                document.querySelectorAll('.cart-price-sale').forEach(span => {
                    total += parseInt(span.dataset.price);
                });
                document.querySelector('#total-price').innerHTML = formatCurrency(total);
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
