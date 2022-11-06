@extends('template')


@section('judul')
    Media Belajar Interaktif
@endsection


@section('isi')
    <br>

    <div class="container">
        <h2>Edit Live Rencana Pembelajaran</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rp as $item)
                    <tr>
                        <td>{{ $item->judul }}</td>
                        <td>{!! $item->kegiatan !!}</td>
                        <td>
                            <a href="{{ url('/editrpp') }}/{{ $item->id_rencana_pembelajaran }}"
                                class="btn btn-info">Edit</a><br>
                            <a href="../../app/PdfMateriList?showmaster=materi&fk_id_materi={{ $id_materi }}"
                                class="btn btn-info">Upload
                                PDF</a><br>
                            <a href="../../app/ArtikelMateriList?showmaster=materi&fk_id_materi={{ $id_materi }}"
                                class="btn btn-info">Artikel
                                Materi</a><br>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
