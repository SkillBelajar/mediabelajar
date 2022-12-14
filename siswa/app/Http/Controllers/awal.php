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
        $nama = \Session::get('nama');
        if (empty($nama)) {
            $siswa = DB::select("SELECT * FROM `siswa` ORDER BY `siswa`.`kelas` ASC");
            return view("awal", [
                'siswa' => $siswa
            ]);
        } else {
            // echo "ok";
            return redirect("/mediabelajar");
        }
    }

    public function simpanpeserta(Request $request)
    {

        $id_baru = $_GET["id"] . ".png";
        // dd($id_baru);

        $nama1 = $request->nama1;
        $nama2 = $request->nama2;

        $nama = $nama1 . " - " . $nama2;
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

        // DB::insert("INSERT INTO `data_peserta` (`id_data_peserta`, `nama`, `emosi` , `harapan` , `level`) VALUES (NULL, ? ,  '-' ,'-',1);", [$nama]);
        DB::insert("INSERT INTO `data_peserta` (`id_data_peserta`, `nama`, `emosi` , `harapan` , `level`, `kesiapan`, `minat`) VALUES (NULL, ? ,  '-' ,'-',1 ,'-','-');", [$nama]);
        //  echo "<script>window.location='" . url('/') . "/" . $aksi . "/" . $id_materi . "'</script>";
        //return redirect("/mediabelajar");
        //hapys user nbiasa

        DB::delete("DELETE FROM `data_peserta` WHERE `nama` LIKE 'user'");


        //update foto
        DB::update("UPDATE `foto` SET `nama` = ? WHERE `foto`.`file_name` = ?;", [$nama, $id_baru]);

        // return redirect("/emosi30");
        return redirect("/mediabelajar");
    }

    public function mediabelajar()
    {
        $nama = \Session::get('nama');
        //dd($nama);
        if (empty($nama)) {
            return redirect("/");
        }

        //ganti evaluasi gambar lolcahost menjadi IP
        $ip_server = $_SERVER['SERVER_ADDR'];
        $localhost = DB::select("SELECT * FROM `evaluasi` WHERE `soal` LIKE '%localhost%'");
        foreach ($localhost as $item) {
            $id_evaluasi = $item->id_evaluasi;
            $soal = $item->soal;

            $replace = str_replace("localhost", $ip_server, $soal);
            // dd($replace);
            //ganti
            DB::update("UPDATE `evaluasi` SET `soal` = ? WHERE `evaluasi`.`id_evaluasi` = ?;", [
                $replace, $id_evaluasi
            ]);
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

    public function gambar()
    {
        //echo "ok";
        $gambar = DB::select("SELECT * FROM `gambar` ORDER BY `gambar`.`id_gambar` DESC");
        $ip_server = $_SERVER['SERVER_ADDR'];

        /*
        foreach ($gambar as $item) {
            echo "http://192.168.1.20/mediabelajar/app/files/g1.PNG";
            echo "<hr>";
        }
        */
        return view("gambal", [
            'gambar' => $gambar,
            'ip' => $ip_server
        ]);
    }

    public function nilai()
    {
        //echo "ok"
        $key = md5(date("h"));
        $kunci = $_GET["key"];
        if ($key != $kunci) {
            echo "Kunci Tidak Cocok";
        } else {

            $peserta = DB::select("SELECT DISTINCT(nama_peserta) as nama FROM `peserta` ORDER BY `nama` ASC");
            return view("nilai", [
                'peserta' => $peserta,
                'key' => $key
            ]);
        }
    }

    public function resetpeserta()
    {
        DB::table("peserta")->truncate();
        // return redirect("nilai");
        echo "<script>window.location='/mediabelajar/app/PesertaList'</script>";
    }

    public function emosi()
    {
        //echo "ok";

        return view("emosi");
    }

    public function simpanemosi($emosi)
    {
        //echo $emosi;
        $nama = \Session::get('nama');
        DB::update("UPDATE `data_peserta` SET `emosi` = ? WHERE `data_peserta`.`nama` = ? ;", [
            $emosi, $nama
        ]);

        return redirect("/kemampuan");
    }
}