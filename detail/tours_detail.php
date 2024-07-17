<?php 
    include("control/ctrl_frm.php");
    $ctrl = new ctrl_frm();
    $result = $ctrl->get_Tour();
?>

<?php
    while ($row = $result->fetch_assoc()) {
?>
    <tr>
        <td><?php echo $row["MA_TOUR"] ?></td>
        <td><?php echo $row["TEN_TOUR"] ?></td>
        <td><?php echo $row["TEN_TINH_DEN"] ?></td>
        <td><?php echo $row["TEN_QUOCGIA_DEN"] ?></td>
        <td><?php echo $row["SO_NGAY"] ?></td>
        <td><?php echo $row["SO_DEM"] ?></td>
        <td><?php echo $row["SO_CHO"] ?></td>
        <td><?php echo $ctrl->get_Money($row["GIA_TIEN"]) ?></td>
        <td><?php echo $row["DONVI"] ?></td>
        <td>
            <form action="admin.php?pid=8" method="POST">
                <input type="hidden" name="matour" value="<?php echo $row["MA_TOUR"] ?>">
                <input type="hidden" name="tentour" value="<?php echo $row["TEN_TOUR"] ?>">
                <input type="hidden" name="maloaitour" value="<?php echo $row["MA_LOAITOUR"] ?>">
                <input type="hidden" name="khuvuc" value="<?php echo $row["LOAI_IN_OUT"] ?>">
                <input type="hidden" name="tinhdi" value="<?php echo $row["MA_TINH_DI"] ?>">
                <input type="hidden" name="tinhden" value="<?php echo $row["MA_TINH_DEN"] ?>">
                <input type="hidden" name="quocgiadi" value="<?php echo $row["MA_QUOCGIA_DI"] ?>">
                <input type="hidden" name="quocgiaden" value="<?php echo $row["MA_QUOCGIA_DEN"] ?>">
                <input type="hidden" name="giatien" value="<?php echo $row["GIA_TIEN"] ?>">
                <input type="hidden" name="donvi" value="<?php echo $row["DONVI"] ?>">
                <input type="hidden" name="songay" value="<?php echo $row["SO_NGAY"] ?>">
                <input type="hidden" name="sodem" value="<?php echo $row["SO_DEM"] ?>">
                <input type="hidden" name="socho" value="<?php echo $row["SO_CHO"] ?>">
                <input type="hidden" name="noidung" value="<?php echo $row["NOI_DUNG"] ?>">
                <input type="hidden" name="hinhanh" value="<?php echo $row["HINH_ANH"] ?>">
                <input type="hidden" name="malttour" value="<?php echo $row["MA_LICHTRINH"] ?>">
                <input type="hidden" name="ngaydi" value="<?php echo $row["NGAY_DI"] ?>">
                <input type="hidden" name="ngayve" value="<?php echo $row["NGAY_VE"] ?>">
                <input type="hidden" name="sochodadat" value="<?php echo $row["SO_CHO_DADAT"] ?>">
                <input type="hidden" name="trongoi" value="<?php echo $row["TRON_GOI"] ?>">
                <input type="submit" value="Sửa" class="btn-update">
            </form>
        </td>
        <td style="text-align: center">
            <form action="admin.php?pid=17" method="post">
                <input type="hidden" name="matour" value="<?php echo $row["MA_TOUR"] ?>">
                <input type="hidden" name="tentour" value="<?php echo $row["TEN_TOUR"] ?>">
                <input type="hidden" name="madattour" value="<?php echo $row["MA_DATTOUR"] ?>">
                <input type="hidden" name="ngaydi" value="<?php echo $row["NGAY_DI"] ?>">
                <input type="hidden" name="ngayve" value="<?php echo $row["NGAY_VE"] ?>">
                <input type="submit" value="Xem" class="btn-see">   
            </form>
        </td>
    </tr>
<?php
    }
?>