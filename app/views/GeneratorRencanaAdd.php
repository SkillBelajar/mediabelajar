<?php

namespace PHPMaker2021\project1;

// Page object
$GeneratorRencanaAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fgenerator_rencanaadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fgenerator_rencanaadd = currentForm = new ew.Form("fgenerator_rencanaadd", "add");

    // Add fields
    var fields = ew.vars.tables.generator_rencana.fields;
    fgenerator_rencanaadd.addFields([
        ["id_indikator_rencana", [fields.id_indikator_rencana.required ? ew.Validators.required(fields.id_indikator_rencana.caption) : null], fields.id_indikator_rencana.isInvalid],
        ["judul", [fields.judul.required ? ew.Validators.required(fields.judul.caption) : null], fields.judul.isInvalid],
        ["isi", [fields.isi.required ? ew.Validators.required(fields.isi.caption) : null], fields.isi.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fgenerator_rencanaadd,
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
    fgenerator_rencanaadd.validate = function () {
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
    fgenerator_rencanaadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fgenerator_rencanaadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fgenerator_rencanaadd.lists.id_indikator_rencana = <?= $Page->id_indikator_rencana->toClientList($Page) ?>;
    loadjs.done("fgenerator_rencanaadd");
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
<form name="fgenerator_rencanaadd" id="fgenerator_rencanaadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="generator_rencana">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if ($Page->getCurrentMasterTable() == "indikator_rencana_belajar") { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="indikator_rencana_belajar">
<input type="hidden" name="fk_id_indikator" value="<?= HtmlEncode($Page->id_indikator_rencana->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->id_indikator_rencana->Visible) { // id_indikator_rencana ?>
    <div id="r_id_indikator_rencana" class="form-group row">
        <label id="elh_generator_rencana_id_indikator_rencana" for="x_id_indikator_rencana" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_indikator_rencana->caption() ?><?= $Page->id_indikator_rencana->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id_indikator_rencana->cellAttributes() ?>>
<?php if ($Page->id_indikator_rencana->getSessionValue() != "") { ?>
<span id="el_generator_rencana_id_indikator_rencana">
<span<?= $Page->id_indikator_rencana->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id_indikator_rencana->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_id_indikator_rencana" name="x_id_indikator_rencana" value="<?= HtmlEncode($Page->id_indikator_rencana->CurrentValue) ?>">
<?php } else { ?>
<span id="el_generator_rencana_id_indikator_rencana">
    <select
        id="x_id_indikator_rencana"
        name="x_id_indikator_rencana"
        class="form-control ew-select<?= $Page->id_indikator_rencana->isInvalidClass() ?>"
        data-select2-id="generator_rencana_x_id_indikator_rencana"
        data-table="generator_rencana"
        data-field="x_id_indikator_rencana"
        data-value-separator="<?= $Page->id_indikator_rencana->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->id_indikator_rencana->getPlaceHolder()) ?>"
        <?= $Page->id_indikator_rencana->editAttributes() ?>>
        <?= $Page->id_indikator_rencana->selectOptionListHtml("x_id_indikator_rencana") ?>
    </select>
    <?= $Page->id_indikator_rencana->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->id_indikator_rencana->getErrorMessage() ?></div>
<?= $Page->id_indikator_rencana->Lookup->getParamTag($Page, "p_x_id_indikator_rencana") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='generator_rencana_x_id_indikator_rencana']"),
        options = { name: "x_id_indikator_rencana", selectId: "generator_rencana_x_id_indikator_rencana", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.generator_rencana.fields.id_indikator_rencana.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->judul->Visible) { // judul ?>
    <div id="r_judul" class="form-group row">
        <label id="elh_generator_rencana_judul" for="x_judul" class="<?= $Page->LeftColumnClass ?>"><?= $Page->judul->caption() ?><?= $Page->judul->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->judul->cellAttributes() ?>>
<span id="el_generator_rencana_judul">
<input type="<?= $Page->judul->getInputTextType() ?>" data-table="generator_rencana" data-field="x_judul" name="x_judul" id="x_judul" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->judul->getPlaceHolder()) ?>" value="<?= $Page->judul->EditValue ?>"<?= $Page->judul->editAttributes() ?> aria-describedby="x_judul_help">
<?= $Page->judul->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->judul->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->isi->Visible) { // isi ?>
    <div id="r_isi" class="form-group row">
        <label id="elh_generator_rencana_isi" class="<?= $Page->LeftColumnClass ?>"><?= $Page->isi->caption() ?><?= $Page->isi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->isi->cellAttributes() ?>>
<span id="el_generator_rencana_isi">
<?php $Page->isi->EditAttrs->appendClass("editor"); ?>
<textarea data-table="generator_rencana" data-field="x_isi" name="x_isi" id="x_isi" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->isi->getPlaceHolder()) ?>"<?= $Page->isi->editAttributes() ?> aria-describedby="x_isi_help"><?= $Page->isi->EditValue ?></textarea>
<?= $Page->isi->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->isi->getErrorMessage() ?></div>
<script>
loadjs.ready(["fgenerator_rencanaadd", "editor"], function() {
	ew.createEditor("fgenerator_rencanaadd", "x_isi", 35, 4, <?= $Page->isi->ReadOnly || false ? "true" : "false" ?>);
});
</script>
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
    ew.addEventHandlers("generator_rencana");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
