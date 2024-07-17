<div class="add-container">
    <div class="container-title">
        <h1>Chỉnh sửa thông tin chi tiết đặt tour</h1>
    </div>

    <?php 
        $mankdt = $_POST['mankdt'];
        $tenkh = $_POST['tenkh'];
        $ngaydat = $_POST['ngaydat'];
        $ghichu = $_POST['ghichu'];
    ?>

    <form class="add-form" action="form/update_booktour_dt_detail_frm.php" method="POST">
        <table>
            <tr>
                <th>Mã nhật ký đặt Tour</th>
                <td><input type="text" name="mankdt"  value="<?php echo $mankdt; ?>" readonly style="background: #ccc; opacity: 0.8;"></td>
            </tr>
            <tr>
                <th>Họ tên KH</th>
                <td><input type="text" name="tenkh"  value="<?php echo $tenkh; ?>" ></td>
            </tr>
            <tr>
                <th>Ngày đặt</th>
                <td><input type="text" name="ngaydat"  value="<?php echo $ngaydat; ?>"></td>
            </tr>
            <tr>
                <th>Ghi chú</th>
                <td><input type="text" name="ghichu"  value="<?php echo $ghichu; ?>"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="updatebooktourdt" value="Sửa thông tin"></td>
            </tr>
        </table>
    </form>
</div>