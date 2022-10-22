<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class ulangan extends Controller
{
    //
    public function soal($no)
    {
        $nama = \Session::get('nama');

        $live = DB::select("SELECT * FROM `live` WHERE `id_live` = 1");
        $id_materi = $live[0]->id_materi;
        $aksi = $live[0]->aksi;
        // dd($aksi);
        if ($aksi != "ulangan") {
            echo "<script>window.location='" . url('/rekapnilai') . "'</script>";
        }

        $nomor = $no - 1;
        $soal = DB::select("SELECT * FROM `evaluasi` INNER JOIN materi on evaluasi.id_materi = materi.id_materi WHERE materi.id_media = 6 and evaluasi.jawaban != 'Essai' ORDER BY `evaluasi`.`id_evaluasi` ASC limit ?,1;", [$nomor]);
        // dd($soal);

        $qj = DB::select("SELECT * FROM `evaluasi` INNER JOIN materi on evaluasi.id_materi = materi.id_materi WHERE materi.id_media = 6 and evaluasi.jawaban != 'Essai';");

        $total = count($qj);

        return view("ulangan", [
            'soal' => $soal,
            'total' => $total,
            'nomor' => $no,
            'nama' => $nama
        ]);
    }

    public function soal2($no, Request $request)
    {
        $jawaban = $request->jawaban;
        $key = $request->kunci;

        $kunci = Crypt::decrypt($key);

        if ($jawaban == $kunci) {
            $skor  = 1;
        } else {
            $skor = 0;
        }
        $nama = \Session::get('nama');

        DB::delete("DELETE FROM `ulangan` WHERE `nama` LIKE ? AND `nomor_soal` LIKE ?", [
            $nama, $no
        ]);

        DB::insert("INSERT INTO `ulangan` (`id_ulangan`, `nama`, `nomor_soal`, `skor`) VALUES (NULL, ?, ?, ?);", [
            $nama, $no, $skor
        ]);
        $no2 = $no + 1;

        $total = $request->total;
        // dd($total);
        if ($total >= $no2) {
            echo "<script>window.location='" . url('/ulangan') . "/" . $no2  . "'</script>";
        } else {
            echo "<script>window.location='" . url('/ulangan') . "/1'</script>";
        }
    }
}