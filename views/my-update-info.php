<div class="add-container">
    <div class="container-title">
        <h1>Sửa thông tin khách hàng</h1>
    </div>

    <?php 
        $makh = $_POST['makh'];
        $hoten = $_POST['hoten'];
        $ngaysinh = $_POST['ngaysinh'];
        $gioitinh = $_POST['gioitinh'];
        $sdt = $_POST['sdt'];
        $cccd = $_POST['cccd'];
        $email = $_POST['email'];
        $diachi = $_POST['diachi'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $quocgia = $_POST['quocgia'];
        $loaihv = $_POST['loaihv'];
        $tenloaihv = $_POST['tenloaihv'];
        $anhprofile = $_POST['anhprofile'];
        $ghichu = $_POST['ghichu'];
    ?>

    <form class="add-form" action="form/my-update-info_frm.php" method="POST">
        <table>
            <tr>
                <th>Mã khách hàng</th>
                <td><input type="text" name="makh" value="<?php echo $_POST["makh"]; ?>" readonly style="background: #ccc; opacity: 0.8;"></td>
            </tr>
            <tr>
                <th>Họ tên</th>
                <td><input type="text" name="hoten" value="<?php echo $_POST["hoten"]; ?>"></td>
            </tr>
            <tr>
                <th>Ngày sinh</th>
                <td><input type="date" name="ngaysinh" value="<?php echo $_POST["ngaysinh"]; ?>"></td>
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
                <td><input type="number" min="0" name="sdt" value="<?php echo $_POST["sdt"]; ?>"></td>
            </tr>
            <tr>
                <th>CCCD</th>
                <td><input type="number" min="0" name="cccd" value="<?php echo $_POST["cccd"]; ?>"></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><input type="email" name="email" value="<?php echo $_POST["email"]; ?>" style="text-transform: none"></td>
            </tr>
            <tr>
                <th>Địa chỉ</th>
                <td><input type="text" name="diachi" value="<?php echo $_POST["diachi"]; ?>"></td>
            </tr>
            <tr>
                <th>Username</th>
                <td><input type="text" name="username" value="<?php echo $_POST["username"]; ?>" style="text-transform: none"></td>
            </tr>
            <input type="hidden" name="password" value="<?php echo $_POST["password"]; ?>">
            <tr>
                <th>Quốc gia</th>
                <td>
                    <select name="quocgia">
                    <?php include ("./detail/nation_detail.php"); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Loại hội viên</th>
                
                <td><?php echo $tenloaihv ?></td>
            </tr>
            <input type="hidden" name="loaihv" value="<?php echo $_POST["loaihv"]; ?>">
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
                <td><input type="text" name="ghichu" value="<?php echo $_POST["ghichu"]; ?>"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="updatemyinfo" value="Sửa thông tin" class="btn-update"></td>
            </tr>
        </table>
    </form>
</div>