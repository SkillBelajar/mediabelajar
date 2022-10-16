<?php

namespace PHPMaker2021\project1;

// Page object
$VideoAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fvideoadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fvideoadd = currentForm = new ew.Form("fvideoadd", "add");

    // Add fields
    var fields = ew.vars.tables.video.fields;
    fvideoadd.addFields([
        ["file", [fields.file.required ? ew.Validators.fileRequired(fields.file.caption) : null], fields.file.isInvalid],
        ["nama", [fields.nama.required ? ew.Validators.required(fields.nama.caption) : null], fields.nama.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fvideoadd,
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
    fvideoadd.validate = function () {
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
    fvideoadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fvideoadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fvideoadd");
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
<form name="fvideoadd" id="fvideoadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="video">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->file->Visible) { // file ?>
    <div id="r_file" class="form-group row">
        <label id="elh_video_file" class="<?= $Page->LeftColumnClass ?>"><?= $Page->file->caption() ?><?= $Page->file->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->file->cellAttributes() ?>>
<span id="el_video_file">
<div id="fd_x_file">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Page->file->title() ?>" data-table="video" data-field="x_file" name="x_file" id="x_file" lang="<?= CurrentLanguageID() ?>"<?= $Page->file->editAttributes() ?><?= ($Page->file->ReadOnly || $Page->file->Disabled) ? " disabled" : "" ?> aria-describedby="x_file_help">
        <label class="custom-file-label ew-file-label" for="x_file"><?= $Language->phrase("ChooseFile") ?></label>
    </div>
</div>
<?= $Page->file->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->file->getErrorMessage() ?></div>
<input type="hidden" name="fn_x_file" id= "fn_x_file" value="<?= $Page->file->Upload->FileName ?>">
<input type="hidden" name="fa_x_file" id= "fa_x_file" value="0">
<input type="hidden" name="fs_x_file" id= "fs_x_file" value="65535">
<input type="hidden" name="fx_x_file" id= "fx_x_file" value="<?= $Page->file->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_file" id= "fm_x_file" value="<?= $Page->file->UploadMaxFileSize ?>">
</div>
<table id="ft_x_file" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->nama->Visible) { // nama ?>
    <div id="r_nama" class="form-group row">
        <label id="elh_video_nama" for="x_nama" class="<?= $Page->LeftColumnClass ?>"><?= $Page->nama->caption() ?><?= $Page->nama->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->nama->cellAttributes() ?>>
<span id="el_video_nama">
<input type="<?= $Page->nama->getInputTextType() ?>" data-table="video" data-field="x_nama" name="x_nama" id="x_nama" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->nama->getPlaceHolder()) ?>" value="<?= $Page->nama->EditValue ?>"<?= $Page->nama->editAttributes() ?> aria-describedby="x_nama_help">
<?= $Page->nama->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->nama->getErrorMessage() ?></div>
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
    ew.addEventHandlers("video");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
