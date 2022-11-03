<?php

namespace PHPMaker2021\project1;

// Page object
$HistoryUlanganView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fhistory_ulanganview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fhistory_ulanganview = currentForm = new ew.Form("fhistory_ulanganview", "view");
    loadjs.done("fhistory_ulanganview");
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
<form name="fhistory_ulanganview" id="fhistory_ulanganview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="history_ulangan">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id_history_ulangan->Visible) { // id_history_ulangan ?>
    <tr id="r_id_history_ulangan">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_history_ulangan_id_history_ulangan"><?= $Page->id_history_ulangan->caption() ?></span></td>
        <td data-name="id_history_ulangan" <?= $Page->id_history_ulangan->cellAttributes() ?>>
<span id="el_history_ulangan_id_history_ulangan">
<span<?= $Page->id_history_ulangan->viewAttributes() ?>>
<?= $Page->id_history_ulangan->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->media->Visible) { // media ?>
    <tr id="r_media">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_history_ulangan_media"><?= $Page->media->caption() ?></span></td>
        <td data-name="media" <?= $Page->media->cellAttributes() ?>>
<span id="el_history_ulangan_media">
<span<?= $Page->media->viewAttributes() ?>>
<?= $Page->media->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->nama->Visible) { // nama ?>
    <tr id="r_nama">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_history_ulangan_nama"><?= $Page->nama->caption() ?></span></td>
        <td data-name="nama" <?= $Page->nama->cellAttributes() ?>>
<span id="el_history_ulangan_nama">
<span<?= $Page->nama->viewAttributes() ?>>
<?= $Page->nama->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->nilai->Visible) { // nilai ?>
    <tr id="r_nilai">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_history_ulangan_nilai"><?= $Page->nilai->caption() ?></span></td>
        <td data-name="nilai" <?= $Page->nilai->cellAttributes() ?>>
<span id="el_history_ulangan_nilai">
<span<?= $Page->nilai->viewAttributes() ?>>
<?= $Page->nilai->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->tanggal->Visible) { // tanggal ?>
    <tr id="r_tanggal">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_history_ulangan_tanggal"><?= $Page->tanggal->caption() ?></span></td>
        <td data-name="tanggal" <?= $Page->tanggal->cellAttributes() ?>>
<span id="el_history_ulangan_tanggal">
<span<?= $Page->tanggal->viewAttributes() ?>>
<?= $Page->tanggal->getViewValue() ?></span>
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
