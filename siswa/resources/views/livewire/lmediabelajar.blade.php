<div>
    {{-- In work, do what you enjoy. --}}
    <!--
    <div wire:poll.13s>
    -->
    <!--
    <div class="alert alert info">
        <?php
        $nama = \Session::get('nama');
        // echo $nama;
        ?>
        {{ $nama }}
    </div>
-->
    <div wire:poll.30s>


        <?php
        /*
                                                                                                        // $kode = response()->json();
                                                                                                        //dd($kode);
                                                                                                        $respon = http_response_code();
                                                                                                        // echo $respon;
                                                                                                        //dd($respon);

                                                                                                        if ($respon != '200') {
                                                                                                            echo 'no';
                                                                                                        }
                                                                                                        */
        ?>




        <?php
        /*
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        //lakukan cek refresh halaman
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        $ref = \DB::select('SELECT * FROM `slide` WHERE `id_slide` = 1');
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        $status_ref = $ref[0]->refresh;

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        //ambil halaman slide
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        $slide_ke = $ref[0]->slide;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        */
        $status_ref = 0;
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
            <object data="/mediabelajar/app/files/{{ $pdf }}#page=1" type="application/pdf"
                style="min-height:100vh;width:100%">
                <p>Link Download Materi <a href="/mediabelajar/app/files/{{ $pdf }}#page=1">Download PDF</a></p>
            </object>
        @elseif ($aksi == 'ulangan')
            <script>
                window.location = 'ulangan/1'
            </script>
        @elseif ($aksi == 'random')
            <script>
                window.location = 'terpilih'
            </script>
        @elseif ($aksi == 'reset')
            <script>
                window.location = 'reset'
            </script>
        @elseif ($aksi == 'refleksi')
            <script>
                window.location = 'emosi30'
            </script>
        @elseif ($aksi == 'rencana_pembelajaran')
            <hr>
            <!--
            <div class="container">
                <div class="jumbotron">
                    <h1>Bootstrap Tutorial</h1>

                </div>

            </div>
        -->
            <?php
            //cek slide
            $sl = \DB::select('SELECT * FROM `live_rencana` WHERE `id_live_rencana` = 1');
            $id_indikator = $sl[0]->id_indikator;
            ?>
            <?php
            return redirect('rencana_pembelajaran/' . $id_indikator . '');
            ?>
        @elseif($aksi == 'Soal')
            <!--
            <div class="alert alert-info">
                Sisa Waktu :
                <?php
                $batas = $waktu;
                $sisa = $batas - 2;
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
        -->

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
                            </a>
                        @endforeach
                    </div>
                </div>
            @elseif($jenis_soal == 'Ganda_Komplek')
                Berikut adalah Soal Ganda Komplek, jawabanya bisa lebih dari Satu <br>
                <form method="POST" action="{{ url('/gandakomplek') }}">
                    <div class="checkbox">
                        <label><input type="checkbox" value="A" name="jb[]">A</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="B" name="jb[]">B</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="C" name="jb[]">C</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="D" name="jb[]">D</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="E" name="jb[]">E</label>
                    </div>
                    @csrf
                    <input type="hidden" value="{{ $id_evaluasi }}" name="id_evaluasi">
                    <input type="submit" class="btn btn-info" value="Simpan Jawaban">
                </form>
                <hr>
                <h4>Yang Sudah Menjawab</h4>
                <?php
                $jb = \DB::select('SELECT * FROM `peserta` WHERE `id_evaluasi` = ? ORDER BY `peserta`.`id_peserta` ASC', [$id_evaluasi]);
                // dd($jb);
                ?>
                <div class="list-group">
                    @foreach ($jb as $item)
                        <a href="#" class="list-group-item"> {{ $item->nama_peserta }}
                        </a>
                    @endforeach
                </div>
            @elseif($jenis_soal == 'Menjodohkan')
                <b>Silahkan anda Jodohkan Jawaban Dari Soal di atas</b><br><br>
                <form method="POST" action="{{ url('/menjodohkan') }}">
                    <label>Soal 1</label>
                    <select name="soal1" required>
                        <option value="">==Pilih Jawaban==</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="F">F</option>
                        <option value="G">G</option>
                        <option value="H">H</option>
                        <option value="I">I</option>
                        <option value="J">J</option>
                    </select>
                    <br>
                    <label>Soal 2</label>
                    <select name="soal2" required>
                        <option value="">==Pilih Jawaban==</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="F">F</option>
                        <option value="G">G</option>
                        <option value="H">H</option>
                        <option value="I">I</option>
                        <option value="J">J</option>
                    </select>
                    <br>
                    <label>Soal 3</label>
                    <select name="soal3" required>
                        <option value="">==Pilih Jawaban==</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="F">F</option>
                        <option value="G">G</option>
                        <option value="H">H</option>
                        <option value="I">I</option>
                        <option value="J">J</option>
                    </select>
                    <br>
                    <label>Soal 4</label>
                    <select name="soal4" required>
                        <option value="">==Pilih Jawaban==</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="F">F</option>
                        <option value="G">G</option>
                        <option value="H">H</option>
                        <option value="I">I</option>
                        <option value="J">J</option>
                    </select>

                    <br>
                    <label>Soal 5</label>
                    <select name="soal5" required>
                        <option value="">==Pilih Jawaban==</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="F">F</option>
                        <option value="G">G</option>
                        <option value="H">H</option>
                        <option value="I">I</option>
                        <option value="J">J</option>
                    </select>


                    @csrf
                    <br>

                    <input type="hidden" value="{{ $id_evaluasi }}" name="id_evaluasi">
                    <input type="submit" class="btn btn-info" value="Simpan Jawaban">

                </form>

                <hr>
                <h4>Yang Sudah Menjawab</h4>
                <?php
                $jb = \DB::select('SELECT * FROM `peserta` WHERE `id_evaluasi` = ? ORDER BY `peserta`.`id_peserta` ASC', [$id_evaluasi]);
                // dd($jb);
                ?>
                <div class="list-group">
                    @foreach ($jb as $item)
                        <a href="#" class="list-group-item"> {{ $item->nama_peserta }}
                        </a>
                    @endforeach
                </div>
                <br>
                <br>
                <br>
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
                        <a href="#" class="list-group-item"> {{ $item->nama_peserta }}
                        </a>
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
                                {!! $item->jawaban_essai !!} Benar </a>
                        @elseif($item->benar == '-')
                            <a href="#" class="list-group-item"> {{ $item->nama_peserta }} -->
                                {!! $item->jawaban_essai !!} </a>
                        @else
                            <a href="#" class="list-group-item list-group-item-danger">
                                {{ $item->nama_peserta }}
                                -->
                                {!! $item->jawaban_essai !!} Salah </a>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
    </div>

</div>
