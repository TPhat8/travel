<div class="add-container">
    <div class="container-title">
        <h1>Chỉnh sửa thông tin nhân viên</h1>
    </div>

    <?php 
        $manv = $_POST['manv'];
        $hotennv = $_POST['hotennv'];
        $ngaysinh = $_POST['ngaysinh'];
        $gioitinh = $_POST['gioitinh'];
        $sdt = $_POST['sdt'];
        $email = $_POST['email'];
        $chucvu = $_POST['chucvu'];
        $diachi = $_POST['diachi'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $anhprofile = $_POST['anhprofile'];
        $ghichu = $_POST['ghichu'];
    ?>

    <form class="add-form" action="form/update_staff_frm.php" method="POST">
        <table>
            <tr>
                <th>Mã Nhân viên</th>
                <td><input type="text" name="manv"  value="<?php echo $manv; ?>" readonly style="background: #ccc; opacity: 0.8;"></td>
            </tr>
            <tr>
                <th>Họ tên</th>
                <td><input type="text" name="hotennv"  value="<?php echo $hotennv; ?>"></td>
            </tr>
            <tr>
                <th>Ngày sinh</th>
                <td><input type="date" name="ngaysinh" value="<?php echo $ngaysinh; ?>"></td>
            </tr>
            <tr>
                <th>Giới tính</th>
                <td>
                    <input type="radio" name="gioitinh" value="Nam" <?php if ($gioitinh == 'Nam') echo 'checked'; ?>>
                    <label for="">Nam</label>
                    <br>
                    <input type="radio" name="gioitinh" value="Nữ" <?php if ($gioitinh == 'Nữ') echo 'checked'; ?>>
                    <label for="">Nữ</label>
                </td>
            </tr>
            <tr>
                <th>Số điện thoại</th>
                <td><input type="number" min="0" name="sdt" value="<?php echo $sdt; ?>"></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><input type="email" name="email" value="<?php echo $email; ?>"></td>
            </tr>
            <tr>
                <th>Chức vụ</th>
                <td>
                    <select name="chucvu">
                        <?php include ("./detail/staff_role_detail.php"); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Địa chỉ</th>
                <td><input type="text" name="diachi" value="<?php echo $diachi; ?>"></td>
            </tr>
            <tr>
                <th>Username</th>
                <td><input type="text" name="adminname" value="<?php echo $username; ?>"></td>
            </tr>
            <input type="hidden" name="password" value="<?php echo $password; ?>">
            <tr>
                <th>Ảnh profile</th>
                <td>
                    <input type="file" name="anhprofile">
                    <?php if (isset($_POST["anhprofile"])): ?>
                        <span><strong><?php echo "File đã tải lên: " . $_POST["anhprofile"]; ?></strong></span>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th>Ghi chú</th>
                <td><input type="text" name="ghichu" value="<?php echo $ghichu; ?>"></td>
            </tr>
            <tr colspan="2">
                <td ><input type="submit" name="updatestaff" value="Sửa thông tin"></td>
            </tr>
        </table>
    </form>
</div>