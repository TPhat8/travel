<?php 
    include_once("control/ctrl_frm.php");
    $ctrl_customer = new ctrl_frm();
    $result = $ctrl_customer->get_KhachHang();
?>

<?php
    while ($row = $result->fetch_assoc()) {
?>

    <tr>
        <td><?php echo $row["MA_KH"] ?></td>
        <td><?php echo $row["HO_TEN"] ?></td>
        <td><?php echo $row["NGAY_SINH"] ?></td>
        <td><?php echo $row["GIOI_TINH"] ?></td>
        <td><?php echo $row["SDT"] ?></td>
        <td><?php echo $row["EMAIL"] ?></td>
        <td><?php echo $row["TEN_QUOCGIA"] ?></td>
        <!-- <td><?php echo empty($row["DIA_CHI"]) ? "" : $row["DIA_CHI"]; ?></td>
        <td><?php echo empty($row["USERNAME"]) ? "" : $row["USERNAME"]; ?></td>
        <td><?php echo empty($row["PASSWORD"]) ? "" : $row["PASSWORD"]; ?></td>
        <td><?php echo empty($row["MA_LOAI_HV"]) ? "" : $row["MA_LOAI_HV"]; ?></td>
        <td><?php echo empty($row["ANH_PROFILE"]) ? "" : $row["ANH_PROFILE"]; ?></td>
        <td><?php echo empty($row["GHI_CHU"]) ? "null" : $row["GHI_CHU"]; ?></td> -->
        <td>
            <form class="add-form" action="admin.php?pid=12" method="post">
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
                <input type="hidden" name="anhprofile" value="<?php echo $row["ANH_PROFILE"] ?>">
                <input type="hidden" name="ghichu" value="<?php echo $row["GHI_CHU"] ?>">
                <input type="submit" value="Sửa" class="btn-update">
            </form>
        </td>
    </tr>

<?php
    }
?>