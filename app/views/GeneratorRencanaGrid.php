<?php

namespace PHPMaker2021\project1;

// Set up and run Grid object
$Grid = Container("GeneratorRencanaGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fgenerator_rencanagrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fgenerator_rencanagrid = new ew.Form("fgenerator_rencanagrid", "grid");
    fgenerator_rencanagrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var fields = ew.vars.tables.generator_rencana.fields;
    fgenerator_rencanagrid.addFields([
        ["id_generator_rencana", [fields.id_generator_rencana.required ? ew.Validators.required(fields.id_generator_rencana.caption) : null], fields.id_generator_rencana.isInvalid],
        ["id_indikator_rencana", [fields.id_indikator_rencana.required ? ew.Validators.required(fields.id_indikator_rencana.caption) : null], fields.id_indikator_rencana.isInvalid],
        ["judul", [fields.judul.required ? ew.Validators.required(fields.judul.caption) : null], fields.judul.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fgenerator_rencanagrid,
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
    fgenerator_rencanagrid.validate = function () {
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
    fgenerator_rencanagrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "id_indikator_rencana", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "judul", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fgenerator_rencanagrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fgenerator_rencanagrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fgenerator_rencanagrid.lists.id_indikator_rencana = <?= $Grid->id_indikator_rencana->toClientList($Grid) ?>;
    loadjs.done("fgenerator_rencanagrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> generator_rencana">
<div id="fgenerator_rencanagrid" class="ew-form ew-list-form form-inline">
<div id="gmp_generator_rencana" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_generator_rencanagrid" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Grid->id_generator_rencana->Visible) { // id_generator_rencana ?>
        <th data-name="id_generator_rencana" class="<?= $Grid->id_generator_rencana->headerCellClass() ?>"><div id="elh_generator_rencana_id_generator_rencana" class="generator_rencana_id_generator_rencana"><?= $Grid->renderSort($Grid->id_generator_rencana) ?></div></th>
<?php } ?>
<?php if ($Grid->id_indikator_rencana->Visible) { // id_indikator_rencana ?>
        <th data-name="id_indikator_rencana" class="<?= $Grid->id_indikator_rencana->headerCellClass() ?>"><div id="elh_generator_rencana_id_indikator_rencana" class="generator_rencana_id_indikator_rencana"><?= $Grid->renderSort($Grid->id_indikator_rencana) ?></div></th>
<?php } ?>
<?php if ($Grid->judul->Visible) { // judul ?>
        <th data-name="judul" class="<?= $Grid->judul->headerCellClass() ?>"><div id="elh_generator_rencana_judul" class="generator_rencana_judul"><?= $Grid->renderSort($Grid->judul) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_generator_rencana", "data-rowtype" => $Grid->RowType]);

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
    <?php if ($Grid->id_generator_rencana->Visible) { // id_generator_rencana ?>
        <td data-name="id_generator_rencana" <?= $Grid->id_generator_rencana->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_generator_rencana_id_generator_rencana" class="form-group"></span>
<input type="hidden" data-table="generator_rencana" data-field="x_id_generator_rencana" name="o<?= $Grid->RowIndex ?>_id_generator_rencana" id="o<?= $Grid->RowIndex ?>_id_generator_rencana" value="<?= HtmlEncode($Grid->id_generator_rencana->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_generator_rencana_id_generator_rencana" class="form-group">
<span<?= $Grid->id_generator_rencana->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id_generator_rencana->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="generator_rencana" data-field="x_id_generator_rencana" name="x<?= $Grid->RowIndex ?>_id_generator_rencana" id="x<?= $Grid->RowIndex ?>_id_generator_rencana" value="<?= HtmlEncode($Grid->id_generator_rencana->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_generator_rencana_id_generator_rencana">
<span<?= $Grid->id_generator_rencana->viewAttributes() ?>>
<?= $Grid->id_generator_rencana->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="generator_rencana" data-field="x_id_generator_rencana" name="fgenerator_rencanagrid$x<?= $Grid->RowIndex ?>_id_generator_rencana" id="fgenerator_rencanagrid$x<?= $Grid->RowIndex ?>_id_generator_rencana" value="<?= HtmlEncode($Grid->id_generator_rencana->FormValue) ?>">
<input type="hidden" data-table="generator_rencana" data-field="x_id_generator_rencana" name="fgenerator_rencanagrid$o<?= $Grid->RowIndex ?>_id_generator_rencana" id="fgenerator_rencanagrid$o<?= $Grid->RowIndex ?>_id_generator_rencana" value="<?= HtmlEncode($Grid->id_generator_rencana->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->id_indikator_rencana->Visible) { // id_indikator_rencana ?>
        <td data-name="id_indikator_rencana" <?= $Grid->id_indikator_rencana->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->id_indikator_rencana->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_generator_rencana_id_indikator_rencana" class="form-group">
<span<?= $Grid->id_indikator_rencana->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id_indikator_rencana->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_id_indikator_rencana" name="x<?= $Grid->RowIndex ?>_id_indikator_rencana" value="<?= HtmlEncode($Grid->id_indikator_rencana->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_generator_rencana_id_indikator_rencana" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_id_indikator_rencana"
        name="x<?= $Grid->RowIndex ?>_id_indikator_rencana"
        class="form-control ew-select<?= $Grid->id_indikator_rencana->isInvalidClass() ?>"
        data-select2-id="generator_rencana_x<?= $Grid->RowIndex ?>_id_indikator_rencana"
        data-table="generator_rencana"
        data-field="x_id_indikator_rencana"
        data-value-separator="<?= $Grid->id_indikator_rencana->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->id_indikator_rencana->getPlaceHolder()) ?>"
        <?= $Grid->id_indikator_rencana->editAttributes() ?>>
        <?= $Grid->id_indikator_rencana->selectOptionListHtml("x{$Grid->RowIndex}_id_indikator_rencana") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->id_indikator_rencana->getErrorMessage() ?></div>
<?= $Grid->id_indikator_rencana->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_id_indikator_rencana") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='generator_rencana_x<?= $Grid->RowIndex ?>_id_indikator_rencana']"),
        options = { name: "x<?= $Grid->RowIndex ?>_id_indikator_rencana", selectId: "generator_rencana_x<?= $Grid->RowIndex ?>_id_indikator_rencana", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.generator_rencana.fields.id_indikator_rencana.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<input type="hidden" data-table="generator_rencana" data-field="x_id_indikator_rencana" name="o<?= $Grid->RowIndex ?>_id_indikator_rencana" id="o<?= $Grid->RowIndex ?>_id_indikator_rencana" value="<?= HtmlEncode($Grid->id_indikator_rencana->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->id_indikator_rencana->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_generator_rencana_id_indikator_rencana" class="form-group">
<span<?= $Grid->id_indikator_rencana->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id_indikator_rencana->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_id_indikator_rencana" name="x<?= $Grid->RowIndex ?>_id_indikator_rencana" value="<?= HtmlEncode($Grid->id_indikator_rencana->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_generator_rencana_id_indikator_rencana" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_id_indikator_rencana"
        name="x<?= $Grid->RowIndex ?>_id_indikator_rencana"
        class="form-control ew-select<?= $Grid->id_indikator_rencana->isInvalidClass() ?>"
        data-select2-id="generator_rencana_x<?= $Grid->RowIndex ?>_id_indikator_rencana"
        data-table="generator_rencana"
        data-field="x_id_indikator_rencana"
        data-value-separator="<?= $Grid->id_indikator_rencana->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->id_indikator_rencana->getPlaceHolder()) ?>"
        <?= $Grid->id_indikator_rencana->editAttributes() ?>>
        <?= $Grid->id_indikator_rencana->selectOptionListHtml("x{$Grid->RowIndex}_id_indikator_rencana") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->id_indikator_rencana->getErrorMessage() ?></div>
<?= $Grid->id_indikator_rencana->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_id_indikator_rencana") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='generator_rencana_x<?= $Grid->RowIndex ?>_id_indikator_rencana']"),
        options = { name: "x<?= $Grid->RowIndex ?>_id_indikator_rencana", selectId: "generator_rencana_x<?= $Grid->RowIndex ?>_id_indikator_rencana", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.generator_rencana.fields.id_indikator_rencana.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_generator_rencana_id_indikator_rencana">
<span<?= $Grid->id_indikator_rencana->viewAttributes() ?>>
<?= $Grid->id_indikator_rencana->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="generator_rencana" data-field="x_id_indikator_rencana" name="fgenerator_rencanagrid$x<?= $Grid->RowIndex ?>_id_indikator_rencana" id="fgenerator_rencanagrid$x<?= $Grid->RowIndex ?>_id_indikator_rencana" value="<?= HtmlEncode($Grid->id_indikator_rencana->FormValue) ?>">
<input type="hidden" data-table="generator_rencana" data-field="x_id_indikator_rencana" name="fgenerator_rencanagrid$o<?= $Grid->RowIndex ?>_id_indikator_rencana" id="fgenerator_rencanagrid$o<?= $Grid->RowIndex ?>_id_indikator_rencana" value="<?= HtmlEncode($Grid->id_indikator_rencana->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->judul->Visible) { // judul ?>
        <td data-name="judul" <?= $Grid->judul->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_generator_rencana_judul" class="form-group">
<input type="<?= $Grid->judul->getInputTextType() ?>" data-table="generator_rencana" data-field="x_judul" name="x<?= $Grid->RowIndex ?>_judul" id="x<?= $Grid->RowIndex ?>_judul" size="30" maxlength="255" placeholder="<?= HtmlEncode($Grid->judul->getPlaceHolder()) ?>" value="<?= $Grid->judul->EditValue ?>"<?= $Grid->judul->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->judul->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="generator_rencana" data-field="x_judul" name="o<?= $Grid->RowIndex ?>_judul" id="o<?= $Grid->RowIndex ?>_judul" value="<?= HtmlEncode($Grid->judul->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_generator_rencana_judul" class="form-group">
<input type="<?= $Grid->judul->getInputTextType() ?>" data-table="generator_rencana" data-field="x_judul" name="x<?= $Grid->RowIndex ?>_judul" id="x<?= $Grid->RowIndex ?>_judul" size="30" maxlength="255" placeholder="<?= HtmlEncode($Grid->judul->getPlaceHolder()) ?>" value="<?= $Grid->judul->EditValue ?>"<?= $Grid->judul->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->judul->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_generator_rencana_judul">
<span<?= $Grid->judul->viewAttributes() ?>>
<?= $Grid->judul->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="generator_rencana" data-field="x_judul" name="fgenerator_rencanagrid$x<?= $Grid->RowIndex ?>_judul" id="fgenerator_rencanagrid$x<?= $Grid->RowIndex ?>_judul" value="<?= HtmlEncode($Grid->judul->FormValue) ?>">
<input type="hidden" data-table="generator_rencana" data-field="x_judul" name="fgenerator_rencanagrid$o<?= $Grid->RowIndex ?>_judul" id="fgenerator_rencanagrid$o<?= $Grid->RowIndex ?>_judul" value="<?= HtmlEncode($Grid->judul->OldValue) ?>">
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
loadjs.ready(["fgenerator_rencanagrid","load"], function () {
    fgenerator_rencanagrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_generator_rencana", "data-rowtype" => ROWTYPE_ADD]);
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
    <?php if ($Grid->id_generator_rencana->Visible) { // id_generator_rencana ?>
        <td data-name="id_generator_rencana">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_generator_rencana_id_generator_rencana" class="form-group generator_rencana_id_generator_rencana"></span>
<?php } else { ?>
<span id="el$rowindex$_generator_rencana_id_generator_rencana" class="form-group generator_rencana_id_generator_rencana">
<span<?= $Grid->id_generator_rencana->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id_generator_rencana->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="generator_rencana" data-field="x_id_generator_rencana" name="x<?= $Grid->RowIndex ?>_id_generator_rencana" id="x<?= $Grid->RowIndex ?>_id_generator_rencana" value="<?= HtmlEncode($Grid->id_generator_rencana->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="generator_rencana" data-field="x_id_generator_rencana" name="o<?= $Grid->RowIndex ?>_id_generator_rencana" id="o<?= $Grid->RowIndex ?>_id_generator_rencana" value="<?= HtmlEncode($Grid->id_generator_rencana->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->id_indikator_rencana->Visible) { // id_indikator_rencana ?>
        <td data-name="id_indikator_rencana">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->id_indikator_rencana->getSessionValue() != "") { ?>
<span id="el$rowindex$_generator_rencana_id_indikator_rencana" class="form-group generator_rencana_id_indikator_rencana">
<span<?= $Grid->id_indikator_rencana->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id_indikator_rencana->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_id_indikator_rencana" name="x<?= $Grid->RowIndex ?>_id_indikator_rencana" value="<?= HtmlEncode($Grid->id_indikator_rencana->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_generator_rencana_id_indikator_rencana" class="form-group generator_rencana_id_indikator_rencana">
    <select
        id="x<?= $Grid->RowIndex ?>_id_indikator_rencana"
        name="x<?= $Grid->RowIndex ?>_id_indikator_rencana"
        class="form-control ew-select<?= $Grid->id_indikator_rencana->isInvalidClass() ?>"
        data-select2-id="generator_rencana_x<?= $Grid->RowIndex ?>_id_indikator_rencana"
        data-table="generator_rencana"
        data-field="x_id_indikator_rencana"
        data-value-separator="<?= $Grid->id_indikator_rencana->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->id_indikator_rencana->getPlaceHolder()) ?>"
        <?= $Grid->id_indikator_rencana->editAttributes() ?>>
        <?= $Grid->id_indikator_rencana->selectOptionListHtml("x{$Grid->RowIndex}_id_indikator_rencana") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->id_indikator_rencana->getErrorMessage() ?></div>
<?= $Grid->id_indikator_rencana->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_id_indikator_rencana") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='generator_rencana_x<?= $Grid->RowIndex ?>_id_indikator_rencana']"),
        options = { name: "x<?= $Grid->RowIndex ?>_id_indikator_rencana", selectId: "generator_rencana_x<?= $Grid->RowIndex ?>_id_indikator_rencana", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.generator_rencana.fields.id_indikator_rencana.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_generator_rencana_id_indikator_rencana" class="form-group generator_rencana_id_indikator_rencana">
<span<?= $Grid->id_indikator_rencana->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id_indikator_rencana->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="generator_rencana" data-field="x_id_indikator_rencana" name="x<?= $Grid->RowIndex ?>_id_indikator_rencana" id="x<?= $Grid->RowIndex ?>_id_indikator_rencana" value="<?= HtmlEncode($Grid->id_indikator_rencana->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="generator_rencana" data-field="x_id_indikator_rencana" name="o<?= $Grid->RowIndex ?>_id_indikator_rencana" id="o<?= $Grid->RowIndex ?>_id_indikator_rencana" value="<?= HtmlEncode($Grid->id_indikator_rencana->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->judul->Visible) { // judul ?>
        <td data-name="judul">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_generator_rencana_judul" class="form-group generator_rencana_judul">
<input type="<?= $Grid->judul->getInputTextType() ?>" data-table="generator_rencana" data-field="x_judul" name="x<?= $Grid->RowIndex ?>_judul" id="x<?= $Grid->RowIndex ?>_judul" size="30" maxlength="255" placeholder="<?= HtmlEncode($Grid->judul->getPlaceHolder()) ?>" value="<?= $Grid->judul->EditValue ?>"<?= $Grid->judul->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->judul->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_generator_rencana_judul" class="form-group generator_rencana_judul">
<span<?= $Grid->judul->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->judul->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="generator_rencana" data-field="x_judul" name="x<?= $Grid->RowIndex ?>_judul" id="x<?= $Grid->RowIndex ?>_judul" value="<?= HtmlEncode($Grid->judul->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="generator_rencana" data-field="x_judul" name="o<?= $Grid->RowIndex ?>_judul" id="o<?= $Grid->RowIndex ?>_judul" value="<?= HtmlEncode($Grid->judul->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fgenerator_rencanagrid","load"], function() {
    fgenerator_rencanagrid.updateLists(<?= $Grid->RowIndex ?>);
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
<input type="hidden" name="detailpage" value="fgenerator_rencanagrid">
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
    ew.addEventHandlers("generator_rencana");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
