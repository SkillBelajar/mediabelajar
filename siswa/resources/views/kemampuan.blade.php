@extends('template')


@section('judul')
    Media Belajar Interaktif
@endsection


@section('isi')
    <h3>Silahkan Di Jawab Dengan Jujur ya </h3>
    <h1>Apa yang anda ketahui tentang {{ $judul }} ?</h1>

    <hr>
    <form method="POST">
        @csrf
        <label>Apa Harapan Anda Dengan belajar Hari ini ? </label><br>

        <textarea class="form-control" required name="harapan"></textarea>

        <br>
        <label>Seberapa Susah Menurut anda Pelajaran kita ?</label>
        <select class="form-control" name="level">
            <option value="1">Mudah</option>
            <option value="2">Sedang</option>
            <option value="3">Sangat Sulit</option>

        </select>

        <br>
        <label>Seberapa Siap anda belajar hari ini ?</label>
        <textarea class="form-control" required name="kesiapan"></textarea>

        <br>
        <label>Apa yang anda suka dalam kehidupan sehari - hari ?</label>
        <textarea class="form-control" required name="minat"></textarea>

        <br>

        <br>
        <input type="submit" class="btn btn-info" value="Mulai Belajar">
    </form>
@endsection
