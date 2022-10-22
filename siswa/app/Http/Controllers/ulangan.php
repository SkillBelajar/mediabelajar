<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ulangan extends Controller
{
    //
    public function soal()
    {
        $soal = DB::select("SELECT * FROM `evaluasi` INNER JOIN materi on evaluasi.id_materi = materi.id_materi WHERE materi.id_media = 6 and evaluasi.jawaban != 'Essai' ORDER BY `evaluasi`.`id_evaluasi` ASC");
        // dd($soal);

        return view("ulangan", [
            'soal' => $soal
        ]);
    }
}