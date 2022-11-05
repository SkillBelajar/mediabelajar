<?php

namespace PHPMaker2021\project1;

// Page object
$IndikatorRencanaBelajarAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var findikator_rencana_belajaradd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    findikator_rencana_belajaradd = currentForm = new ew.Form("findikator_rencana_belajaradd", "add");

    // Add fields
    var fields = ew.vars.tables.indikator_rencana_belajar.fields;
    findikator_rencana_belajaradd.addFields([
        ["kategori", [fields.kategori.required ? ew.Validators.required(fields.kategori.caption) : null], fields.kategori.isInvalid],
        ["indikator", [fields.indikator.required ? ew.Validators.required(fields.indikator.caption) : null], fields.indikator.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = findikator_rencana_belajaradd,
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
    findikator_rencana_belajaradd.validate = function () {
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
    findikator_rencana_belajaradd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    findikator_rencana_belajaradd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    findikator_rencana_belajaradd.lists.kategori = <?= $Page->kategori->toClientList($Page) ?>;
    loadjs.done("findikator_rencana_belajaradd");
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
<form name="findikator_rencana_belajaradd" id="findikator_rencana_belajaradd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="indikator_rencana_belajar">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->kategori->Visible) { // kategori ?>
    <div id="r_kategori" class="form-group row">
        <label id="elh_indikator_rencana_belajar_kategori" for="x_kategori" class="<?= $Page->LeftColumnClass ?>"><?= $Page->kategori->caption() ?><?= $Page->kategori->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->kategori->cellAttributes() ?>>
<span id="el_indikator_rencana_belajar_kategori">
    <select
        id="x_kategori"
        name="x_kategori"
        class="form-control ew-select<?= $Page->kategori->isInvalidClass() ?>"
        data-select2-id="indikator_rencana_belajar_x_kategori"
        data-table="indikator_rencana_belajar"
        data-field="x_kategori"
        data-value-separator="<?= $Page->kategori->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->kategori->getPlaceHolder()) ?>"
        <?= $Page->kategori->editAttributes() ?>>
        <?= $Page->kategori->selectOptionListHtml("x_kategori") ?>
    </select>
    <?= $Page->kategori->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->kategori->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='indikator_rencana_belajar_x_kategori']"),
        options = { name: "x_kategori", selectId: "indikator_rencana_belajar_x_kategori", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.indikator_rencana_belajar.fields.kategori.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.indikator_rencana_belajar.fields.kategori.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->indikator->Visible) { // indikator ?>
    <div id="r_indikator" class="form-group row">
        <label id="elh_indikator_rencana_belajar_indikator" for="x_indikator" class="<?= $Page->LeftColumnClass ?>"><?= $Page->indikator->caption() ?><?= $Page->indikator->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->indikator->cellAttributes() ?>>
<span id="el_indikator_rencana_belajar_indikator">
<input type="<?= $Page->indikator->getInputTextType() ?>" data-table="indikator_rencana_belajar" data-field="x_indikator" name="x_indikator" id="x_indikator" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->indikator->getPlaceHolder()) ?>" value="<?= $Page->indikator->EditValue ?>"<?= $Page->indikator->editAttributes() ?> aria-describedby="x_indikator_help">
<?= $Page->indikator->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->indikator->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php
    if (in_array("rencana_pembelajaran", explode(",", $Page->getCurrentDetailTable())) && $rencana_pembelajaran->DetailAdd) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("rencana_pembelajaran", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "RencanaPembelajaranGrid.php" ?>
<?php } ?>
<?php
    if (in_array("generator_rencana", explode(",", $Page->getCurrentDetailTable())) && $generator_rencana->DetailAdd) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("generator_rencana", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "GeneratorRencanaGrid.php" ?>
<?php } ?>
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
    ew.addEventHandlers("indikator_rencana_belajar");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
