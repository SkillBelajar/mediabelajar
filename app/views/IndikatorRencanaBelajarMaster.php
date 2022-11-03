<?php

namespace PHPMaker2021\project1;

// Table
$indikator_rencana_belajar = Container("indikator_rencana_belajar");
?>
<?php if ($indikator_rencana_belajar->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_indikator_rencana_belajarmaster" class="table ew-view-table ew-master-table ew-vertical">
    <tbody>
<?php if ($indikator_rencana_belajar->id_indikator->Visible) { // id_indikator ?>
        <tr id="r_id_indikator">
            <td class="<?= $indikator_rencana_belajar->TableLeftColumnClass ?>"><?= $indikator_rencana_belajar->id_indikator->caption() ?></td>
            <td <?= $indikator_rencana_belajar->id_indikator->cellAttributes() ?>>
<span id="el_indikator_rencana_belajar_id_indikator">
<span<?= $indikator_rencana_belajar->id_indikator->viewAttributes() ?>>
<?= $indikator_rencana_belajar->id_indikator->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($indikator_rencana_belajar->kategori->Visible) { // kategori ?>
        <tr id="r_kategori">
            <td class="<?= $indikator_rencana_belajar->TableLeftColumnClass ?>"><?= $indikator_rencana_belajar->kategori->caption() ?></td>
            <td <?= $indikator_rencana_belajar->kategori->cellAttributes() ?>>
<span id="el_indikator_rencana_belajar_kategori">
<span<?= $indikator_rencana_belajar->kategori->viewAttributes() ?>>
<?= $indikator_rencana_belajar->kategori->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($indikator_rencana_belajar->indikator->Visible) { // indikator ?>
        <tr id="r_indikator">
            <td class="<?= $indikator_rencana_belajar->TableLeftColumnClass ?>"><?= $indikator_rencana_belajar->indikator->caption() ?></td>
            <td <?= $indikator_rencana_belajar->indikator->cellAttributes() ?>>
<span id="el_indikator_rencana_belajar_indikator">
<span<?= $indikator_rencana_belajar->indikator->viewAttributes() ?>>
<?= $indikator_rencana_belajar->indikator->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<?php } ?>
