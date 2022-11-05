<?php

namespace PHPMaker2021\project1;

// Page object
$LiveRencanaDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var flive_rencanadelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    flive_rencanadelete = currentForm = new ew.Form("flive_rencanadelete", "delete");
    loadjs.done("flive_rencanadelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="flive_rencanadelete" id="flive_rencanadelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="live_rencana">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($Page->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?= HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
    <thead>
    <tr class="ew-table-header">
<?php if ($Page->id_live_rencana->Visible) { // id_live_rencana ?>
        <th class="<?= $Page->id_live_rencana->headerCellClass() ?>"><span id="elh_live_rencana_id_live_rencana" class="live_rencana_id_live_rencana"><?= $Page->id_live_rencana->caption() ?></span></th>
<?php } ?>
<?php if ($Page->id_indikator->Visible) { // id_indikator ?>
        <th class="<?= $Page->id_indikator->headerCellClass() ?>"><span id="elh_live_rencana_id_indikator" class="live_rencana_id_indikator"><?= $Page->id_indikator->caption() ?></span></th>
<?php } ?>
    </tr>
    </thead>
    <tbody>
<?php
$Page->RecordCount = 0;
$i = 0;
while (!$Page->Recordset->EOF) {
    $Page->RecordCount++;
    $Page->RowCount++;

    // Set row properties
    $Page->resetAttributes();
    $Page->RowType = ROWTYPE_VIEW; // View

    // Get the field contents
    $Page->loadRowValues($Page->Recordset);

    // Render row
    $Page->renderRow();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php if ($Page->id_live_rencana->Visible) { // id_live_rencana ?>
        <td <?= $Page->id_live_rencana->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_live_rencana_id_live_rencana" class="live_rencana_id_live_rencana">
<span<?= $Page->id_live_rencana->viewAttributes() ?>>
<?= $Page->id_live_rencana->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->id_indikator->Visible) { // id_indikator ?>
        <td <?= $Page->id_indikator->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_live_rencana_id_indikator" class="live_rencana_id_indikator">
<span<?= $Page->id_indikator->viewAttributes() ?>>
<?= $Page->id_indikator->getViewValue() ?></span>
</span>
</td>
<?php } ?>
    </tr>
<?php
    $Page->Recordset->moveNext();
}
$Page->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= GetUrl($Page->getReturnUrl()) ?>"><?= $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
