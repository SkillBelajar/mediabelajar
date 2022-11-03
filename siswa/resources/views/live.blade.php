@extends('template')


@section('judul')
    Media Belajar Interaktif
@endsection


@section('isi')
    <br><br>
    <h1>Live Materi & Soal Quiz</h1>
    <hr>
    <h2>{{ $judul }}</h2>
    <form method="POST">
        <label>Tampilan Live</label>
        <select name="aksi" class="form-control">
            <option value="{{ $aksi }}">{{ $aksi }}</option>
            <option value="Materi">Materi</option>
            <option value="Soal">Soal</option>
            <option value="tampilkan_jawaban">tampilkan_jawaban</option>
            <option value="ulangan">ulangan</option>
            <option value="random">Random Peserta</option>
            <option value="reset">Reset Peserta</option>
        </select>
        <br>
        <label>Soal : </label>
        <a href='../../../app/EvaluasiList?showmaster=materi&fk_id_materi={{ $id_materi }}'>Tambah Soal</a>
        <select name="soal" class="form-control">
            <?php
            $no = 1;
            $no2 = 1;
            ?>
            @foreach ($soal as $item)
                <option value="{{ $no++ }}">{{ $no2++ }}. {!! $item->soal !!}</option>
            @endforeach
        </select>

        <br>
        <input type="submit" class="btn btn-info" value="Tampilkan Ke Siswa">
        @csrf
    </form>

    <br>
    <hr>
    <?php
    $md5_kunci = md5(date('dmyh'));
    ?>
    <a href='{{ url('/livescore?key=' . $md5_kunci . '') }}' class="btn btn-info">Lihat Nilai Ulangan</a>
    <hr>
    <br>
    <h4>Pemetaan Peserta</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th> Nama
                </th>
                <th>Emosi</th>
                <th>Harapan</th>
                <th>Level</th>
                <th>Kesiapan</th>
                <th>Minat</th>
                <th>Hapus</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($peserta as $item)
                <tr>
                    <td>{{ $item->nama }} <br>
                        <?php
                        $ft = \DB::select('SELECT * FROM `foto` WHERE `nama` LIKE ?', [$item->nama]);
                        $ftx = $ft[0]->file_name;
                        ?>
                        <img src="../../../upload/{{ $ftx }}" class="img-rounded" width="90" height="90">
                    </td>
                    <td>{{ $item->emosi }}</td>
                    <td>{{ $item->harapan }}</td>
                    <td><?php
                    $level = $item->level;
                    if ($level == 1) {
                        $n = 'Mudah';
                    } elseif ($level == 2) {
                        $n = 'Sedang';
                    } elseif ($level == 3) {
                        # code...
                        $n = 'Sangat Sulit';
                    }
                    ?>
                        {{ $n }}
                    </td>
                    <td>
                        {{ $item->kesiapan }}
                    </td>
                    <td>
                        {{ $item->minat }}
                    </td>
                    <td><a href='{{ url('/hapuspeserta') }}/{{ $item->id_data_peserta }}' class="btn btn-danger">Hapus</a>
                    </td>
                </tr>

                <?php
                //simpan ke database minat siswa
                $tgl = date('d-m-Y');

                //cek ada
                $ada = \DB::select('SELECT * FROM `minat_siswa` WHERE `nama` LIKE ? AND `tgl` LIKE ?', [$item->nama, $tgl]);
                $ax = count($ada);

                if ($ax < 1) {
                    \DB::insert('INSERT INTO `minat_siswa` (`id_minat_siswa`, `nama`, `emosi`, `harapan`, `level`, `kesiapan`, `minat`, `tgl`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?);', [$item->nama, $item->emosi, $item->harapan, $item->level, $item->kesiapan, $item->minat, $tgl]);
                }
                ?>
            @endforeach


        </tbody>
    </table>
    <!--
                                                                                <a href="" class="btn btn-info">Simpan Jawaban Siswa</a>
                                                                            -->
@endsection
