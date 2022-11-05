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
$sideMenu->addMenuItem(28, "mi_live_rencana", $MenuLanguage->MenuPhrase("28", "MenuText"), $MenuRelativePath . "LiveRencanaList", -1, "", IsLoggedIn() || AllowListMenu('{08AC9454-AE1D-4A18-8373-5038E0E6ECD3}live_rencana'), false, false, "", "", false);
$sideMenu->addMenuItem(29, "mi_open_slide", $MenuLanguage->MenuPhrase("29", "MenuText"), $MenuRelativePath . "OpenSlideList", -1, "", IsLoggedIn() || AllowListMenu('{08AC9454-AE1D-4A18-8373-5038E0E6ECD3}open_slide'), false, false, "", "", false);
$sideMenu->addMenuItem(12, "mci_Edit_Live", $MenuLanguage->MenuPhrase("12", "MenuText"), $MenuRelativePath . "../siswa/public/gurulive", -1, "", IsLoggedIn(), false, true, "", "", false);
$sideMenu->addMenuItem(5, "mi_live", $MenuLanguage->MenuPhrase("5", "MenuText"), $MenuRelativePath . "LiveList", -1, "", IsLoggedIn() || AllowListMenu('{08AC9454-AE1D-4A18-8373-5038E0E6ECD3}live'), false, false, "", "", false);
$sideMenu->addMenuItem(3, "mi_media", $MenuLanguage->MenuPhrase("3", "MenuText"), $MenuRelativePath . "MediaList", -1, "", IsLoggedIn() || AllowListMenu('{08AC9454-AE1D-4A18-8373-5038E0E6ECD3}media'), false, false, "", "", false);
$sideMenu->addMenuItem(2, "mi_materi", $MenuLanguage->MenuPhrase("2", "MenuText"), $MenuRelativePath . "MateriList?cmd=resetall", 3, "", IsLoggedIn() || AllowListMenu('{08AC9454-AE1D-4A18-8373-5038E0E6ECD3}materi'), false, false, "", "", false);
$sideMenu->addMenuItem(26, "mi_pdf_materi", $MenuLanguage->MenuPhrase("26", "MenuText"), $MenuRelativePath . "PdfMateriList?cmd=resetall", 2, "", IsLoggedIn() || AllowListMenu('{08AC9454-AE1D-4A18-8373-5038E0E6ECD3}pdf_materi'), false, false, "", "", false);
$sideMenu->addMenuItem(25, "mi_artikel_materi", $MenuLanguage->MenuPhrase("25", "MenuText"), $MenuRelativePath . "ArtikelMateriList?cmd=resetall", 2, "", IsLoggedIn() || AllowListMenu('{08AC9454-AE1D-4A18-8373-5038E0E6ECD3}artikel_materi'), false, false, "", "", false);
$sideMenu->addMenuItem(19, "mi_rencana_pembelajaran", $MenuLanguage->MenuPhrase("19", "MenuText"), $MenuRelativePath . "RencanaPembelajaranList?cmd=resetall", -1, "", IsLoggedIn() || AllowListMenu('{08AC9454-AE1D-4A18-8373-5038E0E6ECD3}rencana_pembelajaran'), false, false, "", "", false);
$sideMenu->addMenuItem(17, "mi_indikator_rencana_belajar", $MenuLanguage->MenuPhrase("17", "MenuText"), $MenuRelativePath . "IndikatorRencanaBelajarList", 19, "", IsLoggedIn() || AllowListMenu('{08AC9454-AE1D-4A18-8373-5038E0E6ECD3}indikator_rencana_belajar'), false, false, "", "", false);
$sideMenu->addMenuItem(27, "mi_generator_rencana", $MenuLanguage->MenuPhrase("27", "MenuText"), $MenuRelativePath . "GeneratorRencanaList?cmd=resetall", 19, "", IsLoggedIn() || AllowListMenu('{08AC9454-AE1D-4A18-8373-5038E0E6ECD3}generator_rencana'), false, false, "", "", false);
$sideMenu->addMenuItem(1, "mi_evaluasi", $MenuLanguage->MenuPhrase("1", "MenuText"), $MenuRelativePath . "EvaluasiList?cmd=resetall", -1, "", IsLoggedIn() || AllowListMenu('{08AC9454-AE1D-4A18-8373-5038E0E6ECD3}evaluasi'), false, false, "", "", false);
$sideMenu->addMenuItem(4, "mi_peserta", $MenuLanguage->MenuPhrase("4", "MenuText"), $MenuRelativePath . "PesertaList?cmd=resetall", 1, "", IsLoggedIn() || AllowListMenu('{08AC9454-AE1D-4A18-8373-5038E0E6ECD3}peserta'), false, false, "", "", false);
$sideMenu->addMenuItem(20, "mi_siswa", $MenuLanguage->MenuPhrase("20", "MenuText"), $MenuRelativePath . "SiswaList", 1, "", IsLoggedIn() || AllowListMenu('{08AC9454-AE1D-4A18-8373-5038E0E6ECD3}siswa'), false, false, "", "", false);
$sideMenu->addMenuItem(14, "mi_data_peserta", $MenuLanguage->MenuPhrase("14", "MenuText"), $MenuRelativePath . "DataPesertaList", 1, "", IsLoggedIn() || AllowListMenu('{08AC9454-AE1D-4A18-8373-5038E0E6ECD3}data_peserta'), false, false, "", "", false);
$sideMenu->addMenuItem(6, "mi_gambar", $MenuLanguage->MenuPhrase("6", "MenuText"), $MenuRelativePath . "GambarList", -1, "", IsLoggedIn() || AllowListMenu('{08AC9454-AE1D-4A18-8373-5038E0E6ECD3}gambar'), false, false, "", "", false);
$sideMenu->addMenuItem(24, "mi_pengaturan", $MenuLanguage->MenuPhrase("24", "MenuText"), $MenuRelativePath . "PengaturanList", -1, "", IsLoggedIn() || AllowListMenu('{08AC9454-AE1D-4A18-8373-5038E0E6ECD3}pengaturan'), false, false, "", "", false);
echo $sideMenu->toScript();
