<?php

namespace PHPMaker2021\project1;

// Page object
$PesertaDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpesertadelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpesertadelete = currentForm = new ew.Form("fpesertadelete", "delete");
    loadjs.done("fpesertadelete");
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
<form name="fpesertadelete" id="fpesertadelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="peserta">
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
<?php if ($Page->id_peserta->Visible) { // id_peserta ?>
        <th class="<?= $Page->id_peserta->headerCellClass() ?>"><span id="elh_peserta_id_peserta" class="peserta_id_peserta"><?= $Page->id_peserta->caption() ?></span></th>
<?php } ?>
<?php if ($Page->tanggal_jam->Visible) { // tanggal_jam ?>
        <th class="<?= $Page->tanggal_jam->headerCellClass() ?>"><span id="elh_peserta_tanggal_jam" class="peserta_tanggal_jam"><?= $Page->tanggal_jam->caption() ?></span></th>
<?php } ?>
<?php if ($Page->nama_peserta->Visible) { // nama_peserta ?>
        <th class="<?= $Page->nama_peserta->headerCellClass() ?>"><span id="elh_peserta_nama_peserta" class="peserta_nama_peserta"><?= $Page->nama_peserta->caption() ?></span></th>
<?php } ?>
<?php if ($Page->id_evaluasi->Visible) { // id_evaluasi ?>
        <th class="<?= $Page->id_evaluasi->headerCellClass() ?>"><span id="elh_peserta_id_evaluasi" class="peserta_id_evaluasi"><?= $Page->id_evaluasi->caption() ?></span></th>
<?php } ?>
<?php if ($Page->benar->Visible) { // benar ?>
        <th class="<?= $Page->benar->headerCellClass() ?>"><span id="elh_peserta_benar" class="peserta_benar"><?= $Page->benar->caption() ?></span></th>
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
<?php if ($Page->id_peserta->Visible) { // id_peserta ?>
        <td <?= $Page->id_peserta->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_peserta_id_peserta" class="peserta_id_peserta">
<span<?= $Page->id_peserta->viewAttributes() ?>>
<?= $Page->id_peserta->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->tanggal_jam->Visible) { // tanggal_jam ?>
        <td <?= $Page->tanggal_jam->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_peserta_tanggal_jam" class="peserta_tanggal_jam">
<span<?= $Page->tanggal_jam->viewAttributes() ?>>
<?= $Page->tanggal_jam->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->nama_peserta->Visible) { // nama_peserta ?>
        <td <?= $Page->nama_peserta->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_peserta_nama_peserta" class="peserta_nama_peserta">
<span<?= $Page->nama_peserta->viewAttributes() ?>>
<?= $Page->nama_peserta->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->id_evaluasi->Visible) { // id_evaluasi ?>
        <td <?= $Page->id_evaluasi->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_peserta_id_evaluasi" class="peserta_id_evaluasi">
<span<?= $Page->id_evaluasi->viewAttributes() ?>>
<?= $Page->id_evaluasi->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->benar->Visible) { // benar ?>
        <td <?= $Page->benar->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_peserta_benar" class="peserta_benar">
<span<?= $Page->benar->viewAttributes() ?>>
<?= $Page->benar->getViewValue() ?></span>
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
