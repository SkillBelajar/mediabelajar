@extends('template')


@section('judul')
    Media Belajar Interaktif
@endsection


@section('isi')
    @livewire('livex')
    <div class="jumbotron text-center">
        <p>Yang Terpilih ?</p>
        <div class="alert alert-info">
            <?php
            if ($emosi == 'senyum') {
                $g = 1;
            } elseif ($emosi == 'malu') {
                $g = 2;
            } elseif ($emosi == 'nangis') {
                $g = 3;
            } elseif ($emosi == 'ketawan') {
                $g = 4;
            } elseif ($emosi == 'sedih') {
                $g = 5;
            } elseif ($emosi == 'marah') {
                $g = 6;
            } else {
                $g = 1;
            }
            ?>
            <!--
                <img src="{{ url('/emosi/' . $g . '.png') }}" class="img-rounded" width="90" height="90">
                -->
            <h1>{{ $nama }}</h1>

            <hr>
            <br>
            <!--
                                <img src="../../upload/{{ $foto }}" class="img-rounded" width="300" height="300">
                                -->
        </div>

    </div>

    <!--
                    <a href="{{ url('/mediabelajar') }}" class="btn btn-info">Kembali Ke Materi</a>
                -->
@endsection
