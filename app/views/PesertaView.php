<?php

namespace PHPMaker2021\project1;

// Page object
$PesertaView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpesertaview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpesertaview = currentForm = new ew.Form("fpesertaview", "view");
    loadjs.done("fpesertaview");
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
<form name="fpesertaview" id="fpesertaview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="peserta">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id_peserta->Visible) { // id_peserta ?>
    <tr id="r_id_peserta">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_peserta_id_peserta"><?= $Page->id_peserta->caption() ?></span></td>
        <td data-name="id_peserta" <?= $Page->id_peserta->cellAttributes() ?>>
<span id="el_peserta_id_peserta">
<span<?= $Page->id_peserta->viewAttributes() ?>>
<?= $Page->id_peserta->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->tanggal_jam->Visible) { // tanggal_jam ?>
    <tr id="r_tanggal_jam">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_peserta_tanggal_jam"><?= $Page->tanggal_jam->caption() ?></span></td>
        <td data-name="tanggal_jam" <?= $Page->tanggal_jam->cellAttributes() ?>>
<span id="el_peserta_tanggal_jam">
<span<?= $Page->tanggal_jam->viewAttributes() ?>>
<?= $Page->tanggal_jam->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->nama_peserta->Visible) { // nama_peserta ?>
    <tr id="r_nama_peserta">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_peserta_nama_peserta"><?= $Page->nama_peserta->caption() ?></span></td>
        <td data-name="nama_peserta" <?= $Page->nama_peserta->cellAttributes() ?>>
<span id="el_peserta_nama_peserta">
<span<?= $Page->nama_peserta->viewAttributes() ?>>
<?= $Page->nama_peserta->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->id_evaluasi->Visible) { // id_evaluasi ?>
    <tr id="r_id_evaluasi">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_peserta_id_evaluasi"><?= $Page->id_evaluasi->caption() ?></span></td>
        <td data-name="id_evaluasi" <?= $Page->id_evaluasi->cellAttributes() ?>>
<span id="el_peserta_id_evaluasi">
<span<?= $Page->id_evaluasi->viewAttributes() ?>>
<?= $Page->id_evaluasi->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->benar->Visible) { // benar ?>
    <tr id="r_benar">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_peserta_benar"><?= $Page->benar->caption() ?></span></td>
        <td data-name="benar" <?= $Page->benar->cellAttributes() ?>>
<span id="el_peserta_benar">
<span<?= $Page->benar->viewAttributes() ?>>
<?= $Page->benar->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->jawaban_essai->Visible) { // jawaban_essai ?>
    <tr id="r_jawaban_essai">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_peserta_jawaban_essai"><?= $Page->jawaban_essai->caption() ?></span></td>
        <td data-name="jawaban_essai" <?= $Page->jawaban_essai->cellAttributes() ?>>
<span id="el_peserta_jawaban_essai">
<span<?= $Page->jawaban_essai->viewAttributes() ?>>
<?= $Page->jawaban_essai->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ip->Visible) { // ip ?>
    <tr id="r_ip">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_peserta_ip"><?= $Page->ip->caption() ?></span></td>
        <td data-name="ip" <?= $Page->ip->cellAttributes() ?>>
<span id="el_peserta_ip">
<span<?= $Page->ip->viewAttributes() ?>>
<?= $Page->ip->getViewValue() ?></span>
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
