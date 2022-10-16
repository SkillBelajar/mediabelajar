<?php

namespace PHPMaker2021\project1;

// Page object
$VideoView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fvideoview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fvideoview = currentForm = new ew.Form("fvideoview", "view");
    loadjs.done("fvideoview");
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
<form name="fvideoview" id="fvideoview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="video">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id_video->Visible) { // id_video ?>
    <tr id="r_id_video">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_video_id_video"><?= $Page->id_video->caption() ?></span></td>
        <td data-name="id_video" <?= $Page->id_video->cellAttributes() ?>>
<span id="el_video_id_video">
<span<?= $Page->id_video->viewAttributes() ?>>
<?= $Page->id_video->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->file->Visible) { // file ?>
    <tr id="r_file">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_video_file"><?= $Page->file->caption() ?></span></td>
        <td data-name="file" <?= $Page->file->cellAttributes() ?>>
<span id="el_video_file">
<span<?= $Page->file->viewAttributes() ?>>
<?= GetFileViewTag($Page->file, $Page->file->getViewValue(), false) ?>
</span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->nama->Visible) { // nama ?>
    <tr id="r_nama">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_video_nama"><?= $Page->nama->caption() ?></span></td>
        <td data-name="nama" <?= $Page->nama->cellAttributes() ?>>
<span id="el_video_nama">
<span<?= $Page->nama->viewAttributes() ?>>
<?= $Page->nama->getViewValue() ?></span>
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
