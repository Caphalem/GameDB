<!doctype html>
<html>
<head>
    <meta charset="utf-8">

    <script type="text/javascript" src='//code.jquery.com/jquery-1.10.2.min.js'></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.0/simplex/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .wrap {
            margin-left:0;
            margin-right:0;
        }
        html,
        body {
            height: 100%;
            /* The html and body elements cannot have any padding or margin. */
        }
        /* Wrapper for page content to push down footer */
        #wrap {
            min-height: 100%;
            /* Negative indent footer by its height */
            margin: 0 auto;
            /* Pad bottom by footer height */
            padding: 0 0 60px;
        }
        /* Set the fixed height of the footer here */
        #footer {
            height: 60px;
            background-color: #f5f5f5;
        }
        /* Custom page CSS
        -------------------------------------------------- */
        /* Not required for template or sticky footer method. */
        #wrap > .container {
            padding: 20px 0 0;
        }
        .container .credit {
            margin: 20px 0;
        }
        #footer > .container {
            padding-left: 0px;
            padding-right: 0px;
        }
    </style>
</head>
<body>
<section id="wrap">
    <div class="container">
        @if (Session::has('global'))
        <div class="flash alert">
            <p>{{ Session::get('global') }}</p>
        </div>
        @endif
        @include('layout.navigation')
        @yield('content')
    </div>
</section>
</div>
<div id="footer">
    <div class="container">
        <p class="text-muted credit">Laravel Project - code available on <a href="https://github.com/Caphalem/GameDB">GitHub</a>.</p>
    </div>
</div>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
</body>
</html>