<div class="add-container">
    <div class="container-title">
        <h1>Chỉnh sửa thông tin nhật ký đặt Tour</h1>
    </div>

    <?php 
        $mactdt = $_POST['mactdt']; // Mã chi tiết đặt Tour
        $madt = $_POST['madt']; // Mã đặt Tour
        $hoten = $_POST['hoten'];
        $ngaysinh = $_POST['ngaysinh'];
        $cccd = $_POST['cccd'];
        $ghichu = $_POST['ghichu'];
    ?>

    <form class="add-form" action="form/update_booktour_dt_frm.php" method="POST">
        <table>
            <tr>
                <th>Mã chi tiết đặt Tour</th>
                <td><input type="text" name="mactdt"  value="<?php echo $mactdt; ?>" readonly style="background: #ccc; opacity: 0.8;"></td>
            </tr>
            <tr>
                <th>Mã đặt Tour</th>
                <td><input type="text" name="madt"  value="<?php echo $madt; ?>" readonly style="background: #ccc; opacity: 0.8;"></td>
            </tr>
            <tr>
                <th>Họ tên</th>
                <td><input type="text" name="hoten"  value="<?php echo $hoten; ?>"></td>
            </tr>
            <tr>
                <th>Ngày sinh</th>
                <td><input type="date" name="ngaysinh"  value="<?php echo $ngaysinh; ?>"></td>
            </tr>
            <tr>
                <th>CCCD</th>
                <td><input type="text" name="cccd"  value="<?php echo $cccd; ?>"></td>
            </tr>
            <tr>
                <th>Ghi chú</th>
                <td><input type="text" name="ghichu"  value="<?php echo $ghichu; ?>"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="updatebooktour_dt" value="Sửa thông tin"></td>
            </tr>
        </table>
    </form>
</div>