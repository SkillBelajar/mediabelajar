<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class awal extends Controller
{
    //
    public function awal()
    {
        return view("awal");
    }

    public function simpanpeserta(Request $request)
    {
        $nama = $request->nama;
        //echo $nama;
        //buat session laravel
        $request->session()->put("nama", $nama);
        //arahkan ke materi / soal
        //cek di database live materi / soal
        $live = DB::select("SELECT * FROM `live` WHERE `id_live` = 1");
        $aksi = $live[0]->aksi;
        $id_materi = $live[0]->id_materi;

        $request->session()->put("aksi", $aksi);
        $request->session()->put("id_materi", $id_materi);

        //  echo "<script>window.location='" . url('/') . "/" . $aksi . "/" . $id_materi . "'</script>";
        return redirect("/mediabelajar");
    }

    public function mediabelajar()
    {
        //echo "ok";
        return view("mediabelajar");
    }
}