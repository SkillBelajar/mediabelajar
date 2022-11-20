@extends('template')


@section('judul')
    Media Belajar Interaktif
@endsection


@section('isi')
    <br>
    <div class="row">
        <div class="col-sm-4"><img src="../../app/files/{{ $logo }}" class="img-rounded" width="130" height="130">
        </div>
        <div class="col-sm-8">
            <h1>{{ $tugas }}</h1>
            <h3>{{ $guru }}</h3>
        </div>
    </div>
    <hr>

    <h3>Langkah - Langkah Kegiatan Pembelajaran</h3>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Kegiatan</th>

                <th>Kegiatan</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            ?>
            @foreach ($rpp as $item)
                <?php
                $id_indikator = $item->id_indikator;
                $idk = \DB::select('SELECT * FROM `indikator_rencana_belajar` WHERE `id_indikator` = ?', [$id_indikator]);
                $kategori = $idk[0]->kategori;
                $nama_ind = $idk[0]->indikator;
                ?>
                <tr>
                    <td>{{ $no++ }}</td>
                    <td><i>{{ $kategori }}</i>
                        <hr>
                        {{ $nama_ind }}
                    </td>

                    <td><i>{{ $item->judul }}</i>
                        <hr>
                        {!! $item->kegiatan !!}


                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

    <!--
                                                                                        @foreach ($rpp as $item)
    <small>
                                                                                                <?php
                                                                                                $id_indikator = $item->id_indikator;
                                                                                                $idk = \DB::select('SELECT * FROM `indikator_rencana_belajar` WHERE `id_indikator` = ?', [$id_indikator]);
                                                                                                $kategori = $idk[0]->kategori;
                                                                                                $nama_ind = $idk[0]->indikator;
                                                                                                ?>
                                                                                                {{ $kategori }} | {{ $nama_ind }}

                                                                                            </small>
                                                                                            <h3 class="text-uppercase">{{ $item->judul }}</h3>

                                                                                            <p>

                                                                                                {!! $item->kegiatan !!}

                                                                                            </p>
                                                                                            <hr>
    @endforeach

                                                                                        -->
@endsection
