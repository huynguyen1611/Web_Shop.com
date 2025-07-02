@extends('fronend.main')
@section('content')
    <div class="cart-container">
        <div class="page-breadcrumb background">
            <div class="uk-container uk-container-center">
                <ul class="uk-list uk-clearfix">
                    <li><a href="/"><i class="fa fa-home mr5"></i>Trang chủ</a></li>
                    <li><a title="Trang thanh toán đơn hàng">Thanh toán</a></li>
                </ul>
            </div>
        </div>
        <div class="uk-container uk-container-center">
            <form action="" class="uk-form form" method="post">
                @csrf
                <h2 class="heading-1"><span>Thông tin đặt hàng</span></h2>
                <div class="cart-wrapper">
                    <div class="uk-grid uk-grid-medium">
                        <div class="uk-width-large-2-5">
                            <div class="panel-cart cart-left">
                                <div class="panel-head">
                                    <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                        <h2 class="cart-heading">
                                            <span>Thông tin giao hàng</span>
                                        </h2>
                                    </div>
                                </div>
                                <div class="panel-body mb30">
                                    <div class="cart-information">
                                        <div class="uk-grid uk-grid-medium mb20">
                                            <div class="uk-width-large-1-2">
                                                <div class="form-row">
                                                    <input type="text" name="name" value="{{ $customer->name }}"
                                                        placeholder="Nhập vào Họ Tên" class="input-text">
                                                </div>
                                            </div>
                                            <div class="uk-width-large-1-2">
                                                <div class="form-row">
                                                    <input type="text" name="phone" value="{{ $customer->phone }}"
                                                        placeholder="Nhập vào Số điện thoại" class="input-text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row mb20">
                                            <input type="text" name="email" value="{{ $customer->email }}"
                                                placeholder="Nhập vào Email" class="input-text">
                                        </div>

                                        <div class="uk-grid uk-grid-medium mb20 cart-section-right-select2">
                                            <div class="uk-width-1-3">
                                                <input type="text" name="city" value="{{ $customer->city }}">
                                            </div>
                                            <div class="uk-width-1-3">
                                                <input type="text" name="district" value="{{ $customer->district }}">
                                            </div>
                                            <div class="uk-width-1-3">
                                                <input type="text" name="ward" value="{{ $customer->ward }}">
                                            </div>
                                        </div>

                                        <div class="form-row mb20">
                                            <input type="text" name="address" value="{{ $customer->address }}"
                                                placeholder="Địa chỉ chi tiết (Số nhà, ấp...)" class="input-text">
                                        </div>

                                        <div class="form-row">
                                            <input type="text" name="description" value="" placeholder="Ghi chú "
                                                class="input-text">
                                        </div>
                                    </div>


                                </div>
                                <div class="panel-foot">
                                    <h2 class="cart-heading"><span>Phương thức thanh toán</span></h2>
                                    <div class="cart-method mb30">
                                        <label for="cod" class="uk-flex uk-flex-middle method-item">
                                            <input type="radio" name="method" value="cod" checked id="cod">
                                            <span class="image"><img src="{{ asset('frontend/img/icon_pay/COD.svg') }}"
                                                    alt=""></span>
                                            <span class="title">Thanh toán khi nhận hàng (COD)</span>
                                        </label>
                                        <label for="momo" class="uk-flex uk-flex-middle method-item">
                                            <input type="radio" name="method" value="momo" id="momo">
                                            <span class="image"><img
                                                    src="{{ asset('frontend/img/icon_pay/momo-icon.webp') }}"
                                                    alt=""></span>
                                            <span class="title">Thanh toán qua Ví Momo</span>
                                        </label>
                                        <label for="vnpay" class="uk-flex uk-flex-middle method-item">
                                            <input type="radio" name="method" value="vnpay" id="vnpay">
                                            <span class="image"><img src="{{ asset('frontend/img/icon_pay/vnpay.webp') }}"
                                                    alt=""></span>
                                            <span class="title">Thanh toán ví điện tử VNPAY</span>
                                        </label>
                                        <label for="paypal" class="uk-flex uk-flex-middle method-item">
                                            <input type="radio" name="method" value="paypal" id="paypal">
                                            <span class="image"><img
                                                    src="{{ asset('frontend/img/icon_pay/paypal.ico') }}"
                                                    alt=""></span>
                                            <span class="title">Thanh toán qua Paypal</span>
                                        </label>
                                    </div>
                                    <div class="cart-return mb10">
                                        <span>Nếu bạn không hài lòng với sản phẩm của chúng tôi? Bạn hoàn toàn có thể
                                            trả lại sản phẩm <a href="" title="Trả sản phẩm">Tại đây</a></span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="uk-width-large-3-5">
                            <div class="panel-cart">
                                <div class="panel-head">
                                    <h2 class="cart-heading"><span>Đơn hàng</span></h2>
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
                                <div class="panel-voucher">
                                    <!-- Nút chọn voucher -->
                                    <button type="button" class="btn btn-primary toggle-voucher-list btn-voucher"
                                        style="margin-bottom: 10px;">
                                        Chọn voucher >>>
                                    </button>
                                    <!-- Danh sách voucher ẩn mặc định -->
                                    <div class="voucher-list" style="display: none;">
                                        @foreach ($vouchers as $voucher)
                                            @php
                                                $isActive = session('voucher_code') == $voucher->code;
                                            @endphp
                                            <div class="voucher-item {{ $isActive ? 'active' : '' }}"
                                                data-code="{{ $voucher->code }}">
                                                <div class="voucher-left"></div>
                                                <div class="voucher-right">
                                                    <div class="voucher-title">
                                                        {{ $voucher->code }} <span>(Còn {{ $voucher->quantity }})</span>
                                                    </div>
                                                    <div class="voucher-description">
                                                        <p>
                                                            {{ $voucher->name }}, giảm giá đến
                                                            {{ $voucher->type == 'fixed' ? number_format($voucher->value, 0, ',', '.') . '₫' : $voucher->value . '%' }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <!-- Form áp dụng voucher -->
                                    <div class="voucher-form" style="margin-top: 10px;">
                                        <input type="text" placeholder="Chọn mã giảm giá" name="voucher_code"
                                            value="{{ session('voucher_code') }}">
                                        <a href="#" class="apply-voucher">Áp dụng</a>
                                    </div>
                                    <!-- Bỏ mã voucher -->
                                    <a href="#" class="remove-voucher"
                                        style="float: right; color: red; font-size: 16px; margin-top: 10px;">Bỏ áp dụng
                                        voucher >></a>
                                </div>

                                @php
                                    $discount = session('voucher_discount', 0);
                                    $total = collect($cart)->sum(fn($item) => $item['qty'] * $item['price']);
                                    $totalAfterDiscount = $total - $discount;
                                @endphp
                                <div class="panel-foot mt30 pay">
                                    <div class="cart-summary mb20">
                                        <div class="cart-summary-item">
                                            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                                <span class="summay-title">Tổng tiền hàng</span>
                                                <div class="summary-value summary-total-before-discount">
                                                    {{ number_format($total, 0, ',', '.') }}</div>
                                            </div>
                                        </div>
                                        <div class="cart-summary-item">
                                            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                                <span class="summay-title">Giảm giá</span>
                                                <div class="summary-value discount-value">
                                                    -{{ number_format($discount, 0, ',', '.') }}đ
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart-summary-item">
                                            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                                <span class="summay-title">Phí giao hàng</span>
                                                <div class="summary-value">Miễn phí</div>
                                            </div>
                                        </div>

                                        <div class="cart-summary-item">
                                            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                                <span style="font-weight: bolder" class="summay-title bold">Tổng thanh
                                                    toán</span>
                                                <div class="summary-value cart-total" id="total-price"
                                                    data-price="{{ $total }}">
                                                    {{ number_format($totalAfterDiscount, 0, ',', '.') }}₫
                                                </div>
                                            </div>
                                        </div>
                                        <div class="buy-more" style="display: flex">
                                            <a href="{{ route('product') }}" class="btn-buymore">Chọn
                                                thêm sản phẩm khác</a>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="cart-checkout" value="create" name="create">Thanh
                                    toán đơn hàng
                                </button>
                                <div class="box-info mt-3">
                                    <div class="box-title">Thông tin bổ sung</div>
                                    <div class="info">
                                        <div class="content-style">
                                            <h3><strong>Chính sách trả hàng, đổi hàng:</strong></h3>
                                            <p>Ngoại trừ lỗi do nhà sản xuất hoặc khác mẫu yêu cầu, những trường hợp còn
                                                lại Quý khách không được đổi-trả hàng.</p>
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
    {{-- Xử lí chọn voucher --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle hiển thị danh sách voucher
            document.querySelector('.toggle-voucher-list').addEventListener('click', function() {
                const list = document.querySelector('.voucher-list');
                list.style.display = list.style.display === 'none' ? 'block' : 'none';
            });

            // Click chọn voucher từ danh sách
            document.querySelectorAll('.voucher-item').forEach(item => {
                item.addEventListener('click', function() {
                    document.querySelectorAll('.voucher-item').forEach(i => i.classList.remove(
                        'active'));
                    this.classList.add('active');

                    const code = this.dataset.code;
                    document.querySelector('input[name="voucher_code"]').value = code;

                    // Ẩn danh sách sau khi chọn
                    document.querySelector('.voucher-list').style.display = 'none';
                });
            });
        });
    </script>
    {{-- Xử lí tăng , giảm số lượng và tổng tiền  --}}
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
                        // Cập nhật thành tiền của từng dòng
                        const lineTotalSpan = document.querySelector('.line-total_' + variantId);
                        lineTotalSpan.innerHTML = data.price_format;
                        lineTotalSpan.dataset.price = data.price;

                        // Cập nhật các giá trị tổng
                        // document.querySelector('.summary-total-before-discount').innerHTML = data.total_format;
                        // document.querySelector('.discount-value').innerHTML = '-' + data.discount_format;
                        // document.querySelector('#total-price').innerHTML = data.total_after_format;
                        document.querySelector('.summary-total-before-discount').innerHTML = data.total_format;

                        const currentVoucher = document.querySelector('input[name="voucher_code"]').value;
                        if (currentVoucher) {
                            fetch("{{ route('cart.apply.voucher') }}", {
                                    method: "POST",
                                    headers: {
                                        "Content-Type": "application/json",
                                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                    },
                                    body: JSON.stringify({
                                        code: currentVoucher
                                    })
                                })
                                .then(res => res.json())
                                .then(voucherData => {
                                    if (voucherData.success) {
                                        document.querySelector('.discount-value').innerHTML = '-' +
                                            voucherData.discount_format;
                                        document.querySelector('#total-price').innerHTML = voucherData
                                            .total_after_format;
                                    }
                                });
                        }

                        // Hiển thị thông báo
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
    {{-- Xử lí mã giảm giá  --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('.apply-voucher').addEventListener('click', function(e) {
                e.preventDefault();
                const code = document.querySelector('input[name="voucher_code"]').value;

                fetch("{{ route('cart.apply.voucher') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            code
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            // Cập nhật DOM
                            document.querySelector('.discount-value').textContent =
                                `-${data.discount_format}`;
                            document.querySelector('#total-price').textContent = data
                                .total_after_format;

                            // Hiển thị thông báo
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'success',
                                title: 'Thông báo từ hệ thống !',
                                text: 'Áp mã voucher thành công',
                                showConfirmButton: false,
                                timer: 1000,
                                customClass: {
                                    popup: 'swal-toast-success'
                                }
                            });
                        } else {
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'error',
                                title: 'Lỗi!',
                                text: 'Voucher hết hạn hoặc không chính xác !',
                                showConfirmButton: false,
                                timer: 2500,
                                customClass: {
                                    popup: 'swal-toast-error2'
                                }
                            });
                        }
                    });
            });

            // Click chọn từ danh sách voucher
            document.querySelectorAll('.voucher-item').forEach(item => {
                item.addEventListener('click', function() {
                    document.querySelectorAll('.voucher-item').forEach(i => i.classList.remove(
                        'active'));
                    this.classList.add('active');
                    const code = this.dataset.code;

                    document.querySelector('input[name="voucher_code"]').value = code;
                });
            });
        });
        //Xóa voucher
        document.querySelector('.remove-voucher').addEventListener('click', function(e) {
            e.preventDefault();

            fetch("{{ route('cart.remove.voucher') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    }
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        // Reset form
                        document.querySelector('input[name="voucher_code"]').value = '';
                        document.querySelectorAll('.voucher-item').forEach(i => i.classList.remove('active'));
                        document.querySelector('.discount-value').innerHTML = '-0đ';
                        document.querySelector('#total-price').innerHTML = data.total_after_format;
                        Swal.fire({
                            toast: true,
                            icon: 'success',
                            title: 'Đã bỏ mã giảm giá !',
                            showConfirmButton: false,
                            timer: 1000,
                            position: 'top-end'
                        });
                    }
                });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
