<!doctype html>
<html>
<head>
    @include('Includes.head')
</head>
<body>
    <div class="container-fluid position-relative d-flex p-0">
        @include('Includes.sidebar')
        @include('Includes.header')
        <div class="content">
            <!-- Content Start -->
            @yield('content')
            <!-- Content End -->
            @include('Includes.footer')
        </div>
        <!-- <footer class="row">
            
        </footer> -->
    </div>
</body>
</html>