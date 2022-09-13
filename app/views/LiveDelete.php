<?php

namespace PHPMaker2021\project1;

// Page object
$LiveDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var flivedelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    flivedelete = currentForm = new ew.Form("flivedelete", "delete");
    loadjs.done("flivedelete");
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
<form name="flivedelete" id="flivedelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="live">
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
<?php if ($Page->id_live->Visible) { // id_live ?>
        <th class="<?= $Page->id_live->headerCellClass() ?>"><span id="elh_live_id_live" class="live_id_live"><?= $Page->id_live->caption() ?></span></th>
<?php } ?>
<?php if ($Page->aksi->Visible) { // aksi ?>
        <th class="<?= $Page->aksi->headerCellClass() ?>"><span id="elh_live_aksi" class="live_aksi"><?= $Page->aksi->caption() ?></span></th>
<?php } ?>
<?php if ($Page->id_materi->Visible) { // id_materi ?>
        <th class="<?= $Page->id_materi->headerCellClass() ?>"><span id="elh_live_id_materi" class="live_id_materi"><?= $Page->id_materi->caption() ?></span></th>
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
<?php if ($Page->id_live->Visible) { // id_live ?>
        <td <?= $Page->id_live->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_live_id_live" class="live_id_live">
<span<?= $Page->id_live->viewAttributes() ?>>
<?= $Page->id_live->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->aksi->Visible) { // aksi ?>
        <td <?= $Page->aksi->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_live_aksi" class="live_aksi">
<span<?= $Page->aksi->viewAttributes() ?>>
<?= $Page->aksi->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->id_materi->Visible) { // id_materi ?>
        <td <?= $Page->id_materi->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_live_id_materi" class="live_id_materi">
<span<?= $Page->id_materi->viewAttributes() ?>>
<?= $Page->id_materi->getViewValue() ?></span>
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
