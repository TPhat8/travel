<?php 
    include("control/ctrl_frm.php");
    $ctrl = new ctrl_frm();
    $result = $ctrl->get_ChitietDatTour();
?>

<?php
    while ($row = $result->fetch_assoc()) {
?>

    <tr>
        <td><?php echo $row["MA_CHITIET_DATTOUR"] ?></td>
        <td><?php echo $row["MA_DATTOUR"] ?></td>
        <td><?php echo $row["HO_TEN"] ?></td>
        <td><?php echo $row["NGAY_SINH"] ?></td>
        <td><?php echo $row["CCCD"] ?></td>
        <td><?php echo $row["GHI_CHU"] ?></td>
        <td>
            <form class="add-form" action="admin.php?pid=16" method="post">
                <input type="hidden" name="mactdt" value="<?php echo $row["MA_CHITIET_DATTOUR"] ?>">
                <input type="hidden" name="madt" value="<?php echo $row["MA_DATTOUR"] ?>">
                <input type="hidden" name="hoten" value="<?php echo $row["HO_TEN"] ?>">
                <input type="hidden" name="ngaysinh" value="<?php echo $row["NGAY_SINH"] ?>">
                <input type="hidden" name="cccd" value="<?php echo $row["CCCD"] ?>">
                <input type="hidden" name="ghichu" value="<?php echo $row["GHI_CHU"] ?>">
                <input type="submit" value="Sửa" class="btn-update">
            </form>
        </td>
    </tr>

<?php
    }
?>