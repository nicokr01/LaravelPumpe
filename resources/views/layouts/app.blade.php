<html>
    <head>
        <title>@yield('title')</title>
    </head>
    <body>
        @section('sidebar')
            This is the master bar

        @show
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>