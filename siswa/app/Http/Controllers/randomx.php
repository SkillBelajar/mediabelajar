<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class randomx extends Controller
{
    //
    public function random()
    {
        //echo "ok";

        return view("random");
    }

    public function terpilih()
    {
        $peserta  = DB::select("SELECT * FROM `terpilih` WHERE `id_terpilih` = 1");
        // echo "ok";
        $nama = $peserta[0]->nama;
        //dd($nama);
        $data_peserta = DB::select("SELECT * FROM `data_peserta` WHERE `nama` LIKE ? limit 1;", [$nama]);
        $emosi = $data_peserta[0]->emosi;

        //update live jadi materi
        //  DB::update("UPDATE `live` SET `aksi` = 'Materi' WHERE `live`.`id_live` = 1;");

        //ambil foto peserta
        $foto = DB::select("SELECT * FROM `foto` WHERE `nama` LIKE ? ORDER BY `foto`.`id_foto` DESC limit 1", [$nama]);
        $ft = $foto[0]->file_name;
        // dd($ft);
        //dd($ft);


        return view("terpilih", [
            'nama' => $nama,
            'emosi' => $emosi,
            'foto' => $ft
        ]);
    }
}