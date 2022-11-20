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
        //$kesiapan = $request->kesiapan;
        //$minat = $request->minat;

        // $level = "1";
        $kesiapan = "";
        $minat = "";
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

        //echo "<script>alert('')</script>";

        return redirect("/terimakasih");
    }

    public function terimakasih()
    {
        $nama = \Session::get('nama');

        $kata_mutiara = DB::select("SELECT * FROM `katamutiara` ORDER BY rand() limit 1;");
        $text = $kata_mutiara[0]->kata;
        return view("terimakasih", [
            'nama' => $nama,
            'kata' => $text
        ]);
    }

    public function reset(Request $request)
    {
        // echo "ok";
        $request->session()->forget('nama');
        return redirect("/");
    }
}