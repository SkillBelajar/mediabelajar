<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class guru extends Controller
{
    //
    public function gurulive()
    {
        $rand = md5(date("dmyh"));

        echo "<script>window.location='" . url('/livex') . "/" . $rand . "'</script>";
    }

    public function livex($id)
    {
        $rand = md5(date("dmyh"));
        if ($rand == $id) {
            // $live = DB::select("SELECT * FROM `live` WHERE `id_live` = 1");
            $materi = DB::select("SELECT * FROM `materi` ORDER BY `materi`.`id_materi` DESC");
            return view("gurulive", [
                //'live' => $live
                'materi' => $materi
            ]);
        }
    }


    public function materilive($id)
    {
        $live = DB::select("SELECT * FROM `live` WHERE `id_live` = 1");
        $id_materi = $live[0]->id_materi;
        $nomor_soal = $live[0]->nomor_soal;
        $aksi2 = $live[0]->aksi;

        $soal = DB::select("SELECT * FROM `evaluasi` WHERE `id_materi` = ? ORDER BY `evaluasi`.`id_evaluasi` ASC", [$id_materi]);

        $materix = DB::select("SELECT * FROM `materi` WHERE `id_materi` = ?", [$id_materi]);
        $judul = $materix[0]->judul;

        return view("live", [
            'aksi' => $aksi2,
            'id_materi' => $id_materi,
            'nomor_soal' => $nomor_soal,
            'soal' => $soal,
            'judul' => $judul

        ]);
    }

    public function simpan_livex(Request $request, $id)
    {

        $aksi = $request->aksi;
        //edit materi
        DB::update("UPDATE `live` SET `id_materi` = ?  WHERE `live`.`id_live` = 1;", [$aksi]);

        echo "<script>window.location='" . url('/materilive') . "/" . $id . "'</script>";
        /*
        $live = DB::select("SELECT * FROM `live` WHERE `id_live` = 1");
        $id_materi = $live[0]->id_materi;
        $nomor_soal = $live[0]->nomor_soal;
        $aksi2 = $live[0]->aksi;

        $soal = DB::select("SELECT * FROM `evaluasi` WHERE `id_materi` = ? ORDER BY `evaluasi`.`id_evaluasi` ASC", [$id_materi]);

        return view("live", [
            'aksi' => $aksi2,
            'id_materi' => $id_materi,
            'nomor_soal' => $nomor_soal,
            'soal' => $soal

        ]);
        */
    }

    public function simpan_materilive(Request $request, $id)
    {
        $aksi = $request->aksi;
        $soal = $request->soal;
        DB::update("UPDATE `live` SET `aksi` = ?, `nomor_soal` = ?, `waktu_soal` = '999999999' WHERE `live`.`id_live` = 1;", [
            $aksi, $soal
        ]);
        echo "<script>window.location='" . url('/materilive') . "/" . $id . "'</script>";
    }
}