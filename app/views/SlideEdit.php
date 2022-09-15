<?php

namespace PHPMaker2021\project1;

// Page object
$SlideEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fslideedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fslideedit = currentForm = new ew.Form("fslideedit", "edit");

    // Add fields
    var fields = ew.vars.tables.slide.fields;
    fslideedit.addFields([
        ["id_slide", [fields.id_slide.required ? ew.Validators.required(fields.id_slide.caption) : null], fields.id_slide.isInvalid],
        ["slide", [fields.slide.required ? ew.Validators.required(fields.slide.caption) : null], fields.slide.isInvalid],
        ["refresh", [fields.refresh.required ? ew.Validators.required(fields.refresh.caption) : null], fields.refresh.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fslideedit,
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
    fslideedit.validate = function () {
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
    fslideedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fslideedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fslideedit.lists.refresh = <?= $Page->refresh->toClientList($Page) ?>;
    loadjs.done("fslideedit");
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
<form name="fslideedit" id="fslideedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="slide">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id_slide->Visible) { // id_slide ?>
    <div id="r_id_slide" class="form-group row">
        <label id="elh_slide_id_slide" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_slide->caption() ?><?= $Page->id_slide->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id_slide->cellAttributes() ?>>
<span id="el_slide_id_slide">
<span<?= $Page->id_slide->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id_slide->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="slide" data-field="x_id_slide" name="x_id_slide" id="x_id_slide" value="<?= HtmlEncode($Page->id_slide->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->slide->Visible) { // slide ?>
    <div id="r_slide" class="form-group row">
        <label id="elh_slide_slide" for="x_slide" class="<?= $Page->LeftColumnClass ?>"><?= $Page->slide->caption() ?><?= $Page->slide->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->slide->cellAttributes() ?>>
<span id="el_slide_slide">
<input type="<?= $Page->slide->getInputTextType() ?>" data-table="slide" data-field="x_slide" name="x_slide" id="x_slide" size="30" placeholder="<?= HtmlEncode($Page->slide->getPlaceHolder()) ?>" value="<?= $Page->slide->EditValue ?>"<?= $Page->slide->editAttributes() ?> aria-describedby="x_slide_help">
<?= $Page->slide->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->slide->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->refresh->Visible) { // refresh ?>
    <div id="r_refresh" class="form-group row">
        <label id="elh_slide_refresh" class="<?= $Page->LeftColumnClass ?>"><?= $Page->refresh->caption() ?><?= $Page->refresh->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->refresh->cellAttributes() ?>>
<span id="el_slide_refresh">
<template id="tp_x_refresh">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="slide" data-field="x_refresh" name="x_refresh" id="x_refresh"<?= $Page->refresh->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_refresh" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_refresh"
    name="x_refresh"
    value="<?= HtmlEncode($Page->refresh->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_refresh"
    data-target="dsl_x_refresh"
    data-repeatcolumn="5"
    class="form-control<?= $Page->refresh->isInvalidClass() ?>"
    data-table="slide"
    data-field="x_refresh"
    data-value-separator="<?= $Page->refresh->displayValueSeparatorAttribute() ?>"
    <?= $Page->refresh->editAttributes() ?>>
<?= $Page->refresh->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->refresh->getErrorMessage() ?></div>
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
    ew.addEventHandlers("slide");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
