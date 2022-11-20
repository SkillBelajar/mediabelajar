<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class jawabansoal2 extends Controller
{
    //
    public function gandakomplek(Request $request)
    {
        $jb  = $request->jb;

        $id_evaluasi = $request->id_evaluasi;
        //echo $id_evaluasi;
        $tanggal_jam = date("d-m-Y H:i:s");
        $nama = \Session::get('nama');
        // echo $nama;
        $jenis_evaluasi  = $request->jenis_soal;
        // echo $jenis_evaluasi;
        if ($jenis_evaluasi == "Essai") {
            $benar = "-";
        }
        //simpan ke jawaban peserta
        // if()
        $ip = $_SERVER['REMOTE_ADDR'];
        // dd($ip);
        DB::delete("DELETE FROM `peserta` WHERE `nama_peserta` LIKE ? AND `id_evaluasi` = ?", [
            $nama, $id_evaluasi
        ]);

        foreach ($jb as $item) {
            //echo $item;
            $jbx[] = $item;
        }

        $jawaban = implode($jbx);

        // dd($jawaban);
        $benar = "-";

        DB::insert("INSERT INTO `peserta` (`id_peserta`, `tanggal_jam`, `nama_peserta`, `id_evaluasi`, `benar`, `jawaban_essai`, `ip`) VALUES (NULL, ?, ?, ?, ?, ?, ?);", [
            $tanggal_jam, $nama, $id_evaluasi, $benar, $jawaban, $ip
        ]);

        return redirect("/mediabelajar");
    }
}