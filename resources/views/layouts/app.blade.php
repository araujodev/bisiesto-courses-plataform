<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bisiesto Online Courses - @yield('title')</title>

        <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/custom.css')}}">

        <script type="text/javascript" src="{{URL::asset('js/jquery1.12.4.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/bootstrap.min.js')}}"></script>

        <link href="https://fonts.googleapis.com/css?family=Raleway:300" rel="stylesheet">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-default">
              <div class="container">
                <a class="navbar-brand" href="/"><img src="{{URL::asset('images/bisiesto_logo.svg')}}"></a>
                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::guest())
                        <li><a href="/login">Login</a></li>
                        <li><a href="/register">Sign Up</a></li>
                    @endif
                    @if(Auth::check())
                        <li><a href="/courses/my">My Courses</a></li>
                        <li><a href="/users">Account</a></li>
                        <li><a href="/logout">Sign Out</a></li>
                    @endif
                </ul>
              </div>
            </nav>
        </header>

        @yield('content')

        <footer>
            <div class="container text-center">
                <p class="lead">Copyright <b>Leandro Araújo</b>.</p>
            </div>
        </footer>
    </body>
</html>