<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div wire:poll>
        <h1>Live Score Nilai Siswa</h1>
        <hr>
        <?php
        $live = \DB::select('SELECT * FROM `skor_ulangan` ORDER BY `skor_ulangan`.`skor` DESC');

        ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Skor</th>
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
                        <td>{{ $item->skor }}</td>
                    </tr>
                @endforeach


            </tbody>
        </table>

    </div>
</div>
