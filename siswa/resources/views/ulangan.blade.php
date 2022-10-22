@extends('template')


@section('judul')
    Media Belajar Interaktif
@endsection


@section('isi')
    <br>
    <br>
    <h1>Ulangan Siswa Digital</h1>
    <hr>

    <form method="POST">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Soal</th>
                    <th>Jawaban Anda</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                ?>
                @foreach ($soal as $item)
                    <tr>
                        <td>Soal Nomor : {{ $no++ }} <br>{!! $item->soal !!}</td>
                        <td>
                            <select name="" class="form-control" required>
                                <option value="">==Pilih==</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                            </select>
                        </td>

                    </tr>
                @endforeach


            </tbody>
        </table>

    </form>
@endsection
