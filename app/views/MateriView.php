<?php

namespace PHPMaker2021\project1;

// Page object
$MateriView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fmateriview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fmateriview = currentForm = new ew.Form("fmateriview", "view");
    loadjs.done("fmateriview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $Page->ExportOptions->render("body") ?>
<?php $Page->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fmateriview" id="fmateriview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="materi">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id_materi->Visible) { // id_materi ?>
    <tr id="r_id_materi">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_materi_id_materi"><?= $Page->id_materi->caption() ?></span></td>
        <td data-name="id_materi" <?= $Page->id_materi->cellAttributes() ?>>
<span id="el_materi_id_materi">
<span<?= $Page->id_materi->viewAttributes() ?>>
<?= $Page->id_materi->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->id_media->Visible) { // id_media ?>
    <tr id="r_id_media">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_materi_id_media"><?= $Page->id_media->caption() ?></span></td>
        <td data-name="id_media" <?= $Page->id_media->cellAttributes() ?>>
<span id="el_materi_id_media">
<span<?= $Page->id_media->viewAttributes() ?>>
<?= $Page->id_media->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->judul->Visible) { // judul ?>
    <tr id="r_judul">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_materi_judul"><?= $Page->judul->caption() ?></span></td>
        <td data-name="judul" <?= $Page->judul->cellAttributes() ?>>
<span id="el_materi_judul">
<span<?= $Page->judul->viewAttributes() ?>>
<?= $Page->judul->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->isi->Visible) { // isi ?>
    <tr id="r_isi">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_materi_isi"><?= $Page->isi->caption() ?></span></td>
        <td data-name="isi" <?= $Page->isi->cellAttributes() ?>>
<span id="el_materi_isi">
<span<?= $Page->isi->viewAttributes() ?>>
<?= $Page->isi->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->pdf->Visible) { // pdf ?>
    <tr id="r_pdf">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_materi_pdf"><?= $Page->pdf->caption() ?></span></td>
        <td data-name="pdf" <?= $Page->pdf->cellAttributes() ?>>
<span id="el_materi_pdf">
<span<?= $Page->pdf->viewAttributes() ?>>
<?= GetFileViewTag($Page->pdf, $Page->pdf->getViewValue(), false) ?>
</span>
</span>
</td>
    </tr>
<?php } ?>
</table>
<?php
    if (in_array("evaluasi", explode(",", $Page->getCurrentDetailTable())) && $evaluasi->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("evaluasi", "TblCaption") ?>&nbsp;<?= str_replace("%c", $Page->evaluasi_Count, $Language->phrase("DetailCount")) ?></h4>
<?php } ?>
<?php include_once "EvaluasiGrid.php" ?>
<?php } ?>
<?php
    if (in_array("rencana_pembelajaran", explode(",", $Page->getCurrentDetailTable())) && $rencana_pembelajaran->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("rencana_pembelajaran", "TblCaption") ?>&nbsp;<?= str_replace("%c", $Page->rencana_pembelajaran_Count, $Language->phrase("DetailCount")) ?></h4>
<?php } ?>
<?php include_once "RencanaPembelajaranGrid.php" ?>
<?php } ?>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
