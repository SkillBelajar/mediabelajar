<?php

namespace PHPMaker2021\project1;

// Page object
$MinatSiswaEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fminat_siswaedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fminat_siswaedit = currentForm = new ew.Form("fminat_siswaedit", "edit");

    // Add fields
    var fields = ew.vars.tables.minat_siswa.fields;
    fminat_siswaedit.addFields([
        ["id_minat_siswa", [fields.id_minat_siswa.required ? ew.Validators.required(fields.id_minat_siswa.caption) : null], fields.id_minat_siswa.isInvalid],
        ["nama", [fields.nama.required ? ew.Validators.required(fields.nama.caption) : null], fields.nama.isInvalid],
        ["emosi", [fields.emosi.required ? ew.Validators.required(fields.emosi.caption) : null], fields.emosi.isInvalid],
        ["harapan", [fields.harapan.required ? ew.Validators.required(fields.harapan.caption) : null], fields.harapan.isInvalid],
        ["level", [fields.level.required ? ew.Validators.required(fields.level.caption) : null], fields.level.isInvalid],
        ["kesiapan", [fields.kesiapan.required ? ew.Validators.required(fields.kesiapan.caption) : null], fields.kesiapan.isInvalid],
        ["minat", [fields.minat.required ? ew.Validators.required(fields.minat.caption) : null], fields.minat.isInvalid],
        ["tgl", [fields.tgl.required ? ew.Validators.required(fields.tgl.caption) : null], fields.tgl.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fminat_siswaedit,
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
    fminat_siswaedit.validate = function () {
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
    fminat_siswaedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fminat_siswaedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fminat_siswaedit");
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
<form name="fminat_siswaedit" id="fminat_siswaedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="minat_siswa">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id_minat_siswa->Visible) { // id_minat_siswa ?>
    <div id="r_id_minat_siswa" class="form-group row">
        <label id="elh_minat_siswa_id_minat_siswa" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_minat_siswa->caption() ?><?= $Page->id_minat_siswa->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id_minat_siswa->cellAttributes() ?>>
<span id="el_minat_siswa_id_minat_siswa">
<span<?= $Page->id_minat_siswa->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id_minat_siswa->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="minat_siswa" data-field="x_id_minat_siswa" name="x_id_minat_siswa" id="x_id_minat_siswa" value="<?= HtmlEncode($Page->id_minat_siswa->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->nama->Visible) { // nama ?>
    <div id="r_nama" class="form-group row">
        <label id="elh_minat_siswa_nama" for="x_nama" class="<?= $Page->LeftColumnClass ?>"><?= $Page->nama->caption() ?><?= $Page->nama->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->nama->cellAttributes() ?>>
<span id="el_minat_siswa_nama">
<input type="<?= $Page->nama->getInputTextType() ?>" data-table="minat_siswa" data-field="x_nama" name="x_nama" id="x_nama" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->nama->getPlaceHolder()) ?>" value="<?= $Page->nama->EditValue ?>"<?= $Page->nama->editAttributes() ?> aria-describedby="x_nama_help">
<?= $Page->nama->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->nama->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->emosi->Visible) { // emosi ?>
    <div id="r_emosi" class="form-group row">
        <label id="elh_minat_siswa_emosi" for="x_emosi" class="<?= $Page->LeftColumnClass ?>"><?= $Page->emosi->caption() ?><?= $Page->emosi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->emosi->cellAttributes() ?>>
<span id="el_minat_siswa_emosi">
<input type="<?= $Page->emosi->getInputTextType() ?>" data-table="minat_siswa" data-field="x_emosi" name="x_emosi" id="x_emosi" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->emosi->getPlaceHolder()) ?>" value="<?= $Page->emosi->EditValue ?>"<?= $Page->emosi->editAttributes() ?> aria-describedby="x_emosi_help">
<?= $Page->emosi->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->emosi->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->harapan->Visible) { // harapan ?>
    <div id="r_harapan" class="form-group row">
        <label id="elh_minat_siswa_harapan" for="x_harapan" class="<?= $Page->LeftColumnClass ?>"><?= $Page->harapan->caption() ?><?= $Page->harapan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->harapan->cellAttributes() ?>>
<span id="el_minat_siswa_harapan">
<textarea data-table="minat_siswa" data-field="x_harapan" name="x_harapan" id="x_harapan" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->harapan->getPlaceHolder()) ?>"<?= $Page->harapan->editAttributes() ?> aria-describedby="x_harapan_help"><?= $Page->harapan->EditValue ?></textarea>
<?= $Page->harapan->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->harapan->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->level->Visible) { // level ?>
    <div id="r_level" class="form-group row">
        <label id="elh_minat_siswa_level" for="x_level" class="<?= $Page->LeftColumnClass ?>"><?= $Page->level->caption() ?><?= $Page->level->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->level->cellAttributes() ?>>
<span id="el_minat_siswa_level">
<textarea data-table="minat_siswa" data-field="x_level" name="x_level" id="x_level" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->level->getPlaceHolder()) ?>"<?= $Page->level->editAttributes() ?> aria-describedby="x_level_help"><?= $Page->level->EditValue ?></textarea>
<?= $Page->level->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->level->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->kesiapan->Visible) { // kesiapan ?>
    <div id="r_kesiapan" class="form-group row">
        <label id="elh_minat_siswa_kesiapan" for="x_kesiapan" class="<?= $Page->LeftColumnClass ?>"><?= $Page->kesiapan->caption() ?><?= $Page->kesiapan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->kesiapan->cellAttributes() ?>>
<span id="el_minat_siswa_kesiapan">
<textarea data-table="minat_siswa" data-field="x_kesiapan" name="x_kesiapan" id="x_kesiapan" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->kesiapan->getPlaceHolder()) ?>"<?= $Page->kesiapan->editAttributes() ?> aria-describedby="x_kesiapan_help"><?= $Page->kesiapan->EditValue ?></textarea>
<?= $Page->kesiapan->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->kesiapan->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->minat->Visible) { // minat ?>
    <div id="r_minat" class="form-group row">
        <label id="elh_minat_siswa_minat" for="x_minat" class="<?= $Page->LeftColumnClass ?>"><?= $Page->minat->caption() ?><?= $Page->minat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->minat->cellAttributes() ?>>
<span id="el_minat_siswa_minat">
<textarea data-table="minat_siswa" data-field="x_minat" name="x_minat" id="x_minat" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->minat->getPlaceHolder()) ?>"<?= $Page->minat->editAttributes() ?> aria-describedby="x_minat_help"><?= $Page->minat->EditValue ?></textarea>
<?= $Page->minat->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->minat->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->tgl->Visible) { // tgl ?>
    <div id="r_tgl" class="form-group row">
        <label id="elh_minat_siswa_tgl" for="x_tgl" class="<?= $Page->LeftColumnClass ?>"><?= $Page->tgl->caption() ?><?= $Page->tgl->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->tgl->cellAttributes() ?>>
<span id="el_minat_siswa_tgl">
<input type="<?= $Page->tgl->getInputTextType() ?>" data-table="minat_siswa" data-field="x_tgl" name="x_tgl" id="x_tgl" size="30" maxlength="11" placeholder="<?= HtmlEncode($Page->tgl->getPlaceHolder()) ?>" value="<?= $Page->tgl->EditValue ?>"<?= $Page->tgl->editAttributes() ?> aria-describedby="x_tgl_help">
<?= $Page->tgl->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->tgl->getErrorMessage() ?></div>
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
    ew.addEventHandlers("minat_siswa");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
