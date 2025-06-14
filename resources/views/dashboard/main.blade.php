<!DOCTYPE html>
<html>

<head>
    @include('dashboard.dart.head')
</head>

<body>
    <div id="wrapper">
        {{-- Sidebar --}}
        @include('dashboard.dart.sidebar')
        {{-- Content --}}
        <div id="page-wrapper" class="gray-bg">
            {{-- Nav --}}
            @include('dashboard.dart.nav')
            {{-- Nội dung  --}}
            @yield('content')
            {{--  --}}
            {{-- Footer --}}
            @include('dashboard.dart.footer')
        </div>
    </div>

    @include('dashboard.dart.script')
</body>

</html>
