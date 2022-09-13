<?php

namespace PHPMaker2021\project1;

// Table
$materi = Container("materi");
?>
<?php if ($materi->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_materimaster" class="table ew-view-table ew-master-table ew-vertical">
    <tbody>
<?php if ($materi->id_media->Visible) { // id_media ?>
        <tr id="r_id_media">
            <td class="<?= $materi->TableLeftColumnClass ?>"><?= $materi->id_media->caption() ?></td>
            <td <?= $materi->id_media->cellAttributes() ?>>
<span id="el_materi_id_media">
<span<?= $materi->id_media->viewAttributes() ?>>
<?= $materi->id_media->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($materi->judul->Visible) { // judul ?>
        <tr id="r_judul">
            <td class="<?= $materi->TableLeftColumnClass ?>"><?= $materi->judul->caption() ?></td>
            <td <?= $materi->judul->cellAttributes() ?>>
<span id="el_materi_judul">
<span<?= $materi->judul->viewAttributes() ?>>
<?= $materi->judul->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($materi->isi->Visible) { // isi ?>
        <tr id="r_isi">
            <td class="<?= $materi->TableLeftColumnClass ?>"><?= $materi->isi->caption() ?></td>
            <td <?= $materi->isi->cellAttributes() ?>>
<span id="el_materi_isi">
<span<?= $materi->isi->viewAttributes() ?>>
<?= $materi->isi->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<?php } ?>
