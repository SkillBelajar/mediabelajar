<?php

namespace PHPMaker2021\project1;

// Page object
$PdfMateriAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpdf_materiadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fpdf_materiadd = currentForm = new ew.Form("fpdf_materiadd", "add");

    // Add fields
    var fields = ew.vars.tables.pdf_materi.fields;
    fpdf_materiadd.addFields([
        ["id_materi", [fields.id_materi.required ? ew.Validators.required(fields.id_materi.caption) : null], fields.id_materi.isInvalid],
        ["judul", [fields.judul.required ? ew.Validators.required(fields.judul.caption) : null], fields.judul.isInvalid],
        ["file_pdf", [fields.file_pdf.required ? ew.Validators.fileRequired(fields.file_pdf.caption) : null], fields.file_pdf.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpdf_materiadd,
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
    fpdf_materiadd.validate = function () {
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
    fpdf_materiadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpdf_materiadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpdf_materiadd.lists.id_materi = <?= $Page->id_materi->toClientList($Page) ?>;
    loadjs.done("fpdf_materiadd");
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
<form name="fpdf_materiadd" id="fpdf_materiadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pdf_materi">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if ($Page->getCurrentMasterTable() == "materi") { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="materi">
<input type="hidden" name="fk_id_materi" value="<?= HtmlEncode($Page->id_materi->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->id_materi->Visible) { // id_materi ?>
    <div id="r_id_materi" class="form-group row">
        <label id="elh_pdf_materi_id_materi" for="x_id_materi" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_materi->caption() ?><?= $Page->id_materi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id_materi->cellAttributes() ?>>
<?php if ($Page->id_materi->getSessionValue() != "") { ?>
<span id="el_pdf_materi_id_materi">
<span<?= $Page->id_materi->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id_materi->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_id_materi" name="x_id_materi" value="<?= HtmlEncode($Page->id_materi->CurrentValue) ?>">
<?php } else { ?>
<span id="el_pdf_materi_id_materi">
    <select
        id="x_id_materi"
        name="x_id_materi"
        class="form-control ew-select<?= $Page->id_materi->isInvalidClass() ?>"
        data-select2-id="pdf_materi_x_id_materi"
        data-table="pdf_materi"
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
    var el = document.querySelector("select[data-select2-id='pdf_materi_x_id_materi']"),
        options = { name: "x_id_materi", selectId: "pdf_materi_x_id_materi", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pdf_materi.fields.id_materi.selectOptions);
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
        <label id="elh_pdf_materi_judul" for="x_judul" class="<?= $Page->LeftColumnClass ?>"><?= $Page->judul->caption() ?><?= $Page->judul->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->judul->cellAttributes() ?>>
<span id="el_pdf_materi_judul">
<input type="<?= $Page->judul->getInputTextType() ?>" data-table="pdf_materi" data-field="x_judul" name="x_judul" id="x_judul" placeholder="<?= HtmlEncode($Page->judul->getPlaceHolder()) ?>" value="<?= $Page->judul->EditValue ?>"<?= $Page->judul->editAttributes() ?> aria-describedby="x_judul_help">
<?= $Page->judul->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->judul->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->file_pdf->Visible) { // file_pdf ?>
    <div id="r_file_pdf" class="form-group row">
        <label id="elh_pdf_materi_file_pdf" class="<?= $Page->LeftColumnClass ?>"><?= $Page->file_pdf->caption() ?><?= $Page->file_pdf->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->file_pdf->cellAttributes() ?>>
<span id="el_pdf_materi_file_pdf">
<div id="fd_x_file_pdf">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Page->file_pdf->title() ?>" data-table="pdf_materi" data-field="x_file_pdf" name="x_file_pdf" id="x_file_pdf" lang="<?= CurrentLanguageID() ?>"<?= $Page->file_pdf->editAttributes() ?><?= ($Page->file_pdf->ReadOnly || $Page->file_pdf->Disabled) ? " disabled" : "" ?> aria-describedby="x_file_pdf_help">
        <label class="custom-file-label ew-file-label" for="x_file_pdf"><?= $Language->phrase("ChooseFile") ?></label>
    </div>
</div>
<?= $Page->file_pdf->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->file_pdf->getErrorMessage() ?></div>
<input type="hidden" name="fn_x_file_pdf" id= "fn_x_file_pdf" value="<?= $Page->file_pdf->Upload->FileName ?>">
<input type="hidden" name="fa_x_file_pdf" id= "fa_x_file_pdf" value="0">
<input type="hidden" name="fs_x_file_pdf" id= "fs_x_file_pdf" value="255">
<input type="hidden" name="fx_x_file_pdf" id= "fx_x_file_pdf" value="<?= $Page->file_pdf->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_file_pdf" id= "fm_x_file_pdf" value="<?= $Page->file_pdf->UploadMaxFileSize ?>">
</div>
<table id="ft_x_file_pdf" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
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
    ew.addEventHandlers("pdf_materi");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
