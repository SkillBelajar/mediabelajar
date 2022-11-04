<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class rpp extends Controller
{
    //
    public function slide($slide)
    {
        //materi
        //if admin
        $nama = \Session::get('nama');
        //dd($nama);
        if ($nama == "Test | Test - ") {
            //dd("ok");
            //lakukan update slide
            DB::update("UPDATE `live_rencana` SET `id_indikator` = ? WHERE `live_rencana`.`id_live_rencana` = 1;", [$slide]);
        }

        //


        $materi = DB::select("SELECT * FROM `live` WHERE `id_live` = 1");
        $id_materi = $materi[0]->id_materi;
        //dd($id_materi);
        //erp

        $rpp = DB::select("SELECT * FROM `rencana_pembelajaran` WHERE `id_indikator` = ? AND `id_materi` = ?", [$slide, $id_materi]);
        //pengaturan

        $pg = DB::select("SELECT * FROM `pengaturan` WHERE `id_pengaturan` = 1");
        $nama_guru = $pg[0]->nama_guru;
        $tempat_kerja = $pg[0]->tempat_kerja;
        $logo = $pg[0]->logo;

        //nama_materi
        $nm = DB::select("SELECT * FROM `materi` WHERE `id_materi` = ?", [$id_materi]);
        $judul_materi = $nm[0]->judul;

        //materi semua
        $semua = DB::select("SELECT * FROM `rencana_pembelajaran` WHERE `id_materi` = ? ORDER BY `rencana_pembelajaran`.`id_rencana_pembelajaran` ASC", [$id_materi]);


        //pdf mater
        $pdf_materi = DB::select("SELECT * FROM `pdf_materi` WHERE `id_materi` = ? ORDER BY `pdf_materi`.`id_pdf_materi` ASC", [$id_materi]);

        $artikel = DB::select("SELECT * FROM `artikel_materi` WHERE `id_materi` = ? ORDER BY `artikel_materi`.`id_artikel_materi` ASC", [$id_materi]);

        return view("slide", [
            'slide' => $rpp,
            'nama_guru' => $nama_guru,
            'tempat_kerja' => $tempat_kerja,
            'logo' => $logo,
            'judul_materi' => $judul_materi,
            'semua' => $semua,
            'kode' => $slide,
            'pdf_materi' => $pdf_materi,
            'artikel' => $artikel
        ]);
    }

    //public function
}