<?php

namespace PHPMaker2021\project1;

// Page object
$EvaluasiView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fevaluasiview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fevaluasiview = currentForm = new ew.Form("fevaluasiview", "view");
    loadjs.done("fevaluasiview");
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
<form name="fevaluasiview" id="fevaluasiview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="evaluasi">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id_evaluasi->Visible) { // id_evaluasi ?>
    <tr id="r_id_evaluasi">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_evaluasi_id_evaluasi"><?= $Page->id_evaluasi->caption() ?></span></td>
        <td data-name="id_evaluasi" <?= $Page->id_evaluasi->cellAttributes() ?>>
<span id="el_evaluasi_id_evaluasi">
<span<?= $Page->id_evaluasi->viewAttributes() ?>>
<?= $Page->id_evaluasi->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->id_materi->Visible) { // id_materi ?>
    <tr id="r_id_materi">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_evaluasi_id_materi"><?= $Page->id_materi->caption() ?></span></td>
        <td data-name="id_materi" <?= $Page->id_materi->cellAttributes() ?>>
<span id="el_evaluasi_id_materi">
<span<?= $Page->id_materi->viewAttributes() ?>>
<?= $Page->id_materi->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->soal->Visible) { // soal ?>
    <tr id="r_soal">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_evaluasi_soal"><?= $Page->soal->caption() ?></span></td>
        <td data-name="soal" <?= $Page->soal->cellAttributes() ?>>
<span id="el_evaluasi_soal">
<span<?= $Page->soal->viewAttributes() ?>>
<?= $Page->soal->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->jawaban->Visible) { // jawaban ?>
    <tr id="r_jawaban">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_evaluasi_jawaban"><?= $Page->jawaban->caption() ?></span></td>
        <td data-name="jawaban" <?= $Page->jawaban->cellAttributes() ?>>
<span id="el_evaluasi_jawaban">
<span<?= $Page->jawaban->viewAttributes() ?>>
<?= $Page->jawaban->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
<?php
    if (in_array("peserta", explode(",", $Page->getCurrentDetailTable())) && $peserta->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("peserta", "TblCaption") ?>&nbsp;<?= str_replace("%c", $Page->peserta_Count, $Language->phrase("DetailCount")) ?></h4>
<?php } ?>
<?php include_once "PesertaGrid.php" ?>
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
