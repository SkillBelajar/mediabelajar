<?php

namespace PHPMaker2021\project1;

// Set up and run Grid object
$Grid = Container("RencanaPembelajaranGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var frencana_pembelajarangrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    frencana_pembelajarangrid = new ew.Form("frencana_pembelajarangrid", "grid");
    frencana_pembelajarangrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var fields = ew.vars.tables.rencana_pembelajaran.fields;
    frencana_pembelajarangrid.addFields([
        ["id_rencana_pembelajaran", [fields.id_rencana_pembelajaran.required ? ew.Validators.required(fields.id_rencana_pembelajaran.caption) : null], fields.id_rencana_pembelajaran.isInvalid],
        ["id_indikator", [fields.id_indikator.required ? ew.Validators.required(fields.id_indikator.caption) : null], fields.id_indikator.isInvalid],
        ["id_materi", [fields.id_materi.required ? ew.Validators.required(fields.id_materi.caption) : null], fields.id_materi.isInvalid],
        ["waktu", [fields.waktu.required ? ew.Validators.required(fields.waktu.caption) : null], fields.waktu.isInvalid],
        ["tampilkan", [fields.tampilkan.required ? ew.Validators.required(fields.tampilkan.caption) : null], fields.tampilkan.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = frencana_pembelajarangrid,
            fobj = f.getForm(),
            $fobj = $(fobj),
            $k = $fobj.find("#" + f.formKeyCountName), // Get key_count
            rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1,
            startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
        for (var i = startcnt; i <= rowcnt; i++) {
            var rowIndex = ($k[0]) ? String(i) : "";
            f.setInvalid(rowIndex);
        }
    });

    // Validate form
    frencana_pembelajarangrid.validate = function () {
        if (!this.validateRequired)
            return true; // Ignore validation
        var fobj = this.getForm(),
            $fobj = $(fobj);
        if ($fobj.find("#confirm").val() == "confirm")
            return true;
        var addcnt = 0,
            $k = $fobj.find("#" + this.formKeyCountName), // Get key_count
            rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1,
            startcnt = (rowcnt == 0) ? 0 : 1, // Check rowcnt == 0 => Inline-Add
            gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
        for (var i = startcnt; i <= rowcnt; i++) {
            var rowIndex = ($k[0]) ? String(i) : "";
            $fobj.data("rowindex", rowIndex);
            var checkrow = (gridinsert) ? !this.emptyRow(rowIndex) : true;
            if (checkrow) {
                addcnt++;

            // Validate fields
            if (!this.validateFields(rowIndex))
                return false;

            // Call Form_CustomValidate event
            if (!this.customValidate(fobj)) {
                this.focus();
                return false;
            }
            } // End Grid Add checking
        }
        return true;
    }

    // Check empty row
    frencana_pembelajarangrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "id_indikator", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "id_materi", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "waktu", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "tampilkan", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    frencana_pembelajarangrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    frencana_pembelajarangrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    frencana_pembelajarangrid.lists.id_indikator = <?= $Grid->id_indikator->toClientList($Grid) ?>;
    frencana_pembelajarangrid.lists.id_materi = <?= $Grid->id_materi->toClientList($Grid) ?>;
    frencana_pembelajarangrid.lists.tampilkan = <?= $Grid->tampilkan->toClientList($Grid) ?>;
    loadjs.done("frencana_pembelajarangrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> rencana_pembelajaran">
<div id="frencana_pembelajarangrid" class="ew-form ew-list-form form-inline">
<div id="gmp_rencana_pembelajaran" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_rencana_pembelajarangrid" class="table ew-table"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Grid->RowType = ROWTYPE_HEADER;

// Render list options
$Grid->renderListOptions();

// Render list options (header, left)
$Grid->ListOptions->render("header", "left");
?>
<?php if ($Grid->id_rencana_pembelajaran->Visible) { // id_rencana_pembelajaran ?>
        <th data-name="id_rencana_pembelajaran" class="<?= $Grid->id_rencana_pembelajaran->headerCellClass() ?>"><div id="elh_rencana_pembelajaran_id_rencana_pembelajaran" class="rencana_pembelajaran_id_rencana_pembelajaran"><?= $Grid->renderSort($Grid->id_rencana_pembelajaran) ?></div></th>
<?php } ?>
<?php if ($Grid->id_indikator->Visible) { // id_indikator ?>
        <th data-name="id_indikator" class="<?= $Grid->id_indikator->headerCellClass() ?>"><div id="elh_rencana_pembelajaran_id_indikator" class="rencana_pembelajaran_id_indikator"><?= $Grid->renderSort($Grid->id_indikator) ?></div></th>
<?php } ?>
<?php if ($Grid->id_materi->Visible) { // id_materi ?>
        <th data-name="id_materi" class="<?= $Grid->id_materi->headerCellClass() ?>"><div id="elh_rencana_pembelajaran_id_materi" class="rencana_pembelajaran_id_materi"><?= $Grid->renderSort($Grid->id_materi) ?></div></th>
<?php } ?>
<?php if ($Grid->waktu->Visible) { // waktu ?>
        <th data-name="waktu" class="<?= $Grid->waktu->headerCellClass() ?>"><div id="elh_rencana_pembelajaran_waktu" class="rencana_pembelajaran_waktu"><?= $Grid->renderSort($Grid->waktu) ?></div></th>
<?php } ?>
<?php if ($Grid->tampilkan->Visible) { // tampilkan ?>
        <th data-name="tampilkan" class="<?= $Grid->tampilkan->headerCellClass() ?>"><div id="elh_rencana_pembelajaran_tampilkan" class="rencana_pembelajaran_tampilkan"><?= $Grid->renderSort($Grid->tampilkan) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Grid->ListOptions->render("header", "right");
?>
    </tr>
</thead>
<tbody>
<?php
$Grid->StartRecord = 1;
$Grid->StopRecord = $Grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($Grid->isConfirm() || $Grid->EventCancelled)) {
    $CurrentForm->Index = -1;
    if ($CurrentForm->hasValue($Grid->FormKeyCountName) && ($Grid->isGridAdd() || $Grid->isGridEdit() || $Grid->isConfirm())) {
        $Grid->KeyCount = $CurrentForm->getValue($Grid->FormKeyCountName);
        $Grid->StopRecord = $Grid->StartRecord + $Grid->KeyCount - 1;
    }
}
$Grid->RecordCount = $Grid->StartRecord - 1;
if ($Grid->Recordset && !$Grid->Recordset->EOF) {
    // Nothing to do
} elseif (!$Grid->AllowAddDeleteRow && $Grid->StopRecord == 0) {
    $Grid->StopRecord = $Grid->GridAddRowCount;
}

// Initialize aggregate
$Grid->RowType = ROWTYPE_AGGREGATEINIT;
$Grid->resetAttributes();
$Grid->renderRow();
if ($Grid->isGridAdd())
    $Grid->RowIndex = 0;
if ($Grid->isGridEdit())
    $Grid->RowIndex = 0;
while ($Grid->RecordCount < $Grid->StopRecord) {
    $Grid->RecordCount++;
    if ($Grid->RecordCount >= $Grid->StartRecord) {
        $Grid->RowCount++;
        if ($Grid->isGridAdd() || $Grid->isGridEdit() || $Grid->isConfirm()) {
            $Grid->RowIndex++;
            $CurrentForm->Index = $Grid->RowIndex;
            if ($CurrentForm->hasValue($Grid->FormActionName) && ($Grid->isConfirm() || $Grid->EventCancelled)) {
                $Grid->RowAction = strval($CurrentForm->getValue($Grid->FormActionName));
            } elseif ($Grid->isGridAdd()) {
                $Grid->RowAction = "insert";
            } else {
                $Grid->RowAction = "";
            }
        }

        // Set up key count
        $Grid->KeyCount = $Grid->RowIndex;

        // Init row class and style
        $Grid->resetAttributes();
        $Grid->CssClass = "";
        if ($Grid->isGridAdd()) {
            if ($Grid->CurrentMode == "copy") {
                $Grid->loadRowValues($Grid->Recordset); // Load row values
                $Grid->setRecordKey($Grid->RowOldKey, $Grid->Recordset); // Set old record key
            } else {
                $Grid->loadRowValues(); // Load default values
                $Grid->RowOldKey = ""; // Clear old key value
            }
        } else {
            $Grid->loadRowValues($Grid->Recordset); // Load row values
        }
        $Grid->RowType = ROWTYPE_VIEW; // Render view
        if ($Grid->isGridAdd()) { // Grid add
            $Grid->RowType = ROWTYPE_ADD; // Render add
        }
        if ($Grid->isGridAdd() && $Grid->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) { // Insert failed
            $Grid->restoreCurrentRowFormValues($Grid->RowIndex); // Restore form values
        }
        if ($Grid->isGridEdit()) { // Grid edit
            if ($Grid->EventCancelled) {
                $Grid->restoreCurrentRowFormValues($Grid->RowIndex); // Restore form values
            }
            if ($Grid->RowAction == "insert") {
                $Grid->RowType = ROWTYPE_ADD; // Render add
            } else {
                $Grid->RowType = ROWTYPE_EDIT; // Render edit
            }
        }
        if ($Grid->isGridEdit() && ($Grid->RowType == ROWTYPE_EDIT || $Grid->RowType == ROWTYPE_ADD) && $Grid->EventCancelled) { // Update failed
            $Grid->restoreCurrentRowFormValues($Grid->RowIndex); // Restore form values
        }
        if ($Grid->RowType == ROWTYPE_EDIT) { // Edit row
            $Grid->EditRowCount++;
        }
        if ($Grid->isConfirm()) { // Confirm row
            $Grid->restoreCurrentRowFormValues($Grid->RowIndex); // Restore form values
        }

        // Set up row id / data-rowindex
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_rencana_pembelajaran", "data-rowtype" => $Grid->RowType]);

        // Render row
        $Grid->renderRow();

        // Render list options
        $Grid->renderListOptions();

        // Skip delete row / empty row for confirm page
        if ($Grid->RowAction != "delete" && $Grid->RowAction != "insertdelete" && !($Grid->RowAction == "insert" && $Grid->isConfirm() && $Grid->emptyRow())) {
?>
    <tr <?= $Grid->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Grid->ListOptions->render("body", "left", $Grid->RowCount);
?>
    <?php if ($Grid->id_rencana_pembelajaran->Visible) { // id_rencana_pembelajaran ?>
        <td data-name="id_rencana_pembelajaran" <?= $Grid->id_rencana_pembelajaran->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_rencana_pembelajaran_id_rencana_pembelajaran" class="form-group"></span>
<input type="hidden" data-table="rencana_pembelajaran" data-field="x_id_rencana_pembelajaran" name="o<?= $Grid->RowIndex ?>_id_rencana_pembelajaran" id="o<?= $Grid->RowIndex ?>_id_rencana_pembelajaran" value="<?= HtmlEncode($Grid->id_rencana_pembelajaran->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_rencana_pembelajaran_id_rencana_pembelajaran" class="form-group">
<span<?= $Grid->id_rencana_pembelajaran->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id_rencana_pembelajaran->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="rencana_pembelajaran" data-field="x_id_rencana_pembelajaran" name="x<?= $Grid->RowIndex ?>_id_rencana_pembelajaran" id="x<?= $Grid->RowIndex ?>_id_rencana_pembelajaran" value="<?= HtmlEncode($Grid->id_rencana_pembelajaran->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_rencana_pembelajaran_id_rencana_pembelajaran">
<span<?= $Grid->id_rencana_pembelajaran->viewAttributes() ?>>
<?= $Grid->id_rencana_pembelajaran->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="rencana_pembelajaran" data-field="x_id_rencana_pembelajaran" name="frencana_pembelajarangrid$x<?= $Grid->RowIndex ?>_id_rencana_pembelajaran" id="frencana_pembelajarangrid$x<?= $Grid->RowIndex ?>_id_rencana_pembelajaran" value="<?= HtmlEncode($Grid->id_rencana_pembelajaran->FormValue) ?>">
<input type="hidden" data-table="rencana_pembelajaran" data-field="x_id_rencana_pembelajaran" name="frencana_pembelajarangrid$o<?= $Grid->RowIndex ?>_id_rencana_pembelajaran" id="frencana_pembelajarangrid$o<?= $Grid->RowIndex ?>_id_rencana_pembelajaran" value="<?= HtmlEncode($Grid->id_rencana_pembelajaran->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->id_indikator->Visible) { // id_indikator ?>
        <td data-name="id_indikator" <?= $Grid->id_indikator->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->id_indikator->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_rencana_pembelajaran_id_indikator" class="form-group">
<span<?= $Grid->id_indikator->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id_indikator->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_id_indikator" name="x<?= $Grid->RowIndex ?>_id_indikator" value="<?= HtmlEncode($Grid->id_indikator->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_rencana_pembelajaran_id_indikator" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_id_indikator"
        name="x<?= $Grid->RowIndex ?>_id_indikator"
        class="form-control ew-select<?= $Grid->id_indikator->isInvalidClass() ?>"
        data-select2-id="rencana_pembelajaran_x<?= $Grid->RowIndex ?>_id_indikator"
        data-table="rencana_pembelajaran"
        data-field="x_id_indikator"
        data-value-separator="<?= $Grid->id_indikator->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->id_indikator->getPlaceHolder()) ?>"
        <?= $Grid->id_indikator->editAttributes() ?>>
        <?= $Grid->id_indikator->selectOptionListHtml("x{$Grid->RowIndex}_id_indikator") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->id_indikator->getErrorMessage() ?></div>
<?= $Grid->id_indikator->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_id_indikator") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='rencana_pembelajaran_x<?= $Grid->RowIndex ?>_id_indikator']"),
        options = { name: "x<?= $Grid->RowIndex ?>_id_indikator", selectId: "rencana_pembelajaran_x<?= $Grid->RowIndex ?>_id_indikator", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.rencana_pembelajaran.fields.id_indikator.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<input type="hidden" data-table="rencana_pembelajaran" data-field="x_id_indikator" name="o<?= $Grid->RowIndex ?>_id_indikator" id="o<?= $Grid->RowIndex ?>_id_indikator" value="<?= HtmlEncode($Grid->id_indikator->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->id_indikator->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_rencana_pembelajaran_id_indikator" class="form-group">
<span<?= $Grid->id_indikator->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id_indikator->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_id_indikator" name="x<?= $Grid->RowIndex ?>_id_indikator" value="<?= HtmlEncode($Grid->id_indikator->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_rencana_pembelajaran_id_indikator" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_id_indikator"
        name="x<?= $Grid->RowIndex ?>_id_indikator"
        class="form-control ew-select<?= $Grid->id_indikator->isInvalidClass() ?>"
        data-select2-id="rencana_pembelajaran_x<?= $Grid->RowIndex ?>_id_indikator"
        data-table="rencana_pembelajaran"
        data-field="x_id_indikator"
        data-value-separator="<?= $Grid->id_indikator->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->id_indikator->getPlaceHolder()) ?>"
        <?= $Grid->id_indikator->editAttributes() ?>>
        <?= $Grid->id_indikator->selectOptionListHtml("x{$Grid->RowIndex}_id_indikator") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->id_indikator->getErrorMessage() ?></div>
<?= $Grid->id_indikator->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_id_indikator") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='rencana_pembelajaran_x<?= $Grid->RowIndex ?>_id_indikator']"),
        options = { name: "x<?= $Grid->RowIndex ?>_id_indikator", selectId: "rencana_pembelajaran_x<?= $Grid->RowIndex ?>_id_indikator", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.rencana_pembelajaran.fields.id_indikator.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_rencana_pembelajaran_id_indikator">
<span<?= $Grid->id_indikator->viewAttributes() ?>>
<?= $Grid->id_indikator->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="rencana_pembelajaran" data-field="x_id_indikator" name="frencana_pembelajarangrid$x<?= $Grid->RowIndex ?>_id_indikator" id="frencana_pembelajarangrid$x<?= $Grid->RowIndex ?>_id_indikator" value="<?= HtmlEncode($Grid->id_indikator->FormValue) ?>">
<input type="hidden" data-table="rencana_pembelajaran" data-field="x_id_indikator" name="frencana_pembelajarangrid$o<?= $Grid->RowIndex ?>_id_indikator" id="frencana_pembelajarangrid$o<?= $Grid->RowIndex ?>_id_indikator" value="<?= HtmlEncode($Grid->id_indikator->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->id_materi->Visible) { // id_materi ?>
        <td data-name="id_materi" <?= $Grid->id_materi->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->id_materi->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_rencana_pembelajaran_id_materi" class="form-group">
<span<?= $Grid->id_materi->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id_materi->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_id_materi" name="x<?= $Grid->RowIndex ?>_id_materi" value="<?= HtmlEncode($Grid->id_materi->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_rencana_pembelajaran_id_materi" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_id_materi"
        name="x<?= $Grid->RowIndex ?>_id_materi"
        class="form-control ew-select<?= $Grid->id_materi->isInvalidClass() ?>"
        data-select2-id="rencana_pembelajaran_x<?= $Grid->RowIndex ?>_id_materi"
        data-table="rencana_pembelajaran"
        data-field="x_id_materi"
        data-value-separator="<?= $Grid->id_materi->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->id_materi->getPlaceHolder()) ?>"
        <?= $Grid->id_materi->editAttributes() ?>>
        <?= $Grid->id_materi->selectOptionListHtml("x{$Grid->RowIndex}_id_materi") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->id_materi->getErrorMessage() ?></div>
<?= $Grid->id_materi->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_id_materi") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='rencana_pembelajaran_x<?= $Grid->RowIndex ?>_id_materi']"),
        options = { name: "x<?= $Grid->RowIndex ?>_id_materi", selectId: "rencana_pembelajaran_x<?= $Grid->RowIndex ?>_id_materi", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.rencana_pembelajaran.fields.id_materi.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<input type="hidden" data-table="rencana_pembelajaran" data-field="x_id_materi" name="o<?= $Grid->RowIndex ?>_id_materi" id="o<?= $Grid->RowIndex ?>_id_materi" value="<?= HtmlEncode($Grid->id_materi->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->id_materi->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_rencana_pembelajaran_id_materi" class="form-group">
<span<?= $Grid->id_materi->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id_materi->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_id_materi" name="x<?= $Grid->RowIndex ?>_id_materi" value="<?= HtmlEncode($Grid->id_materi->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_rencana_pembelajaran_id_materi" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_id_materi"
        name="x<?= $Grid->RowIndex ?>_id_materi"
        class="form-control ew-select<?= $Grid->id_materi->isInvalidClass() ?>"
        data-select2-id="rencana_pembelajaran_x<?= $Grid->RowIndex ?>_id_materi"
        data-table="rencana_pembelajaran"
        data-field="x_id_materi"
        data-value-separator="<?= $Grid->id_materi->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->id_materi->getPlaceHolder()) ?>"
        <?= $Grid->id_materi->editAttributes() ?>>
        <?= $Grid->id_materi->selectOptionListHtml("x{$Grid->RowIndex}_id_materi") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->id_materi->getErrorMessage() ?></div>
<?= $Grid->id_materi->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_id_materi") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='rencana_pembelajaran_x<?= $Grid->RowIndex ?>_id_materi']"),
        options = { name: "x<?= $Grid->RowIndex ?>_id_materi", selectId: "rencana_pembelajaran_x<?= $Grid->RowIndex ?>_id_materi", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.rencana_pembelajaran.fields.id_materi.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_rencana_pembelajaran_id_materi">
<span<?= $Grid->id_materi->viewAttributes() ?>>
<?= $Grid->id_materi->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="rencana_pembelajaran" data-field="x_id_materi" name="frencana_pembelajarangrid$x<?= $Grid->RowIndex ?>_id_materi" id="frencana_pembelajarangrid$x<?= $Grid->RowIndex ?>_id_materi" value="<?= HtmlEncode($Grid->id_materi->FormValue) ?>">
<input type="hidden" data-table="rencana_pembelajaran" data-field="x_id_materi" name="frencana_pembelajarangrid$o<?= $Grid->RowIndex ?>_id_materi" id="frencana_pembelajarangrid$o<?= $Grid->RowIndex ?>_id_materi" value="<?= HtmlEncode($Grid->id_materi->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->waktu->Visible) { // waktu ?>
        <td data-name="waktu" <?= $Grid->waktu->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_rencana_pembelajaran_waktu" class="form-group">
<input type="<?= $Grid->waktu->getInputTextType() ?>" data-table="rencana_pembelajaran" data-field="x_waktu" name="x<?= $Grid->RowIndex ?>_waktu" id="x<?= $Grid->RowIndex ?>_waktu" size="30" placeholder="<?= HtmlEncode($Grid->waktu->getPlaceHolder()) ?>" value="<?= $Grid->waktu->EditValue ?>"<?= $Grid->waktu->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->waktu->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="rencana_pembelajaran" data-field="x_waktu" name="o<?= $Grid->RowIndex ?>_waktu" id="o<?= $Grid->RowIndex ?>_waktu" value="<?= HtmlEncode($Grid->waktu->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_rencana_pembelajaran_waktu" class="form-group">
<input type="<?= $Grid->waktu->getInputTextType() ?>" data-table="rencana_pembelajaran" data-field="x_waktu" name="x<?= $Grid->RowIndex ?>_waktu" id="x<?= $Grid->RowIndex ?>_waktu" size="30" placeholder="<?= HtmlEncode($Grid->waktu->getPlaceHolder()) ?>" value="<?= $Grid->waktu->EditValue ?>"<?= $Grid->waktu->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->waktu->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_rencana_pembelajaran_waktu">
<span<?= $Grid->waktu->viewAttributes() ?>>
<?= $Grid->waktu->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="rencana_pembelajaran" data-field="x_waktu" name="frencana_pembelajarangrid$x<?= $Grid->RowIndex ?>_waktu" id="frencana_pembelajarangrid$x<?= $Grid->RowIndex ?>_waktu" value="<?= HtmlEncode($Grid->waktu->FormValue) ?>">
<input type="hidden" data-table="rencana_pembelajaran" data-field="x_waktu" name="frencana_pembelajarangrid$o<?= $Grid->RowIndex ?>_waktu" id="frencana_pembelajarangrid$o<?= $Grid->RowIndex ?>_waktu" value="<?= HtmlEncode($Grid->waktu->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->tampilkan->Visible) { // tampilkan ?>
        <td data-name="tampilkan" <?= $Grid->tampilkan->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_rencana_pembelajaran_tampilkan" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_tampilkan"
        name="x<?= $Grid->RowIndex ?>_tampilkan"
        class="form-control ew-select<?= $Grid->tampilkan->isInvalidClass() ?>"
        data-select2-id="rencana_pembelajaran_x<?= $Grid->RowIndex ?>_tampilkan"
        data-table="rencana_pembelajaran"
        data-field="x_tampilkan"
        data-value-separator="<?= $Grid->tampilkan->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->tampilkan->getPlaceHolder()) ?>"
        <?= $Grid->tampilkan->editAttributes() ?>>
        <?= $Grid->tampilkan->selectOptionListHtml("x{$Grid->RowIndex}_tampilkan") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->tampilkan->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='rencana_pembelajaran_x<?= $Grid->RowIndex ?>_tampilkan']"),
        options = { name: "x<?= $Grid->RowIndex ?>_tampilkan", selectId: "rencana_pembelajaran_x<?= $Grid->RowIndex ?>_tampilkan", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.rencana_pembelajaran.fields.tampilkan.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.rencana_pembelajaran.fields.tampilkan.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="rencana_pembelajaran" data-field="x_tampilkan" name="o<?= $Grid->RowIndex ?>_tampilkan" id="o<?= $Grid->RowIndex ?>_tampilkan" value="<?= HtmlEncode($Grid->tampilkan->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_rencana_pembelajaran_tampilkan" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_tampilkan"
        name="x<?= $Grid->RowIndex ?>_tampilkan"
        class="form-control ew-select<?= $Grid->tampilkan->isInvalidClass() ?>"
        data-select2-id="rencana_pembelajaran_x<?= $Grid->RowIndex ?>_tampilkan"
        data-table="rencana_pembelajaran"
        data-field="x_tampilkan"
        data-value-separator="<?= $Grid->tampilkan->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->tampilkan->getPlaceHolder()) ?>"
        <?= $Grid->tampilkan->editAttributes() ?>>
        <?= $Grid->tampilkan->selectOptionListHtml("x{$Grid->RowIndex}_tampilkan") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->tampilkan->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='rencana_pembelajaran_x<?= $Grid->RowIndex ?>_tampilkan']"),
        options = { name: "x<?= $Grid->RowIndex ?>_tampilkan", selectId: "rencana_pembelajaran_x<?= $Grid->RowIndex ?>_tampilkan", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.rencana_pembelajaran.fields.tampilkan.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.rencana_pembelajaran.fields.tampilkan.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_rencana_pembelajaran_tampilkan">
<span<?= $Grid->tampilkan->viewAttributes() ?>>
<?= $Grid->tampilkan->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="rencana_pembelajaran" data-field="x_tampilkan" name="frencana_pembelajarangrid$x<?= $Grid->RowIndex ?>_tampilkan" id="frencana_pembelajarangrid$x<?= $Grid->RowIndex ?>_tampilkan" value="<?= HtmlEncode($Grid->tampilkan->FormValue) ?>">
<input type="hidden" data-table="rencana_pembelajaran" data-field="x_tampilkan" name="frencana_pembelajarangrid$o<?= $Grid->RowIndex ?>_tampilkan" id="frencana_pembelajarangrid$o<?= $Grid->RowIndex ?>_tampilkan" value="<?= HtmlEncode($Grid->tampilkan->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowCount);
?>
    </tr>
<?php if ($Grid->RowType == ROWTYPE_ADD || $Grid->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["frencana_pembelajarangrid","load"], function () {
    frencana_pembelajarangrid.updateLists(<?= $Grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
    }
    } // End delete row checking
    if (!$Grid->isGridAdd() || $Grid->CurrentMode == "copy")
        if (!$Grid->Recordset->EOF) {
            $Grid->Recordset->moveNext();
        }
}
?>
<?php
    if ($Grid->CurrentMode == "add" || $Grid->CurrentMode == "copy" || $Grid->CurrentMode == "edit") {
        $Grid->RowIndex = '$rowindex$';
        $Grid->loadRowValues();

        // Set row properties
        $Grid->resetAttributes();
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_rencana_pembelajaran", "data-rowtype" => ROWTYPE_ADD]);
        $Grid->RowAttrs->appendClass("ew-template");
        $Grid->RowType = ROWTYPE_ADD;

        // Render row
        $Grid->renderRow();

        // Render list options
        $Grid->renderListOptions();
        $Grid->StartRowCount = 0;
?>
    <tr <?= $Grid->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Grid->ListOptions->render("body", "left", $Grid->RowIndex);
?>
    <?php if ($Grid->id_rencana_pembelajaran->Visible) { // id_rencana_pembelajaran ?>
        <td data-name="id_rencana_pembelajaran">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_rencana_pembelajaran_id_rencana_pembelajaran" class="form-group rencana_pembelajaran_id_rencana_pembelajaran"></span>
<?php } else { ?>
<span id="el$rowindex$_rencana_pembelajaran_id_rencana_pembelajaran" class="form-group rencana_pembelajaran_id_rencana_pembelajaran">
<span<?= $Grid->id_rencana_pembelajaran->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id_rencana_pembelajaran->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="rencana_pembelajaran" data-field="x_id_rencana_pembelajaran" name="x<?= $Grid->RowIndex ?>_id_rencana_pembelajaran" id="x<?= $Grid->RowIndex ?>_id_rencana_pembelajaran" value="<?= HtmlEncode($Grid->id_rencana_pembelajaran->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="rencana_pembelajaran" data-field="x_id_rencana_pembelajaran" name="o<?= $Grid->RowIndex ?>_id_rencana_pembelajaran" id="o<?= $Grid->RowIndex ?>_id_rencana_pembelajaran" value="<?= HtmlEncode($Grid->id_rencana_pembelajaran->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->id_indikator->Visible) { // id_indikator ?>
        <td data-name="id_indikator">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->id_indikator->getSessionValue() != "") { ?>
<span id="el$rowindex$_rencana_pembelajaran_id_indikator" class="form-group rencana_pembelajaran_id_indikator">
<span<?= $Grid->id_indikator->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id_indikator->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_id_indikator" name="x<?= $Grid->RowIndex ?>_id_indikator" value="<?= HtmlEncode($Grid->id_indikator->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_rencana_pembelajaran_id_indikator" class="form-group rencana_pembelajaran_id_indikator">
    <select
        id="x<?= $Grid->RowIndex ?>_id_indikator"
        name="x<?= $Grid->RowIndex ?>_id_indikator"
        class="form-control ew-select<?= $Grid->id_indikator->isInvalidClass() ?>"
        data-select2-id="rencana_pembelajaran_x<?= $Grid->RowIndex ?>_id_indikator"
        data-table="rencana_pembelajaran"
        data-field="x_id_indikator"
        data-value-separator="<?= $Grid->id_indikator->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->id_indikator->getPlaceHolder()) ?>"
        <?= $Grid->id_indikator->editAttributes() ?>>
        <?= $Grid->id_indikator->selectOptionListHtml("x{$Grid->RowIndex}_id_indikator") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->id_indikator->getErrorMessage() ?></div>
<?= $Grid->id_indikator->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_id_indikator") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='rencana_pembelajaran_x<?= $Grid->RowIndex ?>_id_indikator']"),
        options = { name: "x<?= $Grid->RowIndex ?>_id_indikator", selectId: "rencana_pembelajaran_x<?= $Grid->RowIndex ?>_id_indikator", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.rencana_pembelajaran.fields.id_indikator.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_rencana_pembelajaran_id_indikator" class="form-group rencana_pembelajaran_id_indikator">
<span<?= $Grid->id_indikator->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id_indikator->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="rencana_pembelajaran" data-field="x_id_indikator" name="x<?= $Grid->RowIndex ?>_id_indikator" id="x<?= $Grid->RowIndex ?>_id_indikator" value="<?= HtmlEncode($Grid->id_indikator->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="rencana_pembelajaran" data-field="x_id_indikator" name="o<?= $Grid->RowIndex ?>_id_indikator" id="o<?= $Grid->RowIndex ?>_id_indikator" value="<?= HtmlEncode($Grid->id_indikator->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->id_materi->Visible) { // id_materi ?>
        <td data-name="id_materi">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->id_materi->getSessionValue() != "") { ?>
<span id="el$rowindex$_rencana_pembelajaran_id_materi" class="form-group rencana_pembelajaran_id_materi">
<span<?= $Grid->id_materi->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id_materi->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_id_materi" name="x<?= $Grid->RowIndex ?>_id_materi" value="<?= HtmlEncode($Grid->id_materi->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_rencana_pembelajaran_id_materi" class="form-group rencana_pembelajaran_id_materi">
    <select
        id="x<?= $Grid->RowIndex ?>_id_materi"
        name="x<?= $Grid->RowIndex ?>_id_materi"
        class="form-control ew-select<?= $Grid->id_materi->isInvalidClass() ?>"
        data-select2-id="rencana_pembelajaran_x<?= $Grid->RowIndex ?>_id_materi"
        data-table="rencana_pembelajaran"
        data-field="x_id_materi"
        data-value-separator="<?= $Grid->id_materi->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->id_materi->getPlaceHolder()) ?>"
        <?= $Grid->id_materi->editAttributes() ?>>
        <?= $Grid->id_materi->selectOptionListHtml("x{$Grid->RowIndex}_id_materi") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->id_materi->getErrorMessage() ?></div>
<?= $Grid->id_materi->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_id_materi") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='rencana_pembelajaran_x<?= $Grid->RowIndex ?>_id_materi']"),
        options = { name: "x<?= $Grid->RowIndex ?>_id_materi", selectId: "rencana_pembelajaran_x<?= $Grid->RowIndex ?>_id_materi", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.rencana_pembelajaran.fields.id_materi.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_rencana_pembelajaran_id_materi" class="form-group rencana_pembelajaran_id_materi">
<span<?= $Grid->id_materi->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id_materi->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="rencana_pembelajaran" data-field="x_id_materi" name="x<?= $Grid->RowIndex ?>_id_materi" id="x<?= $Grid->RowIndex ?>_id_materi" value="<?= HtmlEncode($Grid->id_materi->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="rencana_pembelajaran" data-field="x_id_materi" name="o<?= $Grid->RowIndex ?>_id_materi" id="o<?= $Grid->RowIndex ?>_id_materi" value="<?= HtmlEncode($Grid->id_materi->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->waktu->Visible) { // waktu ?>
        <td data-name="waktu">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_rencana_pembelajaran_waktu" class="form-group rencana_pembelajaran_waktu">
<input type="<?= $Grid->waktu->getInputTextType() ?>" data-table="rencana_pembelajaran" data-field="x_waktu" name="x<?= $Grid->RowIndex ?>_waktu" id="x<?= $Grid->RowIndex ?>_waktu" size="30" placeholder="<?= HtmlEncode($Grid->waktu->getPlaceHolder()) ?>" value="<?= $Grid->waktu->EditValue ?>"<?= $Grid->waktu->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->waktu->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_rencana_pembelajaran_waktu" class="form-group rencana_pembelajaran_waktu">
<span<?= $Grid->waktu->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->waktu->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="rencana_pembelajaran" data-field="x_waktu" name="x<?= $Grid->RowIndex ?>_waktu" id="x<?= $Grid->RowIndex ?>_waktu" value="<?= HtmlEncode($Grid->waktu->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="rencana_pembelajaran" data-field="x_waktu" name="o<?= $Grid->RowIndex ?>_waktu" id="o<?= $Grid->RowIndex ?>_waktu" value="<?= HtmlEncode($Grid->waktu->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->tampilkan->Visible) { // tampilkan ?>
        <td data-name="tampilkan">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_rencana_pembelajaran_tampilkan" class="form-group rencana_pembelajaran_tampilkan">
    <select
        id="x<?= $Grid->RowIndex ?>_tampilkan"
        name="x<?= $Grid->RowIndex ?>_tampilkan"
        class="form-control ew-select<?= $Grid->tampilkan->isInvalidClass() ?>"
        data-select2-id="rencana_pembelajaran_x<?= $Grid->RowIndex ?>_tampilkan"
        data-table="rencana_pembelajaran"
        data-field="x_tampilkan"
        data-value-separator="<?= $Grid->tampilkan->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->tampilkan->getPlaceHolder()) ?>"
        <?= $Grid->tampilkan->editAttributes() ?>>
        <?= $Grid->tampilkan->selectOptionListHtml("x{$Grid->RowIndex}_tampilkan") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->tampilkan->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='rencana_pembelajaran_x<?= $Grid->RowIndex ?>_tampilkan']"),
        options = { name: "x<?= $Grid->RowIndex ?>_tampilkan", selectId: "rencana_pembelajaran_x<?= $Grid->RowIndex ?>_tampilkan", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.rencana_pembelajaran.fields.tampilkan.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.rencana_pembelajaran.fields.tampilkan.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_rencana_pembelajaran_tampilkan" class="form-group rencana_pembelajaran_tampilkan">
<span<?= $Grid->tampilkan->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->tampilkan->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="rencana_pembelajaran" data-field="x_tampilkan" name="x<?= $Grid->RowIndex ?>_tampilkan" id="x<?= $Grid->RowIndex ?>_tampilkan" value="<?= HtmlEncode($Grid->tampilkan->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="rencana_pembelajaran" data-field="x_tampilkan" name="o<?= $Grid->RowIndex ?>_tampilkan" id="o<?= $Grid->RowIndex ?>_tampilkan" value="<?= HtmlEncode($Grid->tampilkan->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["frencana_pembelajarangrid","load"], function() {
    frencana_pembelajarangrid.updateLists(<?= $Grid->RowIndex ?>);
});
</script>
    </tr>
<?php
    }
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($Grid->CurrentMode == "add" || $Grid->CurrentMode == "copy") { ?>
<input type="hidden" name="<?= $Grid->FormKeyCountName ?>" id="<?= $Grid->FormKeyCountName ?>" value="<?= $Grid->KeyCount ?>">
<?= $Grid->MultiSelectKey ?>
<?php } ?>
<?php if ($Grid->CurrentMode == "edit") { ?>
<input type="hidden" name="<?= $Grid->FormKeyCountName ?>" id="<?= $Grid->FormKeyCountName ?>" value="<?= $Grid->KeyCount ?>">
<?= $Grid->MultiSelectKey ?>
<?php } ?>
<?php if ($Grid->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="frencana_pembelajarangrid">
</div><!-- /.ew-list-form -->
<?php
// Close recordset
if ($Grid->Recordset) {
    $Grid->Recordset->close();
}
?>
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $Grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($Grid->TotalRecords == 0 && !$Grid->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$Grid->isExport()) { ?>
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
