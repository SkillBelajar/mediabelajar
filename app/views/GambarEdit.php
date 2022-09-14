<?php

namespace PHPMaker2021\project1;

// Page object
$GambarEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fgambaredit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fgambaredit = currentForm = new ew.Form("fgambaredit", "edit");

    // Add fields
    var fields = ew.vars.tables.gambar.fields;
    fgambaredit.addFields([
        ["id_gambar", [fields.id_gambar.required ? ew.Validators.required(fields.id_gambar.caption) : null], fields.id_gambar.isInvalid],
        ["nama_gambar", [fields.nama_gambar.required ? ew.Validators.fileRequired(fields.nama_gambar.caption) : null], fields.nama_gambar.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fgambaredit,
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
    fgambaredit.validate = function () {
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
    fgambaredit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fgambaredit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fgambaredit");
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
<form name="fgambaredit" id="fgambaredit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="gambar">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id_gambar->Visible) { // id_gambar ?>
    <div id="r_id_gambar" class="form-group row">
        <label id="elh_gambar_id_gambar" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_gambar->caption() ?><?= $Page->id_gambar->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id_gambar->cellAttributes() ?>>
<span id="el_gambar_id_gambar">
<span<?= $Page->id_gambar->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id_gambar->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="gambar" data-field="x_id_gambar" name="x_id_gambar" id="x_id_gambar" value="<?= HtmlEncode($Page->id_gambar->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
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
<input type="hidden" name="fa_x_nama_gambar" id= "fa_x_nama_gambar" value="<?= (Post("fa_x_nama_gambar") == "0") ? "0" : "1" ?>">
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
    ew.addEventHandlers("gambar");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
