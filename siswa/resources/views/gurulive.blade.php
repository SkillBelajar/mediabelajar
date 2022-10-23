@extends('template')


@section('judul')
    Media Belajar Interaktif
@endsection


@section('isi')
    <br><br>
    <h1>Live Materi Siswa</h1>

    <a href='{{ url('/materilive/e20aaebaefdde86a9f723092a9e601fa1') }}' class="btn btn-info">Lanjutkan Materi Sebelumnya</a>

    <hr>

    <label>Pilih Materi Live</label>
    <form method="POST">
        @csrf
        <select name="aksi" class="form-control">
            @foreach ($materi as $item)
                <option value="{{ $item->id_materi }}">{{ $item->judul }} -- <?php
                $id_media = $item->id_media;
                $media = \DB::select('SELECT * FROM `media` WHERE `id_media` = ?', [$id_media]);
                $nama_media = $media[0]->nama_media;
                ?>
                    {{ $nama_media }}
                </option>
            @endforeach
            <br>
            <input type="submit" value="Proses" class="btn btn-info">
        </select>
    </form>
@endsection
