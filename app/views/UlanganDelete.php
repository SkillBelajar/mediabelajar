<?php

namespace PHPMaker2021\project1;

// Page object
$UlanganDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fulangandelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fulangandelete = currentForm = new ew.Form("fulangandelete", "delete");
    loadjs.done("fulangandelete");
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
<form name="fulangandelete" id="fulangandelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ulangan">
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
<?php if ($Page->id_ulangan->Visible) { // id_ulangan ?>
        <th class="<?= $Page->id_ulangan->headerCellClass() ?>"><span id="elh_ulangan_id_ulangan" class="ulangan_id_ulangan"><?= $Page->id_ulangan->caption() ?></span></th>
<?php } ?>
<?php if ($Page->nama->Visible) { // nama ?>
        <th class="<?= $Page->nama->headerCellClass() ?>"><span id="elh_ulangan_nama" class="ulangan_nama"><?= $Page->nama->caption() ?></span></th>
<?php } ?>
<?php if ($Page->nomor_soal->Visible) { // nomor_soal ?>
        <th class="<?= $Page->nomor_soal->headerCellClass() ?>"><span id="elh_ulangan_nomor_soal" class="ulangan_nomor_soal"><?= $Page->nomor_soal->caption() ?></span></th>
<?php } ?>
<?php if ($Page->skor->Visible) { // skor ?>
        <th class="<?= $Page->skor->headerCellClass() ?>"><span id="elh_ulangan_skor" class="ulangan_skor"><?= $Page->skor->caption() ?></span></th>
<?php } ?>
<?php if ($Page->jawaban->Visible) { // jawaban ?>
        <th class="<?= $Page->jawaban->headerCellClass() ?>"><span id="elh_ulangan_jawaban" class="ulangan_jawaban"><?= $Page->jawaban->caption() ?></span></th>
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
<?php if ($Page->id_ulangan->Visible) { // id_ulangan ?>
        <td <?= $Page->id_ulangan->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ulangan_id_ulangan" class="ulangan_id_ulangan">
<span<?= $Page->id_ulangan->viewAttributes() ?>>
<?= $Page->id_ulangan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->nama->Visible) { // nama ?>
        <td <?= $Page->nama->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ulangan_nama" class="ulangan_nama">
<span<?= $Page->nama->viewAttributes() ?>>
<?= $Page->nama->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->nomor_soal->Visible) { // nomor_soal ?>
        <td <?= $Page->nomor_soal->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ulangan_nomor_soal" class="ulangan_nomor_soal">
<span<?= $Page->nomor_soal->viewAttributes() ?>>
<?= $Page->nomor_soal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->skor->Visible) { // skor ?>
        <td <?= $Page->skor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ulangan_skor" class="ulangan_skor">
<span<?= $Page->skor->viewAttributes() ?>>
<?= $Page->skor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->jawaban->Visible) { // jawaban ?>
        <td <?= $Page->jawaban->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ulangan_jawaban" class="ulangan_jawaban">
<span<?= $Page->jawaban->viewAttributes() ?>>
<?= $Page->jawaban->getViewValue() ?></span>
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
