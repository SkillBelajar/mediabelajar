<?php

namespace PHPMaker2021\project1;

// Page object
$MediaView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fmediaview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fmediaview = currentForm = new ew.Form("fmediaview", "view");
    loadjs.done("fmediaview");
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
<form name="fmediaview" id="fmediaview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="media">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id_media->Visible) { // id_media ?>
    <tr id="r_id_media">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_media_id_media"><?= $Page->id_media->caption() ?></span></td>
        <td data-name="id_media" <?= $Page->id_media->cellAttributes() ?>>
<span id="el_media_id_media">
<span<?= $Page->id_media->viewAttributes() ?>>
<?= $Page->id_media->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->nama_media->Visible) { // nama_media ?>
    <tr id="r_nama_media">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_media_nama_media"><?= $Page->nama_media->caption() ?></span></td>
        <td data-name="nama_media" <?= $Page->nama_media->cellAttributes() ?>>
<span id="el_media_nama_media">
<span<?= $Page->nama_media->viewAttributes() ?>>
<?= $Page->nama_media->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->aktif->Visible) { // aktif ?>
    <tr id="r_aktif">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_media_aktif"><?= $Page->aktif->caption() ?></span></td>
        <td data-name="aktif" <?= $Page->aktif->cellAttributes() ?>>
<span id="el_media_aktif">
<span<?= $Page->aktif->viewAttributes() ?>>
<?= $Page->aktif->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
<?php
    if (in_array("materi", explode(",", $Page->getCurrentDetailTable())) && $materi->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("materi", "TblCaption") ?>&nbsp;<?= str_replace("%c", $Page->materi_Count, $Language->phrase("DetailCount")) ?></h4>
<?php } ?>
<?php include_once "MateriGrid.php" ?>
<?php } ?>
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
