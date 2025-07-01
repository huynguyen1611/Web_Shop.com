@extends('fronend.main')
@section('content')
    <style>
        .cart-section-right {
            margin-bottom: 50px;
        }

        .container1 {
            margin-bottom: 50px;
            max-width: 1240px;
            margin: auto;
        }

        .container1>h2 {
            margin-top: 100px;
            text-align: center;
            margin-bottom: 30px;
            font-size: 150%;
        }

        .cart-section-right h2 {
            text-align: center;
        }

        .cart-section-right button {
            border-radius: 16px 0px !important;
        }

        .btn {
            display: block;
            margin: 0 auto;
            padding: 10px 100px;
            text-transform: uppercase;
            border-radius: 16px 0px;

            border: none;
            color: #ddd;
            background-color: #DA2229;
            font-size: 15px;
            cursor: pointer;
            transition: var(--main-transition);
        }

        .register-left {
            width: 50%;
            padding-right: 40px;
            border-right: 1px solid rgb(98, 103, 104);
            text-align: center;
        }

        .register {
            gap: 20px
        }

        input {
            border: 1px solid #ddd;
        }

        #header {
            top: 0px;
        }

        .password,
        .password-change {
            display: grid;
        }

        label {
            margin-bottom: 5px;
        }

        .password input {
            margin-bottom: 20px;
            height: 30px;
            background-color: var(--main-bg);
            margin-bottom: 12px;
            padding-left: 12px;
            border-radius: 15px;
        }

        .password-change input {
            height: 30px;
            background-color: var(--main-bg);
            margin-bottom: 12px;
            padding-left: 12px;
            border-radius: 15px;
        }

        .main-h2 {
            font-size: 120%;
        }

        .cart-section-right-input-password input {
            height: 30px;
            background-color: var(--main-bg);
            margin-bottom: 12px;
            padding-left: 12px;
            border-radius: 15px;
            width: 100%;
        }

        .btn {
            margin-top: 20px;
        }

        .row-flex {
            display: flex;
            flex-direction: row;
            align-items: flex-start;
            gap: 40px;
        }

        .register-left,
        .cart-section-right {
            flex: 1;
        }

        .cart-section-right input:focus,
        .register-left input:focus {
            border: 2px solid #DA2229;
            /* đổi màu này tùy bạn */
            outline: none;
            /* loại bỏ outline mặc định */
            transition: border 0.3s ease;
        }

        button.btn:hover {
            background: white;
            color: red;
            border: 1px solid red;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">


    <div class="container1 ">
        <h2 class="main-h2">ĐĂNG NHẬP</h2>
        <div class="register row-flex">
            <div class="register-left">
                <div class="content">
                    <h2 class="main-h2">Khách hàng mới của NQH Shop</h2>
                    <p> Nếu bạn chưa có tài khoản trên nqhshop.com, hãy sử dụng tùy chọn này để truy cập biểu mẫu đăng
                        ký.
                    </p>
                    <p> Bằng cách cung cấp cho NQH Shop thông tin chi tiết của bạn...</p>
                </div>
                <a href="{{ route('register') }}"><button class="btn">Đăng kí</button></a>
            </div>
            <form method="POST" action="{{ route('check_login') }}">
                @csrf
                <div class="cart-section-right ">
                    <p>Nếu bạn đã có tài khoản, hãy đăng nhập để tích lũy điểm thành viên và nhận được những ưu đãi tốt hơn!
                    </p>
                    <h2 class="main-h2">Đăng nhập tài khoản</h2>
                    @if ($errors->has('login'))
                        <div style="color: red; font-size: 12px; text-align: left; margin-bottom: 10px;">
                            {{ $errors->first('login') }}
                        </div>
                    @endif
                    <div class="cart-section-right-input-email">
                        <input type="email" placeholder="Email" name="email" id="" required
                            value="{{ old('email') }}" />
                        @error('email')
                            <div style="color: red; font-size: 12px;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="cart-section-right-input-password">
                        <input type="password" placeholder="Nhập mật khẩu..." name="password" id="password" />
                        @error('password')
                            <div style="color: red; font-size: 12px;">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn">Đăng Nhập</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        const toggle = document.getElementById("togglePassword");
        const password = document.getElementById("password");
        toggle.addEventListener("click", () => {
            const isPassword = password.type === "password";
            password.type = isPassword ? "text" : "password";
            toggle.className = isPassword ? "ri-eye-line toggle-password" : "ri-eye-close-line toggle-password";
        });
    </script>
@endsection
