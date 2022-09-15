<?php

namespace PHPMaker2021\project1;

// Page object
$SlideView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fslideview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fslideview = currentForm = new ew.Form("fslideview", "view");
    loadjs.done("fslideview");
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
<form name="fslideview" id="fslideview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="slide">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id_slide->Visible) { // id_slide ?>
    <tr id="r_id_slide">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_slide_id_slide"><?= $Page->id_slide->caption() ?></span></td>
        <td data-name="id_slide" <?= $Page->id_slide->cellAttributes() ?>>
<span id="el_slide_id_slide">
<span<?= $Page->id_slide->viewAttributes() ?>>
<?= $Page->id_slide->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->slide->Visible) { // slide ?>
    <tr id="r_slide">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_slide_slide"><?= $Page->slide->caption() ?></span></td>
        <td data-name="slide" <?= $Page->slide->cellAttributes() ?>>
<span id="el_slide_slide">
<span<?= $Page->slide->viewAttributes() ?>>
<?= $Page->slide->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->refresh->Visible) { // refresh ?>
    <tr id="r_refresh">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_slide_refresh"><?= $Page->refresh->caption() ?></span></td>
        <td data-name="refresh" <?= $Page->refresh->cellAttributes() ?>>
<span id="el_slide_refresh">
<span<?= $Page->refresh->viewAttributes() ?>>
<?= $Page->refresh->getViewValue() ?></span>
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
