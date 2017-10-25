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
                <div class = "col-lg-2 col-md-2">
                    @include('includes.sidebar')
                </div>
                <div class = "col-lg-10 col-md-10" style = "border-left: 1px solid #ddd">
                    @yield('content')
                </div>

            </div>

            <footer class="row">
                @include('includes.footer')
            </footer>

        </div>
    </body>
</html>