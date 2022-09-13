<?php

namespace PHPMaker2021\project1;

// Page object
$PesertaEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpesertaedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fpesertaedit = currentForm = new ew.Form("fpesertaedit", "edit");

    // Add fields
    var fields = ew.vars.tables.peserta.fields;
    fpesertaedit.addFields([
        ["id_peserta", [fields.id_peserta.required ? ew.Validators.required(fields.id_peserta.caption) : null], fields.id_peserta.isInvalid],
        ["tanggal_jam", [fields.tanggal_jam.required ? ew.Validators.required(fields.tanggal_jam.caption) : null], fields.tanggal_jam.isInvalid],
        ["nama_peserta", [fields.nama_peserta.required ? ew.Validators.required(fields.nama_peserta.caption) : null], fields.nama_peserta.isInvalid],
        ["id_evaluasi", [fields.id_evaluasi.required ? ew.Validators.required(fields.id_evaluasi.caption) : null], fields.id_evaluasi.isInvalid],
        ["benar", [fields.benar.required ? ew.Validators.required(fields.benar.caption) : null], fields.benar.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpesertaedit,
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
    fpesertaedit.validate = function () {
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
    fpesertaedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpesertaedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fpesertaedit");
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
<form name="fpesertaedit" id="fpesertaedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="peserta">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id_peserta->Visible) { // id_peserta ?>
    <div id="r_id_peserta" class="form-group row">
        <label id="elh_peserta_id_peserta" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_peserta->caption() ?><?= $Page->id_peserta->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id_peserta->cellAttributes() ?>>
<span id="el_peserta_id_peserta">
<span<?= $Page->id_peserta->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id_peserta->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="peserta" data-field="x_id_peserta" name="x_id_peserta" id="x_id_peserta" value="<?= HtmlEncode($Page->id_peserta->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->tanggal_jam->Visible) { // tanggal_jam ?>
    <div id="r_tanggal_jam" class="form-group row">
        <label id="elh_peserta_tanggal_jam" for="x_tanggal_jam" class="<?= $Page->LeftColumnClass ?>"><?= $Page->tanggal_jam->caption() ?><?= $Page->tanggal_jam->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->tanggal_jam->cellAttributes() ?>>
<span id="el_peserta_tanggal_jam">
<input type="<?= $Page->tanggal_jam->getInputTextType() ?>" data-table="peserta" data-field="x_tanggal_jam" name="x_tanggal_jam" id="x_tanggal_jam" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->tanggal_jam->getPlaceHolder()) ?>" value="<?= $Page->tanggal_jam->EditValue ?>"<?= $Page->tanggal_jam->editAttributes() ?> aria-describedby="x_tanggal_jam_help">
<?= $Page->tanggal_jam->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->tanggal_jam->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->nama_peserta->Visible) { // nama_peserta ?>
    <div id="r_nama_peserta" class="form-group row">
        <label id="elh_peserta_nama_peserta" for="x_nama_peserta" class="<?= $Page->LeftColumnClass ?>"><?= $Page->nama_peserta->caption() ?><?= $Page->nama_peserta->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->nama_peserta->cellAttributes() ?>>
<span id="el_peserta_nama_peserta">
<input type="<?= $Page->nama_peserta->getInputTextType() ?>" data-table="peserta" data-field="x_nama_peserta" name="x_nama_peserta" id="x_nama_peserta" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->nama_peserta->getPlaceHolder()) ?>" value="<?= $Page->nama_peserta->EditValue ?>"<?= $Page->nama_peserta->editAttributes() ?> aria-describedby="x_nama_peserta_help">
<?= $Page->nama_peserta->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->nama_peserta->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->id_evaluasi->Visible) { // id_evaluasi ?>
    <div id="r_id_evaluasi" class="form-group row">
        <label id="elh_peserta_id_evaluasi" for="x_id_evaluasi" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_evaluasi->caption() ?><?= $Page->id_evaluasi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id_evaluasi->cellAttributes() ?>>
<span id="el_peserta_id_evaluasi">
<input type="<?= $Page->id_evaluasi->getInputTextType() ?>" data-table="peserta" data-field="x_id_evaluasi" name="x_id_evaluasi" id="x_id_evaluasi" size="30" placeholder="<?= HtmlEncode($Page->id_evaluasi->getPlaceHolder()) ?>" value="<?= $Page->id_evaluasi->EditValue ?>"<?= $Page->id_evaluasi->editAttributes() ?> aria-describedby="x_id_evaluasi_help">
<?= $Page->id_evaluasi->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->id_evaluasi->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->benar->Visible) { // benar ?>
    <div id="r_benar" class="form-group row">
        <label id="elh_peserta_benar" for="x_benar" class="<?= $Page->LeftColumnClass ?>"><?= $Page->benar->caption() ?><?= $Page->benar->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->benar->cellAttributes() ?>>
<span id="el_peserta_benar">
<input type="<?= $Page->benar->getInputTextType() ?>" data-table="peserta" data-field="x_benar" name="x_benar" id="x_benar" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->benar->getPlaceHolder()) ?>" value="<?= $Page->benar->EditValue ?>"<?= $Page->benar->editAttributes() ?> aria-describedby="x_benar_help">
<?= $Page->benar->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->benar->getErrorMessage() ?></div>
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
    ew.addEventHandlers("peserta");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
