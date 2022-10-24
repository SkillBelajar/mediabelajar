@extends('template')


@section('judul')
    Media Belajar Interaktif
@endsection


@section('isi')
    <script>
        setTimeout(function() {
            window.location.href = 'mediabelajar';
        }, 30000);
    </script>
    <div class="jumbotron text-center">
        <p>Yang Terpilih ?</p>
        <div class="alert alert-info">
            <h1>{{ $nama }}</h1>
        </div>

    </div>


    <a href="{{ url('/mediabelajar') }}" class="btn btn-info">Kembali Ke Materi</a>
@endsection
