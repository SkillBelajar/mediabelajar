<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kegiatan Pembelajaran</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
    @livewireStyles()
</head>

<body>
    @livewire('slide')
    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-3 sidenav">

                <h4>{{ $judul_materi }}</h4>
                <ul class="nav nav-pills nav-stacked">

                    @foreach ($semua as $item)
                        <li><a
                                href="{{ url('/rencana_pembelajaran') }}/{{ $item->id_indikator }}">{{ $item->judul }}</a>
                        </li>
                    @endforeach
                </ul><br>

            </div>

            <div class="col-sm-9">



                <div class="row">
                    <div class="col-sm-4"> <img src="../../../app/files/{{ $logo }}" class="img-rounded"
                            width="90" height="90"></div>
                    <div class="col-sm-8">
                        <h4><small> <br> {{ $tempat_kerja }} <br> {{ $nama_guru }}</small></h4>
                    </div>
                </div>
                <hr>
                @if ($kode == 1)
                    <h1>{{ $judul_materi }}</h1>
                    <hr>
                @endif



                @foreach ($slide as $item)
                    <h2>{{ $item->judul }}</h2>


                    <p>{!! $item->kegiatan !!}</p>
                    <br><br>
                @endforeach
                <!--
                <footer class="container-fluid">
                    <p>Footer Text</p>
                </footer>
            -->
            </div>
        </div>
        @livewireScripts()




</body>

</html>
