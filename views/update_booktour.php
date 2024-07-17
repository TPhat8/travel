<div class="add-container">
    <div class="container-title">
        <h1>Chỉnh sửa thông tin đặt Tour</h1>
    </div>

    <?php 
        $madattour = $_POST['madattour'];
        $matour = $_POST['matour'];
        $sokhach = $_POST['sokhach'];
        $trangthai = $_POST['trangthai'];
        $ngaydat = $_POST['ngaydat'];
    ?>

    <form class="add-form" action="form/update_booktour_frm.php" method="POST">
        <table>
            <tr>
                <th>Mã Đặt Tour</th>
                <td><input type="text" name="madattour"  value="<?php echo $madattour; ?>" readonly style="background: #ccc; opacity: 0.8;"></td>
            </tr>
            <tr>
                <th>Mã Tour</th>
                <td><input type="text" name="matour"  value="<?php echo $matour; ?>" readonly style="background: #ccc; opacity: 0.8;"></td>
            </tr>
            <tr>
                <th>Số khách đặt</th>
                <td><input type="text" name="sokhach"  value="<?php echo $sokhach; ?>"></td>
            </tr>
            <tr>
                <th>Trạng thái</th>
                <td>
                    <select name="trangthai">
                        <option value="0" <?php if ($trangthai == 0) echo 'selected'; ?>>Chưa thanh toán</option>
                        <option value="1" <?php if ($trangthai == 1) echo 'selected'; ?>>Đã thanh toán</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Ngày đặt</th>
                <td><input type="date" name="ngaydat"  value="<?php echo $ngaydat; ?>"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="updatebooktour" value="Sửa thông tin"></td>
            </tr>
        </table>
    </form>
</div>