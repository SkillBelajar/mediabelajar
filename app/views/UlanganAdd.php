<?php

namespace PHPMaker2021\project1;

// Page object
$UlanganAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fulanganadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fulanganadd = currentForm = new ew.Form("fulanganadd", "add");

    // Add fields
    var fields = ew.vars.tables.ulangan.fields;
    fulanganadd.addFields([
        ["nama", [fields.nama.required ? ew.Validators.required(fields.nama.caption) : null], fields.nama.isInvalid],
        ["nomor_soal", [fields.nomor_soal.required ? ew.Validators.required(fields.nomor_soal.caption) : null], fields.nomor_soal.isInvalid],
        ["skor", [fields.skor.required ? ew.Validators.required(fields.skor.caption) : null], fields.skor.isInvalid],
        ["jawaban", [fields.jawaban.required ? ew.Validators.required(fields.jawaban.caption) : null], fields.jawaban.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fulanganadd,
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
    fulanganadd.validate = function () {
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
    fulanganadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fulanganadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fulanganadd");
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
<form name="fulanganadd" id="fulanganadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ulangan">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->nama->Visible) { // nama ?>
    <div id="r_nama" class="form-group row">
        <label id="elh_ulangan_nama" for="x_nama" class="<?= $Page->LeftColumnClass ?>"><?= $Page->nama->caption() ?><?= $Page->nama->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->nama->cellAttributes() ?>>
<span id="el_ulangan_nama">
<input type="<?= $Page->nama->getInputTextType() ?>" data-table="ulangan" data-field="x_nama" name="x_nama" id="x_nama" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->nama->getPlaceHolder()) ?>" value="<?= $Page->nama->EditValue ?>"<?= $Page->nama->editAttributes() ?> aria-describedby="x_nama_help">
<?= $Page->nama->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->nama->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->nomor_soal->Visible) { // nomor_soal ?>
    <div id="r_nomor_soal" class="form-group row">
        <label id="elh_ulangan_nomor_soal" for="x_nomor_soal" class="<?= $Page->LeftColumnClass ?>"><?= $Page->nomor_soal->caption() ?><?= $Page->nomor_soal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->nomor_soal->cellAttributes() ?>>
<span id="el_ulangan_nomor_soal">
<input type="<?= $Page->nomor_soal->getInputTextType() ?>" data-table="ulangan" data-field="x_nomor_soal" name="x_nomor_soal" id="x_nomor_soal" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->nomor_soal->getPlaceHolder()) ?>" value="<?= $Page->nomor_soal->EditValue ?>"<?= $Page->nomor_soal->editAttributes() ?> aria-describedby="x_nomor_soal_help">
<?= $Page->nomor_soal->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->nomor_soal->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->skor->Visible) { // skor ?>
    <div id="r_skor" class="form-group row">
        <label id="elh_ulangan_skor" for="x_skor" class="<?= $Page->LeftColumnClass ?>"><?= $Page->skor->caption() ?><?= $Page->skor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->skor->cellAttributes() ?>>
<span id="el_ulangan_skor">
<input type="<?= $Page->skor->getInputTextType() ?>" data-table="ulangan" data-field="x_skor" name="x_skor" id="x_skor" size="30" placeholder="<?= HtmlEncode($Page->skor->getPlaceHolder()) ?>" value="<?= $Page->skor->EditValue ?>"<?= $Page->skor->editAttributes() ?> aria-describedby="x_skor_help">
<?= $Page->skor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->skor->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->jawaban->Visible) { // jawaban ?>
    <div id="r_jawaban" class="form-group row">
        <label id="elh_ulangan_jawaban" for="x_jawaban" class="<?= $Page->LeftColumnClass ?>"><?= $Page->jawaban->caption() ?><?= $Page->jawaban->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->jawaban->cellAttributes() ?>>
<span id="el_ulangan_jawaban">
<input type="<?= $Page->jawaban->getInputTextType() ?>" data-table="ulangan" data-field="x_jawaban" name="x_jawaban" id="x_jawaban" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->jawaban->getPlaceHolder()) ?>" value="<?= $Page->jawaban->EditValue ?>"<?= $Page->jawaban->editAttributes() ?> aria-describedby="x_jawaban_help">
<?= $Page->jawaban->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->jawaban->getErrorMessage() ?></div>
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
    ew.addEventHandlers("ulangan");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
