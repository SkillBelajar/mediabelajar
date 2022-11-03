<?php

namespace PHPMaker2021\project1;

// Page object
$PdfMateriView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpdf_materiview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpdf_materiview = currentForm = new ew.Form("fpdf_materiview", "view");
    loadjs.done("fpdf_materiview");
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
<form name="fpdf_materiview" id="fpdf_materiview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pdf_materi">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id_pdf_materi->Visible) { // id_pdf_materi ?>
    <tr id="r_id_pdf_materi">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pdf_materi_id_pdf_materi"><?= $Page->id_pdf_materi->caption() ?></span></td>
        <td data-name="id_pdf_materi" <?= $Page->id_pdf_materi->cellAttributes() ?>>
<span id="el_pdf_materi_id_pdf_materi">
<span<?= $Page->id_pdf_materi->viewAttributes() ?>>
<?= $Page->id_pdf_materi->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->id_materi->Visible) { // id_materi ?>
    <tr id="r_id_materi">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pdf_materi_id_materi"><?= $Page->id_materi->caption() ?></span></td>
        <td data-name="id_materi" <?= $Page->id_materi->cellAttributes() ?>>
<span id="el_pdf_materi_id_materi">
<span<?= $Page->id_materi->viewAttributes() ?>>
<?= $Page->id_materi->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->judul->Visible) { // judul ?>
    <tr id="r_judul">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pdf_materi_judul"><?= $Page->judul->caption() ?></span></td>
        <td data-name="judul" <?= $Page->judul->cellAttributes() ?>>
<span id="el_pdf_materi_judul">
<span<?= $Page->judul->viewAttributes() ?>>
<?= $Page->judul->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->file_pdf->Visible) { // file_pdf ?>
    <tr id="r_file_pdf">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pdf_materi_file_pdf"><?= $Page->file_pdf->caption() ?></span></td>
        <td data-name="file_pdf" <?= $Page->file_pdf->cellAttributes() ?>>
<span id="el_pdf_materi_file_pdf">
<span<?= $Page->file_pdf->viewAttributes() ?>>
<?= GetFileViewTag($Page->file_pdf, $Page->file_pdf->getViewValue(), false) ?>
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
