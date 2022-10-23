@extends('template')


@section('judul')
    Media Belajar Interaktif
@endsection


@section('isi')
    <script>
        setTimeout(function() {
            window.location.href = 'terpilih';
        }, 30000);
    </script>
    @livewire('randomx')
@endsection
