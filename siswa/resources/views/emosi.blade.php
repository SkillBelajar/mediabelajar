@extends('template')


@section('judul')
    Media Belajar Interaktif
@endsection


@section('isi')
    <h1>Silahkan anda Pilih , Apa yang anda Pikirkan Sekarang ?</h1>
    <hr>
    <div class="row">
        <div class="col-sm-4"><a href='{{ url('/simpanemosi/senyum') }}'><img src="{{ url('/emosi/1.png') }}"
                    class="img-rounded" width="130" height="130"></a></div>
        <div class="col-sm-4"><a href='{{ url('/simpanemosi/malu') }}'><img src="{{ url('/emosi/2.png') }}" class="img-rounded"
                    width="130" height="130"></a></div>
        <div class="col-sm-4"><a href='{{ url('/simpanemosi/nangis') }}'><img src="{{ url('/emosi/3.png') }}"
                    class="img-rounded" width="130" height="130"></a></div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-sm-4"><a href='{{ url('/simpanemosi/ketawa') }}'><img src="{{ url('/emosi/4.png') }}"
                    class="img-rounded" width="130" height="130"></a></div>
        <div class="col-sm-4"><a href='{{ url('/simpanemosi/sedih') }}'><img src="{{ url('/emosi/5.png') }}"
                    class="img-rounded" width="130" height="130"></a></div>
        <div class="col-sm-4"><a href='{{ url('/simpanemosi/marah') }}'><img src="{{ url('/emosi/6.png') }}"
                    class="img-rounded" width="130" height="130"></a></div>
    </div>
@endsection
