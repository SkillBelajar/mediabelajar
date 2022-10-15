@extends('template')


@section('judul')
    Media Belajar Interaktif
@endsection


@section('isi')
    <br><br>
    <h1>Live Materi & Soal Quiz</h1>
    <hr>
    <label>Tampilan Live</label>
    <select name="aksi" class="form-control">
        <option value="{{ $aksi }}">{{ $aksi }}</option>
        <option value="Materi">Materi</option>
        <option value="Soal">Soal</option>
        <option value="tampilkan_jawaban">tampilkan_jawaban</option>
    </select>
    <br>
    <label>Soal : </label>
    <select name="aksi" class="form-control">
        <?php
        $no = 1;
        ?>
        @foreach ($soal as $item)
            <option value="">{{ $no++ }}. {!! $item->soal !!}</option>
        @endforeach

    </select>
@endsection
