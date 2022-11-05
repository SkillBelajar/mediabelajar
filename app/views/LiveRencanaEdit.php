<?php

namespace PHPMaker2021\project1;

// Page object
$LiveRencanaEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var flive_rencanaedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    flive_rencanaedit = currentForm = new ew.Form("flive_rencanaedit", "edit");

    // Add fields
    var fields = ew.vars.tables.live_rencana.fields;
    flive_rencanaedit.addFields([
        ["id_live_rencana", [fields.id_live_rencana.required ? ew.Validators.required(fields.id_live_rencana.caption) : null], fields.id_live_rencana.isInvalid],
        ["id_indikator", [fields.id_indikator.required ? ew.Validators.required(fields.id_indikator.caption) : null], fields.id_indikator.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = flive_rencanaedit,
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
    flive_rencanaedit.validate = function () {
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
    flive_rencanaedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    flive_rencanaedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("flive_rencanaedit");
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
<form name="flive_rencanaedit" id="flive_rencanaedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="live_rencana">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id_live_rencana->Visible) { // id_live_rencana ?>
    <div id="r_id_live_rencana" class="form-group row">
        <label id="elh_live_rencana_id_live_rencana" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_live_rencana->caption() ?><?= $Page->id_live_rencana->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id_live_rencana->cellAttributes() ?>>
<span id="el_live_rencana_id_live_rencana">
<span<?= $Page->id_live_rencana->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id_live_rencana->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="live_rencana" data-field="x_id_live_rencana" name="x_id_live_rencana" id="x_id_live_rencana" value="<?= HtmlEncode($Page->id_live_rencana->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->id_indikator->Visible) { // id_indikator ?>
    <div id="r_id_indikator" class="form-group row">
        <label id="elh_live_rencana_id_indikator" for="x_id_indikator" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_indikator->caption() ?><?= $Page->id_indikator->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id_indikator->cellAttributes() ?>>
<span id="el_live_rencana_id_indikator">
<input type="<?= $Page->id_indikator->getInputTextType() ?>" data-table="live_rencana" data-field="x_id_indikator" name="x_id_indikator" id="x_id_indikator" size="30" placeholder="<?= HtmlEncode($Page->id_indikator->getPlaceHolder()) ?>" value="<?= $Page->id_indikator->EditValue ?>"<?= $Page->id_indikator->editAttributes() ?> aria-describedby="x_id_indikator_help">
<?= $Page->id_indikator->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->id_indikator->getErrorMessage() ?></div>
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
    ew.addEventHandlers("live_rencana");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
