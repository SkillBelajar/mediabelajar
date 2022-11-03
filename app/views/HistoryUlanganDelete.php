<?php

namespace PHPMaker2021\project1;

// Page object
$HistoryUlanganDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fhistory_ulangandelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fhistory_ulangandelete = currentForm = new ew.Form("fhistory_ulangandelete", "delete");
    loadjs.done("fhistory_ulangandelete");
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
<form name="fhistory_ulangandelete" id="fhistory_ulangandelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="history_ulangan">
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
<?php if ($Page->id_history_ulangan->Visible) { // id_history_ulangan ?>
        <th class="<?= $Page->id_history_ulangan->headerCellClass() ?>"><span id="elh_history_ulangan_id_history_ulangan" class="history_ulangan_id_history_ulangan"><?= $Page->id_history_ulangan->caption() ?></span></th>
<?php } ?>
<?php if ($Page->media->Visible) { // media ?>
        <th class="<?= $Page->media->headerCellClass() ?>"><span id="elh_history_ulangan_media" class="history_ulangan_media"><?= $Page->media->caption() ?></span></th>
<?php } ?>
<?php if ($Page->nama->Visible) { // nama ?>
        <th class="<?= $Page->nama->headerCellClass() ?>"><span id="elh_history_ulangan_nama" class="history_ulangan_nama"><?= $Page->nama->caption() ?></span></th>
<?php } ?>
<?php if ($Page->nilai->Visible) { // nilai ?>
        <th class="<?= $Page->nilai->headerCellClass() ?>"><span id="elh_history_ulangan_nilai" class="history_ulangan_nilai"><?= $Page->nilai->caption() ?></span></th>
<?php } ?>
<?php if ($Page->tanggal->Visible) { // tanggal ?>
        <th class="<?= $Page->tanggal->headerCellClass() ?>"><span id="elh_history_ulangan_tanggal" class="history_ulangan_tanggal"><?= $Page->tanggal->caption() ?></span></th>
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
<?php if ($Page->id_history_ulangan->Visible) { // id_history_ulangan ?>
        <td <?= $Page->id_history_ulangan->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_history_ulangan_id_history_ulangan" class="history_ulangan_id_history_ulangan">
<span<?= $Page->id_history_ulangan->viewAttributes() ?>>
<?= $Page->id_history_ulangan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->media->Visible) { // media ?>
        <td <?= $Page->media->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_history_ulangan_media" class="history_ulangan_media">
<span<?= $Page->media->viewAttributes() ?>>
<?= $Page->media->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->nama->Visible) { // nama ?>
        <td <?= $Page->nama->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_history_ulangan_nama" class="history_ulangan_nama">
<span<?= $Page->nama->viewAttributes() ?>>
<?= $Page->nama->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->nilai->Visible) { // nilai ?>
        <td <?= $Page->nilai->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_history_ulangan_nilai" class="history_ulangan_nilai">
<span<?= $Page->nilai->viewAttributes() ?>>
<?= $Page->nilai->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->tanggal->Visible) { // tanggal ?>
        <td <?= $Page->tanggal->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_history_ulangan_tanggal" class="history_ulangan_tanggal">
<span<?= $Page->tanggal->viewAttributes() ?>>
<?= $Page->tanggal->getViewValue() ?></span>
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
