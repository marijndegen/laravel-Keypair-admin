<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="/css/chopedLaravel.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
</head>

<body>
    <!-- As a link -->
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="/">Home</a>
    </nav>
    @yield('content')
</body>

</html>