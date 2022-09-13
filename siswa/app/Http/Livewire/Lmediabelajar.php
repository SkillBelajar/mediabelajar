<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Lmediabelajar extends Component
{
    public function render()
    {
        /*
        $live = DB::select("SELECT * FROM `live` WHERE `id_live` = 1");
        $aksi = $live[0]->aksi;
        $id_materi = $live[0]->id_materi;
        */
        return view('livewire.lmediabelajar');
    }
}