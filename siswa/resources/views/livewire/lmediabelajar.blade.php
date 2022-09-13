<div>
    {{-- In work, do what you enjoy. --}}
    <div wire:poll>
        <?php
        $live = \DB::select('SELECT * FROM `live` WHERE `id_live` = 1');
        $aksi = $live[0]->aksi;
        $catatan = $live[0]->live_catatan;
        ?>
        @if ($aksi == 'Materi')
            <div class="alert alert-info">
                {!! $catatan !!}
            </div>
            <object data="/mediabelajar/app/files/1%20Materi%20SMP%20Kelas%207.pdf" type="application/pdf" width="100%"
                height="900px">
                <p>Link Download Materi <a href="myfile.pdf">Download PDF</a></p>
            </object>
        @else
            Ini Soal
        @endif
    </div>

</div>
