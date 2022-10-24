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

        $media = DB::select("SELECT * FROM `materi` WHERE `id_materi` = ?;", [$id_materi]);
        $id_media = $media[0]->id_media;
        // dd($id_media);


        //dd($id_materi);
        $aksi = $live[0]->aksi;
        // dd($aksi);
        $md5_kunci = md5(date("dmyh"));
        // dd($md5_kunci);
        if ($aksi != "ulangan") {
            echo "<script>window.location='" . url('/livescore?key=' . $md5_kunci . '') . "'</script>";
        }

        $nomor = $no - 1;
        $soal = DB::select("SELECT * FROM `evaluasi` INNER JOIN materi on evaluasi.id_materi = materi.id_materi WHERE materi.id_media = ? and evaluasi.jawaban != 'Essai' ORDER BY `evaluasi`.`id_evaluasi` ASC limit ?,1;", [$id_media, $nomor]);
        // dd($soal);

        $qj = DB::select("SELECT * FROM `evaluasi` INNER JOIN materi on evaluasi.id_materi = materi.id_materi WHERE materi.id_media = ? and evaluasi.jawaban != 'Essai';", [$id_media]);

        $total = count($qj);

        //tambahkan ke skor
        //cek sudah ada apa belum
        $ada_skor = DB::select("SELECT * FROM `skor_ulangan` WHERE `nama` LIKE ?", [$nama]);
        $tas = count($ada_skor);
        if ($tas < 1) {
            DB::insert("INSERT INTO `skor_ulangan` (`id_skor_ulangan`, `nama`, `skor`) VALUES (NULL, ?, '0');", [$nama]);
        }
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

        DB::insert("INSERT INTO `ulangan` (`id_ulangan`, `nama`, `nomor_soal`, `skor` , `jawaban`) VALUES (NULL, ?, ?, ? ,?);", [
            $nama, $no, $skor, $jawaban
        ]);
        $no2 = $no + 1;

        $total = $request->total;

        //update skor siswa
        //ambil nilai lama
        /*
        $nilai_lama = DB::select("SELECT * FROM `skor_ulangan` WHERE `nama` LIKE ?", [$nama]);
        //dd($nilai_lama);
        $nilai_lamax = $nilai_lama[0]->skor;
       // $nilai_baru = $nilai_lamax + $skor;

        //  dd($nilai_baru);
        //edit skor
  */
        $skor_total = DB::select("SELECT sum(skor) as total_nilai FROM `ulangan` WHERE `nama` LIKE ?;", [$nama]);
        $tst = $skor_total[0]->total_nilai;
        //dd($tst);
        DB::update("UPDATE `skor_ulangan` SET `skor` = ? WHERE nama = ?;", [
            $tst, $nama
        ]);


        // dd($total);
        if ($total >= $no2) {
            echo "<script>window.location='" . url('/ulangan') . "/" . $no2  . "'</script>";
        } else {
            echo "<script>window.location='" . url('/ulangan') . "/1'</script>";
        }
    }

    public function livescore()
    {
        // echo "o";
        $live = DB::select("SELECT * FROM `live` WHERE `id_live` = 1");
        $id_materi = $live[0]->id_materi;

        $media = DB::select("SELECT * FROM `materi` WHERE `id_materi` = ?;", [$id_materi]);
        $id_media = $media[0]->id_media;


        $qj = DB::select("SELECT * FROM `evaluasi` INNER JOIN materi on evaluasi.id_materi = materi.id_materi WHERE materi.id_media = ? and evaluasi.jawaban != 'Essai';", [$id_media]);

        $total = count($qj);
        //dd($total);

        $md5_kunci = md5(date("dmyh"));
        $key =  $_GET["key"];
        if ($key == $md5_kunci) {
            return view("livescore", [
                'total' => $total
            ]);
        }
    }
}