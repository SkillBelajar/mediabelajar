<?php

namespace PHPMaker2021\project1;

// Page object
$LiveView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fliveview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fliveview = currentForm = new ew.Form("fliveview", "view");
    loadjs.done("fliveview");
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
<form name="fliveview" id="fliveview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="live">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id_live->Visible) { // id_live ?>
    <tr id="r_id_live">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_live_id_live"><?= $Page->id_live->caption() ?></span></td>
        <td data-name="id_live" <?= $Page->id_live->cellAttributes() ?>>
<span id="el_live_id_live">
<span<?= $Page->id_live->viewAttributes() ?>>
<?= $Page->id_live->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->aksi->Visible) { // aksi ?>
    <tr id="r_aksi">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_live_aksi"><?= $Page->aksi->caption() ?></span></td>
        <td data-name="aksi" <?= $Page->aksi->cellAttributes() ?>>
<span id="el_live_aksi">
<span<?= $Page->aksi->viewAttributes() ?>>
<?= $Page->aksi->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->nomor_soal->Visible) { // nomor_soal ?>
    <tr id="r_nomor_soal">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_live_nomor_soal"><?= $Page->nomor_soal->caption() ?></span></td>
        <td data-name="nomor_soal" <?= $Page->nomor_soal->cellAttributes() ?>>
<span id="el_live_nomor_soal">
<span<?= $Page->nomor_soal->viewAttributes() ?>>
<?= $Page->nomor_soal->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->id_materi->Visible) { // id_materi ?>
    <tr id="r_id_materi">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_live_id_materi"><?= $Page->id_materi->caption() ?></span></td>
        <td data-name="id_materi" <?= $Page->id_materi->cellAttributes() ?>>
<span id="el_live_id_materi">
<span<?= $Page->id_materi->viewAttributes() ?>>
<?= $Page->id_materi->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->live_catatan->Visible) { // live_catatan ?>
    <tr id="r_live_catatan">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_live_live_catatan"><?= $Page->live_catatan->caption() ?></span></td>
        <td data-name="live_catatan" <?= $Page->live_catatan->cellAttributes() ?>>
<span id="el_live_live_catatan">
<span<?= $Page->live_catatan->viewAttributes() ?>>
<?= $Page->live_catatan->getViewValue() ?></span>
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
