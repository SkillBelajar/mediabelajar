<?php

namespace PHPMaker2021\project1;

// Page object
$LiveRencanaView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var flive_rencanaview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    flive_rencanaview = currentForm = new ew.Form("flive_rencanaview", "view");
    loadjs.done("flive_rencanaview");
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
<form name="flive_rencanaview" id="flive_rencanaview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="live_rencana">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id_live_rencana->Visible) { // id_live_rencana ?>
    <tr id="r_id_live_rencana">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_live_rencana_id_live_rencana"><?= $Page->id_live_rencana->caption() ?></span></td>
        <td data-name="id_live_rencana" <?= $Page->id_live_rencana->cellAttributes() ?>>
<span id="el_live_rencana_id_live_rencana">
<span<?= $Page->id_live_rencana->viewAttributes() ?>>
<?= $Page->id_live_rencana->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->id_indikator->Visible) { // id_indikator ?>
    <tr id="r_id_indikator">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_live_rencana_id_indikator"><?= $Page->id_indikator->caption() ?></span></td>
        <td data-name="id_indikator" <?= $Page->id_indikator->cellAttributes() ?>>
<span id="el_live_rencana_id_indikator">
<span<?= $Page->id_indikator->viewAttributes() ?>>
<?= $Page->id_indikator->getViewValue() ?></span>
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
