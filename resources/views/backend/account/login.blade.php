<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NQH Shop | Login </title>

    <link href="backend/css/bootstrap.min.css" rel="stylesheet">
    <link href="backend/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="backend/css/animate.css" rel="stylesheet">
    <link href="backend/css/style.css" rel="stylesheet">
    <link href="backend/css/customize.css" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">Chào mừng đến với NQH shop+</h2>
                <p>
                    Nơi hội tụ công nghệ hiện đại và trải nghiệm mua sắm thông minh!
                </p>
                <p>
                    Tại NQH shop+, chúng tôi cung cấp đa dạng các sản phẩm công nghệ cao cấp, từ điện thoại, laptop,
                    thiết bị thông minh đến phụ kiện và giải pháp công nghệ tiên tiến.
                </p>
                <p>
                    Chúng tôi cam kết mang đến cho khách hàng sản phẩm chính hãng, giá tốt, cùng dịch vụ hỗ trợ kỹ thuật
                    tận tình và chuyên nghiệp.
                </p>
                <p>
                    <small>NQH shop+ – Không chỉ là cửa hàng, mà là người bạn đồng hành cùng bạn trên hành trình chinh
                        phục thế giới số!

                    </small>
                </p>
            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    <form class="m-t" role="form" action="{{ route('auth.login') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Username"
                                value="{{ old('email') }}">
                        </div>
                        @error('email')
                            <div style="color: red" class="error-text">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        @error('password')
                            <div style="color: red" class="error-text">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="btn btn-primary block full-width m-b">Đăng nhập</button>

                        <a href="#">
                            <small>Quên mật khẩu?</small>
                        </a>

                        <p class="text-muted text-center">
                            <small>Bạn đã có tài khoản chưa ?</small>
                        </p>
                        <a class="btn btn-sm btn-white btn-block" href="{{ route('auth.register') }}">Đăng kí tài
                            khản</a>
                    </form>
                    <p class="m-t">
                        <small>Cửa hàng NQH Shop : Luxury &copy; 2003</small>
                    </p>
                </div>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-6">
                Copyright NQH SHOP Company
            </div>
            <div class="col-md-6 text-right">
                <small>© 2014-2015</small>
            </div>
        </div>
    </div>

</body>

</html>
