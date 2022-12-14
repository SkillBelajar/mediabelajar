<?php

namespace PHPMaker2021\project1;

// Set up and run Grid object
$Grid = Container("PesertaGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpesertagrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fpesertagrid = new ew.Form("fpesertagrid", "grid");
    fpesertagrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var fields = ew.vars.tables.peserta.fields;
    fpesertagrid.addFields([
        ["tanggal_jam", [fields.tanggal_jam.required ? ew.Validators.required(fields.tanggal_jam.caption) : null], fields.tanggal_jam.isInvalid],
        ["nama_peserta", [fields.nama_peserta.required ? ew.Validators.required(fields.nama_peserta.caption) : null], fields.nama_peserta.isInvalid],
        ["id_evaluasi", [fields.id_evaluasi.required ? ew.Validators.required(fields.id_evaluasi.caption) : null], fields.id_evaluasi.isInvalid],
        ["benar", [fields.benar.required ? ew.Validators.required(fields.benar.caption) : null], fields.benar.isInvalid],
        ["ip", [fields.ip.required ? ew.Validators.required(fields.ip.caption) : null], fields.ip.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpesertagrid,
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
    fpesertagrid.validate = function () {
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
    fpesertagrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "tanggal_jam", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "nama_peserta", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "id_evaluasi", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "benar", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ip", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fpesertagrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpesertagrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fpesertagrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> peserta">
<div id="fpesertagrid" class="ew-form ew-list-form form-inline">
<div id="gmp_peserta" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_pesertagrid" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Grid->tanggal_jam->Visible) { // tanggal_jam ?>
        <th data-name="tanggal_jam" class="<?= $Grid->tanggal_jam->headerCellClass() ?>"><div id="elh_peserta_tanggal_jam" class="peserta_tanggal_jam"><?= $Grid->renderSort($Grid->tanggal_jam) ?></div></th>
<?php } ?>
<?php if ($Grid->nama_peserta->Visible) { // nama_peserta ?>
        <th data-name="nama_peserta" class="<?= $Grid->nama_peserta->headerCellClass() ?>"><div id="elh_peserta_nama_peserta" class="peserta_nama_peserta"><?= $Grid->renderSort($Grid->nama_peserta) ?></div></th>
<?php } ?>
<?php if ($Grid->id_evaluasi->Visible) { // id_evaluasi ?>
        <th data-name="id_evaluasi" class="<?= $Grid->id_evaluasi->headerCellClass() ?>"><div id="elh_peserta_id_evaluasi" class="peserta_id_evaluasi"><?= $Grid->renderSort($Grid->id_evaluasi) ?></div></th>
<?php } ?>
<?php if ($Grid->benar->Visible) { // benar ?>
        <th data-name="benar" class="<?= $Grid->benar->headerCellClass() ?>"><div id="elh_peserta_benar" class="peserta_benar"><?= $Grid->renderSort($Grid->benar) ?></div></th>
<?php } ?>
<?php if ($Grid->ip->Visible) { // ip ?>
        <th data-name="ip" class="<?= $Grid->ip->headerCellClass() ?>"><div id="elh_peserta_ip" class="peserta_ip"><?= $Grid->renderSort($Grid->ip) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_peserta", "data-rowtype" => $Grid->RowType]);

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
    <?php if ($Grid->tanggal_jam->Visible) { // tanggal_jam ?>
        <td data-name="tanggal_jam" <?= $Grid->tanggal_jam->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_peserta_tanggal_jam" class="form-group">
<input type="<?= $Grid->tanggal_jam->getInputTextType() ?>" data-table="peserta" data-field="x_tanggal_jam" name="x<?= $Grid->RowIndex ?>_tanggal_jam" id="x<?= $Grid->RowIndex ?>_tanggal_jam" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->tanggal_jam->getPlaceHolder()) ?>" value="<?= $Grid->tanggal_jam->EditValue ?>"<?= $Grid->tanggal_jam->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->tanggal_jam->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="peserta" data-field="x_tanggal_jam" name="o<?= $Grid->RowIndex ?>_tanggal_jam" id="o<?= $Grid->RowIndex ?>_tanggal_jam" value="<?= HtmlEncode($Grid->tanggal_jam->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_peserta_tanggal_jam" class="form-group">
<input type="<?= $Grid->tanggal_jam->getInputTextType() ?>" data-table="peserta" data-field="x_tanggal_jam" name="x<?= $Grid->RowIndex ?>_tanggal_jam" id="x<?= $Grid->RowIndex ?>_tanggal_jam" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->tanggal_jam->getPlaceHolder()) ?>" value="<?= $Grid->tanggal_jam->EditValue ?>"<?= $Grid->tanggal_jam->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->tanggal_jam->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_peserta_tanggal_jam">
<span<?= $Grid->tanggal_jam->viewAttributes() ?>>
<?= $Grid->tanggal_jam->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="peserta" data-field="x_tanggal_jam" name="fpesertagrid$x<?= $Grid->RowIndex ?>_tanggal_jam" id="fpesertagrid$x<?= $Grid->RowIndex ?>_tanggal_jam" value="<?= HtmlEncode($Grid->tanggal_jam->FormValue) ?>">
<input type="hidden" data-table="peserta" data-field="x_tanggal_jam" name="fpesertagrid$o<?= $Grid->RowIndex ?>_tanggal_jam" id="fpesertagrid$o<?= $Grid->RowIndex ?>_tanggal_jam" value="<?= HtmlEncode($Grid->tanggal_jam->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="peserta" data-field="x_id_peserta" name="x<?= $Grid->RowIndex ?>_id_peserta" id="x<?= $Grid->RowIndex ?>_id_peserta" value="<?= HtmlEncode($Grid->id_peserta->CurrentValue) ?>">
<input type="hidden" data-table="peserta" data-field="x_id_peserta" name="o<?= $Grid->RowIndex ?>_id_peserta" id="o<?= $Grid->RowIndex ?>_id_peserta" value="<?= HtmlEncode($Grid->id_peserta->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT || $Grid->CurrentMode == "edit") { ?>
<input type="hidden" data-table="peserta" data-field="x_id_peserta" name="x<?= $Grid->RowIndex ?>_id_peserta" id="x<?= $Grid->RowIndex ?>_id_peserta" value="<?= HtmlEncode($Grid->id_peserta->CurrentValue) ?>">
<?php } ?>
    <?php if ($Grid->nama_peserta->Visible) { // nama_peserta ?>
        <td data-name="nama_peserta" <?= $Grid->nama_peserta->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_peserta_nama_peserta" class="form-group">
<input type="<?= $Grid->nama_peserta->getInputTextType() ?>" data-table="peserta" data-field="x_nama_peserta" name="x<?= $Grid->RowIndex ?>_nama_peserta" id="x<?= $Grid->RowIndex ?>_nama_peserta" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->nama_peserta->getPlaceHolder()) ?>" value="<?= $Grid->nama_peserta->EditValue ?>"<?= $Grid->nama_peserta->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->nama_peserta->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="peserta" data-field="x_nama_peserta" name="o<?= $Grid->RowIndex ?>_nama_peserta" id="o<?= $Grid->RowIndex ?>_nama_peserta" value="<?= HtmlEncode($Grid->nama_peserta->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_peserta_nama_peserta" class="form-group">
<input type="<?= $Grid->nama_peserta->getInputTextType() ?>" data-table="peserta" data-field="x_nama_peserta" name="x<?= $Grid->RowIndex ?>_nama_peserta" id="x<?= $Grid->RowIndex ?>_nama_peserta" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->nama_peserta->getPlaceHolder()) ?>" value="<?= $Grid->nama_peserta->EditValue ?>"<?= $Grid->nama_peserta->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->nama_peserta->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_peserta_nama_peserta">
<span<?= $Grid->nama_peserta->viewAttributes() ?>>
<?= $Grid->nama_peserta->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="peserta" data-field="x_nama_peserta" name="fpesertagrid$x<?= $Grid->RowIndex ?>_nama_peserta" id="fpesertagrid$x<?= $Grid->RowIndex ?>_nama_peserta" value="<?= HtmlEncode($Grid->nama_peserta->FormValue) ?>">
<input type="hidden" data-table="peserta" data-field="x_nama_peserta" name="fpesertagrid$o<?= $Grid->RowIndex ?>_nama_peserta" id="fpesertagrid$o<?= $Grid->RowIndex ?>_nama_peserta" value="<?= HtmlEncode($Grid->nama_peserta->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->id_evaluasi->Visible) { // id_evaluasi ?>
        <td data-name="id_evaluasi" <?= $Grid->id_evaluasi->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->id_evaluasi->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_peserta_id_evaluasi" class="form-group">
<span<?= $Grid->id_evaluasi->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id_evaluasi->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_id_evaluasi" name="x<?= $Grid->RowIndex ?>_id_evaluasi" value="<?= HtmlEncode($Grid->id_evaluasi->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_peserta_id_evaluasi" class="form-group">
<input type="<?= $Grid->id_evaluasi->getInputTextType() ?>" data-table="peserta" data-field="x_id_evaluasi" name="x<?= $Grid->RowIndex ?>_id_evaluasi" id="x<?= $Grid->RowIndex ?>_id_evaluasi" size="30" placeholder="<?= HtmlEncode($Grid->id_evaluasi->getPlaceHolder()) ?>" value="<?= $Grid->id_evaluasi->EditValue ?>"<?= $Grid->id_evaluasi->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->id_evaluasi->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="peserta" data-field="x_id_evaluasi" name="o<?= $Grid->RowIndex ?>_id_evaluasi" id="o<?= $Grid->RowIndex ?>_id_evaluasi" value="<?= HtmlEncode($Grid->id_evaluasi->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->id_evaluasi->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_peserta_id_evaluasi" class="form-group">
<span<?= $Grid->id_evaluasi->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id_evaluasi->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_id_evaluasi" name="x<?= $Grid->RowIndex ?>_id_evaluasi" value="<?= HtmlEncode($Grid->id_evaluasi->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_peserta_id_evaluasi" class="form-group">
<input type="<?= $Grid->id_evaluasi->getInputTextType() ?>" data-table="peserta" data-field="x_id_evaluasi" name="x<?= $Grid->RowIndex ?>_id_evaluasi" id="x<?= $Grid->RowIndex ?>_id_evaluasi" size="30" placeholder="<?= HtmlEncode($Grid->id_evaluasi->getPlaceHolder()) ?>" value="<?= $Grid->id_evaluasi->EditValue ?>"<?= $Grid->id_evaluasi->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->id_evaluasi->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_peserta_id_evaluasi">
<span<?= $Grid->id_evaluasi->viewAttributes() ?>>
<?= $Grid->id_evaluasi->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="peserta" data-field="x_id_evaluasi" name="fpesertagrid$x<?= $Grid->RowIndex ?>_id_evaluasi" id="fpesertagrid$x<?= $Grid->RowIndex ?>_id_evaluasi" value="<?= HtmlEncode($Grid->id_evaluasi->FormValue) ?>">
<input type="hidden" data-table="peserta" data-field="x_id_evaluasi" name="fpesertagrid$o<?= $Grid->RowIndex ?>_id_evaluasi" id="fpesertagrid$o<?= $Grid->RowIndex ?>_id_evaluasi" value="<?= HtmlEncode($Grid->id_evaluasi->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->benar->Visible) { // benar ?>
        <td data-name="benar" <?= $Grid->benar->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_peserta_benar" class="form-group">
<input type="<?= $Grid->benar->getInputTextType() ?>" data-table="peserta" data-field="x_benar" name="x<?= $Grid->RowIndex ?>_benar" id="x<?= $Grid->RowIndex ?>_benar" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->benar->getPlaceHolder()) ?>" value="<?= $Grid->benar->EditValue ?>"<?= $Grid->benar->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->benar->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="peserta" data-field="x_benar" name="o<?= $Grid->RowIndex ?>_benar" id="o<?= $Grid->RowIndex ?>_benar" value="<?= HtmlEncode($Grid->benar->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_peserta_benar" class="form-group">
<input type="<?= $Grid->benar->getInputTextType() ?>" data-table="peserta" data-field="x_benar" name="x<?= $Grid->RowIndex ?>_benar" id="x<?= $Grid->RowIndex ?>_benar" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->benar->getPlaceHolder()) ?>" value="<?= $Grid->benar->EditValue ?>"<?= $Grid->benar->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->benar->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_peserta_benar">
<span<?= $Grid->benar->viewAttributes() ?>>
<?= $Grid->benar->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="peserta" data-field="x_benar" name="fpesertagrid$x<?= $Grid->RowIndex ?>_benar" id="fpesertagrid$x<?= $Grid->RowIndex ?>_benar" value="<?= HtmlEncode($Grid->benar->FormValue) ?>">
<input type="hidden" data-table="peserta" data-field="x_benar" name="fpesertagrid$o<?= $Grid->RowIndex ?>_benar" id="fpesertagrid$o<?= $Grid->RowIndex ?>_benar" value="<?= HtmlEncode($Grid->benar->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ip->Visible) { // ip ?>
        <td data-name="ip" <?= $Grid->ip->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_peserta_ip" class="form-group">
<input type="<?= $Grid->ip->getInputTextType() ?>" data-table="peserta" data-field="x_ip" name="x<?= $Grid->RowIndex ?>_ip" id="x<?= $Grid->RowIndex ?>_ip" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->ip->getPlaceHolder()) ?>" value="<?= $Grid->ip->EditValue ?>"<?= $Grid->ip->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ip->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="peserta" data-field="x_ip" name="o<?= $Grid->RowIndex ?>_ip" id="o<?= $Grid->RowIndex ?>_ip" value="<?= HtmlEncode($Grid->ip->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_peserta_ip" class="form-group">
<input type="<?= $Grid->ip->getInputTextType() ?>" data-table="peserta" data-field="x_ip" name="x<?= $Grid->RowIndex ?>_ip" id="x<?= $Grid->RowIndex ?>_ip" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->ip->getPlaceHolder()) ?>" value="<?= $Grid->ip->EditValue ?>"<?= $Grid->ip->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ip->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_peserta_ip">
<span<?= $Grid->ip->viewAttributes() ?>>
<?= $Grid->ip->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="peserta" data-field="x_ip" name="fpesertagrid$x<?= $Grid->RowIndex ?>_ip" id="fpesertagrid$x<?= $Grid->RowIndex ?>_ip" value="<?= HtmlEncode($Grid->ip->FormValue) ?>">
<input type="hidden" data-table="peserta" data-field="x_ip" name="fpesertagrid$o<?= $Grid->RowIndex ?>_ip" id="fpesertagrid$o<?= $Grid->RowIndex ?>_ip" value="<?= HtmlEncode($Grid->ip->OldValue) ?>">
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
loadjs.ready(["fpesertagrid","load"], function () {
    fpesertagrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_peserta", "data-rowtype" => ROWTYPE_ADD]);
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
    <?php if ($Grid->tanggal_jam->Visible) { // tanggal_jam ?>
        <td data-name="tanggal_jam">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_peserta_tanggal_jam" class="form-group peserta_tanggal_jam">
<input type="<?= $Grid->tanggal_jam->getInputTextType() ?>" data-table="peserta" data-field="x_tanggal_jam" name="x<?= $Grid->RowIndex ?>_tanggal_jam" id="x<?= $Grid->RowIndex ?>_tanggal_jam" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->tanggal_jam->getPlaceHolder()) ?>" value="<?= $Grid->tanggal_jam->EditValue ?>"<?= $Grid->tanggal_jam->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->tanggal_jam->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_peserta_tanggal_jam" class="form-group peserta_tanggal_jam">
<span<?= $Grid->tanggal_jam->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->tanggal_jam->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="peserta" data-field="x_tanggal_jam" name="x<?= $Grid->RowIndex ?>_tanggal_jam" id="x<?= $Grid->RowIndex ?>_tanggal_jam" value="<?= HtmlEncode($Grid->tanggal_jam->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="peserta" data-field="x_tanggal_jam" name="o<?= $Grid->RowIndex ?>_tanggal_jam" id="o<?= $Grid->RowIndex ?>_tanggal_jam" value="<?= HtmlEncode($Grid->tanggal_jam->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->nama_peserta->Visible) { // nama_peserta ?>
        <td data-name="nama_peserta">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_peserta_nama_peserta" class="form-group peserta_nama_peserta">
<input type="<?= $Grid->nama_peserta->getInputTextType() ?>" data-table="peserta" data-field="x_nama_peserta" name="x<?= $Grid->RowIndex ?>_nama_peserta" id="x<?= $Grid->RowIndex ?>_nama_peserta" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->nama_peserta->getPlaceHolder()) ?>" value="<?= $Grid->nama_peserta->EditValue ?>"<?= $Grid->nama_peserta->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->nama_peserta->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_peserta_nama_peserta" class="form-group peserta_nama_peserta">
<span<?= $Grid->nama_peserta->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->nama_peserta->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="peserta" data-field="x_nama_peserta" name="x<?= $Grid->RowIndex ?>_nama_peserta" id="x<?= $Grid->RowIndex ?>_nama_peserta" value="<?= HtmlEncode($Grid->nama_peserta->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="peserta" data-field="x_nama_peserta" name="o<?= $Grid->RowIndex ?>_nama_peserta" id="o<?= $Grid->RowIndex ?>_nama_peserta" value="<?= HtmlEncode($Grid->nama_peserta->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->id_evaluasi->Visible) { // id_evaluasi ?>
        <td data-name="id_evaluasi">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->id_evaluasi->getSessionValue() != "") { ?>
<span id="el$rowindex$_peserta_id_evaluasi" class="form-group peserta_id_evaluasi">
<span<?= $Grid->id_evaluasi->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id_evaluasi->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_id_evaluasi" name="x<?= $Grid->RowIndex ?>_id_evaluasi" value="<?= HtmlEncode($Grid->id_evaluasi->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_peserta_id_evaluasi" class="form-group peserta_id_evaluasi">
<input type="<?= $Grid->id_evaluasi->getInputTextType() ?>" data-table="peserta" data-field="x_id_evaluasi" name="x<?= $Grid->RowIndex ?>_id_evaluasi" id="x<?= $Grid->RowIndex ?>_id_evaluasi" size="30" placeholder="<?= HtmlEncode($Grid->id_evaluasi->getPlaceHolder()) ?>" value="<?= $Grid->id_evaluasi->EditValue ?>"<?= $Grid->id_evaluasi->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->id_evaluasi->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_peserta_id_evaluasi" class="form-group peserta_id_evaluasi">
<span<?= $Grid->id_evaluasi->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id_evaluasi->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="peserta" data-field="x_id_evaluasi" name="x<?= $Grid->RowIndex ?>_id_evaluasi" id="x<?= $Grid->RowIndex ?>_id_evaluasi" value="<?= HtmlEncode($Grid->id_evaluasi->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="peserta" data-field="x_id_evaluasi" name="o<?= $Grid->RowIndex ?>_id_evaluasi" id="o<?= $Grid->RowIndex ?>_id_evaluasi" value="<?= HtmlEncode($Grid->id_evaluasi->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->benar->Visible) { // benar ?>
        <td data-name="benar">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_peserta_benar" class="form-group peserta_benar">
<input type="<?= $Grid->benar->getInputTextType() ?>" data-table="peserta" data-field="x_benar" name="x<?= $Grid->RowIndex ?>_benar" id="x<?= $Grid->RowIndex ?>_benar" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->benar->getPlaceHolder()) ?>" value="<?= $Grid->benar->EditValue ?>"<?= $Grid->benar->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->benar->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_peserta_benar" class="form-group peserta_benar">
<span<?= $Grid->benar->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->benar->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="peserta" data-field="x_benar" name="x<?= $Grid->RowIndex ?>_benar" id="x<?= $Grid->RowIndex ?>_benar" value="<?= HtmlEncode($Grid->benar->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="peserta" data-field="x_benar" name="o<?= $Grid->RowIndex ?>_benar" id="o<?= $Grid->RowIndex ?>_benar" value="<?= HtmlEncode($Grid->benar->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ip->Visible) { // ip ?>
        <td data-name="ip">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_peserta_ip" class="form-group peserta_ip">
<input type="<?= $Grid->ip->getInputTextType() ?>" data-table="peserta" data-field="x_ip" name="x<?= $Grid->RowIndex ?>_ip" id="x<?= $Grid->RowIndex ?>_ip" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->ip->getPlaceHolder()) ?>" value="<?= $Grid->ip->EditValue ?>"<?= $Grid->ip->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ip->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_peserta_ip" class="form-group peserta_ip">
<span<?= $Grid->ip->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ip->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="peserta" data-field="x_ip" name="x<?= $Grid->RowIndex ?>_ip" id="x<?= $Grid->RowIndex ?>_ip" value="<?= HtmlEncode($Grid->ip->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="peserta" data-field="x_ip" name="o<?= $Grid->RowIndex ?>_ip" id="o<?= $Grid->RowIndex ?>_ip" value="<?= HtmlEncode($Grid->ip->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fpesertagrid","load"], function() {
    fpesertagrid.updateLists(<?= $Grid->RowIndex ?>);
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
<input type="hidden" name="detailpage" value="fpesertagrid">
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
    ew.addEventHandlers("peserta");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
