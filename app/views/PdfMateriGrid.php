<?php

namespace PHPMaker2021\project1;

// Set up and run Grid object
$Grid = Container("PdfMateriGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpdf_materigrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fpdf_materigrid = new ew.Form("fpdf_materigrid", "grid");
    fpdf_materigrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var fields = ew.vars.tables.pdf_materi.fields;
    fpdf_materigrid.addFields([
        ["id_pdf_materi", [fields.id_pdf_materi.required ? ew.Validators.required(fields.id_pdf_materi.caption) : null], fields.id_pdf_materi.isInvalid],
        ["id_materi", [fields.id_materi.required ? ew.Validators.required(fields.id_materi.caption) : null], fields.id_materi.isInvalid],
        ["file_pdf", [fields.file_pdf.required ? ew.Validators.fileRequired(fields.file_pdf.caption) : null], fields.file_pdf.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpdf_materigrid,
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
    fpdf_materigrid.validate = function () {
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
    fpdf_materigrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "id_materi", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "file_pdf", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fpdf_materigrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpdf_materigrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpdf_materigrid.lists.id_materi = <?= $Grid->id_materi->toClientList($Grid) ?>;
    loadjs.done("fpdf_materigrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pdf_materi">
<div id="fpdf_materigrid" class="ew-form ew-list-form form-inline">
<div id="gmp_pdf_materi" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_pdf_materigrid" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Grid->id_pdf_materi->Visible) { // id_pdf_materi ?>
        <th data-name="id_pdf_materi" class="<?= $Grid->id_pdf_materi->headerCellClass() ?>"><div id="elh_pdf_materi_id_pdf_materi" class="pdf_materi_id_pdf_materi"><?= $Grid->renderSort($Grid->id_pdf_materi) ?></div></th>
<?php } ?>
<?php if ($Grid->id_materi->Visible) { // id_materi ?>
        <th data-name="id_materi" class="<?= $Grid->id_materi->headerCellClass() ?>"><div id="elh_pdf_materi_id_materi" class="pdf_materi_id_materi"><?= $Grid->renderSort($Grid->id_materi) ?></div></th>
<?php } ?>
<?php if ($Grid->file_pdf->Visible) { // file_pdf ?>
        <th data-name="file_pdf" class="<?= $Grid->file_pdf->headerCellClass() ?>"><div id="elh_pdf_materi_file_pdf" class="pdf_materi_file_pdf"><?= $Grid->renderSort($Grid->file_pdf) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_pdf_materi", "data-rowtype" => $Grid->RowType]);

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
    <?php if ($Grid->id_pdf_materi->Visible) { // id_pdf_materi ?>
        <td data-name="id_pdf_materi" <?= $Grid->id_pdf_materi->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pdf_materi_id_pdf_materi" class="form-group"></span>
<input type="hidden" data-table="pdf_materi" data-field="x_id_pdf_materi" name="o<?= $Grid->RowIndex ?>_id_pdf_materi" id="o<?= $Grid->RowIndex ?>_id_pdf_materi" value="<?= HtmlEncode($Grid->id_pdf_materi->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pdf_materi_id_pdf_materi" class="form-group">
<span<?= $Grid->id_pdf_materi->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id_pdf_materi->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="pdf_materi" data-field="x_id_pdf_materi" name="x<?= $Grid->RowIndex ?>_id_pdf_materi" id="x<?= $Grid->RowIndex ?>_id_pdf_materi" value="<?= HtmlEncode($Grid->id_pdf_materi->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pdf_materi_id_pdf_materi">
<span<?= $Grid->id_pdf_materi->viewAttributes() ?>>
<?= $Grid->id_pdf_materi->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pdf_materi" data-field="x_id_pdf_materi" name="fpdf_materigrid$x<?= $Grid->RowIndex ?>_id_pdf_materi" id="fpdf_materigrid$x<?= $Grid->RowIndex ?>_id_pdf_materi" value="<?= HtmlEncode($Grid->id_pdf_materi->FormValue) ?>">
<input type="hidden" data-table="pdf_materi" data-field="x_id_pdf_materi" name="fpdf_materigrid$o<?= $Grid->RowIndex ?>_id_pdf_materi" id="fpdf_materigrid$o<?= $Grid->RowIndex ?>_id_pdf_materi" value="<?= HtmlEncode($Grid->id_pdf_materi->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->id_materi->Visible) { // id_materi ?>
        <td data-name="id_materi" <?= $Grid->id_materi->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->id_materi->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_pdf_materi_id_materi" class="form-group">
<span<?= $Grid->id_materi->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id_materi->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_id_materi" name="x<?= $Grid->RowIndex ?>_id_materi" value="<?= HtmlEncode($Grid->id_materi->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_pdf_materi_id_materi" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_id_materi"
        name="x<?= $Grid->RowIndex ?>_id_materi"
        class="form-control ew-select<?= $Grid->id_materi->isInvalidClass() ?>"
        data-select2-id="pdf_materi_x<?= $Grid->RowIndex ?>_id_materi"
        data-table="pdf_materi"
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
    var el = document.querySelector("select[data-select2-id='pdf_materi_x<?= $Grid->RowIndex ?>_id_materi']"),
        options = { name: "x<?= $Grid->RowIndex ?>_id_materi", selectId: "pdf_materi_x<?= $Grid->RowIndex ?>_id_materi", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pdf_materi.fields.id_materi.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<input type="hidden" data-table="pdf_materi" data-field="x_id_materi" name="o<?= $Grid->RowIndex ?>_id_materi" id="o<?= $Grid->RowIndex ?>_id_materi" value="<?= HtmlEncode($Grid->id_materi->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->id_materi->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_pdf_materi_id_materi" class="form-group">
<span<?= $Grid->id_materi->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id_materi->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_id_materi" name="x<?= $Grid->RowIndex ?>_id_materi" value="<?= HtmlEncode($Grid->id_materi->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_pdf_materi_id_materi" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_id_materi"
        name="x<?= $Grid->RowIndex ?>_id_materi"
        class="form-control ew-select<?= $Grid->id_materi->isInvalidClass() ?>"
        data-select2-id="pdf_materi_x<?= $Grid->RowIndex ?>_id_materi"
        data-table="pdf_materi"
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
    var el = document.querySelector("select[data-select2-id='pdf_materi_x<?= $Grid->RowIndex ?>_id_materi']"),
        options = { name: "x<?= $Grid->RowIndex ?>_id_materi", selectId: "pdf_materi_x<?= $Grid->RowIndex ?>_id_materi", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pdf_materi.fields.id_materi.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pdf_materi_id_materi">
<span<?= $Grid->id_materi->viewAttributes() ?>>
<?= $Grid->id_materi->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pdf_materi" data-field="x_id_materi" name="fpdf_materigrid$x<?= $Grid->RowIndex ?>_id_materi" id="fpdf_materigrid$x<?= $Grid->RowIndex ?>_id_materi" value="<?= HtmlEncode($Grid->id_materi->FormValue) ?>">
<input type="hidden" data-table="pdf_materi" data-field="x_id_materi" name="fpdf_materigrid$o<?= $Grid->RowIndex ?>_id_materi" id="fpdf_materigrid$o<?= $Grid->RowIndex ?>_id_materi" value="<?= HtmlEncode($Grid->id_materi->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->file_pdf->Visible) { // file_pdf ?>
        <td data-name="file_pdf" <?= $Grid->file_pdf->cellAttributes() ?>>
<?php if ($Grid->RowAction == "insert") { // Add record ?>
<span id="el$rowindex$_pdf_materi_file_pdf" class="form-group pdf_materi_file_pdf">
<div id="fd_x<?= $Grid->RowIndex ?>_file_pdf">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Grid->file_pdf->title() ?>" data-table="pdf_materi" data-field="x_file_pdf" name="x<?= $Grid->RowIndex ?>_file_pdf" id="x<?= $Grid->RowIndex ?>_file_pdf" lang="<?= CurrentLanguageID() ?>"<?= $Grid->file_pdf->editAttributes() ?><?= ($Grid->file_pdf->ReadOnly || $Grid->file_pdf->Disabled) ? " disabled" : "" ?>>
        <label class="custom-file-label ew-file-label" for="x<?= $Grid->RowIndex ?>_file_pdf"><?= $Language->phrase("ChooseFile") ?></label>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->file_pdf->getErrorMessage() ?></div>
<input type="hidden" name="fn_x<?= $Grid->RowIndex ?>_file_pdf" id= "fn_x<?= $Grid->RowIndex ?>_file_pdf" value="<?= $Grid->file_pdf->Upload->FileName ?>">
<input type="hidden" name="fa_x<?= $Grid->RowIndex ?>_file_pdf" id= "fa_x<?= $Grid->RowIndex ?>_file_pdf" value="0">
<input type="hidden" name="fs_x<?= $Grid->RowIndex ?>_file_pdf" id= "fs_x<?= $Grid->RowIndex ?>_file_pdf" value="255">
<input type="hidden" name="fx_x<?= $Grid->RowIndex ?>_file_pdf" id= "fx_x<?= $Grid->RowIndex ?>_file_pdf" value="<?= $Grid->file_pdf->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?= $Grid->RowIndex ?>_file_pdf" id= "fm_x<?= $Grid->RowIndex ?>_file_pdf" value="<?= $Grid->file_pdf->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?= $Grid->RowIndex ?>_file_pdf" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="pdf_materi" data-field="x_file_pdf" name="o<?= $Grid->RowIndex ?>_file_pdf" id="o<?= $Grid->RowIndex ?>_file_pdf" value="<?= HtmlEncode($Grid->file_pdf->OldValue) ?>">
<?php } elseif ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pdf_materi_file_pdf">
<span<?= $Grid->file_pdf->viewAttributes() ?>>
<?= GetFileViewTag($Grid->file_pdf, $Grid->file_pdf->getViewValue(), false) ?>
</span>
</span>
<?php } else  { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pdf_materi_file_pdf" class="form-group pdf_materi_file_pdf">
<div id="fd_x<?= $Grid->RowIndex ?>_file_pdf">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Grid->file_pdf->title() ?>" data-table="pdf_materi" data-field="x_file_pdf" name="x<?= $Grid->RowIndex ?>_file_pdf" id="x<?= $Grid->RowIndex ?>_file_pdf" lang="<?= CurrentLanguageID() ?>"<?= $Grid->file_pdf->editAttributes() ?><?= ($Grid->file_pdf->ReadOnly || $Grid->file_pdf->Disabled) ? " disabled" : "" ?>>
        <label class="custom-file-label ew-file-label" for="x<?= $Grid->RowIndex ?>_file_pdf"><?= $Language->phrase("ChooseFile") ?></label>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->file_pdf->getErrorMessage() ?></div>
<input type="hidden" name="fn_x<?= $Grid->RowIndex ?>_file_pdf" id= "fn_x<?= $Grid->RowIndex ?>_file_pdf" value="<?= $Grid->file_pdf->Upload->FileName ?>">
<input type="hidden" name="fa_x<?= $Grid->RowIndex ?>_file_pdf" id= "fa_x<?= $Grid->RowIndex ?>_file_pdf" value="<?= (Post("fa_x<?= $Grid->RowIndex ?>_file_pdf") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x<?= $Grid->RowIndex ?>_file_pdf" id= "fs_x<?= $Grid->RowIndex ?>_file_pdf" value="255">
<input type="hidden" name="fx_x<?= $Grid->RowIndex ?>_file_pdf" id= "fx_x<?= $Grid->RowIndex ?>_file_pdf" value="<?= $Grid->file_pdf->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?= $Grid->RowIndex ?>_file_pdf" id= "fm_x<?= $Grid->RowIndex ?>_file_pdf" value="<?= $Grid->file_pdf->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?= $Grid->RowIndex ?>_file_pdf" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
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
loadjs.ready(["fpdf_materigrid","load"], function () {
    fpdf_materigrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_pdf_materi", "data-rowtype" => ROWTYPE_ADD]);
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
    <?php if ($Grid->id_pdf_materi->Visible) { // id_pdf_materi ?>
        <td data-name="id_pdf_materi">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pdf_materi_id_pdf_materi" class="form-group pdf_materi_id_pdf_materi"></span>
<?php } else { ?>
<span id="el$rowindex$_pdf_materi_id_pdf_materi" class="form-group pdf_materi_id_pdf_materi">
<span<?= $Grid->id_pdf_materi->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id_pdf_materi->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pdf_materi" data-field="x_id_pdf_materi" name="x<?= $Grid->RowIndex ?>_id_pdf_materi" id="x<?= $Grid->RowIndex ?>_id_pdf_materi" value="<?= HtmlEncode($Grid->id_pdf_materi->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pdf_materi" data-field="x_id_pdf_materi" name="o<?= $Grid->RowIndex ?>_id_pdf_materi" id="o<?= $Grid->RowIndex ?>_id_pdf_materi" value="<?= HtmlEncode($Grid->id_pdf_materi->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->id_materi->Visible) { // id_materi ?>
        <td data-name="id_materi">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->id_materi->getSessionValue() != "") { ?>
<span id="el$rowindex$_pdf_materi_id_materi" class="form-group pdf_materi_id_materi">
<span<?= $Grid->id_materi->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id_materi->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_id_materi" name="x<?= $Grid->RowIndex ?>_id_materi" value="<?= HtmlEncode($Grid->id_materi->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_pdf_materi_id_materi" class="form-group pdf_materi_id_materi">
    <select
        id="x<?= $Grid->RowIndex ?>_id_materi"
        name="x<?= $Grid->RowIndex ?>_id_materi"
        class="form-control ew-select<?= $Grid->id_materi->isInvalidClass() ?>"
        data-select2-id="pdf_materi_x<?= $Grid->RowIndex ?>_id_materi"
        data-table="pdf_materi"
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
    var el = document.querySelector("select[data-select2-id='pdf_materi_x<?= $Grid->RowIndex ?>_id_materi']"),
        options = { name: "x<?= $Grid->RowIndex ?>_id_materi", selectId: "pdf_materi_x<?= $Grid->RowIndex ?>_id_materi", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pdf_materi.fields.id_materi.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_pdf_materi_id_materi" class="form-group pdf_materi_id_materi">
<span<?= $Grid->id_materi->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id_materi->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="pdf_materi" data-field="x_id_materi" name="x<?= $Grid->RowIndex ?>_id_materi" id="x<?= $Grid->RowIndex ?>_id_materi" value="<?= HtmlEncode($Grid->id_materi->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pdf_materi" data-field="x_id_materi" name="o<?= $Grid->RowIndex ?>_id_materi" id="o<?= $Grid->RowIndex ?>_id_materi" value="<?= HtmlEncode($Grid->id_materi->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->file_pdf->Visible) { // file_pdf ?>
        <td data-name="file_pdf">
<span id="el$rowindex$_pdf_materi_file_pdf" class="form-group pdf_materi_file_pdf">
<div id="fd_x<?= $Grid->RowIndex ?>_file_pdf">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Grid->file_pdf->title() ?>" data-table="pdf_materi" data-field="x_file_pdf" name="x<?= $Grid->RowIndex ?>_file_pdf" id="x<?= $Grid->RowIndex ?>_file_pdf" lang="<?= CurrentLanguageID() ?>"<?= $Grid->file_pdf->editAttributes() ?><?= ($Grid->file_pdf->ReadOnly || $Grid->file_pdf->Disabled) ? " disabled" : "" ?>>
        <label class="custom-file-label ew-file-label" for="x<?= $Grid->RowIndex ?>_file_pdf"><?= $Language->phrase("ChooseFile") ?></label>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->file_pdf->getErrorMessage() ?></div>
<input type="hidden" name="fn_x<?= $Grid->RowIndex ?>_file_pdf" id= "fn_x<?= $Grid->RowIndex ?>_file_pdf" value="<?= $Grid->file_pdf->Upload->FileName ?>">
<input type="hidden" name="fa_x<?= $Grid->RowIndex ?>_file_pdf" id= "fa_x<?= $Grid->RowIndex ?>_file_pdf" value="0">
<input type="hidden" name="fs_x<?= $Grid->RowIndex ?>_file_pdf" id= "fs_x<?= $Grid->RowIndex ?>_file_pdf" value="255">
<input type="hidden" name="fx_x<?= $Grid->RowIndex ?>_file_pdf" id= "fx_x<?= $Grid->RowIndex ?>_file_pdf" value="<?= $Grid->file_pdf->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?= $Grid->RowIndex ?>_file_pdf" id= "fm_x<?= $Grid->RowIndex ?>_file_pdf" value="<?= $Grid->file_pdf->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?= $Grid->RowIndex ?>_file_pdf" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="pdf_materi" data-field="x_file_pdf" name="o<?= $Grid->RowIndex ?>_file_pdf" id="o<?= $Grid->RowIndex ?>_file_pdf" value="<?= HtmlEncode($Grid->file_pdf->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fpdf_materigrid","load"], function() {
    fpdf_materigrid.updateLists(<?= $Grid->RowIndex ?>);
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
<input type="hidden" name="detailpage" value="fpdf_materigrid">
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
    ew.addEventHandlers("pdf_materi");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
