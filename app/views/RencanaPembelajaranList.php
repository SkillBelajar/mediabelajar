<?php

namespace PHPMaker2021\project1;

// Page object
$RencanaPembelajaranList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var frencana_pembelajaranlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    frencana_pembelajaranlist = currentForm = new ew.Form("frencana_pembelajaranlist", "list");
    frencana_pembelajaranlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("frencana_pembelajaranlist");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($Page->TotalRecords > 0 && $Page->ExportOptions->visible()) { ?>
<?php $Page->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($Page->ImportOptions->visible()) { ?>
<?php $Page->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$Page->isExport() || Config("EXPORT_MASTER_RECORD") && $Page->isExport("print")) { ?>
<?php
if ($Page->DbMasterFilter != "" && $Page->getCurrentMasterTable() == "indikator_rencana_belajar") {
    if ($Page->MasterRecordExists) {
        include_once "views/IndikatorRencanaBelajarMaster.php";
    }
}
?>
<?php
if ($Page->DbMasterFilter != "" && $Page->getCurrentMasterTable() == "materi") {
    if ($Page->MasterRecordExists) {
        include_once "views/MateriMaster.php";
    }
}
?>
<?php } ?>
<?php
$Page->renderOtherOptions();
?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<?php if ($Page->TotalRecords > 0 || $Page->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> rencana_pembelajaran">
<form name="frencana_pembelajaranlist" id="frencana_pembelajaranlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="rencana_pembelajaran">
<?php if ($Page->getCurrentMasterTable() == "indikator_rencana_belajar" && $Page->CurrentAction) { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="indikator_rencana_belajar">
<input type="hidden" name="fk_id_indikator" value="<?= HtmlEncode($Page->id_indikator->getSessionValue()) ?>">
<?php } ?>
<?php if ($Page->getCurrentMasterTable() == "materi" && $Page->CurrentAction) { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="materi">
<input type="hidden" name="fk_id_materi" value="<?= HtmlEncode($Page->id_materi->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_rencana_pembelajaran" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_rencana_pembelajaranlist" class="table ew-table"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Page->RowType = ROWTYPE_HEADER;

// Render list options
$Page->renderListOptions();

// Render list options (header, left)
$Page->ListOptions->render("header", "left");
?>
<?php if ($Page->id_rencana_pembelajaran->Visible) { // id_rencana_pembelajaran ?>
        <th data-name="id_rencana_pembelajaran" class="<?= $Page->id_rencana_pembelajaran->headerCellClass() ?>"><div id="elh_rencana_pembelajaran_id_rencana_pembelajaran" class="rencana_pembelajaran_id_rencana_pembelajaran"><?= $Page->renderSort($Page->id_rencana_pembelajaran) ?></div></th>
<?php } ?>
<?php if ($Page->id_indikator->Visible) { // id_indikator ?>
        <th data-name="id_indikator" class="<?= $Page->id_indikator->headerCellClass() ?>"><div id="elh_rencana_pembelajaran_id_indikator" class="rencana_pembelajaran_id_indikator"><?= $Page->renderSort($Page->id_indikator) ?></div></th>
<?php } ?>
<?php if ($Page->id_materi->Visible) { // id_materi ?>
        <th data-name="id_materi" class="<?= $Page->id_materi->headerCellClass() ?>"><div id="elh_rencana_pembelajaran_id_materi" class="rencana_pembelajaran_id_materi"><?= $Page->renderSort($Page->id_materi) ?></div></th>
<?php } ?>
<?php if ($Page->waktu->Visible) { // waktu ?>
        <th data-name="waktu" class="<?= $Page->waktu->headerCellClass() ?>"><div id="elh_rencana_pembelajaran_waktu" class="rencana_pembelajaran_waktu"><?= $Page->renderSort($Page->waktu) ?></div></th>
<?php } ?>
<?php if ($Page->tampilkan->Visible) { // tampilkan ?>
        <th data-name="tampilkan" class="<?= $Page->tampilkan->headerCellClass() ?>"><div id="elh_rencana_pembelajaran_tampilkan" class="rencana_pembelajaran_tampilkan"><?= $Page->renderSort($Page->tampilkan) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Page->ListOptions->render("header", "right");
?>
    </tr>
</thead>
<tbody>
<?php
if ($Page->ExportAll && $Page->isExport()) {
    $Page->StopRecord = $Page->TotalRecords;
} else {
    // Set the last record to display
    if ($Page->TotalRecords > $Page->StartRecord + $Page->DisplayRecords - 1) {
        $Page->StopRecord = $Page->StartRecord + $Page->DisplayRecords - 1;
    } else {
        $Page->StopRecord = $Page->TotalRecords;
    }
}
$Page->RecordCount = $Page->StartRecord - 1;
if ($Page->Recordset && !$Page->Recordset->EOF) {
    // Nothing to do
} elseif (!$Page->AllowAddDeleteRow && $Page->StopRecord == 0) {
    $Page->StopRecord = $Page->GridAddRowCount;
}

// Initialize aggregate
$Page->RowType = ROWTYPE_AGGREGATEINIT;
$Page->resetAttributes();
$Page->renderRow();
while ($Page->RecordCount < $Page->StopRecord) {
    $Page->RecordCount++;
    if ($Page->RecordCount >= $Page->StartRecord) {
        $Page->RowCount++;

        // Set up key count
        $Page->KeyCount = $Page->RowIndex;

        // Init row class and style
        $Page->resetAttributes();
        $Page->CssClass = "";
        if ($Page->isGridAdd()) {
        } else {
            $Page->loadRowValues($Page->Recordset); // Load row values
        }
        $Page->RowType = ROWTYPE_VIEW; // Render view

        // Set up row id / data-rowindex
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_rencana_pembelajaran", "data-rowtype" => $Page->RowType]);

        // Render row
        $Page->renderRow();

        // Render list options
        $Page->renderListOptions();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount);
?>
    <?php if ($Page->id_rencana_pembelajaran->Visible) { // id_rencana_pembelajaran ?>
        <td data-name="id_rencana_pembelajaran" <?= $Page->id_rencana_pembelajaran->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_rencana_pembelajaran_id_rencana_pembelajaran">
<span<?= $Page->id_rencana_pembelajaran->viewAttributes() ?>>
<?= $Page->id_rencana_pembelajaran->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->id_indikator->Visible) { // id_indikator ?>
        <td data-name="id_indikator" <?= $Page->id_indikator->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_rencana_pembelajaran_id_indikator">
<span<?= $Page->id_indikator->viewAttributes() ?>>
<?= $Page->id_indikator->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->id_materi->Visible) { // id_materi ?>
        <td data-name="id_materi" <?= $Page->id_materi->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_rencana_pembelajaran_id_materi">
<span<?= $Page->id_materi->viewAttributes() ?>>
<?= $Page->id_materi->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->waktu->Visible) { // waktu ?>
        <td data-name="waktu" <?= $Page->waktu->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_rencana_pembelajaran_waktu">
<span<?= $Page->waktu->viewAttributes() ?>>
<?= $Page->waktu->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->tampilkan->Visible) { // tampilkan ?>
        <td data-name="tampilkan" <?= $Page->tampilkan->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_rencana_pembelajaran_tampilkan">
<span<?= $Page->tampilkan->viewAttributes() ?>>
<?= $Page->tampilkan->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
?>
    </tr>
<?php
    }
    if (!$Page->isGridAdd()) {
        $Page->Recordset->moveNext();
    }
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$Page->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php
// Close recordset
if ($Page->Recordset) {
    $Page->Recordset->close();
}
?>
<?php if (!$Page->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$Page->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?= CurrentPageUrl() ?>">
<?= $Page->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($Page->TotalRecords == 0 && !$Page->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("rencana_pembelajaran");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
