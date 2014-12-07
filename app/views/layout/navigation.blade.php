<style>

    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu>.dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: -6px;
        margin-left: -1px;
        -webkit-border-radius: 0 6px 6px 6px;
        -moz-border-radius: 0 6px 6px;
        border-radius: 0 6px 6px 6px;
    }

    .dropdown-submenu:hover>.dropdown-menu {
        display: block;
    }

    .dropdown-submenu>a:after {
        display: block;
        content: " ";
        float: right;
        width: 0;
        height: 0;
        border-color: transparent;
        border-style: solid;
        border-width: 5px 0 5px 5px;
        border-left-color: #ccc;
        margin-top: 5px;
        margin-right: -10px;
    }

    .dropdown-submenu:hover>a:after {
        border-left-color: #fff;
    }

    .dropdown-submenu.pull-left {
        float: none;
    }

    .dropdown-submenu.pull-left>.dropdown-menu {
        left: -100%;
        margin-left: 10px;
        -webkit-border-radius: 6px 0 6px 6px;
        -moz-border-radius: 6px 0 6px 6px;
        border-radius: 6px 0 6px 6px;
    }
</style>
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ URL::route('home') }}">Home</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
            @if(Auth::check())
          <li><a href="{{ URL::route('favorite') }}"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>Favorites</a></li>
                @if(Auth::user()->role == 2)
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admin <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                  <li><a tabindex="-1" href="{{ URL::to('game/create') }}">Add new game</a></li>
                  <li class="divider"></li>
                  <li class="dropdown-submenu">
                      <a tabindex="-1" href="#">Management</a>
                      <ul class="dropdown-menu">
                          <li><a tabindex="-1" href="{{ URL::route('admin-users') }}">Users</li>
                          <li class="divider"></li>
                          <li><a tabindex="-1" href="{{ action('PublisherController@index') }}">Publishers</a></li>
                          <li><a tabindex="-1" href="{{ action('DeveloperController@index') }}">Developers</a></li>
                          <li><a tabindex="-1" href="{{ action('RequirementsController@index') }}">Requirements</a></li>
                          <li><a tabindex="-1" href="{{ action('GenreController@index') }}">Genres</a></li>
                      </ul>
                  </li>


              </ul>
          </li>
                @endif
            @endif
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @if(Auth::check())
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Profile <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                  <li><a href="{{URL::route('profile-user')}}">View</a></li>
                  <li><a href="{{URL::route('account-change-password')}}">Change password</a></li>
              </ul>
          </li>
          <li><a href="{{ URL::route('account-sign-out') }}">Sign out</a></li>


          @else
          <li><a href="{{ URL::route('account-create') }}">Register</a></li>
          <li><a href ="{{ URL::route('account-sign-in') }}">Sign in</a></li>
          <li><a href ="{{ URL::route('account-forgot-password') }}">Forgot password</a></li>
          @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>