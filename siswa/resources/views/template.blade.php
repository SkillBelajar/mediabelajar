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

    <!--
    <style>
        /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
        .row.content {
            height: 1500px
        }

        /* Set gray background color and 100% height */
        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }

            .row.content {
                height: auto;
            }
        }
    </style>
-->
    <script src="{{ url('/ckeditor') }}/ckeditor.js"></script>
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
