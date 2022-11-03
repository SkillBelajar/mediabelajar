<?php

namespace PHPMaker2021\project1;

// Page object
$IndikatorRencanaBelajarView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var findikator_rencana_belajarview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    findikator_rencana_belajarview = currentForm = new ew.Form("findikator_rencana_belajarview", "view");
    loadjs.done("findikator_rencana_belajarview");
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
<form name="findikator_rencana_belajarview" id="findikator_rencana_belajarview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="indikator_rencana_belajar">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id_indikator->Visible) { // id_indikator ?>
    <tr id="r_id_indikator">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_indikator_rencana_belajar_id_indikator"><?= $Page->id_indikator->caption() ?></span></td>
        <td data-name="id_indikator" <?= $Page->id_indikator->cellAttributes() ?>>
<span id="el_indikator_rencana_belajar_id_indikator">
<span<?= $Page->id_indikator->viewAttributes() ?>>
<?= $Page->id_indikator->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->kategori->Visible) { // kategori ?>
    <tr id="r_kategori">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_indikator_rencana_belajar_kategori"><?= $Page->kategori->caption() ?></span></td>
        <td data-name="kategori" <?= $Page->kategori->cellAttributes() ?>>
<span id="el_indikator_rencana_belajar_kategori">
<span<?= $Page->kategori->viewAttributes() ?>>
<?= $Page->kategori->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->indikator->Visible) { // indikator ?>
    <tr id="r_indikator">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_indikator_rencana_belajar_indikator"><?= $Page->indikator->caption() ?></span></td>
        <td data-name="indikator" <?= $Page->indikator->cellAttributes() ?>>
<span id="el_indikator_rencana_belajar_indikator">
<span<?= $Page->indikator->viewAttributes() ?>>
<?= $Page->indikator->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
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
