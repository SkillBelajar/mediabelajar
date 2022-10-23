@extends('template')


@section('judul')
    Media Belajar Interaktif
@endsection


@section('isi')
    <br><br>

    <a href='{{ url('/mediabelajar') }}' class="btn btn-info">Kembali Ke Materi</a>

    <br>
    @livewire('ulanganx')
@endsection
