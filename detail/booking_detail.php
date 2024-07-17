<?php 
    include_once("control/ctrl_frm.php");
    $ctrl_booking = new ctrl_frm();
    $kq = $ctrl_booking->get_my_Booking();

    $current_ma_dattour = null; // Biến lưu trạng thái MA_DATTOUR hiện tại

    while ($row = $kq->fetch_assoc()) {
        // Kiểm tra nếu MA_DATTOUR giống với MA_DATTOUR hiện tại thì bỏ qua dòng dữ liệu
        if ($row["MA_DATTOUR"] == $current_ma_dattour) {
            continue;
        }

        $current_ma_dattour = $row["MA_DATTOUR"]; // Cập nhật MA_DATTOUR hiện tại

        // Xuất dòng dữ liệu
        ?>
        <tr>
            <td><?php echo $row["TEN_TOUR"] ?></td>
            <td><?php echo $row["SO_CHO_CANDAT"] ?></td>
            <td><?php echo $ctrl_booking->get_Money($row["GIA_TIEN"] * $row["SO_CHO_CANDAT"]) ?></td>
            <td><?php echo $row["DONVI"] ?></td>
            <td><?php echo $row["NGAY_DAT"] ?></td>
            <td>
            <?php if ($row["TRANG_THAI"] == 0) { 
                echo '<span style="color: #e73827; font-weight: 600;">Chưa thanh toán</span>';
            } elseif ($row["TRANG_THAI"] == 1) {
                echo '<span style="color: #00b09b; font-weight: 600;">Đã thanh toán</span>';
            } ?>
        </td>
            <td>
                <form action="index.php?pid=9&myid=2" method="post">
                    <input type="hidden" name="matour" value="<?php echo $row["MA_TOUR"]; ?>">
                    <input type="hidden" name="madattour" value="<?php echo $row["MA_DATTOUR"]; ?>">
                    <input type="hidden" name="tentour" value="<?php echo $row["TEN_TOUR"]; ?>">
                    <input type="hidden" name="giatien" value="<?php echo $row["GIA_TIEN"]; ?>">
                    <input type="hidden" name="sochocandat" value="<?php echo $row["SO_CHO_CANDAT"]; ?>">
                    <input type="hidden" name="donvi" value="<?php echo $row["DONVI"]; ?>">
                    <input type="hidden" name="trangthai" value="<?php echo $row["TRANG_THAI"]; ?>">
                    <input type="hidden" name="ngaydi" value="<?php echo $row["NGAY_DI"]; ?>">
                    <input type="hidden" name="ngayve" value="<?php echo $row["NGAY_VE"]; ?>">
                    <input type="hidden" name="songay" value="<?php echo $row["SO_NGAY"]; ?>">
                    <input type="hidden" name="sodem" value="<?php echo $row["SO_DEM"]; ?>">
                    <input type="submit" name="seemybooking" class="btn-see" value="Xem">
                </form>
            </td>
        </tr>
        <?php
    }
?>