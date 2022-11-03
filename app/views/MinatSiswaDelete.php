<?php

namespace PHPMaker2021\project1;

// Page object
$MinatSiswaDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fminat_siswadelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fminat_siswadelete = currentForm = new ew.Form("fminat_siswadelete", "delete");
    loadjs.done("fminat_siswadelete");
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
<form name="fminat_siswadelete" id="fminat_siswadelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="minat_siswa">
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
<?php if ($Page->id_minat_siswa->Visible) { // id_minat_siswa ?>
        <th class="<?= $Page->id_minat_siswa->headerCellClass() ?>"><span id="elh_minat_siswa_id_minat_siswa" class="minat_siswa_id_minat_siswa"><?= $Page->id_minat_siswa->caption() ?></span></th>
<?php } ?>
<?php if ($Page->nama->Visible) { // nama ?>
        <th class="<?= $Page->nama->headerCellClass() ?>"><span id="elh_minat_siswa_nama" class="minat_siswa_nama"><?= $Page->nama->caption() ?></span></th>
<?php } ?>
<?php if ($Page->emosi->Visible) { // emosi ?>
        <th class="<?= $Page->emosi->headerCellClass() ?>"><span id="elh_minat_siswa_emosi" class="minat_siswa_emosi"><?= $Page->emosi->caption() ?></span></th>
<?php } ?>
<?php if ($Page->tgl->Visible) { // tgl ?>
        <th class="<?= $Page->tgl->headerCellClass() ?>"><span id="elh_minat_siswa_tgl" class="minat_siswa_tgl"><?= $Page->tgl->caption() ?></span></th>
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
<?php if ($Page->id_minat_siswa->Visible) { // id_minat_siswa ?>
        <td <?= $Page->id_minat_siswa->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_minat_siswa_id_minat_siswa" class="minat_siswa_id_minat_siswa">
<span<?= $Page->id_minat_siswa->viewAttributes() ?>>
<?= $Page->id_minat_siswa->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->nama->Visible) { // nama ?>
        <td <?= $Page->nama->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_minat_siswa_nama" class="minat_siswa_nama">
<span<?= $Page->nama->viewAttributes() ?>>
<?= $Page->nama->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->emosi->Visible) { // emosi ?>
        <td <?= $Page->emosi->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_minat_siswa_emosi" class="minat_siswa_emosi">
<span<?= $Page->emosi->viewAttributes() ?>>
<?= $Page->emosi->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->tgl->Visible) { // tgl ?>
        <td <?= $Page->tgl->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_minat_siswa_tgl" class="minat_siswa_tgl">
<span<?= $Page->tgl->viewAttributes() ?>>
<?= $Page->tgl->getViewValue() ?></span>
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
