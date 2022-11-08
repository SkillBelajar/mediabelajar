<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div wire:poll.30s>
        <?php
        $cek = \DB::select('SELECT * FROM `live` WHERE `id_live` = 1');
        $aksi = $cek[0]->aksi;
        //echo $aksi;
        ?>
        @if ($aksi != 'random')
            <script>
                window.location = '/mediabelajar'
            </script>
        @endif



    </div>
</div>
