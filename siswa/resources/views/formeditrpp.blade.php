@extends('template')


@section('judul')
    Media Belajar Interaktif
@endsection


@section('isi')
    <h2>Edit Rencana Pembelajaran</h2>
    @foreach ($rp as $item)
        <form method="POST">
            <label>Judul</label>
            <input type="text" class="form-control" value="{{ $item->judul }}" name="judul"><br>

            <label>Kegiatan</label>
            <textarea name="editor1" id="editor1" rows="10" cols="80">
                {{ $item->kegiatan }}
            </textarea>

            <script>
                // Replace the <textarea id="editor1"> with a CKEditor 4
                // instance, using default configuration.
                CKEDITOR.replace('editor1');
            </script>
            @csrf
            <br>
            <input type="submit" class="btn btn-info" value="Proses Edit">
        </form>
    @endforeach
@endsection
