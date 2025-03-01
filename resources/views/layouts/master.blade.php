<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h1>Website Công Đoàn</h1>
        <nav>
            <a href="{{ route('trangchu') }}">Trang chủ</a>
            <a href="{{ route('nguoidung.danhsach') }}">Người Dùng</a>
            <a href="{{ route('baiviet.danhsach') }}">Bài Viết</a>
            <a href="{{ route('thongbao.danhsach') }}">Thông Báo</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2025 Công Đoàn. All rights reserved.</p>
    </footer>
</body>
</html>
