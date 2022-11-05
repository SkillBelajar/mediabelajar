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
            <h2>{{ $guru }}</h2>
        </div>
    </div>
    <hr>
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

    <hr>
    <hr>
    <h3>Bahan Materi</h3>
@endsection
