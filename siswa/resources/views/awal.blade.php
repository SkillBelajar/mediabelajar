@extends('template')


@section('judul')
    Media Belajar Interaktif
@endsection


@section('isi')
    <h2>Silahkan Isikan Nama Anda, Untuk Memulai Media Belajar</h2>
    <form method="POST">
        <!--
                    <label>Nama Anda</label>
                    -->
        <input type="text" class="form-control" placeholder="Nama Anda">
        <input type="submit" class="btn btn-info" value="Simpan Nama">
        @csrf
    </form>
@endsection
