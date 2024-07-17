<div class="add-container">
    <div class="container-title">
        <h1>Thêm nhân viên</h1>
    </div>

    <form class="add-form" action="form/add_staff_frm.php" method="POST">
        <table>
            <tr>
                <th>Họ tên</th>
                <td><input type="text" name="hotennv"></td>
            </tr>
            <tr>
                <th>Ngày sinh</th>
                <td><input type="date" name="ngaysinh"></td>
            </tr>
            <tr>
                <th>Giới tính</th>
                <td>
                    <input type="radio" name="gioitinh" value="Nam">
                    <label for="">Nam</label>
                    <br>
                    <input type="radio" name="gioitinh" value="Nữ">
                    <label for="">Nữ</label>
                </td>
            </tr>
            <tr>
                <th>Số điện thoại</th>
                <td><input type="number" min="0" name="sdt"></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><input type="email" name="email"></td>
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
                <td><input type="text" name="diachi"></td>
            </tr>
            <tr>
                <th>Username</th>
                <td><input type="text" name="adminname"></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <th>Ghi chú</th>
                <td><input type="text" name="ghichu"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="addstaff" value="Thêm nhân viên"></td>
            </tr>
        </table>
    </form>
</div>