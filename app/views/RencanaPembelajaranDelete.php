<?php

namespace PHPMaker2021\project1;

// Page object
$RencanaPembelajaranDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var frencana_pembelajarandelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    frencana_pembelajarandelete = currentForm = new ew.Form("frencana_pembelajarandelete", "delete");
    loadjs.done("frencana_pembelajarandelete");
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
<form name="frencana_pembelajarandelete" id="frencana_pembelajarandelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="rencana_pembelajaran">
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
<?php if ($Page->id_rencana_pembelajaran->Visible) { // id_rencana_pembelajaran ?>
        <th class="<?= $Page->id_rencana_pembelajaran->headerCellClass() ?>"><span id="elh_rencana_pembelajaran_id_rencana_pembelajaran" class="rencana_pembelajaran_id_rencana_pembelajaran"><?= $Page->id_rencana_pembelajaran->caption() ?></span></th>
<?php } ?>
<?php if ($Page->id_indikator->Visible) { // id_indikator ?>
        <th class="<?= $Page->id_indikator->headerCellClass() ?>"><span id="elh_rencana_pembelajaran_id_indikator" class="rencana_pembelajaran_id_indikator"><?= $Page->id_indikator->caption() ?></span></th>
<?php } ?>
<?php if ($Page->id_materi->Visible) { // id_materi ?>
        <th class="<?= $Page->id_materi->headerCellClass() ?>"><span id="elh_rencana_pembelajaran_id_materi" class="rencana_pembelajaran_id_materi"><?= $Page->id_materi->caption() ?></span></th>
<?php } ?>
<?php if ($Page->judul->Visible) { // judul ?>
        <th class="<?= $Page->judul->headerCellClass() ?>"><span id="elh_rencana_pembelajaran_judul" class="rencana_pembelajaran_judul"><?= $Page->judul->caption() ?></span></th>
<?php } ?>
<?php if ($Page->waktu->Visible) { // waktu ?>
        <th class="<?= $Page->waktu->headerCellClass() ?>"><span id="elh_rencana_pembelajaran_waktu" class="rencana_pembelajaran_waktu"><?= $Page->waktu->caption() ?></span></th>
<?php } ?>
<?php if ($Page->tampilkan->Visible) { // tampilkan ?>
        <th class="<?= $Page->tampilkan->headerCellClass() ?>"><span id="elh_rencana_pembelajaran_tampilkan" class="rencana_pembelajaran_tampilkan"><?= $Page->tampilkan->caption() ?></span></th>
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
<?php if ($Page->id_rencana_pembelajaran->Visible) { // id_rencana_pembelajaran ?>
        <td <?= $Page->id_rencana_pembelajaran->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_rencana_pembelajaran_id_rencana_pembelajaran" class="rencana_pembelajaran_id_rencana_pembelajaran">
<span<?= $Page->id_rencana_pembelajaran->viewAttributes() ?>>
<?= $Page->id_rencana_pembelajaran->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->id_indikator->Visible) { // id_indikator ?>
        <td <?= $Page->id_indikator->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_rencana_pembelajaran_id_indikator" class="rencana_pembelajaran_id_indikator">
<span<?= $Page->id_indikator->viewAttributes() ?>>
<?= $Page->id_indikator->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->id_materi->Visible) { // id_materi ?>
        <td <?= $Page->id_materi->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_rencana_pembelajaran_id_materi" class="rencana_pembelajaran_id_materi">
<span<?= $Page->id_materi->viewAttributes() ?>>
<?= $Page->id_materi->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->judul->Visible) { // judul ?>
        <td <?= $Page->judul->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_rencana_pembelajaran_judul" class="rencana_pembelajaran_judul">
<span<?= $Page->judul->viewAttributes() ?>>
<?= $Page->judul->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->waktu->Visible) { // waktu ?>
        <td <?= $Page->waktu->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_rencana_pembelajaran_waktu" class="rencana_pembelajaran_waktu">
<span<?= $Page->waktu->viewAttributes() ?>>
<?= $Page->waktu->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->tampilkan->Visible) { // tampilkan ?>
        <td <?= $Page->tampilkan->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_rencana_pembelajaran_tampilkan" class="rencana_pembelajaran_tampilkan">
<span<?= $Page->tampilkan->viewAttributes() ?>>
<?= $Page->tampilkan->getViewValue() ?></span>
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
