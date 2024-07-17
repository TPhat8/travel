<div class="add-container">
    <div class="container-title">
        <h1>Chỉnh sửa thông tin nhật ký đặt Tour</h1>
    </div>

    <?php 
        $mankdt = $_POST['mankdt'];
        $madattour = $_POST['madattour'];
        $tiencoc = $_POST['tiencoc'];
        $nhanvien = $_POST['nhanvien'];
    ?>

    <form class="add-form" action="form/update_booktour_dinary_frm.php" method="POST">
        <table>
            <tr>
                <th>Mã nhật ký đặt Tour</th>
                <td><input type="text" name="mankdt"  value="<?php echo $mankdt; ?>" readonly style="background: #ccc; opacity: 0.8;"></td>
            </tr>
            <tr>
                <th>Mã đặt Tour</th>
                <td><input type="text" name="madattour"  value="<?php echo $madattour; ?>" readonly style="background: #ccc; opacity: 0.8;"></td>
            </tr>
            <tr>
                <th>Tiền cọc</th>
                <td><input type="text" name="tiencoc"  value="<?php echo $tiencoc; ?>"></td>
            </tr>
            <tr>
                <th>Nhân viên</th>
                <!-- <td><input type="text" name="nhanvien"  value="<?php echo $nhanvien; ?>"></td> -->
                <td>
                    <select name="nhanvien">
                        <?php include ("./detail/get_staff_detail.php") ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="updatebooktourdinary" value="Sửa thông tin"></td>
            </tr>
        </table>
    </form>
</div>