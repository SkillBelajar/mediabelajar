<?php

namespace PHPMaker2021\project1;

// Page object
$FotoView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var ffotoview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    ffotoview = currentForm = new ew.Form("ffotoview", "view");
    loadjs.done("ffotoview");
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
<form name="ffotoview" id="ffotoview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="foto">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id_foto->Visible) { // id_foto ?>
    <tr id="r_id_foto">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_foto_id_foto"><?= $Page->id_foto->caption() ?></span></td>
        <td data-name="id_foto" <?= $Page->id_foto->cellAttributes() ?>>
<span id="el_foto_id_foto">
<span<?= $Page->id_foto->viewAttributes() ?>>
<?= $Page->id_foto->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->file_name->Visible) { // file_name ?>
    <tr id="r_file_name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_foto_file_name"><?= $Page->file_name->caption() ?></span></td>
        <td data-name="file_name" <?= $Page->file_name->cellAttributes() ?>>
<span id="el_foto_file_name">
<span<?= $Page->file_name->viewAttributes() ?>>
<?= $Page->file_name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->nama->Visible) { // nama ?>
    <tr id="r_nama">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_foto_nama"><?= $Page->nama->caption() ?></span></td>
        <td data-name="nama" <?= $Page->nama->cellAttributes() ?>>
<span id="el_foto_nama">
<span<?= $Page->nama->viewAttributes() ?>>
<?= $Page->nama->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->tgl_jam->Visible) { // tgl_jam ?>
    <tr id="r_tgl_jam">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_foto_tgl_jam"><?= $Page->tgl_jam->caption() ?></span></td>
        <td data-name="tgl_jam" <?= $Page->tgl_jam->cellAttributes() ?>>
<span id="el_foto_tgl_jam">
<span<?= $Page->tgl_jam->viewAttributes() ?>>
<?= $Page->tgl_jam->getViewValue() ?></span>
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
