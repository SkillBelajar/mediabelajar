@extends('template')


@section('judul')
    Media Belajar Interaktif
@endsection


@section('isi')
    <h1>Pemetaan Kemampuan dari Peserta Didik</h1>
    <h3>Silahkan anda Isi data Berikut </h3>

    <div class="alert alert-info">
        Topik Hari ini :<br><br>
        {{ $judul }}
    </div>


    <hr>
    <form method="POST">
        @csrf
        <label>Apa yang anda ketahui tentang Materi hari ini ? </label><br>

        <textarea class="form-control" required name="harapan"></textarea>

        <br>
        <label>Seberapa Susah Menurut anda Materi hari ini ?</label>
        <select class="form-control" name="level">
            <option value="1">Mudah</option>
            <option value="2">Sedang</option>
            <option value="3">Sangat Sulit</option>

        </select>

        <br>
        <input type="submit" class="btn btn-info" value="Mulai Belajar">
    </form>
@endsection
