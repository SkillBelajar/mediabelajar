<?php

namespace PHPMaker2021\project1;

// Page object
$GambarAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fgambaradd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fgambaradd = currentForm = new ew.Form("fgambaradd", "add");

    // Add fields
    var fields = ew.vars.tables.gambar.fields;
    fgambaradd.addFields([
        ["nama_gambar", [fields.nama_gambar.required ? ew.Validators.fileRequired(fields.nama_gambar.caption) : null], fields.nama_gambar.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fgambaradd,
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
    fgambaradd.validate = function () {
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

            // Validate fields
            if (!this.validateFields(rowIndex))
                return false;

            // Call Form_CustomValidate event
            if (!this.customValidate(fobj)) {
                this.focus();
                return false;
            }
        }

        // Process detail forms
        var dfs = $fobj.find("input[name='detailpage']").get();
        for (var i = 0; i < dfs.length; i++) {
            var df = dfs[i],
                val = df.value,
                frm = ew.forms.get(val);
            if (val && frm && !frm.validate())
                return false;
        }
        return true;
    }

    // Form_CustomValidate
    fgambaradd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fgambaradd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fgambaradd");
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
<form name="fgambaradd" id="fgambaradd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="gambar">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->nama_gambar->Visible) { // nama_gambar ?>
    <div id="r_nama_gambar" class="form-group row">
        <label id="elh_gambar_nama_gambar" class="<?= $Page->LeftColumnClass ?>"><?= $Page->nama_gambar->caption() ?><?= $Page->nama_gambar->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->nama_gambar->cellAttributes() ?>>
<span id="el_gambar_nama_gambar">
<div id="fd_x_nama_gambar">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Page->nama_gambar->title() ?>" data-table="gambar" data-field="x_nama_gambar" name="x_nama_gambar" id="x_nama_gambar" lang="<?= CurrentLanguageID() ?>"<?= $Page->nama_gambar->editAttributes() ?><?= ($Page->nama_gambar->ReadOnly || $Page->nama_gambar->Disabled) ? " disabled" : "" ?> aria-describedby="x_nama_gambar_help">
        <label class="custom-file-label ew-file-label" for="x_nama_gambar"><?= $Language->phrase("ChooseFile") ?></label>
    </div>
</div>
<?= $Page->nama_gambar->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->nama_gambar->getErrorMessage() ?></div>
<input type="hidden" name="fn_x_nama_gambar" id= "fn_x_nama_gambar" value="<?= $Page->nama_gambar->Upload->FileName ?>">
<input type="hidden" name="fa_x_nama_gambar" id= "fa_x_nama_gambar" value="0">
<input type="hidden" name="fs_x_nama_gambar" id= "fs_x_nama_gambar" value="255">
<input type="hidden" name="fx_x_nama_gambar" id= "fx_x_nama_gambar" value="<?= $Page->nama_gambar->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_nama_gambar" id= "fm_x_nama_gambar" value="<?= $Page->nama_gambar->UploadMaxFileSize ?>">
</div>
<table id="ft_x_nama_gambar" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= GetUrl($Page->getReturnUrl()) ?>"><?= $Language->phrase("CancelBtn") ?></button>
    </div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("gambar");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
