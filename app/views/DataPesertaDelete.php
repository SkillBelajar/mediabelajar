<?php

namespace PHPMaker2021\project1;

// Page object
$DataPesertaDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fdata_pesertadelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fdata_pesertadelete = currentForm = new ew.Form("fdata_pesertadelete", "delete");
    loadjs.done("fdata_pesertadelete");
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
<form name="fdata_pesertadelete" id="fdata_pesertadelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="data_peserta">
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
<?php if ($Page->id_data_peserta->Visible) { // id_data_peserta ?>
        <th class="<?= $Page->id_data_peserta->headerCellClass() ?>"><span id="elh_data_peserta_id_data_peserta" class="data_peserta_id_data_peserta"><?= $Page->id_data_peserta->caption() ?></span></th>
<?php } ?>
<?php if ($Page->nama->Visible) { // nama ?>
        <th class="<?= $Page->nama->headerCellClass() ?>"><span id="elh_data_peserta_nama" class="data_peserta_nama"><?= $Page->nama->caption() ?></span></th>
<?php } ?>
<?php if ($Page->emosi->Visible) { // emosi ?>
        <th class="<?= $Page->emosi->headerCellClass() ?>"><span id="elh_data_peserta_emosi" class="data_peserta_emosi"><?= $Page->emosi->caption() ?></span></th>
<?php } ?>
<?php if ($Page->level->Visible) { // level ?>
        <th class="<?= $Page->level->headerCellClass() ?>"><span id="elh_data_peserta_level" class="data_peserta_level"><?= $Page->level->caption() ?></span></th>
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
<?php if ($Page->id_data_peserta->Visible) { // id_data_peserta ?>
        <td <?= $Page->id_data_peserta->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_data_peserta_id_data_peserta" class="data_peserta_id_data_peserta">
<span<?= $Page->id_data_peserta->viewAttributes() ?>>
<?= $Page->id_data_peserta->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->nama->Visible) { // nama ?>
        <td <?= $Page->nama->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_data_peserta_nama" class="data_peserta_nama">
<span<?= $Page->nama->viewAttributes() ?>>
<?= $Page->nama->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->emosi->Visible) { // emosi ?>
        <td <?= $Page->emosi->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_data_peserta_emosi" class="data_peserta_emosi">
<span<?= $Page->emosi->viewAttributes() ?>>
<?= $Page->emosi->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->level->Visible) { // level ?>
        <td <?= $Page->level->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_data_peserta_level" class="data_peserta_level">
<span<?= $Page->level->viewAttributes() ?>>
<?= $Page->level->getViewValue() ?></span>
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
