<?php 
    include("control/ctrl_frm.php");
    $ctrl = new ctrl_frm();
    $result = $ctrl->get_NhanVien();
?>

<?php
    while ($row = $result->fetch_assoc()) {
?>
    <tr>
        <td><?php echo $row["MA_NV"] ?></td>
        <td><?php echo $row["HO_TEN_NV"] ?></td>
        <td><?php echo $row["NGAY_SINH"] ?></td>
        <td><?php echo $row["GIOITINH"] ?></td>
        <td><?php echo $row["SDT"] ?></td>
        <td><?php echo $row["EMAIL"] ?></td>
        <td><?php echo $row["TEN_CHUCVU"] ?></td>
        <td><?php echo $row["DIACHI"] ?></td>
        <td>
            <form class="add-form" action="admin.php?pid=10" method="post">
                <input type="hidden" name="manv" value="<?php echo $row["MA_NV"] ?>">
                <input type="hidden" name="hotennv" value="<?php echo $row["HO_TEN_NV"] ?>">
                <input type="hidden" name="ngaysinh" value="<?php echo $row["NGAY_SINH"] ?>">
                <input type="hidden" name="gioitinh" value="<?php echo $row["GIOITINH"] ?>">
                <input type="hidden" name="sdt" value="<?php echo $row["SDT"] ?>">
                <input type="hidden" name="email" value="<?php echo $row["EMAIL"] ?>">
                <input type="hidden" name="chucvu" value="<?php echo $row["MA_CHUCVU"] ?>">
                <input type="hidden" name="diachi" value="<?php echo $row["DIACHI"] ?>">
                <input type="hidden" name="username" value="<?php echo $row["USERNAME"] ?>">
                <input type="hidden" name="password" value="<?php echo $row["PASSWORD"] ?>">
                <input type="hidden" name="anhprofile" value="<?php echo $row["ANH_PROFILE"] ?>">
                <input type="hidden" name="ghichu" value="<?php echo $row["GHI_CHU"] ?>">
                <input type="submit" value="Sửa" class="btn-update">
            </form>
        </td>
    </tr>

<?php
    }
?>