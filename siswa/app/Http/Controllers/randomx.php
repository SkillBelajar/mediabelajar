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

        return view("terpilih", [
            'nama' => $nama
        ]);
    }
}