<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"
</head>
<body>
<div class="container">
    @if (Session::has('global'))
    <div class="flash alert">
        <p>{{ Session::get('global') }}</p>
    </div>
    @endif
    @include('layout.navigation')
    @yield('content')
</div>
</body>
</html>