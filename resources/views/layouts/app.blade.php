<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Language" content="fa"/>
    <title>@yield('title')</title>

    @include('header')

    <!--include my css and js files-->
    @stack('css')
</head>
<body>
    @yield('content')

    @if(Session()->has('alert'))}}
        @foreach(session('alert') as $alert)
            <script>
                var alert_msg = "{{ $alert['msg'] }}";
                var alert_type = "{{ $alert['type'] }}";
            </script>
        @endforeach
    @endif

    @stack('script')
</body>
</html>
