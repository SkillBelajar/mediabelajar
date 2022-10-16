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

    // peserta
    $app->any('/PesertaList[/{id_peserta}]', PesertaController::class . ':list')->add(PermissionMiddleware::class)->setName('PesertaList-peserta-list'); // list
    $app->any('/PesertaView[/{id_peserta}]', PesertaController::class . ':view')->add(PermissionMiddleware::class)->setName('PesertaView-peserta-view'); // view
    $app->any('/PesertaEdit[/{id_peserta}]', PesertaController::class . ':edit')->add(PermissionMiddleware::class)->setName('PesertaEdit-peserta-edit'); // edit
    $app->any('/PesertaDelete[/{id_peserta}]', PesertaController::class . ':delete')->add(PermissionMiddleware::class)->setName('PesertaDelete-peserta-delete'); // delete
    $app->group(
        '/peserta',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id_peserta}]', PesertaController::class . ':list')->add(PermissionMiddleware::class)->setName('peserta/list-peserta-list-2'); // list
            $group->any('/view[/{id_peserta}]', PesertaController::class . ':view')->add(PermissionMiddleware::class)->setName('peserta/view-peserta-view-2'); // view
            $group->any('/edit[/{id_peserta}]', PesertaController::class . ':edit')->add(PermissionMiddleware::class)->setName('peserta/edit-peserta-edit-2'); // edit
            $group->any('/delete[/{id_peserta}]', PesertaController::class . ':delete')->add(PermissionMiddleware::class)->setName('peserta/delete-peserta-delete-2'); // delete
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
