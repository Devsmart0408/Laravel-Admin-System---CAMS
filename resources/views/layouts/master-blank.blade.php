<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Minton - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    @include('layouts.head')
    <style>
        .danger {
            color: red;
        }
    </style>
</head>
<body>
    @yield('content')
    @include('layouts.footer-script')
</body>
</html>