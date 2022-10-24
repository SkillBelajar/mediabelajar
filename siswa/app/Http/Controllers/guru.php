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


        $pesertaada = DB::select("SELECT * FROM `data_peserta` ORDER BY `data_peserta`.`level` ASC");
        // dd($pesertaada);

        return view("live", [
            'aksi' => $aksi2,
            'id_materi' => $id_materi,
            'nomor_soal' => $nomor_soal,
            'soal' => $soal,
            'judul' => $judul,
            'peserta' => $pesertaada

        ]);
    }

    public function simpan_livex(Request $request, $id)
    {
        //hapus semua peserta
        DB::table('peserta')->truncate();
        DB::table('skor_ulangan')->truncate();
        DB::table('ulangan')->truncate();
        DB::table('data_peserta')->truncate();
        $aksi = $request->aksi;
        //edit materi
        /*
        //if aksi random
        $pesertax = DB::select("SELECT * FROM `data_peserta` ORDER BY rand() limit 1;");
        $nama_peserta = $pesertax[0]->nama;
        // dd($nama_peserta);
        DB::update("UPDATE `terpilih` SET `nama` = ?  WHERE `terpilih`.`id_terpilih` = 1;", [$nama_peserta]);
        //
        */
        // DB::update("UPDATE `live` SET `id_materi` = ?  WHERE `live`.`id_live` = 1;", [$aksi]);
        DB::update("UPDATE `live` SET `aksi` = 'Materi', `id_materi` = ? WHERE `live`.`id_live` = 1;", [$aksi]);
        //tambah peserta acak
        DB::insert("INSERT INTO `data_peserta` (`id_data_peserta`, `nama`, `emosi`, `harapan`, `level`) VALUES (NULL, 'user', 'user', 'user', '1');");

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
        error_reporting(0);



        $pesertax = DB::select("SELECT * FROM `data_peserta` ORDER BY rand() limit 1;");
        $nama_peserta = $pesertax[0]->nama;
        // dd($nama_peserta);
        DB::update("UPDATE `terpilih` SET `nama` = ?  WHERE `terpilih`.`id_terpilih` = 1;", [$nama_peserta]);
        //


        $aksi = $request->aksi;
        $soal = $request->soal;
        DB::update("UPDATE `live` SET `aksi` = ?, `nomor_soal` = ?, `waktu_soal` = '999999999' WHERE `live`.`id_live` = 1;", [
            $aksi, $soal
        ]);

        //dd($aksi);

        echo "<script>window.location='" . url('/materilive') . "/" . $id . "'</script>";
    }
}