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

    <!--
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    -->
    <link href="{{ url('/') }}/select2.min.css" rel="stylesheet" />
    <script src="{{ url('/') }}/select2.min.js"></script>
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
