<!doctype html>
<html>
<head>
    <meta charset="utf-8">

    <script type="text/javascript" src='//code.jquery.com/jquery-1.10.2.min.js'></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

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
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
</body>
</html>