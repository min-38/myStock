<!doctype html>
<html>
<head>
    @include('Includes.head')
</head>
<body>
    <div class="container">
        <header class="row">
            @include('Includes.header')
        </header>
        <div id="main" class="row">
            @yield('content')
        </div>
        <footer class="row">
            @include('Includes.footer')
        </footer>
    </div>
</body>
</html>