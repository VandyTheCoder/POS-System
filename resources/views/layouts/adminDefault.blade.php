<!DOCTYPE HTML>
<html>
<head>
    @include('includes.adminHead')
</head>
<body style = "padding-top: 50px; background-color: #ddd">
<div class="container-fluid">

    <header class="row">
        @include('includes.adminHeader')
    </header>

    <div id="main" class="row">
        @include('includes.adminSidebar')
        @yield('content')
    </div>

    <footer class="row">
        @include('includes.footer')
    </footer>

</div>
</body>
</html>