<div>
    {{-- In work, do what you enjoy. --}}
    <div wire:poll.3s>
        <?php
        //lakukan cek refresh halaman
        $ref = \DB::select('SELECT * FROM `slide` WHERE `id_slide` = 1');
        $status_ref = $ref[0]->refresh;

        //ambil halaman slide
        $slide_ke = $ref[0]->slide;

        ?>
        @if ($status_ref == 1)
            <script>
                location.reload()
            </script>
            <?php
            sleep(3);
            //ganti status menjadi 0
            \DB::update("UPDATE `slide` SET `refresh` = '0' WHERE `slide`.`id_slide` = 1;");
            ?>
        @endif

        <?php
        $live = \DB::select('SELECT * FROM `live` WHERE `id_live` = 1');
        $aksi = $live[0]->aksi;
        $catatan = $live[0]->live_catatan;
        $id_materi = $live[0]->id_materi;
        $no_soal = $live[0]->nomor_soal - 1;
        $waktu = $live[0]->waktu_soal;
        ?>
        @if ($aksi == 'Materi')
            <!--
            <div class="alert alert-info">
                {!! $catatan !!}
            </div>
        -->
            <?php
            //$mt = \DB::select('SELECT * FROM `materi` WHERE `id_media` = 2 ORDER BY `materi`.`id_materi` DESC', [1]);
            $mt = \DB::select('SELECT * FROM `materi` WHERE `id_materi` = ?', [$id_materi]);
            $pdf = $mt['0']->pdf;
            ?>
            <object data="/mediabelajar/app/files/{{ $pdf }}#page={{ $slide_ke }}" type="application/pdf"
                style="min-height:100vh;width:100%">
                <p>Link Download Materi <a href="/mediabelajar/app/files/{{ $pdf }}#page=1">Download PDF</a></p>
            </object>
        @elseif($aksi == 'Soal')
            <div class="alert alert-info">
                Sisa Waktu :
                <?php
                $batas = $waktu;
                $sisa = $batas - 3;
                //update db
                \DB::update('UPDATE `live` SET `waktu_soal` = ? WHERE `live`.`id_live` = 1;', [$sisa]);
                $waktu_baru = \DB::select('SELECT * FROM `live` WHERE `id_live` = 1');
                $waktu_barux = $waktu_baru[0]->waktu_soal;

                //buat logika  jika waktu dibawah 0 , status live jadi soal
                if ($waktu_barux < 1) {
                    \DB::update("UPDATE `live` SET `aksi` = 'tampilkan_jawaban', `waktu_soal` = '60' WHERE `live`.`id_live` = 1;");
                    //ganti juga waltu
                }
                ?>
                {{ $waktu_barux }} Detik
            </div>

            <?php
            //ambil data soal evaluasi
            $soal = \DB::select('SELECT * FROM `evaluasi` WHERE `id_materi` = ? ORDER BY `evaluasi`.`id_evaluasi` ASC limit ?,1;', [$id_materi, $no_soal]);
            //  dd($soal);
            $soal_keluar = $soal[0]->soal;
            $jenis_soal = $soal[0]->jawaban;
            $id_evaluasi = $soal[0]->id_evaluasi;
            $kunci = $soal[0]->jawaban;
            /*
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        if ($jenis_soal == 'Essai') {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            $jenis = $jen
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            */
            ?>
            <h3>Soal : </h3>
            {!! $soal_keluar !!}

            <hr>
            <h4>Jawaban Anda</h4>
            @if ($jenis_soal == 'Essai')
                <form method="post" action="simpanessai">
                    @csrf
                    <textarea name="jawaban" class="form-control"></textarea>
                    <input type="hidden" value="{{ $id_evaluasi }}" name="id_evaluasi">
                    <input type="hidden" value="{{ $jenis_soal }}" name="jenis_soal">
                    <input type="submit" class="btn btn-info" value="Simpan Jawaban">
                </form>

                <hr>
                <div class="well">
                    <h4>Yang Sudah Menjawab</h4>
                    <?php
                    $jb = \DB::select('SELECT * FROM `peserta` WHERE `id_evaluasi` = ? ORDER BY `peserta`.`id_peserta` ASC', [$id_evaluasi]);
                    // dd($jb);
                    ?>

                    <div class="list-group">
                        @foreach ($jb as $item)
                            <a href="#" class="list-group-item"> {{ $item->nama_peserta }} -->
                                {{ $item->jawaban_essai }} </a>
                        @endforeach
                    </div>
                </div>
            @else
                <form method="post" action="simpanabc">
                    @csrf
                    <select name="abc" required>
                        <option value="">==Pilih Jawaban==</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                    </select>
                    <br>
                    <br>
                    <input type="hidden" value="{{ $id_evaluasi }}" name="id_evaluasi">
                    <input type="hidden" value="{{ \Crypt::encrypt($kunci) }}" name="jenis_soal">

                    <input type="submit" class="btn btn-info" value="Simpan Jawaban">
                </form>
                <br>

                <h4>Yang Sudah Menjawab</h4>
                <?php
                $jb = \DB::select('SELECT * FROM `peserta` WHERE `id_evaluasi` = ? ORDER BY `peserta`.`id_peserta` ASC', [$id_evaluasi]);
                // dd($jb);
                ?>
                <div class="list-group">
                    @foreach ($jb as $item)
                        <a href="#" class="list-group-item"> {{ $item->nama_peserta }} -->
                            {{ $item->jawaban_essai }} </a>
                    @endforeach
                </div>


            @endif
        @elseif($aksi == 'tampilkan_jawaban')
            <div class="well">
                <h4>Yang Sudah Menjawab</h4>
                <?php
                //ambil IDMateri
                $materi = \DB::select('SELECT * FROM `evaluasi` WHERE `id_materi` = ? ORDER BY `evaluasi`.`id_evaluasi` ASC limit ?,1;', [$id_materi, $no_soal]);
                $id_ev = $materi[0]->id_evaluasi;
                $soal = $materi[0]->soal;
                //dd($id_evaluasi);
                $jb = \DB::select('SELECT * FROM `peserta` WHERE `id_evaluasi` = ? ORDER BY `peserta`.`id_peserta` ASC', [$id_ev]);
                // dd($jb);
                ?>
                Soal : <br>
                {!! $soal !!}
                <hr>
                <div class="list-group">
                    @foreach ($jb as $item)
                        @if ($item->benar == 'benar')
                            <a href="#" class="list-group-item"> {{ $item->nama_peserta }} -->
                                {{ $item->jawaban_essai }} Benar </a>
                        @elseif($item->benar == '-')
                            <a href="#" class="list-group-item"> {{ $item->nama_peserta }} -->
                                {{ $item->jawaban_essai }} </a>
                        @else
                            <a href="#" class="list-group-item list-group-item-danger"> {{ $item->nama_peserta }}
                                -->
                                {{ $item->jawaban_essai }} Salah </a>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
    </div>

</div>
