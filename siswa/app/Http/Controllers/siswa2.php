<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class siswa2 extends Controller
{
    //
    public function kemampuan()
    {
        //  echo "o";
        $topik = DB::select("SELECT * FROM `live` INNER JOIN materi on live.id_materi = materi.id_materi;");
        $tp = $topik[0]->judul;
        return view("kemampuan", [
            'judul' => $tp
        ]);
    }

    public function skemampuan(Request $request)
    {
        $harapan = $request->harapan;
        $level = $request->level;
        $kesiapan = $request->kesiapan;
        $minat = $request->minat;

        //dd($minat);
        $nama = \Session::get('nama');

        /*
        DB::update("UPDATE `data_peserta` SET `harapan` = ?, `level` = ? , `kesiapan` = ? , `minat` = ? WHERE `data_peserta`.`nama` = ?", [
            $harapan, $level, $nama, $kesiapan, $minat
        ]);
        */

        DB::update("UPDATE `data_peserta` SET `harapan` = ? , `level` = ? , `kesiapan` = ? , `minat` = ?  WHERE `data_peserta`.`nama` = ?", [
            $harapan, $level, $kesiapan, $minat, $nama
        ]);

        return redirect("/mediabelajar");
    }
}