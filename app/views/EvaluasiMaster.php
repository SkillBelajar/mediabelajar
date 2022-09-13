<?php

namespace PHPMaker2021\project1;

// Table
$evaluasi = Container("evaluasi");
?>
<?php if ($evaluasi->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_evaluasimaster" class="table ew-view-table ew-master-table ew-vertical">
    <tbody>
<?php if ($evaluasi->id_materi->Visible) { // id_materi ?>
        <tr id="r_id_materi">
            <td class="<?= $evaluasi->TableLeftColumnClass ?>"><?= $evaluasi->id_materi->caption() ?></td>
            <td <?= $evaluasi->id_materi->cellAttributes() ?>>
<span id="el_evaluasi_id_materi">
<span<?= $evaluasi->id_materi->viewAttributes() ?>>
<?= $evaluasi->id_materi->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($evaluasi->soal->Visible) { // soal ?>
        <tr id="r_soal">
            <td class="<?= $evaluasi->TableLeftColumnClass ?>"><?= $evaluasi->soal->caption() ?></td>
            <td <?= $evaluasi->soal->cellAttributes() ?>>
<span id="el_evaluasi_soal">
<span<?= $evaluasi->soal->viewAttributes() ?>>
<?= $evaluasi->soal->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($evaluasi->jawaban->Visible) { // jawaban ?>
        <tr id="r_jawaban">
            <td class="<?= $evaluasi->TableLeftColumnClass ?>"><?= $evaluasi->jawaban->caption() ?></td>
            <td <?= $evaluasi->jawaban->cellAttributes() ?>>
<span id="el_evaluasi_jawaban">
<span<?= $evaluasi->jawaban->viewAttributes() ?>>
<?= $evaluasi->jawaban->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<?php } ?>
