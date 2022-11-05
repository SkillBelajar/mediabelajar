<?php

namespace PHPMaker2021\project1;

// Page object
$OpenSlideDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fopen_slidedelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fopen_slidedelete = currentForm = new ew.Form("fopen_slidedelete", "delete");
    loadjs.done("fopen_slidedelete");
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
<form name="fopen_slidedelete" id="fopen_slidedelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="open_slide">
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
<?php if ($Page->id_open_slide->Visible) { // id_open_slide ?>
        <th class="<?= $Page->id_open_slide->headerCellClass() ?>"><span id="elh_open_slide_id_open_slide" class="open_slide_id_open_slide"><?= $Page->id_open_slide->caption() ?></span></th>
<?php } ?>
<?php if ($Page->nama->Visible) { // nama ?>
        <th class="<?= $Page->nama->headerCellClass() ?>"><span id="elh_open_slide_nama" class="open_slide_nama"><?= $Page->nama->caption() ?></span></th>
<?php } ?>
<?php if ($Page->slide->Visible) { // slide ?>
        <th class="<?= $Page->slide->headerCellClass() ?>"><span id="elh_open_slide_slide" class="open_slide_slide"><?= $Page->slide->caption() ?></span></th>
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
<?php if ($Page->id_open_slide->Visible) { // id_open_slide ?>
        <td <?= $Page->id_open_slide->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_open_slide_id_open_slide" class="open_slide_id_open_slide">
<span<?= $Page->id_open_slide->viewAttributes() ?>>
<?= $Page->id_open_slide->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->nama->Visible) { // nama ?>
        <td <?= $Page->nama->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_open_slide_nama" class="open_slide_nama">
<span<?= $Page->nama->viewAttributes() ?>>
<?= $Page->nama->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->slide->Visible) { // slide ?>
        <td <?= $Page->slide->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_open_slide_slide" class="open_slide_slide">
<span<?= $Page->slide->viewAttributes() ?>>
<?= $Page->slide->getViewValue() ?></span>
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
