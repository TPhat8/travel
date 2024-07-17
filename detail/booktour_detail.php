<?php 
    include("control/ctrl_frm.php");
    $ctrl = new ctrl_frm();
    $result = $ctrl->get_DatTour();
?>

<?php
    while ($row = $result->fetch_assoc()) {
?>
    <tr>
        <td><?php echo $row["MA_DATTOUR"] ?></td>
        <td><?php echo $row["MA_TOUR"] ?></td>
        <td><?php echo $row["SO_CHO_CANDAT"] ?></td>
        <td>
            <?php if ($row["TRANG_THAI"] == 0) { 
                echo '<span style="color: #e73827; font-weight: 600;">Chưa thanh toán</span>';
            } elseif ($row["TRANG_THAI"] == 1) {
                echo '<span style="color: #00b09b; font-weight: 600;">Đã thanh toán</span>';
            } ?>
        </td>
        <td><?php echo $row["NGAY_DAT"] ?></td>
        <td>
            <form class="add-form" action="admin.php?pid=13" method="post">
                <input type="hidden" name="madattour" value="<?php echo $row["MA_DATTOUR"] ?>">
                <input type="hidden" name="matour" value="<?php echo $row["MA_TOUR"] ?>">
                <input type="hidden" name="sokhach" value="<?php echo $row["SO_CHO_CANDAT"] ?>">
                <input type="hidden" name="trangthai" value="<?php echo $row["TRANG_THAI"] ?>">
                <input type="hidden" name="ngaydat" value="<?php echo $row["NGAY_DAT"] ?>">
                <input type="submit" value="Sửa" class="btn-update">
            </form>
        </td>
    </tr>

<?php
    }
?>