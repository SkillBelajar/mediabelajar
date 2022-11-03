<?php

namespace PHPMaker2021\project1;

// Page object
$UlanganView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fulanganview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fulanganview = currentForm = new ew.Form("fulanganview", "view");
    loadjs.done("fulanganview");
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
<form name="fulanganview" id="fulanganview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ulangan">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id_ulangan->Visible) { // id_ulangan ?>
    <tr id="r_id_ulangan">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ulangan_id_ulangan"><?= $Page->id_ulangan->caption() ?></span></td>
        <td data-name="id_ulangan" <?= $Page->id_ulangan->cellAttributes() ?>>
<span id="el_ulangan_id_ulangan">
<span<?= $Page->id_ulangan->viewAttributes() ?>>
<?= $Page->id_ulangan->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->nama->Visible) { // nama ?>
    <tr id="r_nama">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ulangan_nama"><?= $Page->nama->caption() ?></span></td>
        <td data-name="nama" <?= $Page->nama->cellAttributes() ?>>
<span id="el_ulangan_nama">
<span<?= $Page->nama->viewAttributes() ?>>
<?= $Page->nama->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->nomor_soal->Visible) { // nomor_soal ?>
    <tr id="r_nomor_soal">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ulangan_nomor_soal"><?= $Page->nomor_soal->caption() ?></span></td>
        <td data-name="nomor_soal" <?= $Page->nomor_soal->cellAttributes() ?>>
<span id="el_ulangan_nomor_soal">
<span<?= $Page->nomor_soal->viewAttributes() ?>>
<?= $Page->nomor_soal->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->skor->Visible) { // skor ?>
    <tr id="r_skor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ulangan_skor"><?= $Page->skor->caption() ?></span></td>
        <td data-name="skor" <?= $Page->skor->cellAttributes() ?>>
<span id="el_ulangan_skor">
<span<?= $Page->skor->viewAttributes() ?>>
<?= $Page->skor->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->jawaban->Visible) { // jawaban ?>
    <tr id="r_jawaban">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ulangan_jawaban"><?= $Page->jawaban->caption() ?></span></td>
        <td data-name="jawaban" <?= $Page->jawaban->cellAttributes() ?>>
<span id="el_ulangan_jawaban">
<span<?= $Page->jawaban->viewAttributes() ?>>
<?= $Page->jawaban->getViewValue() ?></span>
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
