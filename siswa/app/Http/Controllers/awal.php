<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

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

        // $request->session()->put("aksi", $aksi);
        // $request->session()->put("id_materi", $id_materi);

        //  echo "<script>window.location='" . url('/') . "/" . $aksi . "/" . $id_materi . "'</script>";
        return redirect("/mediabelajar");
    }

    public function mediabelajar()
    {
        $nama = \Session::get('nama');
        //dd($nama);
        if (empty($nama)) {
            return redirect("/");
        }
        return view("mediabelajar");
    }

    public function simpanessai(Request $request)
    {
        $jawaban  = $request->jawaban;
        //echo $jawaban;
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

        DB::insert("INSERT INTO `peserta` (`id_peserta`, `tanggal_jam`, `nama_peserta`, `id_evaluasi`, `benar`, `jawaban_essai`, `ip`) VALUES (NULL, ?, ?, ?, ?, ?, ?);", [
            $tanggal_jam, $nama, $id_evaluasi, $benar, $jawaban, $ip
        ]);

        return redirect("/mediabelajar");
    }

    public function simpanabc(Request $request)
    {
        $jawaban  = $request->abc;
        // dd($jawaban);
        //echo $jawaban;
        $id_evaluasi = $request->id_evaluasi;
        //echo $id_evaluasi;
        $tanggal_jam = date("d-m-Y H:i:s");
        $nama = \Session::get('nama');
        // echo $nama;
        $jenis_evaluasi  = $request->jenis_soal;
        $kunci = Crypt::decrypt($jenis_evaluasi);
        // echo $jenis_evaluasi;
        //dd($kunci);
        if ($kunci == $jawaban) {
            $benar = "benar";
        } else {
            $benar = "salah";
        }
        //simpan ke jawaban peserta
        // if()
        $ip = $_SERVER['REMOTE_ADDR'];
        // dd($ip);
        //delete data lama
        DB::delete("DELETE FROM `peserta` WHERE `nama_peserta` LIKE ? AND `id_evaluasi` = ?", [
            $nama, $id_evaluasi
        ]);
        DB::insert("INSERT INTO `peserta` (`id_peserta`, `tanggal_jam`, `nama_peserta`, `id_evaluasi`, `benar`, `jawaban_essai`, `ip`) VALUES (NULL, ?, ?, ?, ?, ?, ?);", [
            $tanggal_jam, $nama, $id_evaluasi, $benar, $jawaban, $ip
        ]);

        return redirect("/mediabelajar");
    }
}