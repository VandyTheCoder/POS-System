<!DOCTYPE HTML>
<html>
    <head>
        @include('includes.head')
    </head>
    <body style = "padding-top: 50px">
        <div class="container-fluid">

            <header class="row">
                @include('includes.header')
            </header>

            <div id="main" class="row">
                @yield('content')
            </div>

            <footer class="row">
                @include('includes.footer')
            </footer>

        </div>
    </body>
</html>