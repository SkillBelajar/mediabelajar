@extends('template')


@section('judul')
    Media Belajar Interaktif
@endsection


@section('isi')
    <br>
    <br>
    <h1>Ulangan Siswa Digital</h1>
    <hr>
    Peserta : {{ $nama }}
    <br>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Soal</th>
                <th>Jawaban Anda</th>

            </tr>
        </thead>
        <tbody>
            <?php
            // $no = 1;
            ?>
            @foreach ($soal as $item)
                <tr>
                    <td>Soal Nomor : {{ $nomor }} <br>{!! $item->soal !!}</td>
                    <td>
                        <form method="POST">
                            <select name="jawaban" class="form-control" required>
                                <option value="">==Pilih==</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                            </select>
                            <br>
                            <input type="hidden" value="{{ \Crypt::encrypt($item->jawaban) }}" name="kunci">
                            <input type="submit" class="btn btn-info" value="Simpan Jawaban">
                            @csrf
                            <input type="hidden" value="{{ $total }}" name="total">
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

    <hr>
    Pilih Soal<br>

    <?php
   for ($x = 1; $x <= $total; $x++) {
        //echo "The number is: $x <br>";
    ?>

    <a href="{{ url('/ulangan') }}/{{ $x }}" class="btn btn-warning">{{ $x }}</a>

    <?php
    }
    ?>


    <br>
    <hr>
    <br>
    <h3>Live Nilai Ranking Sementara</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>3 Tertinggi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $tertinggi = \DB::select('SELECT * FROM `skor_ulangan` ORDER BY `skor_ulangan`.`skor` DESC LIMIT 0,3;');

            ?>
            @foreach ($tertinggi as $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <br>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>3 Terendah</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $tertinggi = \DB::select('SELECT * FROM `skor_ulangan` ORDER BY `skor_ulangan`.`skor` ASC LIMIT 0,3;');

            ?>
            @foreach ($tertinggi as $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
