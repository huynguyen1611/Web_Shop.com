@extends('fronend.main')
@section('content')
    <style>
        input:focus {
            outline: none;
            border: 2px solid #AD2229;
        }

        .cart-section-right-select {
            display: flex;
            gap: 12px;
            /* khoảng cách giữa các input */
            margin-bottom: 16px;
        }

        .cart-section-right-select input,
        .cart-section-right-select select {
            flex: 1;
            /* Các input đều chia đều chiều rộng */
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 15px;
            font-size: 14px;
            transition: border 0.2s;
        }

        .cart-section-right-select input:focus,
        .cart-section-right-select select:focus {
            border: 2px solid #AD2229;
            outline: none;
            background: #fff;
        }
    </style>
    <div class="container1 ">
        <h2 class="main-h2">Chỉnh sửa thông tin cá nhân</h2>
        <form method="POST" action="{{ route('update_customer') }}">
            @csrf
            <div class="register row-flex">
                <div class="register-left">
                    <h2 class="main-h2">Thông tin mật khẩu</h2>
                    <style>
                        input[name="password"]::placeholder {
                            color: red;
                            font-style: italic;
                            font-size: 14px;
                        }
                    </style>
                    <div class="password">
                        <label for="">Mật khẩu <span style="color: red">*</span></label>
                        <input type="password" name="password" value=""
                            placeholder="Để trống nếu không đổi mật khẩu...">
                    </div>

                    <div class="password-change">
                        <label for="">Nhập lại mật khẩu <span style="color: red">*</span></label>
                        <input type="password" name="password_confirmation" value=""
                            placeholder="Nhập lại mật khẩu mới...">
                    </div>
                    @error('password')
                        <div style="color: red" class="text-error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="cart-section-right">
                    <h2 class="main-h2">Thông tin khách hàng</h2>
                    <div class="cart-section-right-input-name-phone">
                        <input type="text" placeholder="Tên" name="name" id=""
                            value="{{ $customer->name }}" />
                        @error('name')
                            <div style="color: red; font-size: 12px;">{{ $message }}</div>
                        @enderror
                        <input type="text" placeholder="Điện thoại" name="phone" id=""
                            value="{{ $customer->phone }}" />
                        @error('phone')
                            <div style="color: red; font-size: 12px;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="cart-section-right-input-email">
                        <input type="email" placeholder="Email" name="email" id=""
                            value="{{ $customer->email }}" />
                        @error('email')
                            <div style="color: red; font-size: 12px;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="cart-section-right-select">
                        <input type="text" name="city" value="{{ $customer->city }}">
                        <input type="text" name="district" value="{{ $customer->district }}">
                        <input type="text" name=" ward" value="{{ $customer->ward }}">

                    </div>
                    @error('city')
                        <div style="color: red; font-size: 12px;">{{ $message }}</div>
                    @enderror
                    @error('district')
                        <div style="color: red; font-size: 12px;">{{ $message }}</div>
                    @enderror
                    @error('ward')
                        <div style="color: red; font-size: 12px;">{{ $message }}</div>
                    @enderror
                    <div class="cart-section-right-input-adress">
                        <textarea name="address" id="" cols="30" rows="10" placeholder="Địa chỉ">{{ $customer->address }}</textarea>
                    </div>
                    @error('address')
                        <div style="color: red; font-size: 12px;">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="main-btn button">Lưu thay đổi</button>
        </form>
        <div class="logout-wrapper" style="margin-top: 20px; text-align:center;">
            <form method="GET" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="main-btn button" style="background: #555;">Đăng xuất</button>
            </form>
        </div>
    </div>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="{{ asset('backend/js/apiprovince.js') }}"></script> --}}
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const toggle = document.getElementById("togglePassword");
            const password = document.getElementById("password");

            if (toggle && password) {
                toggle.addEventListener("click", () => {
                    const isPassword = password.type === "password";
                    password.type = isPassword ? "text" : "password";
                    toggle.className = isPassword ?
                        "ri-eye-line toggle-password" :
                        "ri-eye-close-line toggle-password";
                });
            }
        });
    </script>
    <script>
        // Lấy form và các input password
        const form = document.querySelector('.register-wrapper');
        const pwd = form.querySelector('input[name="password"]');
        const pwdConf = form.querySelector('input[name="password_confirmation"]');

        // Khi submit form
        form.addEventListener('submit', function(e) {
            // nếu 2 mật khẩu không khớp
            if (pwd.value !== pwdConf.value) {
                e.preventDefault(); // ngăn submit
                // Hiển thị cảnh báo
                if (!document.getElementById('pwdMismatchMsg')) {
                    const msg = document.createElement('div');
                    msg.id = 'pwdMismatchMsg';
                    msg.style.color = 'red';
                    msg.style.marginTop = '5px';
                    msg.textContent = 'Mật khẩu xác nhận không khớp.';
                    pwdConf.parentNode.appendChild(msg);
                }
                pwdConf.focus();
            }
        });
    </script>
@endsection
