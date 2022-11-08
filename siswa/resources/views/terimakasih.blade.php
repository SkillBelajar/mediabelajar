@extends('template')


@section('judul')
    Media Belajar Interaktif
@endsection


@section('isi')
    <h2>Terima Kasih Buat {{ $nama }} Telah Belajar secara maksimal hari ini </h2>
    <br>
    <br>
    {{ $kata }}
@endsection
