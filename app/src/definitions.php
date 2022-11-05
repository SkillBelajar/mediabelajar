<?php

namespace PHPMaker2021\project1;

use Slim\Views\PhpRenderer;
use Slim\Csrf\Guard;
use Psr\Container\ContainerInterface;
use Monolog\Logger;
use Monolog\Handler\RotatingFileHandler;
use Doctrine\DBAL\Logging\LoggerChain;
use Doctrine\DBAL\Logging\DebugStack;

return [
    "cache" => function (ContainerInterface $c) {
        return new \Slim\HttpCache\CacheProvider();
    },
    "view" => function (ContainerInterface $c) {
        return new PhpRenderer("views/");
    },
    "flash" => function (ContainerInterface $c) {
        return new \Slim\Flash\Messages();
    },
    "audit" => function (ContainerInterface $c) {
        $logger = new Logger("audit"); // For audit trail
        $logger->pushHandler(new AuditTrailHandler("audit.log"));
        return $logger;
    },
    "log" => function (ContainerInterface $c) {
        $logger = new Logger("log");
        $logger->pushHandler(new RotatingFileHandler("log.log"));
        return $logger;
    },
    "sqllogger" => function (ContainerInterface $c) {
        $loggers = [];
        if (Config("DEBUG")) {
            $loggers[] = $c->get("debugstack");
        }
        return (count($loggers) > 0) ? new LoggerChain($loggers) : null;
    },
    "csrf" => function (ContainerInterface $c) {
        global $ResponseFactory;
        return new Guard($ResponseFactory, Config("CSRF_PREFIX"));
    },
    "debugstack" => \DI\create(DebugStack::class),
    "debugsqllogger" => \DI\create(DebugSqlLogger::class),
    "security" => \DI\create(AdvancedSecurity::class),
    "profile" => \DI\create(UserProfile::class),
    "language" => \DI\create(Language::class),
    "timer" => \DI\create(Timer::class),

    // Tables
    "evaluasi" => \DI\create(Evaluasi::class),
    "materi" => \DI\create(Materi::class),
    "media" => \DI\create(Media::class),
    "peserta" => \DI\create(Peserta::class),
    "live" => \DI\create(Live::class),
    "gambar" => \DI\create(Gambar::class),
    "slide" => \DI\create(Slide::class),
    "video" => \DI\create(Video::class),
    "data_peserta" => \DI\create(DataPeserta::class),
    "foto" => \DI\create(Foto::class),
    "history_ulangan" => \DI\create(HistoryUlangan::class),
    "indikator_rencana_belajar" => \DI\create(IndikatorRencanaBelajar::class),
    "minat_siswa" => \DI\create(MinatSiswa::class),
    "rencana_pembelajaran" => \DI\create(RencanaPembelajaran::class),
    "siswa" => \DI\create(Siswa::class),
    "skor_ulangan" => \DI\create(SkorUlangan::class),
    "terpilih" => \DI\create(Terpilih::class),
    "ulangan" => \DI\create(Ulangan::class),
    "pengaturan" => \DI\create(Pengaturan::class),
    "artikel_materi" => \DI\create(ArtikelMateri::class),
    "pdf_materi" => \DI\create(PdfMateri::class),
    "generator_rencana" => \DI\create(GeneratorRencana::class),
    "live_rencana" => \DI\create(LiveRencana::class),
    "open_slide" => \DI\create(OpenSlide::class),

    // Detail table pages
    "MateriGrid" => \DI\create(MateriGrid::class),
    "EvaluasiGrid" => \DI\create(EvaluasiGrid::class),
    "PesertaGrid" => \DI\create(PesertaGrid::class),
    "RencanaPembelajaranGrid" => \DI\create(RencanaPembelajaranGrid::class),
    "PdfMateriGrid" => \DI\create(PdfMateriGrid::class),
    "ArtikelMateriGrid" => \DI\create(ArtikelMateriGrid::class),
    "GeneratorRencanaGrid" => \DI\create(GeneratorRencanaGrid::class),
];
