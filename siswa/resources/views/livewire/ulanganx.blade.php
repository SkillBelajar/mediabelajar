<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div wire:poll.30s>
        <h1>Live Score Nilai Siswa</h1>
        <hr>
        <?php
        // echo "o";
        $live = DB::select('SELECT * FROM `live` WHERE `id_live` = 1');
        $id_materi = $live[0]->id_materi;

        $media = DB::select('SELECT * FROM `materi` WHERE `id_materi` = ?;', [$id_materi]);
        $id_media = $media[0]->id_media;

        $qj = DB::select("SELECT * FROM `evaluasi` INNER JOIN materi on evaluasi.id_materi = materi.id_materi WHERE materi.id_media = ? and evaluasi.jawaban != 'Essai';", [$id_media]);

        $total = count($qj);
        $live = \DB::select('SELECT * FROM `skor_ulangan` ORDER BY `skor_ulangan`.`skor` DESC');

        ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                ?>
                @foreach ($live as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ number_format(($item->skor * 100) / $total, 2) }}</td>
                    </tr>
                    <?php
                    $tgl = date('d-m-Y');
                    \DB::delete('DELETE FROM `history_ulangan` WHERE `media` LIKE ? AND `nama` LIKE ? AND `tanggal` LIKE ?', [$id_media, $item->nama, $tgl]);
                    //hapus data lama

                    $nilai = number_format(($item->skor * 100) / $total, 2);
                    \DB::insert('INSERT INTO `history_ulangan` (`id_history_ulangan`, `media`, `nama`, `nilai`, `tanggal`) VALUES (NULL, ?, ?, ?, ?);', [$id_media, $item->nama, $nilai, $tgl]);
                    ?>
                @endforeach


            </tbody>
        </table>

    </div>
</div>
