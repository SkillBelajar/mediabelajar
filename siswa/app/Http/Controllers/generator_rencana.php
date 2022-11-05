<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class generator_rencana extends Controller
{
    //
    public function generator_rpp()
    {
        $materi = DB::select("SELECT * FROM `materi` ORDER BY `materi`.`id_materi` DESC");

        return view("generator_rpp", [
            'materi' => $materi
        ]);
    }

    public function mulai_generator_rpp(Request $request)
    {
        $materi = $request->materi;
        //echo $materi;

        //ambil indikator
        //hapus materi sebelumnya
        DB::delete("DELETE  FROM `rencana_pembelajaran` WHERE `id_materi` = ?", [$materi]);
        $indikator = DB::select("SELECT * FROM `indikator_rencana_belajar` ORDER BY `indikator_rencana_belajar`.`id_indikator` ASC");
        foreach ($indikator as $item) {
            $id_indikator = $item->id_indikator;
            //echo $id_indikator;
            //ambil dari genrator rencana
            $gn = DB::select("SELECT * FROM `generator_rencana` WHERE `id_indikator_rencana` = ? ORDER BY rand() limit 1;", [$id_indikator]);
            $judul = $gn[0]->judul;
            $isi = $gn[0]->isi;


            DB::insert("INSERT INTO `rencana_pembelajaran` (`id_rencana_pembelajaran`, `id_indikator`, `id_materi`, `kegiatan`, `waktu`, `tampilkan`, `judul`) VALUES (NULL, ?, ?, ?, ?, ?, ?);", [
                $id_indikator, $materi, $isi, 3, 0, $judul
            ]);
        }
        return redirect("/generator_rpp");
    }
}