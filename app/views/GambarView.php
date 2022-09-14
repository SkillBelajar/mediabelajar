<?php

namespace PHPMaker2021\project1;

// Page object
$GambarView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fgambarview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fgambarview = currentForm = new ew.Form("fgambarview", "view");
    loadjs.done("fgambarview");
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
<form name="fgambarview" id="fgambarview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="gambar">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id_gambar->Visible) { // id_gambar ?>
    <tr id="r_id_gambar">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_gambar_id_gambar"><?= $Page->id_gambar->caption() ?></span></td>
        <td data-name="id_gambar" <?= $Page->id_gambar->cellAttributes() ?>>
<span id="el_gambar_id_gambar">
<span>
<?= GetImageViewTag($Page->id_gambar, $Page->id_gambar->getViewValue()) ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->nama_gambar->Visible) { // nama_gambar ?>
    <tr id="r_nama_gambar">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_gambar_nama_gambar"><?= $Page->nama_gambar->caption() ?></span></td>
        <td data-name="nama_gambar" <?= $Page->nama_gambar->cellAttributes() ?>>
<span id="el_gambar_nama_gambar">
<span<?= $Page->nama_gambar->viewAttributes() ?>>
<?= GetFileViewTag($Page->nama_gambar, $Page->nama_gambar->getViewValue(), false) ?>
</span>
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
