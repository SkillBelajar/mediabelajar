<!DOCTYPE html>
<html lang="id">

<head>
    <title>@yield('judul')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ url('/') }}/bootstrap.min.css">
    <script src="{{ url('/') }}/jquery.min.js"></script>
    <script src="{{ url('/') }}/bootstrap.min.js"></script>
    @livewireStyles()
</head>

<body>
    <div class="container">

        <!--
        <h3>@yield('judul')</h3>
        {{ \Session::get('nama') }}
-->

        @yield('isi')
    </div>


    @livewireScripts()



</body>

</html>
