<?php

namespace PHPMaker2021\project1;

// Page object
$SiswaDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fsiswadelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fsiswadelete = currentForm = new ew.Form("fsiswadelete", "delete");
    loadjs.done("fsiswadelete");
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
<form name="fsiswadelete" id="fsiswadelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="siswa">
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
<?php if ($Page->id_siswa->Visible) { // id_siswa ?>
        <th class="<?= $Page->id_siswa->headerCellClass() ?>"><span id="elh_siswa_id_siswa" class="siswa_id_siswa"><?= $Page->id_siswa->caption() ?></span></th>
<?php } ?>
<?php if ($Page->kelas->Visible) { // kelas ?>
        <th class="<?= $Page->kelas->headerCellClass() ?>"><span id="elh_siswa_kelas" class="siswa_kelas"><?= $Page->kelas->caption() ?></span></th>
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
<?php if ($Page->id_siswa->Visible) { // id_siswa ?>
        <td <?= $Page->id_siswa->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_siswa_id_siswa" class="siswa_id_siswa">
<span<?= $Page->id_siswa->viewAttributes() ?>>
<?= $Page->id_siswa->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->kelas->Visible) { // kelas ?>
        <td <?= $Page->kelas->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_siswa_kelas" class="siswa_kelas">
<span<?= $Page->kelas->viewAttributes() ?>>
<?= $Page->kelas->getViewValue() ?></span>
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
