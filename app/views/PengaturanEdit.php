<?php

namespace PHPMaker2021\project1;

// Page object
$PengaturanEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpengaturanedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fpengaturanedit = currentForm = new ew.Form("fpengaturanedit", "edit");

    // Add fields
    var fields = ew.vars.tables.pengaturan.fields;
    fpengaturanedit.addFields([
        ["id_pengaturan", [fields.id_pengaturan.required ? ew.Validators.required(fields.id_pengaturan.caption) : null], fields.id_pengaturan.isInvalid],
        ["nama_guru", [fields.nama_guru.required ? ew.Validators.required(fields.nama_guru.caption) : null], fields.nama_guru.isInvalid],
        ["tempat_kerja", [fields.tempat_kerja.required ? ew.Validators.required(fields.tempat_kerja.caption) : null], fields.tempat_kerja.isInvalid],
        ["logo", [fields.logo.required ? ew.Validators.fileRequired(fields.logo.caption) : null], fields.logo.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpengaturanedit,
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
    fpengaturanedit.validate = function () {
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
    fpengaturanedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpengaturanedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fpengaturanedit");
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
<form name="fpengaturanedit" id="fpengaturanedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pengaturan">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id_pengaturan->Visible) { // id_pengaturan ?>
    <div id="r_id_pengaturan" class="form-group row">
        <label id="elh_pengaturan_id_pengaturan" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_pengaturan->caption() ?><?= $Page->id_pengaturan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id_pengaturan->cellAttributes() ?>>
<span id="el_pengaturan_id_pengaturan">
<span<?= $Page->id_pengaturan->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id_pengaturan->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="pengaturan" data-field="x_id_pengaturan" name="x_id_pengaturan" id="x_id_pengaturan" value="<?= HtmlEncode($Page->id_pengaturan->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->nama_guru->Visible) { // nama_guru ?>
    <div id="r_nama_guru" class="form-group row">
        <label id="elh_pengaturan_nama_guru" for="x_nama_guru" class="<?= $Page->LeftColumnClass ?>"><?= $Page->nama_guru->caption() ?><?= $Page->nama_guru->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->nama_guru->cellAttributes() ?>>
<span id="el_pengaturan_nama_guru">
<input type="<?= $Page->nama_guru->getInputTextType() ?>" data-table="pengaturan" data-field="x_nama_guru" name="x_nama_guru" id="x_nama_guru" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->nama_guru->getPlaceHolder()) ?>" value="<?= $Page->nama_guru->EditValue ?>"<?= $Page->nama_guru->editAttributes() ?> aria-describedby="x_nama_guru_help">
<?= $Page->nama_guru->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->nama_guru->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->tempat_kerja->Visible) { // tempat_kerja ?>
    <div id="r_tempat_kerja" class="form-group row">
        <label id="elh_pengaturan_tempat_kerja" for="x_tempat_kerja" class="<?= $Page->LeftColumnClass ?>"><?= $Page->tempat_kerja->caption() ?><?= $Page->tempat_kerja->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->tempat_kerja->cellAttributes() ?>>
<span id="el_pengaturan_tempat_kerja">
<textarea data-table="pengaturan" data-field="x_tempat_kerja" name="x_tempat_kerja" id="x_tempat_kerja" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->tempat_kerja->getPlaceHolder()) ?>"<?= $Page->tempat_kerja->editAttributes() ?> aria-describedby="x_tempat_kerja_help"><?= $Page->tempat_kerja->EditValue ?></textarea>
<?= $Page->tempat_kerja->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->tempat_kerja->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->logo->Visible) { // logo ?>
    <div id="r_logo" class="form-group row">
        <label id="elh_pengaturan_logo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->logo->caption() ?><?= $Page->logo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->logo->cellAttributes() ?>>
<span id="el_pengaturan_logo">
<div id="fd_x_logo">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Page->logo->title() ?>" data-table="pengaturan" data-field="x_logo" name="x_logo" id="x_logo" lang="<?= CurrentLanguageID() ?>"<?= $Page->logo->editAttributes() ?><?= ($Page->logo->ReadOnly || $Page->logo->Disabled) ? " disabled" : "" ?> aria-describedby="x_logo_help">
        <label class="custom-file-label ew-file-label" for="x_logo"><?= $Language->phrase("ChooseFile") ?></label>
    </div>
</div>
<?= $Page->logo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->logo->getErrorMessage() ?></div>
<input type="hidden" name="fn_x_logo" id= "fn_x_logo" value="<?= $Page->logo->Upload->FileName ?>">
<input type="hidden" name="fa_x_logo" id= "fa_x_logo" value="<?= (Post("fa_x_logo") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x_logo" id= "fs_x_logo" value="255">
<input type="hidden" name="fx_x_logo" id= "fx_x_logo" value="<?= $Page->logo->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_logo" id= "fm_x_logo" value="<?= $Page->logo->UploadMaxFileSize ?>">
</div>
<table id="ft_x_logo" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
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
    ew.addEventHandlers("pengaturan");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
