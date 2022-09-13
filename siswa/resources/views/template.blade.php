<!DOCTYPE html>
<html lang="id">

<head>
    <title>@yield('judul')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    @livewireStyles()
</head>

<body>
    <div class="container">
        <br>

        <h1>@yield('judul')</h1>
        <hr>
        @yield('isi')
    </div>

    @livewireScripts()
</body>

</html>
