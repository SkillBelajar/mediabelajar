@extends('template')


@section('judul')
    Media Belajar Interaktif
@endsection


@section('isi')
    <a href="{{ url('/editrpp') }}" class="btn btn-info">Edit RPP Live</a>

    <br>

    <br><br>
    <h1>Generator Rencana Pembelajaran</h1>
    <hr>
    <label>Pilih Materi Yang Akan di Generator </label>
    <form method="POST">
        @csrf
        <select name="materi" class="form-control">
            @foreach ($materi as $item)
                <option value="{{ $item->id_materi }}"><?php
                $media = \DB::select('SELECT * FROM `media` WHERE `id_media` = ?', [$item->id_media]);
                //dd($media);
                $nama_media = $media[0]->nama_media;
                //dd($nama_media);\
                ?>

                    {{ $nama_media }} -- {{ $item->judul }}</option>
            @endforeach
        </select>
        <input type="submit" class="btn btn-control" value="Mulai Generator">
    </form>
@endsection
