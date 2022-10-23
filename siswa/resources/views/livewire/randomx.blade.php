<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <br>


    <div wire:poll>
        <?php
        $peserta = \DB::select("SELECT * FROM `data_peserta`
                                                                                                                                                                                        ORDER BY rand() limit 1;");
        $ps = $peserta[0]->nama;
        $emosi = $peserta[0]->emosi;

        $harapan = $peserta[0]->harapan;
        $level = $peserta[0]->level;

        if ($emosi == 'senyum') {
            $g = 1;
        } elseif ($emosi == 'malu') {
            $g = 2;
        } elseif ($emosi == 'nangis') {
            $g = 3;
        } elseif ($emosi == 'ketawan') {
            $g = 4;
        } elseif ($emosi == 'sedih') {
            $g = 5;
        } elseif ($emosi == 'marah') {
            $g = 6;
        } else {
            $g = 1;
        }

        if ($level == 1) {
            $l = 'Mudah';
        } elseif ($level == 2) {
            $l = 'Sedang';
        } elseif ($level == 3) {
            $l = 'Sangat Sulit';
        }

        ?>


        <div class="jumbotron text-center">
            <p>Siapa yang akan terpilih ?</p>

            <h1>{{ $ps }}</h1>

            <img src="{{ url('/emosi/' . $g . '.png') }}" class="img-rounded" width="130" height="130">

            <br>
            <hr>
            <b>{{ $l }}</b><br>
            {{ $harapan }} <br>


        </div>


    </div>



</div>
