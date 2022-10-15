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

    public function simpan_livex(Request $request $id)
    {
        echo $id;
    }
}
