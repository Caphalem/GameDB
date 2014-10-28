<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <style>
        table form { margin-bottom: 0; }
        form ul { margin-left: 0; list-style: none; }
        .error { color: red; font-style: italic; }
        body { padding-top: 20px; }
    </style>
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