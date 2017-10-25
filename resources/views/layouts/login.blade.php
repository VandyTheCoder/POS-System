<!DOCTYPE HTML>
<html>
    <head>
        @include('includes.head')
    </head>
    <body background="{{asset('images/wallpaper.png')}}">
        <div class="container-fluid">

            <div id="main" class="row">
                @yield('content')
            </div>

        </div>
    </body>
</html>