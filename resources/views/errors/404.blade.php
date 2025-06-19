<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>403 | Bạn không có quyền truy cập</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    @include('dashboard.dart.head')


    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #f7f7f7;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        .container {
            max-width: 600px;
        }

        .gif {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto;
            height: 500px;
        }

        .gif img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        h1 {
            font-size: 100px;
            margin: 20px 0 10px;
            color: #ff4b5c;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 15px;
        }

        p {
            font-size: 16px;
            color: #666;
        }

        .back-btn {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 24px;
            background-color: #ff4b5c;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        .back-btn:hover {
            background-color: #e04352;
        }

        .container p {
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="gif">
            <img src="{{ asset('frontend/img/error/error_404.gif') }}" alt="403 Forbidden" style="width:100%;">
        </div>
        <p>Trang này không có sẵn. Mong bạn thông cảm.</p>
        <p>Bạn thử bạn thử quay về trang chủ xem sao nhé.</p>
        <a href="{{ route('dashboard.index') }}" class="back-btn">Quay về trang chủ</a>
    </div>
</body>

</html>
