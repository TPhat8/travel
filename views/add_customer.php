<div class="add-container">
    <div class="container-title">
        <h1>Thêm khách hàng</h1>
    </div>

    <form class="add-form" action="form/add_customer_frm.php" method="POST">
        <table>
            <tr>
                <th>Họ tên</th>
                <td><input type="text" name="hoten"></td>
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
                <th>CCCD</th>
                <td><input type="number" min="0" name="cccd"></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><input type="email" name="email"></td>
            </tr>
            <tr>
                <th>Địa chỉ</th>
                <td><input type="text" name="diachi" placeholder="số nhà/ đường/ phường/ quận/ thành phố"></td>
            </tr>
            <tr>
                <th>Username</th>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><input type="password" name="password"></td>
            </tr>
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
                <td>
                    <select name="loaihv">
                    <?php include ("./detail/hoivien_detail.php"); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Ghi chú</th>
                <td><input type="text" name="ghichu"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="addcustomer" value="Thêm khách hàng"></td>
            </tr>
        </table>
    </form>
</div>