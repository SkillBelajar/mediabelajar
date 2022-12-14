<?php

namespace PHPMaker2021\project1;

use Slim\App;
use Slim\Routing\RouteCollectorProxy;

// Handle Routes
return function (App $app) {
    // evaluasi
    $app->any('/EvaluasiList[/{id_evaluasi}]', EvaluasiController::class . ':list')->add(PermissionMiddleware::class)->setName('EvaluasiList-evaluasi-list'); // list
    $app->any('/EvaluasiAdd[/{id_evaluasi}]', EvaluasiController::class . ':add')->add(PermissionMiddleware::class)->setName('EvaluasiAdd-evaluasi-add'); // add
    $app->any('/EvaluasiView[/{id_evaluasi}]', EvaluasiController::class . ':view')->add(PermissionMiddleware::class)->setName('EvaluasiView-evaluasi-view'); // view
    $app->any('/EvaluasiEdit[/{id_evaluasi}]', EvaluasiController::class . ':edit')->add(PermissionMiddleware::class)->setName('EvaluasiEdit-evaluasi-edit'); // edit
    $app->any('/EvaluasiDelete[/{id_evaluasi}]', EvaluasiController::class . ':delete')->add(PermissionMiddleware::class)->setName('EvaluasiDelete-evaluasi-delete'); // delete
    $app->group(
        '/evaluasi',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id_evaluasi}]', EvaluasiController::class . ':list')->add(PermissionMiddleware::class)->setName('evaluasi/list-evaluasi-list-2'); // list
            $group->any('/add[/{id_evaluasi}]', EvaluasiController::class . ':add')->add(PermissionMiddleware::class)->setName('evaluasi/add-evaluasi-add-2'); // add
            $group->any('/view[/{id_evaluasi}]', EvaluasiController::class . ':view')->add(PermissionMiddleware::class)->setName('evaluasi/view-evaluasi-view-2'); // view
            $group->any('/edit[/{id_evaluasi}]', EvaluasiController::class . ':edit')->add(PermissionMiddleware::class)->setName('evaluasi/edit-evaluasi-edit-2'); // edit
            $group->any('/delete[/{id_evaluasi}]', EvaluasiController::class . ':delete')->add(PermissionMiddleware::class)->setName('evaluasi/delete-evaluasi-delete-2'); // delete
        }
    );

    // materi
    $app->any('/MateriList[/{id_materi}]', MateriController::class . ':list')->add(PermissionMiddleware::class)->setName('MateriList-materi-list'); // list
    $app->any('/MateriAdd[/{id_materi}]', MateriController::class . ':add')->add(PermissionMiddleware::class)->setName('MateriAdd-materi-add'); // add
    $app->any('/MateriView[/{id_materi}]', MateriController::class . ':view')->add(PermissionMiddleware::class)->setName('MateriView-materi-view'); // view
    $app->any('/MateriEdit[/{id_materi}]', MateriController::class . ':edit')->add(PermissionMiddleware::class)->setName('MateriEdit-materi-edit'); // edit
    $app->any('/MateriDelete[/{id_materi}]', MateriController::class . ':delete')->add(PermissionMiddleware::class)->setName('MateriDelete-materi-delete'); // delete
    $app->group(
        '/materi',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id_materi}]', MateriController::class . ':list')->add(PermissionMiddleware::class)->setName('materi/list-materi-list-2'); // list
            $group->any('/add[/{id_materi}]', MateriController::class . ':add')->add(PermissionMiddleware::class)->setName('materi/add-materi-add-2'); // add
            $group->any('/view[/{id_materi}]', MateriController::class . ':view')->add(PermissionMiddleware::class)->setName('materi/view-materi-view-2'); // view
            $group->any('/edit[/{id_materi}]', MateriController::class . ':edit')->add(PermissionMiddleware::class)->setName('materi/edit-materi-edit-2'); // edit
            $group->any('/delete[/{id_materi}]', MateriController::class . ':delete')->add(PermissionMiddleware::class)->setName('materi/delete-materi-delete-2'); // delete
        }
    );

    // media
    $app->any('/MediaList[/{id_media}]', MediaController::class . ':list')->add(PermissionMiddleware::class)->setName('MediaList-media-list'); // list
    $app->any('/MediaAdd[/{id_media}]', MediaController::class . ':add')->add(PermissionMiddleware::class)->setName('MediaAdd-media-add'); // add
    $app->any('/MediaView[/{id_media}]', MediaController::class . ':view')->add(PermissionMiddleware::class)->setName('MediaView-media-view'); // view
    $app->any('/MediaEdit[/{id_media}]', MediaController::class . ':edit')->add(PermissionMiddleware::class)->setName('MediaEdit-media-edit'); // edit
    $app->any('/MediaDelete[/{id_media}]', MediaController::class . ':delete')->add(PermissionMiddleware::class)->setName('MediaDelete-media-delete'); // delete
    $app->group(
        '/media',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id_media}]', MediaController::class . ':list')->add(PermissionMiddleware::class)->setName('media/list-media-list-2'); // list
            $group->any('/add[/{id_media}]', MediaController::class . ':add')->add(PermissionMiddleware::class)->setName('media/add-media-add-2'); // add
            $group->any('/view[/{id_media}]', MediaController::class . ':view')->add(PermissionMiddleware::class)->setName('media/view-media-view-2'); // view
            $group->any('/edit[/{id_media}]', MediaController::class . ':edit')->add(PermissionMiddleware::class)->setName('media/edit-media-edit-2'); // edit
            $group->any('/delete[/{id_media}]', MediaController::class . ':delete')->add(PermissionMiddleware::class)->setName('media/delete-media-delete-2'); // delete
        }
    );

    // live
    $app->any('/LiveList[/{id_live}]', LiveController::class . ':list')->add(PermissionMiddleware::class)->setName('LiveList-live-list'); // list
    $app->any('/LiveView[/{id_live}]', LiveController::class . ':view')->add(PermissionMiddleware::class)->setName('LiveView-live-view'); // view
    $app->any('/LiveEdit[/{id_live}]', LiveController::class . ':edit')->add(PermissionMiddleware::class)->setName('LiveEdit-live-edit'); // edit
    $app->group(
        '/live',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id_live}]', LiveController::class . ':list')->add(PermissionMiddleware::class)->setName('live/list-live-list-2'); // list
            $group->any('/view[/{id_live}]', LiveController::class . ':view')->add(PermissionMiddleware::class)->setName('live/view-live-view-2'); // view
            $group->any('/edit[/{id_live}]', LiveController::class . ':edit')->add(PermissionMiddleware::class)->setName('live/edit-live-edit-2'); // edit
        }
    );

    // gambar
    $app->any('/GambarList[/{id_gambar}]', GambarController::class . ':list')->add(PermissionMiddleware::class)->setName('GambarList-gambar-list'); // list
    $app->any('/GambarAdd[/{id_gambar}]', GambarController::class . ':add')->add(PermissionMiddleware::class)->setName('GambarAdd-gambar-add'); // add
    $app->any('/GambarView[/{id_gambar}]', GambarController::class . ':view')->add(PermissionMiddleware::class)->setName('GambarView-gambar-view'); // view
    $app->any('/GambarEdit[/{id_gambar}]', GambarController::class . ':edit')->add(PermissionMiddleware::class)->setName('GambarEdit-gambar-edit'); // edit
    $app->any('/GambarDelete[/{id_gambar}]', GambarController::class . ':delete')->add(PermissionMiddleware::class)->setName('GambarDelete-gambar-delete'); // delete
    $app->group(
        '/gambar',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id_gambar}]', GambarController::class . ':list')->add(PermissionMiddleware::class)->setName('gambar/list-gambar-list-2'); // list
            $group->any('/add[/{id_gambar}]', GambarController::class . ':add')->add(PermissionMiddleware::class)->setName('gambar/add-gambar-add-2'); // add
            $group->any('/view[/{id_gambar}]', GambarController::class . ':view')->add(PermissionMiddleware::class)->setName('gambar/view-gambar-view-2'); // view
            $group->any('/edit[/{id_gambar}]', GambarController::class . ':edit')->add(PermissionMiddleware::class)->setName('gambar/edit-gambar-edit-2'); // edit
            $group->any('/delete[/{id_gambar}]', GambarController::class . ':delete')->add(PermissionMiddleware::class)->setName('gambar/delete-gambar-delete-2'); // delete
        }
    );

    // history_ulangan
    $app->any('/HistoryUlanganList[/{id_history_ulangan}]', HistoryUlanganController::class . ':list')->add(PermissionMiddleware::class)->setName('HistoryUlanganList-history_ulangan-list'); // list
    $app->any('/HistoryUlanganAdd[/{id_history_ulangan}]', HistoryUlanganController::class . ':add')->add(PermissionMiddleware::class)->setName('HistoryUlanganAdd-history_ulangan-add'); // add
    $app->any('/HistoryUlanganView[/{id_history_ulangan}]', HistoryUlanganController::class . ':view')->add(PermissionMiddleware::class)->setName('HistoryUlanganView-history_ulangan-view'); // view
    $app->any('/HistoryUlanganEdit[/{id_history_ulangan}]', HistoryUlanganController::class . ':edit')->add(PermissionMiddleware::class)->setName('HistoryUlanganEdit-history_ulangan-edit'); // edit
    $app->any('/HistoryUlanganDelete[/{id_history_ulangan}]', HistoryUlanganController::class . ':delete')->add(PermissionMiddleware::class)->setName('HistoryUlanganDelete-history_ulangan-delete'); // delete
    $app->group(
        '/history_ulangan',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id_history_ulangan}]', HistoryUlanganController::class . ':list')->add(PermissionMiddleware::class)->setName('history_ulangan/list-history_ulangan-list-2'); // list
            $group->any('/add[/{id_history_ulangan}]', HistoryUlanganController::class . ':add')->add(PermissionMiddleware::class)->setName('history_ulangan/add-history_ulangan-add-2'); // add
            $group->any('/view[/{id_history_ulangan}]', HistoryUlanganController::class . ':view')->add(PermissionMiddleware::class)->setName('history_ulangan/view-history_ulangan-view-2'); // view
            $group->any('/edit[/{id_history_ulangan}]', HistoryUlanganController::class . ':edit')->add(PermissionMiddleware::class)->setName('history_ulangan/edit-history_ulangan-edit-2'); // edit
            $group->any('/delete[/{id_history_ulangan}]', HistoryUlanganController::class . ':delete')->add(PermissionMiddleware::class)->setName('history_ulangan/delete-history_ulangan-delete-2'); // delete
        }
    );

    // indikator_rencana_belajar
    $app->any('/IndikatorRencanaBelajarList[/{id_indikator}]', IndikatorRencanaBelajarController::class . ':list')->add(PermissionMiddleware::class)->setName('IndikatorRencanaBelajarList-indikator_rencana_belajar-list'); // list
    $app->any('/IndikatorRencanaBelajarAdd[/{id_indikator}]', IndikatorRencanaBelajarController::class . ':add')->add(PermissionMiddleware::class)->setName('IndikatorRencanaBelajarAdd-indikator_rencana_belajar-add'); // add
    $app->any('/IndikatorRencanaBelajarView[/{id_indikator}]', IndikatorRencanaBelajarController::class . ':view')->add(PermissionMiddleware::class)->setName('IndikatorRencanaBelajarView-indikator_rencana_belajar-view'); // view
    $app->any('/IndikatorRencanaBelajarEdit[/{id_indikator}]', IndikatorRencanaBelajarController::class . ':edit')->add(PermissionMiddleware::class)->setName('IndikatorRencanaBelajarEdit-indikator_rencana_belajar-edit'); // edit
    $app->any('/IndikatorRencanaBelajarDelete[/{id_indikator}]', IndikatorRencanaBelajarController::class . ':delete')->add(PermissionMiddleware::class)->setName('IndikatorRencanaBelajarDelete-indikator_rencana_belajar-delete'); // delete
    $app->group(
        '/indikator_rencana_belajar',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id_indikator}]', IndikatorRencanaBelajarController::class . ':list')->add(PermissionMiddleware::class)->setName('indikator_rencana_belajar/list-indikator_rencana_belajar-list-2'); // list
            $group->any('/add[/{id_indikator}]', IndikatorRencanaBelajarController::class . ':add')->add(PermissionMiddleware::class)->setName('indikator_rencana_belajar/add-indikator_rencana_belajar-add-2'); // add
            $group->any('/view[/{id_indikator}]', IndikatorRencanaBelajarController::class . ':view')->add(PermissionMiddleware::class)->setName('indikator_rencana_belajar/view-indikator_rencana_belajar-view-2'); // view
            $group->any('/edit[/{id_indikator}]', IndikatorRencanaBelajarController::class . ':edit')->add(PermissionMiddleware::class)->setName('indikator_rencana_belajar/edit-indikator_rencana_belajar-edit-2'); // edit
            $group->any('/delete[/{id_indikator}]', IndikatorRencanaBelajarController::class . ':delete')->add(PermissionMiddleware::class)->setName('indikator_rencana_belajar/delete-indikator_rencana_belajar-delete-2'); // delete
        }
    );

    // minat_siswa
    $app->any('/MinatSiswaList[/{id_minat_siswa}]', MinatSiswaController::class . ':list')->add(PermissionMiddleware::class)->setName('MinatSiswaList-minat_siswa-list'); // list
    $app->any('/MinatSiswaAdd[/{id_minat_siswa}]', MinatSiswaController::class . ':add')->add(PermissionMiddleware::class)->setName('MinatSiswaAdd-minat_siswa-add'); // add
    $app->any('/MinatSiswaView[/{id_minat_siswa}]', MinatSiswaController::class . ':view')->add(PermissionMiddleware::class)->setName('MinatSiswaView-minat_siswa-view'); // view
    $app->any('/MinatSiswaEdit[/{id_minat_siswa}]', MinatSiswaController::class . ':edit')->add(PermissionMiddleware::class)->setName('MinatSiswaEdit-minat_siswa-edit'); // edit
    $app->any('/MinatSiswaDelete[/{id_minat_siswa}]', MinatSiswaController::class . ':delete')->add(PermissionMiddleware::class)->setName('MinatSiswaDelete-minat_siswa-delete'); // delete
    $app->group(
        '/minat_siswa',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id_minat_siswa}]', MinatSiswaController::class . ':list')->add(PermissionMiddleware::class)->setName('minat_siswa/list-minat_siswa-list-2'); // list
            $group->any('/add[/{id_minat_siswa}]', MinatSiswaController::class . ':add')->add(PermissionMiddleware::class)->setName('minat_siswa/add-minat_siswa-add-2'); // add
            $group->any('/view[/{id_minat_siswa}]', MinatSiswaController::class . ':view')->add(PermissionMiddleware::class)->setName('minat_siswa/view-minat_siswa-view-2'); // view
            $group->any('/edit[/{id_minat_siswa}]', MinatSiswaController::class . ':edit')->add(PermissionMiddleware::class)->setName('minat_siswa/edit-minat_siswa-edit-2'); // edit
            $group->any('/delete[/{id_minat_siswa}]', MinatSiswaController::class . ':delete')->add(PermissionMiddleware::class)->setName('minat_siswa/delete-minat_siswa-delete-2'); // delete
        }
    );

    // rencana_pembelajaran
    $app->any('/RencanaPembelajaranList[/{id_rencana_pembelajaran}]', RencanaPembelajaranController::class . ':list')->add(PermissionMiddleware::class)->setName('RencanaPembelajaranList-rencana_pembelajaran-list'); // list
    $app->any('/RencanaPembelajaranAdd[/{id_rencana_pembelajaran}]', RencanaPembelajaranController::class . ':add')->add(PermissionMiddleware::class)->setName('RencanaPembelajaranAdd-rencana_pembelajaran-add'); // add
    $app->any('/RencanaPembelajaranView[/{id_rencana_pembelajaran}]', RencanaPembelajaranController::class . ':view')->add(PermissionMiddleware::class)->setName('RencanaPembelajaranView-rencana_pembelajaran-view'); // view
    $app->any('/RencanaPembelajaranEdit[/{id_rencana_pembelajaran}]', RencanaPembelajaranController::class . ':edit')->add(PermissionMiddleware::class)->setName('RencanaPembelajaranEdit-rencana_pembelajaran-edit'); // edit
    $app->any('/RencanaPembelajaranDelete[/{id_rencana_pembelajaran}]', RencanaPembelajaranController::class . ':delete')->add(PermissionMiddleware::class)->setName('RencanaPembelajaranDelete-rencana_pembelajaran-delete'); // delete
    $app->group(
        '/rencana_pembelajaran',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id_rencana_pembelajaran}]', RencanaPembelajaranController::class . ':list')->add(PermissionMiddleware::class)->setName('rencana_pembelajaran/list-rencana_pembelajaran-list-2'); // list
            $group->any('/add[/{id_rencana_pembelajaran}]', RencanaPembelajaranController::class . ':add')->add(PermissionMiddleware::class)->setName('rencana_pembelajaran/add-rencana_pembelajaran-add-2'); // add
            $group->any('/view[/{id_rencana_pembelajaran}]', RencanaPembelajaranController::class . ':view')->add(PermissionMiddleware::class)->setName('rencana_pembelajaran/view-rencana_pembelajaran-view-2'); // view
            $group->any('/edit[/{id_rencana_pembelajaran}]', RencanaPembelajaranController::class . ':edit')->add(PermissionMiddleware::class)->setName('rencana_pembelajaran/edit-rencana_pembelajaran-edit-2'); // edit
            $group->any('/delete[/{id_rencana_pembelajaran}]', RencanaPembelajaranController::class . ':delete')->add(PermissionMiddleware::class)->setName('rencana_pembelajaran/delete-rencana_pembelajaran-delete-2'); // delete
        }
    );

    // siswa
    $app->any('/SiswaList[/{id_siswa}]', SiswaController::class . ':list')->add(PermissionMiddleware::class)->setName('SiswaList-siswa-list'); // list
    $app->any('/SiswaAdd[/{id_siswa}]', SiswaController::class . ':add')->add(PermissionMiddleware::class)->setName('SiswaAdd-siswa-add'); // add
    $app->any('/SiswaView[/{id_siswa}]', SiswaController::class . ':view')->add(PermissionMiddleware::class)->setName('SiswaView-siswa-view'); // view
    $app->any('/SiswaEdit[/{id_siswa}]', SiswaController::class . ':edit')->add(PermissionMiddleware::class)->setName('SiswaEdit-siswa-edit'); // edit
    $app->any('/SiswaDelete[/{id_siswa}]', SiswaController::class . ':delete')->add(PermissionMiddleware::class)->setName('SiswaDelete-siswa-delete'); // delete
    $app->group(
        '/siswa',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id_siswa}]', SiswaController::class . ':list')->add(PermissionMiddleware::class)->setName('siswa/list-siswa-list-2'); // list
            $group->any('/add[/{id_siswa}]', SiswaController::class . ':add')->add(PermissionMiddleware::class)->setName('siswa/add-siswa-add-2'); // add
            $group->any('/view[/{id_siswa}]', SiswaController::class . ':view')->add(PermissionMiddleware::class)->setName('siswa/view-siswa-view-2'); // view
            $group->any('/edit[/{id_siswa}]', SiswaController::class . ':edit')->add(PermissionMiddleware::class)->setName('siswa/edit-siswa-edit-2'); // edit
            $group->any('/delete[/{id_siswa}]', SiswaController::class . ':delete')->add(PermissionMiddleware::class)->setName('siswa/delete-siswa-delete-2'); // delete
        }
    );

    // skor_ulangan
    $app->any('/SkorUlanganList[/{id_skor_ulangan}]', SkorUlanganController::class . ':list')->add(PermissionMiddleware::class)->setName('SkorUlanganList-skor_ulangan-list'); // list
    $app->any('/SkorUlanganAdd[/{id_skor_ulangan}]', SkorUlanganController::class . ':add')->add(PermissionMiddleware::class)->setName('SkorUlanganAdd-skor_ulangan-add'); // add
    $app->any('/SkorUlanganView[/{id_skor_ulangan}]', SkorUlanganController::class . ':view')->add(PermissionMiddleware::class)->setName('SkorUlanganView-skor_ulangan-view'); // view
    $app->any('/SkorUlanganEdit[/{id_skor_ulangan}]', SkorUlanganController::class . ':edit')->add(PermissionMiddleware::class)->setName('SkorUlanganEdit-skor_ulangan-edit'); // edit
    $app->any('/SkorUlanganDelete[/{id_skor_ulangan}]', SkorUlanganController::class . ':delete')->add(PermissionMiddleware::class)->setName('SkorUlanganDelete-skor_ulangan-delete'); // delete
    $app->group(
        '/skor_ulangan',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id_skor_ulangan}]', SkorUlanganController::class . ':list')->add(PermissionMiddleware::class)->setName('skor_ulangan/list-skor_ulangan-list-2'); // list
            $group->any('/add[/{id_skor_ulangan}]', SkorUlanganController::class . ':add')->add(PermissionMiddleware::class)->setName('skor_ulangan/add-skor_ulangan-add-2'); // add
            $group->any('/view[/{id_skor_ulangan}]', SkorUlanganController::class . ':view')->add(PermissionMiddleware::class)->setName('skor_ulangan/view-skor_ulangan-view-2'); // view
            $group->any('/edit[/{id_skor_ulangan}]', SkorUlanganController::class . ':edit')->add(PermissionMiddleware::class)->setName('skor_ulangan/edit-skor_ulangan-edit-2'); // edit
            $group->any('/delete[/{id_skor_ulangan}]', SkorUlanganController::class . ':delete')->add(PermissionMiddleware::class)->setName('skor_ulangan/delete-skor_ulangan-delete-2'); // delete
        }
    );

    // ulangan
    $app->any('/UlanganList[/{id_ulangan}]', UlanganController::class . ':list')->add(PermissionMiddleware::class)->setName('UlanganList-ulangan-list'); // list
    $app->any('/UlanganAdd[/{id_ulangan}]', UlanganController::class . ':add')->add(PermissionMiddleware::class)->setName('UlanganAdd-ulangan-add'); // add
    $app->any('/UlanganView[/{id_ulangan}]', UlanganController::class . ':view')->add(PermissionMiddleware::class)->setName('UlanganView-ulangan-view'); // view
    $app->any('/UlanganEdit[/{id_ulangan}]', UlanganController::class . ':edit')->add(PermissionMiddleware::class)->setName('UlanganEdit-ulangan-edit'); // edit
    $app->any('/UlanganDelete[/{id_ulangan}]', UlanganController::class . ':delete')->add(PermissionMiddleware::class)->setName('UlanganDelete-ulangan-delete'); // delete
    $app->group(
        '/ulangan',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id_ulangan}]', UlanganController::class . ':list')->add(PermissionMiddleware::class)->setName('ulangan/list-ulangan-list-2'); // list
            $group->any('/add[/{id_ulangan}]', UlanganController::class . ':add')->add(PermissionMiddleware::class)->setName('ulangan/add-ulangan-add-2'); // add
            $group->any('/view[/{id_ulangan}]', UlanganController::class . ':view')->add(PermissionMiddleware::class)->setName('ulangan/view-ulangan-view-2'); // view
            $group->any('/edit[/{id_ulangan}]', UlanganController::class . ':edit')->add(PermissionMiddleware::class)->setName('ulangan/edit-ulangan-edit-2'); // edit
            $group->any('/delete[/{id_ulangan}]', UlanganController::class . ':delete')->add(PermissionMiddleware::class)->setName('ulangan/delete-ulangan-delete-2'); // delete
        }
    );

    // pengaturan
    $app->any('/PengaturanList[/{id_pengaturan}]', PengaturanController::class . ':list')->add(PermissionMiddleware::class)->setName('PengaturanList-pengaturan-list'); // list
    $app->any('/PengaturanView[/{id_pengaturan}]', PengaturanController::class . ':view')->add(PermissionMiddleware::class)->setName('PengaturanView-pengaturan-view'); // view
    $app->any('/PengaturanEdit[/{id_pengaturan}]', PengaturanController::class . ':edit')->add(PermissionMiddleware::class)->setName('PengaturanEdit-pengaturan-edit'); // edit
    $app->group(
        '/pengaturan',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id_pengaturan}]', PengaturanController::class . ':list')->add(PermissionMiddleware::class)->setName('pengaturan/list-pengaturan-list-2'); // list
            $group->any('/view[/{id_pengaturan}]', PengaturanController::class . ':view')->add(PermissionMiddleware::class)->setName('pengaturan/view-pengaturan-view-2'); // view
            $group->any('/edit[/{id_pengaturan}]', PengaturanController::class . ':edit')->add(PermissionMiddleware::class)->setName('pengaturan/edit-pengaturan-edit-2'); // edit
        }
    );

    // artikel_materi
    $app->any('/ArtikelMateriList[/{id_artikel_materi}]', ArtikelMateriController::class . ':list')->add(PermissionMiddleware::class)->setName('ArtikelMateriList-artikel_materi-list'); // list
    $app->any('/ArtikelMateriAdd[/{id_artikel_materi}]', ArtikelMateriController::class . ':add')->add(PermissionMiddleware::class)->setName('ArtikelMateriAdd-artikel_materi-add'); // add
    $app->any('/ArtikelMateriView[/{id_artikel_materi}]', ArtikelMateriController::class . ':view')->add(PermissionMiddleware::class)->setName('ArtikelMateriView-artikel_materi-view'); // view
    $app->any('/ArtikelMateriEdit[/{id_artikel_materi}]', ArtikelMateriController::class . ':edit')->add(PermissionMiddleware::class)->setName('ArtikelMateriEdit-artikel_materi-edit'); // edit
    $app->any('/ArtikelMateriDelete[/{id_artikel_materi}]', ArtikelMateriController::class . ':delete')->add(PermissionMiddleware::class)->setName('ArtikelMateriDelete-artikel_materi-delete'); // delete
    $app->group(
        '/artikel_materi',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id_artikel_materi}]', ArtikelMateriController::class . ':list')->add(PermissionMiddleware::class)->setName('artikel_materi/list-artikel_materi-list-2'); // list
            $group->any('/add[/{id_artikel_materi}]', ArtikelMateriController::class . ':add')->add(PermissionMiddleware::class)->setName('artikel_materi/add-artikel_materi-add-2'); // add
            $group->any('/view[/{id_artikel_materi}]', ArtikelMateriController::class . ':view')->add(PermissionMiddleware::class)->setName('artikel_materi/view-artikel_materi-view-2'); // view
            $group->any('/edit[/{id_artikel_materi}]', ArtikelMateriController::class . ':edit')->add(PermissionMiddleware::class)->setName('artikel_materi/edit-artikel_materi-edit-2'); // edit
            $group->any('/delete[/{id_artikel_materi}]', ArtikelMateriController::class . ':delete')->add(PermissionMiddleware::class)->setName('artikel_materi/delete-artikel_materi-delete-2'); // delete
        }
    );

    // pdf_materi
    $app->any('/PdfMateriList[/{id_pdf_materi}]', PdfMateriController::class . ':list')->add(PermissionMiddleware::class)->setName('PdfMateriList-pdf_materi-list'); // list
    $app->any('/PdfMateriAdd[/{id_pdf_materi}]', PdfMateriController::class . ':add')->add(PermissionMiddleware::class)->setName('PdfMateriAdd-pdf_materi-add'); // add
    $app->any('/PdfMateriView[/{id_pdf_materi}]', PdfMateriController::class . ':view')->add(PermissionMiddleware::class)->setName('PdfMateriView-pdf_materi-view'); // view
    $app->any('/PdfMateriEdit[/{id_pdf_materi}]', PdfMateriController::class . ':edit')->add(PermissionMiddleware::class)->setName('PdfMateriEdit-pdf_materi-edit'); // edit
    $app->any('/PdfMateriDelete[/{id_pdf_materi}]', PdfMateriController::class . ':delete')->add(PermissionMiddleware::class)->setName('PdfMateriDelete-pdf_materi-delete'); // delete
    $app->group(
        '/pdf_materi',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id_pdf_materi}]', PdfMateriController::class . ':list')->add(PermissionMiddleware::class)->setName('pdf_materi/list-pdf_materi-list-2'); // list
            $group->any('/add[/{id_pdf_materi}]', PdfMateriController::class . ':add')->add(PermissionMiddleware::class)->setName('pdf_materi/add-pdf_materi-add-2'); // add
            $group->any('/view[/{id_pdf_materi}]', PdfMateriController::class . ':view')->add(PermissionMiddleware::class)->setName('pdf_materi/view-pdf_materi-view-2'); // view
            $group->any('/edit[/{id_pdf_materi}]', PdfMateriController::class . ':edit')->add(PermissionMiddleware::class)->setName('pdf_materi/edit-pdf_materi-edit-2'); // edit
            $group->any('/delete[/{id_pdf_materi}]', PdfMateriController::class . ':delete')->add(PermissionMiddleware::class)->setName('pdf_materi/delete-pdf_materi-delete-2'); // delete
        }
    );

    // generator_rencana
    $app->any('/GeneratorRencanaList[/{id_generator_rencana}]', GeneratorRencanaController::class . ':list')->add(PermissionMiddleware::class)->setName('GeneratorRencanaList-generator_rencana-list'); // list
    $app->any('/GeneratorRencanaAdd[/{id_generator_rencana}]', GeneratorRencanaController::class . ':add')->add(PermissionMiddleware::class)->setName('GeneratorRencanaAdd-generator_rencana-add'); // add
    $app->any('/GeneratorRencanaView[/{id_generator_rencana}]', GeneratorRencanaController::class . ':view')->add(PermissionMiddleware::class)->setName('GeneratorRencanaView-generator_rencana-view'); // view
    $app->any('/GeneratorRencanaEdit[/{id_generator_rencana}]', GeneratorRencanaController::class . ':edit')->add(PermissionMiddleware::class)->setName('GeneratorRencanaEdit-generator_rencana-edit'); // edit
    $app->any('/GeneratorRencanaDelete[/{id_generator_rencana}]', GeneratorRencanaController::class . ':delete')->add(PermissionMiddleware::class)->setName('GeneratorRencanaDelete-generator_rencana-delete'); // delete
    $app->group(
        '/generator_rencana',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id_generator_rencana}]', GeneratorRencanaController::class . ':list')->add(PermissionMiddleware::class)->setName('generator_rencana/list-generator_rencana-list-2'); // list
            $group->any('/add[/{id_generator_rencana}]', GeneratorRencanaController::class . ':add')->add(PermissionMiddleware::class)->setName('generator_rencana/add-generator_rencana-add-2'); // add
            $group->any('/view[/{id_generator_rencana}]', GeneratorRencanaController::class . ':view')->add(PermissionMiddleware::class)->setName('generator_rencana/view-generator_rencana-view-2'); // view
            $group->any('/edit[/{id_generator_rencana}]', GeneratorRencanaController::class . ':edit')->add(PermissionMiddleware::class)->setName('generator_rencana/edit-generator_rencana-edit-2'); // edit
            $group->any('/delete[/{id_generator_rencana}]', GeneratorRencanaController::class . ':delete')->add(PermissionMiddleware::class)->setName('generator_rencana/delete-generator_rencana-delete-2'); // delete
        }
    );

    // error
    $app->any('/error', OthersController::class . ':error')->add(PermissionMiddleware::class)->setName('error');

    // login
    $app->any('/login', OthersController::class . ':login')->add(PermissionMiddleware::class)->setName('login');

    // logout
    $app->any('/logout', OthersController::class . ':logout')->add(PermissionMiddleware::class)->setName('logout');

    // Index
    $app->any('/[index]', OthersController::class . ':index')->setName('index');
    if (function_exists(PROJECT_NAMESPACE . "Route_Action")) {
        Route_Action($app);
    }

    /**
     * Catch-all route to serve a 404 Not Found page if none of the routes match
     * NOTE: Make sure this route is defined last.
     */
    $app->map(
        ['GET', 'POST', 'PUT', 'DELETE', 'PATCH'],
        '/{routes:.+}',
        function ($request, $response, $params) {
            $error = [
                "statusCode" => "404",
                "error" => [
                    "class" => "text-warning",
                    "type" => Container("language")->phrase("Error"),
                    "description" => str_replace("%p", $params["routes"], Container("language")->phrase("PageNotFound")),
                ],
            ];
            Container("flash")->addMessage("error", $error);
            return $response->withStatus(302)->withHeader("Location", GetUrl("error")); // Redirect to error page
        }
    );
};
