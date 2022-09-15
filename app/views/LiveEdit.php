<?php

namespace PHPMaker2021\project1;

// Page object
$LiveEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fliveedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fliveedit = currentForm = new ew.Form("fliveedit", "edit");

    // Add fields
    var fields = ew.vars.tables.live.fields;
    fliveedit.addFields([
        ["id_live", [fields.id_live.required ? ew.Validators.required(fields.id_live.caption) : null], fields.id_live.isInvalid],
        ["aksi", [fields.aksi.required ? ew.Validators.required(fields.aksi.caption) : null], fields.aksi.isInvalid],
        ["nomor_soal", [fields.nomor_soal.required ? ew.Validators.required(fields.nomor_soal.caption) : null], fields.nomor_soal.isInvalid],
        ["waktu_soal", [fields.waktu_soal.required ? ew.Validators.required(fields.waktu_soal.caption) : null], fields.waktu_soal.isInvalid],
        ["id_materi", [fields.id_materi.required ? ew.Validators.required(fields.id_materi.caption) : null], fields.id_materi.isInvalid],
        ["live_catatan", [fields.live_catatan.required ? ew.Validators.required(fields.live_catatan.caption) : null], fields.live_catatan.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fliveedit,
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
    fliveedit.validate = function () {
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
    fliveedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fliveedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fliveedit.lists.aksi = <?= $Page->aksi->toClientList($Page) ?>;
    fliveedit.lists.nomor_soal = <?= $Page->nomor_soal->toClientList($Page) ?>;
    fliveedit.lists.waktu_soal = <?= $Page->waktu_soal->toClientList($Page) ?>;
    fliveedit.lists.id_materi = <?= $Page->id_materi->toClientList($Page) ?>;
    loadjs.done("fliveedit");
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
<form name="fliveedit" id="fliveedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="live">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id_live->Visible) { // id_live ?>
    <div id="r_id_live" class="form-group row">
        <label id="elh_live_id_live" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_live->caption() ?><?= $Page->id_live->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id_live->cellAttributes() ?>>
<span id="el_live_id_live">
<span<?= $Page->id_live->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id_live->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="live" data-field="x_id_live" name="x_id_live" id="x_id_live" value="<?= HtmlEncode($Page->id_live->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->aksi->Visible) { // aksi ?>
    <div id="r_aksi" class="form-group row">
        <label id="elh_live_aksi" for="x_aksi" class="<?= $Page->LeftColumnClass ?>"><?= $Page->aksi->caption() ?><?= $Page->aksi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->aksi->cellAttributes() ?>>
<span id="el_live_aksi">
    <select
        id="x_aksi"
        name="x_aksi"
        class="form-control ew-select<?= $Page->aksi->isInvalidClass() ?>"
        data-select2-id="live_x_aksi"
        data-table="live"
        data-field="x_aksi"
        data-value-separator="<?= $Page->aksi->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->aksi->getPlaceHolder()) ?>"
        <?= $Page->aksi->editAttributes() ?>>
        <?= $Page->aksi->selectOptionListHtml("x_aksi") ?>
    </select>
    <?= $Page->aksi->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->aksi->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='live_x_aksi']"),
        options = { name: "x_aksi", selectId: "live_x_aksi", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.live.fields.aksi.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.live.fields.aksi.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->nomor_soal->Visible) { // nomor_soal ?>
    <div id="r_nomor_soal" class="form-group row">
        <label id="elh_live_nomor_soal" for="x_nomor_soal" class="<?= $Page->LeftColumnClass ?>"><?= $Page->nomor_soal->caption() ?><?= $Page->nomor_soal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->nomor_soal->cellAttributes() ?>>
<span id="el_live_nomor_soal">
    <select
        id="x_nomor_soal"
        name="x_nomor_soal"
        class="form-control ew-select<?= $Page->nomor_soal->isInvalidClass() ?>"
        data-select2-id="live_x_nomor_soal"
        data-table="live"
        data-field="x_nomor_soal"
        data-value-separator="<?= $Page->nomor_soal->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->nomor_soal->getPlaceHolder()) ?>"
        <?= $Page->nomor_soal->editAttributes() ?>>
        <?= $Page->nomor_soal->selectOptionListHtml("x_nomor_soal") ?>
    </select>
    <?= $Page->nomor_soal->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->nomor_soal->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='live_x_nomor_soal']"),
        options = { name: "x_nomor_soal", selectId: "live_x_nomor_soal", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.live.fields.nomor_soal.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.live.fields.nomor_soal.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->waktu_soal->Visible) { // waktu_soal ?>
    <div id="r_waktu_soal" class="form-group row">
        <label id="elh_live_waktu_soal" for="x_waktu_soal" class="<?= $Page->LeftColumnClass ?>"><?= $Page->waktu_soal->caption() ?><?= $Page->waktu_soal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->waktu_soal->cellAttributes() ?>>
<span id="el_live_waktu_soal">
    <select
        id="x_waktu_soal"
        name="x_waktu_soal"
        class="form-control ew-select<?= $Page->waktu_soal->isInvalidClass() ?>"
        data-select2-id="live_x_waktu_soal"
        data-table="live"
        data-field="x_waktu_soal"
        data-value-separator="<?= $Page->waktu_soal->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->waktu_soal->getPlaceHolder()) ?>"
        <?= $Page->waktu_soal->editAttributes() ?>>
        <?= $Page->waktu_soal->selectOptionListHtml("x_waktu_soal") ?>
    </select>
    <?= $Page->waktu_soal->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->waktu_soal->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='live_x_waktu_soal']"),
        options = { name: "x_waktu_soal", selectId: "live_x_waktu_soal", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.live.fields.waktu_soal.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.live.fields.waktu_soal.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->id_materi->Visible) { // id_materi ?>
    <div id="r_id_materi" class="form-group row">
        <label id="elh_live_id_materi" for="x_id_materi" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_materi->caption() ?><?= $Page->id_materi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id_materi->cellAttributes() ?>>
<span id="el_live_id_materi">
    <select
        id="x_id_materi"
        name="x_id_materi"
        class="form-control ew-select<?= $Page->id_materi->isInvalidClass() ?>"
        data-select2-id="live_x_id_materi"
        data-table="live"
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
    var el = document.querySelector("select[data-select2-id='live_x_id_materi']"),
        options = { name: "x_id_materi", selectId: "live_x_id_materi", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.live.fields.id_materi.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->live_catatan->Visible) { // live_catatan ?>
    <div id="r_live_catatan" class="form-group row">
        <label id="elh_live_live_catatan" class="<?= $Page->LeftColumnClass ?>"><?= $Page->live_catatan->caption() ?><?= $Page->live_catatan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->live_catatan->cellAttributes() ?>>
<span id="el_live_live_catatan">
<?php $Page->live_catatan->EditAttrs->appendClass("editor"); ?>
<textarea data-table="live" data-field="x_live_catatan" name="x_live_catatan" id="x_live_catatan" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->live_catatan->getPlaceHolder()) ?>"<?= $Page->live_catatan->editAttributes() ?> aria-describedby="x_live_catatan_help"><?= $Page->live_catatan->EditValue ?></textarea>
<?= $Page->live_catatan->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->live_catatan->getErrorMessage() ?></div>
<script>
loadjs.ready(["fliveedit", "editor"], function() {
	ew.createEditor("fliveedit", "x_live_catatan", 35, 4, <?= $Page->live_catatan->ReadOnly || false ? "true" : "false" ?>);
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
    ew.addEventHandlers("live");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
