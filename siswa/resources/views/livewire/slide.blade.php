<div>
    {{-- Success is as dangerous as failure. --}}
    <div wire:poll.30s>
        <?php
        $cek = \DB::select('SELECT * FROM `live` WHERE `id_live` = 1');
        $aksi = $cek[0]->aksi;
        //echo $aksi;
        ?>
        @if ($aksi != 'rencana_pembelajaran')
            <script>
                window.location = '../mediabelajar'
            </script>
        @endif

        <?php
        //cek slide berapa
        $slide = \DB::select('SELECT * FROM `live_rencana` WHERE `id_live_rencana` = 1');
        $slidek = $slide[0]->id_indikator;
        //echo $slidek;
        if ($kode != $slidek) {
            return redirect('/mediabelajar');
        }
        ?>



    </div>
</div>
