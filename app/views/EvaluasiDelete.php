<?php

namespace PHPMaker2021\project1;

// Page object
$EvaluasiDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fevaluasidelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fevaluasidelete = currentForm = new ew.Form("fevaluasidelete", "delete");
    loadjs.done("fevaluasidelete");
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
<form name="fevaluasidelete" id="fevaluasidelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="evaluasi">
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
<?php if ($Page->id_evaluasi->Visible) { // id_evaluasi ?>
        <th class="<?= $Page->id_evaluasi->headerCellClass() ?>"><span id="elh_evaluasi_id_evaluasi" class="evaluasi_id_evaluasi"><?= $Page->id_evaluasi->caption() ?></span></th>
<?php } ?>
<?php if ($Page->id_materi->Visible) { // id_materi ?>
        <th class="<?= $Page->id_materi->headerCellClass() ?>"><span id="elh_evaluasi_id_materi" class="evaluasi_id_materi"><?= $Page->id_materi->caption() ?></span></th>
<?php } ?>
<?php if ($Page->jawaban->Visible) { // jawaban ?>
        <th class="<?= $Page->jawaban->headerCellClass() ?>"><span id="elh_evaluasi_jawaban" class="evaluasi_jawaban"><?= $Page->jawaban->caption() ?></span></th>
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
<?php if ($Page->id_evaluasi->Visible) { // id_evaluasi ?>
        <td <?= $Page->id_evaluasi->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_evaluasi_id_evaluasi" class="evaluasi_id_evaluasi">
<span<?= $Page->id_evaluasi->viewAttributes() ?>>
<?= $Page->id_evaluasi->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->id_materi->Visible) { // id_materi ?>
        <td <?= $Page->id_materi->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_evaluasi_id_materi" class="evaluasi_id_materi">
<span<?= $Page->id_materi->viewAttributes() ?>>
<?= $Page->id_materi->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->jawaban->Visible) { // jawaban ?>
        <td <?= $Page->jawaban->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_evaluasi_jawaban" class="evaluasi_jawaban">
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
