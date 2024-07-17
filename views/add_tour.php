<div class="add-container">
    <div class="container-title">
        <h1>Thêm Tour mới</h1>
    </div>

    <form class="add-form" action="form/add_tour_frm.php" method="post">
        <table>
            <tr>
                <th>Tên Tour</th>
                <td><input type="text" name="tentour"></td>
            </tr>
            <tr>
                <th>Loại Tour</th>
                <td>
                    <select name="maloaitour">
                        <?php include ("./detail/tour_type.php"); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Khu vực</th>
                <td>
                    <lable>Trong nước </lable> <br> <input type="radio" name="khuvuc" value="Trong nước">
                    <lable>Ngoài nước </lable> <br> <input type="radio" name="khuvuc" value="Ngoài nước">
                </td>
            </tr>
            <tr>
                <th>Tỉnh đi</th>
                <td>
                    <select name="tinhdi">
                        <?php include ("./detail/tinhtp_di_detail.php"); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Tỉnh đến</th>
                <td>
                    <select name="tinhden">
                        <?php include ("./detail/tinhtp_den_detail.php"); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Quốc gia đi</th>
                <td>
                    <select name="quocgiadi">
                        <?php include ("./detail/nation_to.php"); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Quốc gia đến</th>
                <td>
                    <select name="quocgiaden">
                        <?php include ("./detail/nation_from.php"); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Giá tiền</th>
                <td><input type="text" name="giatien"></td>
            </tr>
            <tr>
                <th>Đơn vị</th>
                <td>
                    <select name="donvi">
                        <option value="đ">đồng</option>
                        <option value="usd">USD</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Số ngày</th>
                <td><input type="number" name="songay"></td>
            </tr>
            <tr>
                <th>Số đêm</th>
                <td><input type="number" name="sodem"></td>
            </tr>
            <tr>
                <th>Số chỗ</th>
                <td><input type="number" name="socho"></td>
            </tr>
            <tr>
                <th>Nội dung</th>
                <td>
                    <textarea name="noidung" cols="30" rows="10" class="content-text"></textarea>
                    <!-- <input type="comment" line="5" name="noidung" class="content-text"> -->
                </td>
            </tr>
            <tr>
                <th>Hình ảnh</th>
                <td><input type="file" name="hinhanh"></td>
            </tr>
            <tr>
                <th>Trọn gói</th>
                <td><input type="checkbox" value="1" name="trongoi"></td>
            </tr>
            <tr>
                <th>Ngày đi</th>
                <td><input type="date" name="ngaydi"></td>
            </tr>
            <tr>
                <th>Ngày về</th>
                <td><input type="date" name="ngayve"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="addtour" value="Thêm Tour"></td>
            </tr>
        </table>
    </form>
</div>