<?php

namespace PHPMaker2021\project1;

// Page object
$GeneratorRencanaView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fgenerator_rencanaview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fgenerator_rencanaview = currentForm = new ew.Form("fgenerator_rencanaview", "view");
    loadjs.done("fgenerator_rencanaview");
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
<form name="fgenerator_rencanaview" id="fgenerator_rencanaview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="generator_rencana">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id_generator_rencana->Visible) { // id_generator_rencana ?>
    <tr id="r_id_generator_rencana">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_generator_rencana_id_generator_rencana"><?= $Page->id_generator_rencana->caption() ?></span></td>
        <td data-name="id_generator_rencana" <?= $Page->id_generator_rencana->cellAttributes() ?>>
<span id="el_generator_rencana_id_generator_rencana">
<span<?= $Page->id_generator_rencana->viewAttributes() ?>>
<?= $Page->id_generator_rencana->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->id_indikator_rencana->Visible) { // id_indikator_rencana ?>
    <tr id="r_id_indikator_rencana">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_generator_rencana_id_indikator_rencana"><?= $Page->id_indikator_rencana->caption() ?></span></td>
        <td data-name="id_indikator_rencana" <?= $Page->id_indikator_rencana->cellAttributes() ?>>
<span id="el_generator_rencana_id_indikator_rencana">
<span<?= $Page->id_indikator_rencana->viewAttributes() ?>>
<?= $Page->id_indikator_rencana->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->judul->Visible) { // judul ?>
    <tr id="r_judul">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_generator_rencana_judul"><?= $Page->judul->caption() ?></span></td>
        <td data-name="judul" <?= $Page->judul->cellAttributes() ?>>
<span id="el_generator_rencana_judul">
<span<?= $Page->judul->viewAttributes() ?>>
<?= $Page->judul->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->isi->Visible) { // isi ?>
    <tr id="r_isi">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_generator_rencana_isi"><?= $Page->isi->caption() ?></span></td>
        <td data-name="isi" <?= $Page->isi->cellAttributes() ?>>
<span id="el_generator_rencana_isi">
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
