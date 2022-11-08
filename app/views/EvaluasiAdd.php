<?php

namespace PHPMaker2021\project1;

// Page object
$EvaluasiAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fevaluasiadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fevaluasiadd = currentForm = new ew.Form("fevaluasiadd", "add");

    // Add fields
    var fields = ew.vars.tables.evaluasi.fields;
    fevaluasiadd.addFields([
        ["id_materi", [fields.id_materi.required ? ew.Validators.required(fields.id_materi.caption) : null], fields.id_materi.isInvalid],
        ["soal", [fields.soal.required ? ew.Validators.required(fields.soal.caption) : null], fields.soal.isInvalid],
        ["jawaban", [fields.jawaban.required ? ew.Validators.required(fields.jawaban.caption) : null], fields.jawaban.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fevaluasiadd,
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
    fevaluasiadd.validate = function () {
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
    fevaluasiadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fevaluasiadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fevaluasiadd.lists.id_materi = <?= $Page->id_materi->toClientList($Page) ?>;
    fevaluasiadd.lists.jawaban = <?= $Page->jawaban->toClientList($Page) ?>;
    loadjs.done("fevaluasiadd");
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
<form name="fevaluasiadd" id="fevaluasiadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="evaluasi">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if ($Page->getCurrentMasterTable() == "materi") { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="materi">
<input type="hidden" name="fk_id_materi" value="<?= HtmlEncode($Page->id_materi->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->id_materi->Visible) { // id_materi ?>
    <div id="r_id_materi" class="form-group row">
        <label id="elh_evaluasi_id_materi" for="x_id_materi" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_materi->caption() ?><?= $Page->id_materi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id_materi->cellAttributes() ?>>
<?php if ($Page->id_materi->getSessionValue() != "") { ?>
<span id="el_evaluasi_id_materi">
<span<?= $Page->id_materi->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id_materi->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_id_materi" name="x_id_materi" value="<?= HtmlEncode($Page->id_materi->CurrentValue) ?>">
<?php } else { ?>
<span id="el_evaluasi_id_materi">
    <select
        id="x_id_materi"
        name="x_id_materi"
        class="form-control ew-select<?= $Page->id_materi->isInvalidClass() ?>"
        data-select2-id="evaluasi_x_id_materi"
        data-table="evaluasi"
        data-field="x_id_materi"
        data-value-separator="<?= $Page->id_materi->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->id_materi->getPlaceHolder()) ?>"
        <?= $Page->id_materi->editAttributes() ?>>
        <?= $Page->id_materi->selectOptionListHtml("x_id_materi") ?>
    </select>
    <?= $Page->id_materi->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->id_materi->getErrorMessage() ?></div>
<?= $Page->id_materi->Lookup->getParamTag($Page, "p_x_id_materi") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='evaluasi_x_id_materi']"),
        options = { name: "x_id_materi", selectId: "evaluasi_x_id_materi", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.evaluasi.fields.id_materi.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->soal->Visible) { // soal ?>
    <div id="r_soal" class="form-group row">
        <label id="elh_evaluasi_soal" class="<?= $Page->LeftColumnClass ?>"><?= $Page->soal->caption() ?><?= $Page->soal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->soal->cellAttributes() ?>>
<span id="el_evaluasi_soal">
<?php $Page->soal->EditAttrs->appendClass("editor"); ?>
<textarea data-table="evaluasi" data-field="x_soal" name="x_soal" id="x_soal" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->soal->getPlaceHolder()) ?>"<?= $Page->soal->editAttributes() ?> aria-describedby="x_soal_help"><?= $Page->soal->EditValue ?></textarea>
<?= $Page->soal->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->soal->getErrorMessage() ?></div>
<script>
loadjs.ready(["fevaluasiadd", "editor"], function() {
	ew.createEditor("fevaluasiadd", "x_soal", 35, 4, <?= $Page->soal->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->jawaban->Visible) { // jawaban ?>
    <div id="r_jawaban" class="form-group row">
        <label id="elh_evaluasi_jawaban" for="x_jawaban" class="<?= $Page->LeftColumnClass ?>"><?= $Page->jawaban->caption() ?><?= $Page->jawaban->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->jawaban->cellAttributes() ?>>
<span id="el_evaluasi_jawaban">
    <select
        id="x_jawaban"
        name="x_jawaban"
        class="form-control ew-select<?= $Page->jawaban->isInvalidClass() ?>"
        data-select2-id="evaluasi_x_jawaban"
        data-table="evaluasi"
        data-field="x_jawaban"
        data-value-separator="<?= $Page->jawaban->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->jawaban->getPlaceHolder()) ?>"
        <?= $Page->jawaban->editAttributes() ?>>
        <?= $Page->jawaban->selectOptionListHtml("x_jawaban") ?>
    </select>
    <?= $Page->jawaban->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->jawaban->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='evaluasi_x_jawaban']"),
        options = { name: "x_jawaban", selectId: "evaluasi_x_jawaban", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.evaluasi.fields.jawaban.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.evaluasi.fields.jawaban.selectOptions);
    ew.createSelect(options);
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
    ew.addEventHandlers("evaluasi");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
