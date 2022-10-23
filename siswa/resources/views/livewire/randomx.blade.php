<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <br>


    <div wire:poll>
        <?php
        $peserta = \DB::select("SELECT * FROM `data_peserta`
                                                                                ORDER BY rand() limit 1;");
        $ps = $peserta[0]->nama;
        ?>


        <div class="jumbotron text-center">
            <p>Siapa yang akan terpilih ?</p>
            <h1>{{ $ps }}</h1>

        </div>


    </div>



</div>
