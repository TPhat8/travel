<?php 
    include("control/ctrl_frm.php");
    $ctrl = new ctrl_frm();
    $result = $ctrl->get_NhatkyDatTour();
?>

<?php
    while ($row = $result->fetch_assoc()) {
?>

    <tr>
        <td><?php echo $row["MA_NKDT"] ?></td>
        <td><?php echo $row["MA_DATTOUR"] ?></td>
        <td><?php echo $ctrl->get_Money($row["TIEN_COC"]) ?></td>
        <td><?php echo $row["HO_TEN_NV"] ?></td>
        <td>
            <form class="add-form" action="admin.php?pid=14" method="post">
                <input type="hidden" name="mankdt" value="<?php echo $row["MA_NKDT"] ?>">
                <input type="hidden" name="madattour" value="<?php echo $row["MA_DATTOUR"] ?>">
                <input type="hidden" name="tiencoc" value="<?php echo $row["TIEN_COC"] ?>">
                <input type="hidden" name="nhanvien" value="<?php echo $row["MA_NV"] ?>">
                <input type="submit" value="Sửa" class="btn-update">
            </form>
        </td>
    </tr>

<?php
    }
?>