<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin Panel</title>

        <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/panelcustom.css')}}">

        <script type="text/javascript" src="{{URL::asset('js/jquery1.12.4.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/bootstrap.min.js')}}"></script>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-default">
              <div class="container">
                <div class="col-md-12">
                    <a class="navbar-brand" href="/"><h1>Admin Panel</h1></a>
                </div>
              </div>
            </nav>
        </header>

        <div class="container">
            <div class="col-md-3">
                <ul class="list-group">
                  <li class="list-group-item"><a href="/courses/create"> Courses Manager </a></li>
                </ul>
            </div>
            <div class="col-md-9">
                @yield('content')
            </div>
        </div>
    </body>
</html>