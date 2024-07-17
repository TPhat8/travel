<div class="add-container">
    <div class="container-title">
        <h1>Chỉnh sửa Tour</h1>
    </div>

    <?php 
        $matour = $_POST['matour']; 
        $tentour = $_POST['tentour'];
        $maloaitour = $_POST['maloaitour'];
        $khuvuc = $_POST['khuvuc'];
        $tinhdi = $_POST['tinhdi'];
        $tinhden = $_POST['tinhden'];
        $quocgiadi = $_POST['quocgiadi'];
        $quocgiaden = $_POST['quocgiaden'];
        $giatien = $_POST['giatien'];
        $donvi = $_POST['donvi'];
        $songay = $_POST['songay'];
        $sodem = $_POST['sodem'];
        $socho = $_POST['socho'];
        $noidung = $_POST['noidung'];
        $hinhanh = $_POST['hinhanh'];
        $trongoi = $_POST['trongoi'];

        $malttour = $_POST["malttour"];
        $ngaydi = $_POST["ngaydi"];
        $ngayve = $_POST["ngayve"];
        $sochodadat = $_POST["sochodadat"];
    ?>
    
    <form class="add-form" action="form/update_tour_frm.php" method="post">
        <table>
            <tr>
                <th>Mã Tour</th>
                <td><input type="text" name="matour" value="<?php echo $matour; ?>" readonly style="background: #ccc; opacity: 0.8;"></td>
            </tr>
            <tr>
                <th>Tên Tour</th>
                <td><input type="text" name="tentour" value="<?php echo $tentour; ?>"></td>
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
                    <input type="radio" name="khuvuc" value="Inbound" <?php if ($khuvuc == 'Inbound') echo 'checked'; ?>>
                    <label for="">Trong nước</label>
                    <br>
                    <input type="radio" name="khuvuc" value="Outbound" <?php if ($khuvuc == 'Outbound') echo 'checked'; ?>>
                    <label for="">Ngoài nước</label>
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
                        <?php include ("./detail/nation_from.php"); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Quốc gia đến</th>
                <td>
                    <select name="quocgiaden">
                        <?php include ("./detail/nation_to.php"); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Giá tiền</th>
                <td><input type="text" name="giatien" value="<?php echo $giatien; ?>"></td>
            </tr>
            <tr>
                <th>Đơn vị</th>
                <td>
                    <select name="donvi" value="<?php echo $donvi; ?>">
                        <option value="đ">đồng</option>
                        <option value="usd">usd</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Số ngày</th>
                <td><input type="number" name="songay" value="<?php echo $songay; ?>"></td>
            </tr>
            <tr>
                <th>Số đêm</th>
                <td><input type="number" name="sodem" value="<?php echo $sodem; ?>"></td>
            </tr>
            <tr>
                <th>Số chỗ</th>
                <td><input type="number" name="socho" value="<?php echo $socho; ?>"></td>
            </tr>
            <tr>
                <th>Nội dung</th>
                <td><input type="text" name="noidung" class="content-text" value="<?php echo $noidung; ?>"></td>
            </tr>
            <tr>
                <th>Hình ảnh</th>
                <td>
                    <input type="file" name="hinhanh">
                    <?php if (isset($_POST["hinhanh"])): ?>
                        <span><strong><?php echo "File đã tải lên: " . $_POST["hinhanh"]; ?></strong></span>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th>Trọn gói</th>
                <td><input type="checkbox" value="1" name="trongoi" <?php if ($trongoi == 1) echo 'checked'; ?>></td>
            </tr>
            <tr>
                <th>Mã lịch trình</th>
                <td><input type="text" name="malttour" value="<?php echo $malttour; ?>" readonly style="background: #ccc; opacity: 0.8;"></td>
            </tr>
            <tr>
                <th>Ngày đi</th>
                <td><input type="date" value="<?php echo $ngaydi ?>" name="ngaydi"></td>
            </tr>
            <tr>
                <th>Ngày về</th>
                <td><input type="date" value="<?php echo $ngayve ?>" name="ngayve"></td>
            </tr>
            <tr>
                <th>Số chỗ đã đặt</th>
                <td><input type="number" value="<?php echo $sochodadat ?>" name="sochodadat" readonly style="background: #ccc; opacity: 0.8;"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="updatetour" value="Sửa Tour"></td>
            </tr>
        </table>
    </form>
</div>