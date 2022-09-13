<?php

namespace PHPMaker2021\project1;

// Menu Language
if ($Language && function_exists(PROJECT_NAMESPACE . "Config") && $Language->LanguageFolder == Config("LANGUAGE_FOLDER")) {
    $MenuRelativePath = "";
    $MenuLanguage = &$Language;
} else { // Compat reports
    $LANGUAGE_FOLDER = "../lang/";
    $MenuRelativePath = "../";
    $MenuLanguage = Container("language");
}

// Navbar menu
$topMenu = new Menu("navbar", true, true);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", true, false);
$sideMenu->addMenuItem(3, "mi_media", $MenuLanguage->MenuPhrase("3", "MenuText"), $MenuRelativePath . "MediaList", -1, "", true, false, false, "", "", false);
$sideMenu->addMenuItem(2, "mi_materi", $MenuLanguage->MenuPhrase("2", "MenuText"), $MenuRelativePath . "MateriList", -1, "", true, false, false, "", "", false);
$sideMenu->addMenuItem(1, "mi_evaluasi", $MenuLanguage->MenuPhrase("1", "MenuText"), $MenuRelativePath . "EvaluasiList", -1, "", true, false, false, "", "", false);
$sideMenu->addMenuItem(4, "mi_peserta", $MenuLanguage->MenuPhrase("4", "MenuText"), $MenuRelativePath . "PesertaList", -1, "", true, false, false, "", "", false);
echo $sideMenu->toScript();
