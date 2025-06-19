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

        .btn {
            padding: 12px 20px;
            font-size: 20px;
            border-radius: 15px;
            background-color: #797575;
        }

        .btn:hover {
            background-color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="gif">
            <img src="{{ asset('frontend/img/error/404-error.png') }}" alt="403 Forbidden" style="width:100%;">
        </div>
        <p>Hình như bạn dã quên <span style="color: #ff4b5c">@</span><span style="color: #ff4b5c">csrf</span> ở FORM
            đúng
            không!!!</p>
        <p>Bạn thử quay về xem sao nhé.</p>
        {{-- <a href="{{ route('dashboard.index') }}" class="back-btn">Quay lại</a> --}}
        <button type="button" class="btn btn-outline-primary" onclick="history.back()">Quay lại</button>
    </div>
</body>

</html>
