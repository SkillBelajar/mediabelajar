<?php

namespace PHPMaker2021\project1;

// Page object
$RencanaPembelajaranAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var frencana_pembelajaranadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    frencana_pembelajaranadd = currentForm = new ew.Form("frencana_pembelajaranadd", "add");

    // Add fields
    var fields = ew.vars.tables.rencana_pembelajaran.fields;
    frencana_pembelajaranadd.addFields([
        ["id_indikator", [fields.id_indikator.required ? ew.Validators.required(fields.id_indikator.caption) : null], fields.id_indikator.isInvalid],
        ["id_materi", [fields.id_materi.required ? ew.Validators.required(fields.id_materi.caption) : null], fields.id_materi.isInvalid],
        ["judul", [fields.judul.required ? ew.Validators.required(fields.judul.caption) : null], fields.judul.isInvalid],
        ["kegiatan", [fields.kegiatan.required ? ew.Validators.required(fields.kegiatan.caption) : null], fields.kegiatan.isInvalid],
        ["waktu", [fields.waktu.required ? ew.Validators.required(fields.waktu.caption) : null], fields.waktu.isInvalid],
        ["tampilkan", [fields.tampilkan.required ? ew.Validators.required(fields.tampilkan.caption) : null], fields.tampilkan.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = frencana_pembelajaranadd,
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
    frencana_pembelajaranadd.validate = function () {
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
    frencana_pembelajaranadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    frencana_pembelajaranadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    frencana_pembelajaranadd.lists.id_indikator = <?= $Page->id_indikator->toClientList($Page) ?>;
    frencana_pembelajaranadd.lists.id_materi = <?= $Page->id_materi->toClientList($Page) ?>;
    frencana_pembelajaranadd.lists.tampilkan = <?= $Page->tampilkan->toClientList($Page) ?>;
    loadjs.done("frencana_pembelajaranadd");
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
<form name="frencana_pembelajaranadd" id="frencana_pembelajaranadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="rencana_pembelajaran">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if ($Page->getCurrentMasterTable() == "indikator_rencana_belajar") { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="indikator_rencana_belajar">
<input type="hidden" name="fk_id_indikator" value="<?= HtmlEncode($Page->id_indikator->getSessionValue()) ?>">
<?php } ?>
<?php if ($Page->getCurrentMasterTable() == "materi") { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="materi">
<input type="hidden" name="fk_id_materi" value="<?= HtmlEncode($Page->id_materi->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->id_indikator->Visible) { // id_indikator ?>
    <div id="r_id_indikator" class="form-group row">
        <label id="elh_rencana_pembelajaran_id_indikator" for="x_id_indikator" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_indikator->caption() ?><?= $Page->id_indikator->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id_indikator->cellAttributes() ?>>
<?php if ($Page->id_indikator->getSessionValue() != "") { ?>
<span id="el_rencana_pembelajaran_id_indikator">
<span<?= $Page->id_indikator->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id_indikator->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_id_indikator" name="x_id_indikator" value="<?= HtmlEncode($Page->id_indikator->CurrentValue) ?>">
<?php } else { ?>
<span id="el_rencana_pembelajaran_id_indikator">
    <select
        id="x_id_indikator"
        name="x_id_indikator"
        class="form-control ew-select<?= $Page->id_indikator->isInvalidClass() ?>"
        data-select2-id="rencana_pembelajaran_x_id_indikator"
        data-table="rencana_pembelajaran"
        data-field="x_id_indikator"
        data-value-separator="<?= $Page->id_indikator->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->id_indikator->getPlaceHolder()) ?>"
        <?= $Page->id_indikator->editAttributes() ?>>
        <?= $Page->id_indikator->selectOptionListHtml("x_id_indikator") ?>
    </select>
    <?= $Page->id_indikator->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->id_indikator->getErrorMessage() ?></div>
<?= $Page->id_indikator->Lookup->getParamTag($Page, "p_x_id_indikator") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='rencana_pembelajaran_x_id_indikator']"),
        options = { name: "x_id_indikator", selectId: "rencana_pembelajaran_x_id_indikator", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.rencana_pembelajaran.fields.id_indikator.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->id_materi->Visible) { // id_materi ?>
    <div id="r_id_materi" class="form-group row">
        <label id="elh_rencana_pembelajaran_id_materi" for="x_id_materi" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_materi->caption() ?><?= $Page->id_materi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id_materi->cellAttributes() ?>>
<?php if ($Page->id_materi->getSessionValue() != "") { ?>
<span id="el_rencana_pembelajaran_id_materi">
<span<?= $Page->id_materi->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id_materi->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_id_materi" name="x_id_materi" value="<?= HtmlEncode($Page->id_materi->CurrentValue) ?>">
<?php } else { ?>
<span id="el_rencana_pembelajaran_id_materi">
    <select
        id="x_id_materi"
        name="x_id_materi"
        class="form-control ew-select<?= $Page->id_materi->isInvalidClass() ?>"
        data-select2-id="rencana_pembelajaran_x_id_materi"
        data-table="rencana_pembelajaran"
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
    var el = document.querySelector("select[data-select2-id='rencana_pembelajaran_x_id_materi']"),
        options = { name: "x_id_materi", selectId: "rencana_pembelajaran_x_id_materi", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.rencana_pembelajaran.fields.id_materi.selectOptions);
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
        <label id="elh_rencana_pembelajaran_judul" for="x_judul" class="<?= $Page->LeftColumnClass ?>"><?= $Page->judul->caption() ?><?= $Page->judul->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->judul->cellAttributes() ?>>
<span id="el_rencana_pembelajaran_judul">
<input type="<?= $Page->judul->getInputTextType() ?>" data-table="rencana_pembelajaran" data-field="x_judul" name="x_judul" id="x_judul" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->judul->getPlaceHolder()) ?>" value="<?= $Page->judul->EditValue ?>"<?= $Page->judul->editAttributes() ?> aria-describedby="x_judul_help">
<?= $Page->judul->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->judul->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->kegiatan->Visible) { // kegiatan ?>
    <div id="r_kegiatan" class="form-group row">
        <label id="elh_rencana_pembelajaran_kegiatan" class="<?= $Page->LeftColumnClass ?>"><?= $Page->kegiatan->caption() ?><?= $Page->kegiatan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->kegiatan->cellAttributes() ?>>
<span id="el_rencana_pembelajaran_kegiatan">
<?php $Page->kegiatan->EditAttrs->appendClass("editor"); ?>
<textarea data-table="rencana_pembelajaran" data-field="x_kegiatan" name="x_kegiatan" id="x_kegiatan" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->kegiatan->getPlaceHolder()) ?>"<?= $Page->kegiatan->editAttributes() ?> aria-describedby="x_kegiatan_help"><?= $Page->kegiatan->EditValue ?></textarea>
<?= $Page->kegiatan->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->kegiatan->getErrorMessage() ?></div>
<script>
loadjs.ready(["frencana_pembelajaranadd", "editor"], function() {
	ew.createEditor("frencana_pembelajaranadd", "x_kegiatan", 35, 4, <?= $Page->kegiatan->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->waktu->Visible) { // waktu ?>
    <div id="r_waktu" class="form-group row">
        <label id="elh_rencana_pembelajaran_waktu" for="x_waktu" class="<?= $Page->LeftColumnClass ?>"><?= $Page->waktu->caption() ?><?= $Page->waktu->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->waktu->cellAttributes() ?>>
<span id="el_rencana_pembelajaran_waktu">
<input type="<?= $Page->waktu->getInputTextType() ?>" data-table="rencana_pembelajaran" data-field="x_waktu" name="x_waktu" id="x_waktu" size="30" placeholder="<?= HtmlEncode($Page->waktu->getPlaceHolder()) ?>" value="<?= $Page->waktu->EditValue ?>"<?= $Page->waktu->editAttributes() ?> aria-describedby="x_waktu_help">
<?= $Page->waktu->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->waktu->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->tampilkan->Visible) { // tampilkan ?>
    <div id="r_tampilkan" class="form-group row">
        <label id="elh_rencana_pembelajaran_tampilkan" for="x_tampilkan" class="<?= $Page->LeftColumnClass ?>"><?= $Page->tampilkan->caption() ?><?= $Page->tampilkan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->tampilkan->cellAttributes() ?>>
<span id="el_rencana_pembelajaran_tampilkan">
    <select
        id="x_tampilkan"
        name="x_tampilkan"
        class="form-control ew-select<?= $Page->tampilkan->isInvalidClass() ?>"
        data-select2-id="rencana_pembelajaran_x_tampilkan"
        data-table="rencana_pembelajaran"
        data-field="x_tampilkan"
        data-value-separator="<?= $Page->tampilkan->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->tampilkan->getPlaceHolder()) ?>"
        <?= $Page->tampilkan->editAttributes() ?>>
        <?= $Page->tampilkan->selectOptionListHtml("x_tampilkan") ?>
    </select>
    <?= $Page->tampilkan->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->tampilkan->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='rencana_pembelajaran_x_tampilkan']"),
        options = { name: "x_tampilkan", selectId: "rencana_pembelajaran_x_tampilkan", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.rencana_pembelajaran.fields.tampilkan.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.rencana_pembelajaran.fields.tampilkan.selectOptions);
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
    ew.addEventHandlers("rencana_pembelajaran");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
