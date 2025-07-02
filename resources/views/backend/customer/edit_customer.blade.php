<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: whitesmoke;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        .register-wrapper {
            width: 100%;
            max-width: 100%;
            padding: 40px 60px;
        }

        .logo-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo-name {
            font-size: 40px;
            font-weight: bold;
            color: #1ab394;
        }

        .register-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        input,
        textarea,
        select,
        .form-control,
        .form-control-file {
            border: 1px solid #ddd;
            border-radius: 15px !important;
        }

        .register-left,
        .register-right {
            width: 100%;
            border: 2px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            background-color: #fff;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-title {
            margin-bottom: 25px;
        }

        .btn-primary {
            background-color: #1ab394;
            border: none;
        }

        .btn-primary:hover {
            background-color: #18a689;
        }

        .register-footer {
            text-align: center;
            margin-top: 40px;
        }

        .form-group-city {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .form-group-city>.form-group {
            flex: 1;
            /* Chia đều chiều rộng */
        }

        .form-group-address {
            display: grid;
        }

        @media (min-width: 992px) {
            .register-container {
                flex-direction: row;
            }

            .register-left {
                width: 60%;
            }

            .register-right {
                width: 40%;
            }

            .btn {
                padding: 12px 24px;
                border-radius: 16px 0px;
                font-size: 16px;
                line-height: 24px;
                background-color: #1AB394;
                color: #f7f8f9;
                border: 1px solid transparent;
            }

            .btn:hover {
                background-color: #fff;
                color: #1AB394;
                border: 1px solid #1AB394;
            }

            .button {
                padding: 7px 24px;
                border-radius: 16px 0px;
                font-size: 16px;
                line-height: 24px;
                background-color: #1AB394;
                color: #f7f8f9;
                border: 1px solid transparent;
            }

            .button:hover {
                background-color: #fff;
                color: #1AB394;
                border: 1px solid #1AB394;
            }

            .btn-back {
                padding: 7px 24px;
                border-radius: 16px 0px;
                font-size: 16px;
                line-height: 24px;
                background-color: #ddd;
                color: #1AB394;
                border: 1px solid transparent;
                border: 1px solid #1AB394;

            }

            .btn-back:hover {
                background-color: #fff;
                color: #1AB394;
                border: 1px solid #1AB394;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <form class="register-wrapper" action="{{ route('customer_update', $customer->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <!-- Header -->
            <div class="logo-header">
                <h1 class="logo-name">NQH Shop+</h1><br>
                <h4 class="mb-4">Đăng ký tài khoản</h4>
            </div>
            <!-- 2 Columns -->
            <div class="register-container">
                <!-- Left Column -->
                <div class="register-left">
                    <div class="form-title">
                        <p>THÔNG TIN CÁ NHÂN</p>
                    </div>

                    <div class="form-group">
                        <label>Họ tên</label>
                        <input type="text" name="name" value="{{ $customer->name }}" class="form-control"
                            placeholder="Nhập họ tên..." />
                    </div>
                    @error('name')
                        <div style="color: red" class="error-text">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="text" name="phone" value="{{ $customer->phone }}" class="form-control"
                            placeholder="Nhập số điện thoại..." />
                    </div>
                    @error('phone')
                        <div style="color: red" class="error-text">{{ $message }}</div>
                    @enderror
                    <div class="form-group-city">
                        <div class="form-group">
                            <label>Tỉnh / Thành phố</label>
                            <input type="text" name="city" value="{{ $customer->city }}" class="form-control"
                                placeholder="Nhập tỉnh/tp..." />
                        </div>

                        <div class="form-group">
                            <label>Quận / Huyện</label>
                            <input type="text" name="district" value="{{ $customer->district }}" class="form-control"
                                placeholder="Nhập quận/huyện..." />
                        </div>

                        <div class="form-group">
                            <label>Phường / Xã</label>
                            <input type="text" name="ward" value="{{ $customer->ward }}" class="form-control"
                                placeholder="Nhập phường/xã..." />
                        </div>

                    </div>
                    @error('city')
                        <div style="color: red" class="error-text">{{ $message }}</div>
                    @enderror
                    @error('district')
                        <div style="color: red" class="error-text">{{ $message }}</div>
                    @enderror
                    @error('ward')
                        <div style="color: red" class="error-text">{{ $message }}</div>
                    @enderror
                    <div class="form-group-address">
                        <label>Địa chỉ</label>
                        <textarea name="address" class="form-control" id="" cols="30" rows="10"
                            placeholder="Nhập địa chỉ..."> {{ $customer->address }}"</textarea>
                    </div>
                    @error('address')
                        <div style="color: red" class="error-text">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Right Column -->
                <div class="register-right">
                    <P>THÔNG TIN TÀI KHOẢN</P>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ $customer->email }}" class="form-control"
                            placeholder="Nhập email..." />
                    </div>
                    @error('email')
                        <div style="color: red" class="error-text">{{ $message }}</div>
                    @enderror
                    <style>
                        input[name="password"]::placeholder {
                            color: red;
                            font-style: italic;
                            font-size: 14px;
                        }
                    </style>
                    <div class="form-group">
                        <label>Mật khẩu mới</label>
                        <input type="password" name="password" class="form-control"
                            placeholder="Để trống nếu không đổi mật khẩu">
                    </div>
                    @error('password')
                        <div style="color: red" class="error-text">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label>Nhập lại mật khẩu mới</label>
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Nhập lại mật khẩu mới">
                    </div>
                    @error('password_confirmation')
                        <div style="color: red" class="error-text">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <div class="register-footer">
                            <button type="submit" class=" btn btn-outline-secondary btn-sm btn-block">Chỉnh sửa thành
                                viên</button><br>
                            <button type="button" class="btn btn-back" onclick="history.back()">Quay lại</button>
                        </div>
                    </div>
                </div>
        </form>
    </div>
</body>
{{-- Xử lí nhập lại mật khẩu --}}
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

</html>
