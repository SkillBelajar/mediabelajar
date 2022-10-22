@extends('template')


@section('judul')
    Media Belajar Interaktif
@endsection


@section('isi')
    <br><br>
    <h1>Live Materi & Soal Quiz</h1>
    <hr>
    <h2>{{ $judul }}</h2>
    <form method="POST">
        <label>Tampilan Live</label>
        <select name="aksi" class="form-control">
            <option value="{{ $aksi }}">{{ $aksi }}</option>
            <option value="Materi">Materi</option>
            <option value="Soal">Soal</option>
            <option value="tampilkan_jawaban">tampilkan_jawaban</option>
            <option value="ulangan">ulangan</option>
        </select>
        <br>
        <label>Soal : </label>
        <a href='../../../app/EvaluasiList?showmaster=materi&fk_id_materi={{ $id_materi }}'>Tambah Soal</a>
        <select name="soal" class="form-control">
            <?php
            $no = 1;
            $no2 = 1;
            ?>
            @foreach ($soal as $item)
                <option value="{{ $no++ }}">{{ $no2++ }}. {!! $item->soal !!}</option>
            @endforeach
        </select>

        <br>
        <input type="submit" class="btn btn-info" value="Tampilkan Ke Siswa">
        @csrf
    </form>
@endsection
