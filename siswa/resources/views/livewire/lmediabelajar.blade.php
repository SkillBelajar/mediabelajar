<div>
    {{-- In work, do what you enjoy. --}}
    <div wire:poll>
        <?php
        $live = \DB::select('SELECT * FROM `live` WHERE `id_live` = 1');
        $aksi = $live[0]->aksi;
        $catatan = $live[0]->live_catatan;
        $id_materi = $live[0]->id_materi;
        ?>
        @if ($aksi == 'Materi')
            <div class="alert alert-info">
                {!! $catatan !!}
            </div>
            <?php
            //$mt = \DB::select('SELECT * FROM `materi` WHERE `id_media` = 2 ORDER BY `materi`.`id_materi` DESC', [1]);
            $mt = \DB::select('SELECT * FROM `materi` WHERE `id_materi` = ?', [$id_materi]);
            $pdf = $mt['0']->pdf;
            ?>
            <object data="/mediabelajar/app/files/{{ $pdf }}#page=1" type="application/pdf" width="100%"
                height="900px">
                <p>Link Download Materi <a href="myfile.pdf">Download PDF</a></p>
            </object>
        @elseif($aksi == 'Soal')
            <?php
            //ambil data soal evaluasi
            $soal = \DB::select('SELECT * FROM `evaluasi` WHERE `id_materi` = ? ORDER BY `evaluasi`.`id_evaluasi` DESC', [$id_materi]);
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
                    @foreach ($jb as $item)
                        <div class="alert alert-info">
                            {{ $item->nama_peserta }}
                            Menjawab : <br>
                            {{ $item->jawaban_essai }}
                        </div>
                    @endforeach
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
                <div class="well">
                    <h4>Yang Sudah Menjawab</h4>
                    <?php
                    $jb = \DB::select('SELECT * FROM `peserta` WHERE `id_evaluasi` = ? ORDER BY `peserta`.`id_peserta` ASC', [$id_evaluasi]);
                    // dd($jb);
                    ?>
                    @foreach ($jb as $item)
                        <div class="alert alert-info">
                            {{ $item->nama_peserta }}
                            Menjawab : <br>
                            {{ $item->jawaban_essai }}
                        </div>
                    @endforeach
                </div>

            @endif
        @elseif($aksi == 'tampilkan_jawaban')
            <div class="well">
                <h4>Yang Sudah Menjawab</h4>
                <?php
                //ambil IDMateri
                $materi = \DB::select('SELECT * FROM `evaluasi` WHERE `id_materi` = ? ORDER BY `evaluasi`.`id_evaluasi` DESC', [$id_materi]);
                $id_ev = $materi[0]->id_evaluasi;
                $soal = $materi[0]->soal;
                //dd($id_evaluasi);
                $jb = \DB::select('SELECT * FROM `peserta` WHERE `id_evaluasi` = ? ORDER BY `peserta`.`id_peserta` ASC', [$id_ev]);
                // dd($jb);
                ?>
                Soal : <br>
                {!! $soal !!}
                <hr>
                @foreach ($jb as $item)
                    @if ($item->benar == 'benar')
                        <div class="alert alert-info">
                            {{ $item->nama_peserta }}
                            Menjawab : <br>
                            {{ $item->jawaban_essai }}
                        </div>
                    @elseif($item->benar == '-')
                        <div class="alert alert-info">
                            {{ $item->nama_peserta }}
                            Menjawab : <br>
                            {{ $item->jawaban_essai }}
                        </div>
                    @else
                        <div class="alert alert-danger">
                            {{ $item->nama_peserta }}
                            Menjawab : <br>
                            {{ $item->jawaban_essai }}
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    </div>

</div>
