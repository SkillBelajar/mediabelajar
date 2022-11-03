<?php

namespace PHPMaker2021\project1;

// Page object
$ArtikelMateriView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fartikel_materiview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fartikel_materiview = currentForm = new ew.Form("fartikel_materiview", "view");
    loadjs.done("fartikel_materiview");
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
<form name="fartikel_materiview" id="fartikel_materiview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="artikel_materi">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id_artikel_materi->Visible) { // id_artikel_materi ?>
    <tr id="r_id_artikel_materi">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_artikel_materi_id_artikel_materi"><?= $Page->id_artikel_materi->caption() ?></span></td>
        <td data-name="id_artikel_materi" <?= $Page->id_artikel_materi->cellAttributes() ?>>
<span id="el_artikel_materi_id_artikel_materi">
<span<?= $Page->id_artikel_materi->viewAttributes() ?>>
<?= $Page->id_artikel_materi->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->id_materi->Visible) { // id_materi ?>
    <tr id="r_id_materi">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_artikel_materi_id_materi"><?= $Page->id_materi->caption() ?></span></td>
        <td data-name="id_materi" <?= $Page->id_materi->cellAttributes() ?>>
<span id="el_artikel_materi_id_materi">
<span<?= $Page->id_materi->viewAttributes() ?>>
<?= $Page->id_materi->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->judul->Visible) { // judul ?>
    <tr id="r_judul">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_artikel_materi_judul"><?= $Page->judul->caption() ?></span></td>
        <td data-name="judul" <?= $Page->judul->cellAttributes() ?>>
<span id="el_artikel_materi_judul">
<span<?= $Page->judul->viewAttributes() ?>>
<?= $Page->judul->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->isi->Visible) { // isi ?>
    <tr id="r_isi">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_artikel_materi_isi"><?= $Page->isi->caption() ?></span></td>
        <td data-name="isi" <?= $Page->isi->cellAttributes() ?>>
<span id="el_artikel_materi_isi">
<span<?= $Page->isi->viewAttributes() ?>>
<?= $Page->isi->getViewValue() ?></span>
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
