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
            <object data="/mediabelajar/app/files/1%20Materi%20SMP%20Kelas%207.pdf" type="application/pdf" width="100%"
                height="900px">
                <p>Link Download Materi <a href="myfile.pdf">Download PDF</a></p>
            </object>
        @elseif($aksi == 'Soal')
            <?php
            //ambil data soal evaluasi
            $soal = \DB::select('SELECT * FROM `evaluasi` WHERE `id_materi` = ?', [$id_materi]);
            //  dd($soal);
            $soal_keluar = $soal[0]->soal;
            $jenis_soal = $soal[0]->jawaban;
            $id_evaluasi = $soal[0]->id_evaluasi;
            /*
                                                                                                                                                                                                                                                                                                                                                                                                                                    if ($jenis_soal == 'Essai') {
                                                                                                                                                                                                                                                                                                                                                                                                                                        $jenis = $jen
                                                                                                                                                                                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                                                                                                                                                                                    */
            ?>
            <h3>Soal : </h3>
            {!! $soal_keluar !!}

            <hr>
            <h4>Jawaban Anda</h4>
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
        @elseif($aksi == 'tampilkan_jawaban')
            tampilkan jawaan
        @endif
    </div>

</div>
