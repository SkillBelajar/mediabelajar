<?php

namespace PHPMaker2021\project1;

// Page object
$RencanaPembelajaranView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var frencana_pembelajaranview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    frencana_pembelajaranview = currentForm = new ew.Form("frencana_pembelajaranview", "view");
    loadjs.done("frencana_pembelajaranview");
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
<form name="frencana_pembelajaranview" id="frencana_pembelajaranview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="rencana_pembelajaran">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id_rencana_pembelajaran->Visible) { // id_rencana_pembelajaran ?>
    <tr id="r_id_rencana_pembelajaran">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_rencana_pembelajaran_id_rencana_pembelajaran"><?= $Page->id_rencana_pembelajaran->caption() ?></span></td>
        <td data-name="id_rencana_pembelajaran" <?= $Page->id_rencana_pembelajaran->cellAttributes() ?>>
<span id="el_rencana_pembelajaran_id_rencana_pembelajaran">
<span<?= $Page->id_rencana_pembelajaran->viewAttributes() ?>>
<?= $Page->id_rencana_pembelajaran->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->id_indikator->Visible) { // id_indikator ?>
    <tr id="r_id_indikator">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_rencana_pembelajaran_id_indikator"><?= $Page->id_indikator->caption() ?></span></td>
        <td data-name="id_indikator" <?= $Page->id_indikator->cellAttributes() ?>>
<span id="el_rencana_pembelajaran_id_indikator">
<span<?= $Page->id_indikator->viewAttributes() ?>>
<?= $Page->id_indikator->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->id_materi->Visible) { // id_materi ?>
    <tr id="r_id_materi">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_rencana_pembelajaran_id_materi"><?= $Page->id_materi->caption() ?></span></td>
        <td data-name="id_materi" <?= $Page->id_materi->cellAttributes() ?>>
<span id="el_rencana_pembelajaran_id_materi">
<span<?= $Page->id_materi->viewAttributes() ?>>
<?= $Page->id_materi->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->judul->Visible) { // judul ?>
    <tr id="r_judul">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_rencana_pembelajaran_judul"><?= $Page->judul->caption() ?></span></td>
        <td data-name="judul" <?= $Page->judul->cellAttributes() ?>>
<span id="el_rencana_pembelajaran_judul">
<span<?= $Page->judul->viewAttributes() ?>>
<?= $Page->judul->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->kegiatan->Visible) { // kegiatan ?>
    <tr id="r_kegiatan">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_rencana_pembelajaran_kegiatan"><?= $Page->kegiatan->caption() ?></span></td>
        <td data-name="kegiatan" <?= $Page->kegiatan->cellAttributes() ?>>
<span id="el_rencana_pembelajaran_kegiatan">
<span<?= $Page->kegiatan->viewAttributes() ?>>
<?= $Page->kegiatan->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->waktu->Visible) { // waktu ?>
    <tr id="r_waktu">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_rencana_pembelajaran_waktu"><?= $Page->waktu->caption() ?></span></td>
        <td data-name="waktu" <?= $Page->waktu->cellAttributes() ?>>
<span id="el_rencana_pembelajaran_waktu">
<span<?= $Page->waktu->viewAttributes() ?>>
<?= $Page->waktu->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->tampilkan->Visible) { // tampilkan ?>
    <tr id="r_tampilkan">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_rencana_pembelajaran_tampilkan"><?= $Page->tampilkan->caption() ?></span></td>
        <td data-name="tampilkan" <?= $Page->tampilkan->cellAttributes() ?>>
<span id="el_rencana_pembelajaran_tampilkan">
<span<?= $Page->tampilkan->viewAttributes() ?>>
<?= $Page->tampilkan->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
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
