@extends('template')


@section('judul')
    Nilai Siswa
@endsection


@section('isi')
    <h1>Rekap Nilai Siswa</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Total Jawab Essay</th>
                <th>Pilihan Ganda Benar</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($peserta as $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                    <td><?php
                    $nama = $item->nama;
                    $essay = \DB::select("SELECT COUNT(id_peserta) as total_essay FROM `peserta` WHERE `nama_peserta` LIKE ? and benar = '-';", [$nama]);

                    ?>
                        {{ $essay[0]->total_essay }}
                    </td>
                    <td><?php
                    $nama = $item->nama;
                    $essay = \DB::select("SELECT COUNT(id_peserta) as total_essay FROM `peserta` WHERE `nama_peserta` LIKE ? and benar = 'benar';", [$nama]);

                    ?>
                        {{ $essay[0]->total_essay }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>

    <hr>
    <a href="{{ url('/resetpeserta') }}/{{ $key }}" class="btn btn-info">Reset Peserta</a>

    <br>
    <br>
@endsection
