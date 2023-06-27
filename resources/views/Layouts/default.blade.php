<!doctype html>
<html>
<head>
    @include('Includes.head')
</head>
<body>
    <div class="container-fluid position-relative d-flex p-0">
        @include('Includes.sidebar')
        @include('Includes.header')
        @yield('content')
        <!-- <footer class="row">
            @include('Includes.footer')
        </footer> -->
    </div>
</body>
</html>