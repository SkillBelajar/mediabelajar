<?php

namespace PHPMaker2021\project1;

// Page object
$LiveAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fliveadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fliveadd = currentForm = new ew.Form("fliveadd", "add");

    // Add fields
    var fields = ew.vars.tables.live.fields;
    fliveadd.addFields([
        ["aksi", [fields.aksi.required ? ew.Validators.required(fields.aksi.caption) : null], fields.aksi.isInvalid],
        ["id_materi", [fields.id_materi.required ? ew.Validators.required(fields.id_materi.caption) : null], fields.id_materi.isInvalid],
        ["live_catatan", [fields.live_catatan.required ? ew.Validators.required(fields.live_catatan.caption) : null], fields.live_catatan.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fliveadd,
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
    fliveadd.validate = function () {
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
    fliveadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fliveadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fliveadd.lists.id_materi = <?= $Page->id_materi->toClientList($Page) ?>;
    loadjs.done("fliveadd");
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
<form name="fliveadd" id="fliveadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="live">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->aksi->Visible) { // aksi ?>
    <div id="r_aksi" class="form-group row">
        <label id="elh_live_aksi" for="x_aksi" class="<?= $Page->LeftColumnClass ?>"><?= $Page->aksi->caption() ?><?= $Page->aksi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->aksi->cellAttributes() ?>>
<span id="el_live_aksi">
<input type="<?= $Page->aksi->getInputTextType() ?>" data-table="live" data-field="x_aksi" name="x_aksi" id="x_aksi" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->aksi->getPlaceHolder()) ?>" value="<?= $Page->aksi->EditValue ?>"<?= $Page->aksi->editAttributes() ?> aria-describedby="x_aksi_help">
<?= $Page->aksi->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->aksi->getErrorMessage() ?></div>
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
        <label id="elh_live_live_catatan" for="x_live_catatan" class="<?= $Page->LeftColumnClass ?>"><?= $Page->live_catatan->caption() ?><?= $Page->live_catatan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->live_catatan->cellAttributes() ?>>
<span id="el_live_live_catatan">
<textarea data-table="live" data-field="x_live_catatan" name="x_live_catatan" id="x_live_catatan" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->live_catatan->getPlaceHolder()) ?>"<?= $Page->live_catatan->editAttributes() ?> aria-describedby="x_live_catatan_help"><?= $Page->live_catatan->EditValue ?></textarea>
<?= $Page->live_catatan->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->live_catatan->getErrorMessage() ?></div>
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
    ew.addEventHandlers("live");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
