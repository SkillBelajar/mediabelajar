<?php

namespace PHPMaker2021\project1;

// Page object
$MateriAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fmateriadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fmateriadd = currentForm = new ew.Form("fmateriadd", "add");

    // Add fields
    var fields = ew.vars.tables.materi.fields;
    fmateriadd.addFields([
        ["id_media", [fields.id_media.required ? ew.Validators.required(fields.id_media.caption) : null], fields.id_media.isInvalid],
        ["judul", [fields.judul.required ? ew.Validators.required(fields.judul.caption) : null], fields.judul.isInvalid],
        ["isi", [fields.isi.required ? ew.Validators.required(fields.isi.caption) : null], fields.isi.isInvalid],
        ["pdf", [fields.pdf.required ? ew.Validators.fileRequired(fields.pdf.caption) : null], fields.pdf.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fmateriadd,
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
    fmateriadd.validate = function () {
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
    fmateriadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fmateriadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fmateriadd.lists.id_media = <?= $Page->id_media->toClientList($Page) ?>;
    loadjs.done("fmateriadd");
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
<form name="fmateriadd" id="fmateriadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="materi">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if ($Page->getCurrentMasterTable() == "media") { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="media">
<input type="hidden" name="fk_id_media" value="<?= HtmlEncode($Page->id_media->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->id_media->Visible) { // id_media ?>
    <div id="r_id_media" class="form-group row">
        <label id="elh_materi_id_media" for="x_id_media" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_media->caption() ?><?= $Page->id_media->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id_media->cellAttributes() ?>>
<?php if ($Page->id_media->getSessionValue() != "") { ?>
<span id="el_materi_id_media">
<span<?= $Page->id_media->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id_media->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_id_media" name="x_id_media" value="<?= HtmlEncode($Page->id_media->CurrentValue) ?>">
<?php } else { ?>
<span id="el_materi_id_media">
    <select
        id="x_id_media"
        name="x_id_media"
        class="form-control ew-select<?= $Page->id_media->isInvalidClass() ?>"
        data-select2-id="materi_x_id_media"
        data-table="materi"
        data-field="x_id_media"
        data-value-separator="<?= $Page->id_media->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->id_media->getPlaceHolder()) ?>"
        <?= $Page->id_media->editAttributes() ?>>
        <?= $Page->id_media->selectOptionListHtml("x_id_media") ?>
    </select>
    <?= $Page->id_media->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->id_media->getErrorMessage() ?></div>
<?= $Page->id_media->Lookup->getParamTag($Page, "p_x_id_media") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='materi_x_id_media']"),
        options = { name: "x_id_media", selectId: "materi_x_id_media", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.materi.fields.id_media.selectOptions);
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
        <label id="elh_materi_judul" for="x_judul" class="<?= $Page->LeftColumnClass ?>"><?= $Page->judul->caption() ?><?= $Page->judul->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->judul->cellAttributes() ?>>
<span id="el_materi_judul">
<input type="<?= $Page->judul->getInputTextType() ?>" data-table="materi" data-field="x_judul" name="x_judul" id="x_judul" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->judul->getPlaceHolder()) ?>" value="<?= $Page->judul->EditValue ?>"<?= $Page->judul->editAttributes() ?> aria-describedby="x_judul_help">
<?= $Page->judul->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->judul->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->isi->Visible) { // isi ?>
    <div id="r_isi" class="form-group row">
        <label id="elh_materi_isi" class="<?= $Page->LeftColumnClass ?>"><?= $Page->isi->caption() ?><?= $Page->isi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->isi->cellAttributes() ?>>
<span id="el_materi_isi">
<?php $Page->isi->EditAttrs->appendClass("editor"); ?>
<textarea data-table="materi" data-field="x_isi" name="x_isi" id="x_isi" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->isi->getPlaceHolder()) ?>"<?= $Page->isi->editAttributes() ?> aria-describedby="x_isi_help"><?= $Page->isi->EditValue ?></textarea>
<?= $Page->isi->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->isi->getErrorMessage() ?></div>
<script>
loadjs.ready(["fmateriadd", "editor"], function() {
	ew.createEditor("fmateriadd", "x_isi", 35, 4, <?= $Page->isi->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->pdf->Visible) { // pdf ?>
    <div id="r_pdf" class="form-group row">
        <label id="elh_materi_pdf" class="<?= $Page->LeftColumnClass ?>"><?= $Page->pdf->caption() ?><?= $Page->pdf->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->pdf->cellAttributes() ?>>
<span id="el_materi_pdf">
<div id="fd_x_pdf">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Page->pdf->title() ?>" data-table="materi" data-field="x_pdf" name="x_pdf" id="x_pdf" lang="<?= CurrentLanguageID() ?>"<?= $Page->pdf->editAttributes() ?><?= ($Page->pdf->ReadOnly || $Page->pdf->Disabled) ? " disabled" : "" ?> aria-describedby="x_pdf_help">
        <label class="custom-file-label ew-file-label" for="x_pdf"><?= $Language->phrase("ChooseFile") ?></label>
    </div>
</div>
<?= $Page->pdf->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->pdf->getErrorMessage() ?></div>
<input type="hidden" name="fn_x_pdf" id= "fn_x_pdf" value="<?= $Page->pdf->Upload->FileName ?>">
<input type="hidden" name="fa_x_pdf" id= "fa_x_pdf" value="0">
<input type="hidden" name="fs_x_pdf" id= "fs_x_pdf" value="255">
<input type="hidden" name="fx_x_pdf" id= "fx_x_pdf" value="<?= $Page->pdf->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_pdf" id= "fm_x_pdf" value="<?= $Page->pdf->UploadMaxFileSize ?>">
</div>
<table id="ft_x_pdf" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php
    if (in_array("evaluasi", explode(",", $Page->getCurrentDetailTable())) && $evaluasi->DetailAdd) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("evaluasi", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "EvaluasiGrid.php" ?>
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
    ew.addEventHandlers("materi");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
