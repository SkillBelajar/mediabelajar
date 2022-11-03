<?php

namespace PHPMaker2021\project1;

// Page object
$SkorUlanganEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fskor_ulanganedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fskor_ulanganedit = currentForm = new ew.Form("fskor_ulanganedit", "edit");

    // Add fields
    var fields = ew.vars.tables.skor_ulangan.fields;
    fskor_ulanganedit.addFields([
        ["id_skor_ulangan", [fields.id_skor_ulangan.required ? ew.Validators.required(fields.id_skor_ulangan.caption) : null], fields.id_skor_ulangan.isInvalid],
        ["nama", [fields.nama.required ? ew.Validators.required(fields.nama.caption) : null], fields.nama.isInvalid],
        ["skor", [fields.skor.required ? ew.Validators.required(fields.skor.caption) : null], fields.skor.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fskor_ulanganedit,
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
    fskor_ulanganedit.validate = function () {
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
    fskor_ulanganedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fskor_ulanganedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fskor_ulanganedit");
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
<form name="fskor_ulanganedit" id="fskor_ulanganedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="skor_ulangan">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id_skor_ulangan->Visible) { // id_skor_ulangan ?>
    <div id="r_id_skor_ulangan" class="form-group row">
        <label id="elh_skor_ulangan_id_skor_ulangan" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_skor_ulangan->caption() ?><?= $Page->id_skor_ulangan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id_skor_ulangan->cellAttributes() ?>>
<span id="el_skor_ulangan_id_skor_ulangan">
<span<?= $Page->id_skor_ulangan->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id_skor_ulangan->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="skor_ulangan" data-field="x_id_skor_ulangan" name="x_id_skor_ulangan" id="x_id_skor_ulangan" value="<?= HtmlEncode($Page->id_skor_ulangan->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->nama->Visible) { // nama ?>
    <div id="r_nama" class="form-group row">
        <label id="elh_skor_ulangan_nama" for="x_nama" class="<?= $Page->LeftColumnClass ?>"><?= $Page->nama->caption() ?><?= $Page->nama->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->nama->cellAttributes() ?>>
<span id="el_skor_ulangan_nama">
<input type="<?= $Page->nama->getInputTextType() ?>" data-table="skor_ulangan" data-field="x_nama" name="x_nama" id="x_nama" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->nama->getPlaceHolder()) ?>" value="<?= $Page->nama->EditValue ?>"<?= $Page->nama->editAttributes() ?> aria-describedby="x_nama_help">
<?= $Page->nama->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->nama->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->skor->Visible) { // skor ?>
    <div id="r_skor" class="form-group row">
        <label id="elh_skor_ulangan_skor" for="x_skor" class="<?= $Page->LeftColumnClass ?>"><?= $Page->skor->caption() ?><?= $Page->skor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->skor->cellAttributes() ?>>
<span id="el_skor_ulangan_skor">
<input type="<?= $Page->skor->getInputTextType() ?>" data-table="skor_ulangan" data-field="x_skor" name="x_skor" id="x_skor" size="30" placeholder="<?= HtmlEncode($Page->skor->getPlaceHolder()) ?>" value="<?= $Page->skor->EditValue ?>"<?= $Page->skor->editAttributes() ?> aria-describedby="x_skor_help">
<?= $Page->skor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->skor->getErrorMessage() ?></div>
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
    ew.addEventHandlers("skor_ulangan");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
