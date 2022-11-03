<?php

namespace PHPMaker2021\project1;

// Page object
$DataPesertaView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fdata_pesertaview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fdata_pesertaview = currentForm = new ew.Form("fdata_pesertaview", "view");
    loadjs.done("fdata_pesertaview");
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
<form name="fdata_pesertaview" id="fdata_pesertaview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="data_peserta">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id_data_peserta->Visible) { // id_data_peserta ?>
    <tr id="r_id_data_peserta">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_data_peserta_id_data_peserta"><?= $Page->id_data_peserta->caption() ?></span></td>
        <td data-name="id_data_peserta" <?= $Page->id_data_peserta->cellAttributes() ?>>
<span id="el_data_peserta_id_data_peserta">
<span<?= $Page->id_data_peserta->viewAttributes() ?>>
<?= $Page->id_data_peserta->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->nama->Visible) { // nama ?>
    <tr id="r_nama">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_data_peserta_nama"><?= $Page->nama->caption() ?></span></td>
        <td data-name="nama" <?= $Page->nama->cellAttributes() ?>>
<span id="el_data_peserta_nama">
<span<?= $Page->nama->viewAttributes() ?>>
<?= $Page->nama->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->emosi->Visible) { // emosi ?>
    <tr id="r_emosi">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_data_peserta_emosi"><?= $Page->emosi->caption() ?></span></td>
        <td data-name="emosi" <?= $Page->emosi->cellAttributes() ?>>
<span id="el_data_peserta_emosi">
<span<?= $Page->emosi->viewAttributes() ?>>
<?= $Page->emosi->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->harapan->Visible) { // harapan ?>
    <tr id="r_harapan">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_data_peserta_harapan"><?= $Page->harapan->caption() ?></span></td>
        <td data-name="harapan" <?= $Page->harapan->cellAttributes() ?>>
<span id="el_data_peserta_harapan">
<span<?= $Page->harapan->viewAttributes() ?>>
<?= $Page->harapan->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->level->Visible) { // level ?>
    <tr id="r_level">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_data_peserta_level"><?= $Page->level->caption() ?></span></td>
        <td data-name="level" <?= $Page->level->cellAttributes() ?>>
<span id="el_data_peserta_level">
<span<?= $Page->level->viewAttributes() ?>>
<?= $Page->level->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->kesiapan->Visible) { // kesiapan ?>
    <tr id="r_kesiapan">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_data_peserta_kesiapan"><?= $Page->kesiapan->caption() ?></span></td>
        <td data-name="kesiapan" <?= $Page->kesiapan->cellAttributes() ?>>
<span id="el_data_peserta_kesiapan">
<span<?= $Page->kesiapan->viewAttributes() ?>>
<?= $Page->kesiapan->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->minat->Visible) { // minat ?>
    <tr id="r_minat">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_data_peserta_minat"><?= $Page->minat->caption() ?></span></td>
        <td data-name="minat" <?= $Page->minat->cellAttributes() ?>>
<span id="el_data_peserta_minat">
<span<?= $Page->minat->viewAttributes() ?>>
<?= $Page->minat->getViewValue() ?></span>
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
