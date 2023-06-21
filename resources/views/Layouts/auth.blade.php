<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="Saquib" content="Blade">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>MyStock - 나의 주식 관리</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/auth.css">
    <script src="/js/auth.js" ></script>
</head>
<body>
    <section class="auth_section">
        @yield('content')
    </section>
</body>
</html>