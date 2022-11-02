<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class gurulive2 extends Controller
{
    //
    public function hapuspeserta($id)
    {
        $id;
        //echo $id;
        DB::delete("DELETE FROM data_peserta WHERE `data_peserta`.`id_data_peserta` = ?", [$id]);
        return redirect("/materilive/x");
    }
}