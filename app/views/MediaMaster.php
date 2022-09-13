<?php

namespace PHPMaker2021\project1;

// Table
$media = Container("media");
?>
<?php if ($media->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_mediamaster" class="table ew-view-table ew-master-table ew-vertical">
    <tbody>
<?php if ($media->nama_media->Visible) { // nama_media ?>
        <tr id="r_nama_media">
            <td class="<?= $media->TableLeftColumnClass ?>"><?= $media->nama_media->caption() ?></td>
            <td <?= $media->nama_media->cellAttributes() ?>>
<span id="el_media_nama_media">
<span<?= $media->nama_media->viewAttributes() ?>>
<?= $media->nama_media->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($media->aktif->Visible) { // aktif ?>
        <tr id="r_aktif">
            <td class="<?= $media->TableLeftColumnClass ?>"><?= $media->aktif->caption() ?></td>
            <td <?= $media->aktif->cellAttributes() ?>>
<span id="el_media_aktif">
<span<?= $media->aktif->viewAttributes() ?>>
<?= $media->aktif->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<?php } ?>
