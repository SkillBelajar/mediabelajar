<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Slide extends Component
{
    //private $kode;
    public $kode;
    public function render()
    {
        //  dd($kode);
        return view('livewire.slide');
    }
}