<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kegiatan Pembelajaran</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ url('/') }}/bootstrap.min.css">
    <script src="{{ url('/') }}/jquery.min.js"></script>
    <script src="{{ url('/') }}/bootstrap.min.js"></script>
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

    @livewire('slide', [
        'kode' => $kode,
    ])
    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-3 sidenav">

                <h4>{{ $judul_materi }}</h4>
                <ul class="nav nav-pills nav-stacked">
                    @if ($nama_siswa == 'Test | Test -')
                        Login : {{ $nama_siswa }}
                    @endif
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
                <hr>
                <h3>Materi</h3>
                <!-- Trigger the modal with a button --
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open
                    Modal</button>
                -->
                @foreach ($pdf_materi as $item)
                    <a href="#" data-toggle="modal"
                        data-target="#myModal{{ $item->id_pdf_materi }}">{{ $item->judul }}</a>
                    <!-- Modal -->
                    <div id="myModal{{ $item->id_pdf_materi }}" class="modal fade" role="dialog">
                        <div class="modal-xl">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="row">
                                        <div class="col-sm-4"><img src="../../../app/files/{{ $logo }}"
                                                class="img-rounded" width="30" height="30"><small> |
                                                {{ $tempat_kerja }} | {{ $nama_guru }}</small></div>
                                        <div class="col-sm-8"><button type="button" class="close"
                                                data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">{{ $item->judul }}</h4>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-body">
                                    <object data="/mediabelajar/app/files/{{ $item->file_pdf }}#page=1"
                                        type="application/pdf" style="min-height:100vh;width:100%">
                                        <p>Link Download Materi <a
                                                href="/mediabelajar/app/files/{{ $item->file_pdf }}#page=1">Download
                                                PDF</a></p>
                                    </object>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <br>
                @endforeach

                @foreach ($artikel as $item)
                    <a href="#" data-toggle="modal"
                        data-target="#myModalx{{ $item->id_artikel_materi }}">{{ $item->judul }}</a>
                    <!-- Modal -->
                    <div id="myModalx{{ $item->id_artikel_materi }}" class="modal fade" role="dialog">
                        <div class="modal-xl">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="row">
                                        <div class="col-sm-4"><img src="../../../app/files/{{ $logo }}"
                                                class="img-rounded" width="30" height="30"><small> |
                                                {{ $tempat_kerja }} | {{ $nama_guru }}</small></div>
                                        <div class="col-sm-8"><button type="button" class="close"
                                                data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">{{ $item->judul }}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row"> {!! $item->isi !!}
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <br>
                @endforeach

            </div>
        </div>
        @livewireScripts()




</body>

</html>
