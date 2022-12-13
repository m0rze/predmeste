<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset("css/admin/app.css") }}">
    @yield("styles")
    <title>Панель управления - @yield('title')</title>
</head>
<body>
<div id="wrapper">
    <x-admin.sidebar></x-admin.sidebar>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <x-admin.topbar></x-admin.topbar>
            <div class="container-fluid">
                @yield("content")
                <input type="hidden" class="token" value="{{ $token }}">
                <x-admin.footer></x-admin.footer>
            </div>
        </div>
    </div>
</div>
@yield("modals")
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="{{ asset("js/admin/main.js") }}"></script>
@yield("scripts")
</body>
</html>
