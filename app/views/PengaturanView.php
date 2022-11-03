<?php

namespace PHPMaker2021\project1;

// Page object
$PengaturanView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpengaturanview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpengaturanview = currentForm = new ew.Form("fpengaturanview", "view");
    loadjs.done("fpengaturanview");
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
<form name="fpengaturanview" id="fpengaturanview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pengaturan">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id_pengaturan->Visible) { // id_pengaturan ?>
    <tr id="r_id_pengaturan">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pengaturan_id_pengaturan"><?= $Page->id_pengaturan->caption() ?></span></td>
        <td data-name="id_pengaturan" <?= $Page->id_pengaturan->cellAttributes() ?>>
<span id="el_pengaturan_id_pengaturan">
<span<?= $Page->id_pengaturan->viewAttributes() ?>>
<?= $Page->id_pengaturan->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->nama_guru->Visible) { // nama_guru ?>
    <tr id="r_nama_guru">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pengaturan_nama_guru"><?= $Page->nama_guru->caption() ?></span></td>
        <td data-name="nama_guru" <?= $Page->nama_guru->cellAttributes() ?>>
<span id="el_pengaturan_nama_guru">
<span<?= $Page->nama_guru->viewAttributes() ?>>
<?= $Page->nama_guru->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->tempat_kerja->Visible) { // tempat_kerja ?>
    <tr id="r_tempat_kerja">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pengaturan_tempat_kerja"><?= $Page->tempat_kerja->caption() ?></span></td>
        <td data-name="tempat_kerja" <?= $Page->tempat_kerja->cellAttributes() ?>>
<span id="el_pengaturan_tempat_kerja">
<span<?= $Page->tempat_kerja->viewAttributes() ?>>
<?= $Page->tempat_kerja->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->logo->Visible) { // logo ?>
    <tr id="r_logo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pengaturan_logo"><?= $Page->logo->caption() ?></span></td>
        <td data-name="logo" <?= $Page->logo->cellAttributes() ?>>
<span id="el_pengaturan_logo">
<span>
<?= GetFileViewTag($Page->logo, $Page->logo->getViewValue(), false) ?>
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
