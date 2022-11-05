@extends('template')


@section('judul')
    Media Belajar Interaktif
@endsection


@section('isi')
    <br><br>
    <h1>Generator Rencana Pembelajaran</h1>
    <hr>
    <label>Pilih Materi Yang Akan di Generator </label>
    <form method="POST">
        @csrf
        <select name="materi" class="form-control">
            @foreach ($materi as $item)
                <option value="{{ $item->id_materi }}">{{ $item->judul }}</option>
            @endforeach
        </select>
        <input type="submit" class="btn btn-control" value="Mulai Generator">
    </form>
@endsection
