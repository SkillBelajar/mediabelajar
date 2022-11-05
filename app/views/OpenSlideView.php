<?php

namespace PHPMaker2021\project1;

// Page object
$OpenSlideView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fopen_slideview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fopen_slideview = currentForm = new ew.Form("fopen_slideview", "view");
    loadjs.done("fopen_slideview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $Page->ExportOptions->render("body") ?>
<?php $Page->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fopen_slideview" id="fopen_slideview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="open_slide">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id_open_slide->Visible) { // id_open_slide ?>
    <tr id="r_id_open_slide">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_open_slide_id_open_slide"><?= $Page->id_open_slide->caption() ?></span></td>
        <td data-name="id_open_slide" <?= $Page->id_open_slide->cellAttributes() ?>>
<span id="el_open_slide_id_open_slide">
<span<?= $Page->id_open_slide->viewAttributes() ?>>
<?= $Page->id_open_slide->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->nama->Visible) { // nama ?>
    <tr id="r_nama">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_open_slide_nama"><?= $Page->nama->caption() ?></span></td>
        <td data-name="nama" <?= $Page->nama->cellAttributes() ?>>
<span id="el_open_slide_nama">
<span<?= $Page->nama->viewAttributes() ?>>
<?= $Page->nama->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->slide->Visible) { // slide ?>
    <tr id="r_slide">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_open_slide_slide"><?= $Page->slide->caption() ?></span></td>
        <td data-name="slide" <?= $Page->slide->cellAttributes() ?>>
<span id="el_open_slide_slide">
<span<?= $Page->slide->viewAttributes() ?>>
<?= $Page->slide->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
