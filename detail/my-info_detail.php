<?php 
    include_once("control/ctrl_frm.php");
    $ctrl_customer_info = new ctrl_frm();
    $username = $_SESSION['username'];
    $diemtl = $_SESSION['diemtl'];
    $result = $ctrl_customer_info->get_ThongTin_KhachHang($username);

?>

<?php
    while ($row = $result->fetch_assoc()) {
?>

    <tbody> 
        <tr>
            <td><strong>họ tên:</strong> <?php echo $row["HO_TEN"]; ?></td>
        </tr>
        <tr>
            <td><strong>ngày sinh:</strong> <?php echo $row["NGAY_SINH"]; ?></td>
        </tr>
        <tr>
            <td><strong>giới tính:</strong> <?php echo $row["GIOI_TINH"]; ?></td>
        </tr>
        <tr>
            <td><strong>SDT:</strong> <?php echo $row["SDT"]; ?></td>
        </tr>
        <tr>
            <td><strong>CCCD:</strong> <?php echo $row["CCCD"]; ?></td>
        </tr>
        <tr>
            <td style="text-transform: none;"><strong>email:</strong> <?php echo $row["EMAIL"]; ?></td>
        </tr>
        <tr>
            <td><strong>Loại hội viên:</strong><?php echo $row["LOAI_HOI_VIEN"]; ?></td>
        </tr>
        <tr>
            <td colspan="2">
                <form class="add-form" action="index.php?pid=9&myid=3" method="post">
                    <input type="hidden" name="makh" value="<?php echo $row["MA_KH"] ?>">
                    <input type="hidden" name="hoten" value="<?php echo $row["HO_TEN"] ?>">
                    <input type="hidden" name="ngaysinh" value="<?php echo $row["NGAY_SINH"] ?>">
                    <input type="hidden" name="gioitinh" value="<?php echo $row["GIOI_TINH"] ?>">
                    <input type="hidden" name="sdt" value="<?php echo $row["SDT"] ?>">
                    <input type="hidden" name="cccd" value="<?php echo $row["CCCD"] ?>">
                    <input type="hidden" name="email" value="<?php echo $row["EMAIL"] ?>">
                    <input type="hidden" name="diachi" value="<?php echo $row["DIA_CHI"] ?>">
                    <input type="hidden" name="username" value="<?php echo $row["USERNAME"] ?>">
                    <input type="hidden" name="password" value="<?php echo $row["PASSWORD"] ?>">
                    <input type="hidden" name="quocgia" value="<?php echo $row["MA_QUOCGIA"] ?>">
                    <input type="hidden" name="loaihv" value="<?php echo $row["MA_LOAI_HV"] ?>">
                    <input type="hidden" name="tenloaihv" value="<?php echo $row["LOAI_HOI_VIEN"] ?>">
                    <input type="hidden" name="anhprofile" value="<?php echo $row["ANH_PROFILE"] ?>">
                    <input type="hidden" name="ghichu" value="<?php echo $row["GHI_CHU"] ?>">
                    <input type="submit" name="updatemyinfo" value="Sửa" class="btn-update">
                </form>
            </td>
        </tr>
    </tbody>

<?php
    }
?>