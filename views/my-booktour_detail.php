<?php 
    $matour = $_POST["matour"];
    $madattour = $_POST["madattour"];
    $tentour = $_POST["tentour"];
    $giatien = $_POST["giatien"];
    $sochocandat = $_POST["sochocandat"];
    $donvi = $_POST["donvi"];
    $trangthai = $_POST["trangthai"];
    $ngaydi = $_POST["ngaydi"];
    $ngayve = $_POST["ngayve"];
    $songay = $_POST["songay"];
    $sodem = $_POST["sodem"];
?>

<div class="container">
        <div class="container-title">
            <h2><?php echo $tentour ?></h2>
        </div>

        <div class="booktour-schedule">
            <table>
                <tr>
                    <th>Ngày đi</th>
                    <td><?php echo $ngaydi ?></td>
                </tr>
                <tr>
                    <th>Ngày về</th>
                    <td><?php echo $ngayve ?></td>
                </tr>
                <tr>
                    <th>Thời gian</th>
                    <td><?php echo $songay ?> ngày <?php echo $sodem ?> đêm</td>
                </tr>
            </table>
        </div>

        <h2 style="text-align: center; font-size: 3rem; margin-bottom: 1rem;">Danh sách khách</h2>
        <!-- management table -->
        <div class="management-table">
            <table width="100%">
                <thead>
                    <tr>
                        <td>STT</td>
                        <td>Họ tên</td>
                        <td>Ngày sinh</td>
                        <td>CCCD</td>
                        <td>Ghi chú</td>
                    </tr>
                </thead>

                <tbody>
                    <?php include ("detail/my_booking_detail.php"); ?>
                </tbody>
            </table>

            <div class="total">
                <table class="total-money">
                    <tbody>
                        <tr>
                            <th>Tổng tiền:</th>
                            <td><?php echo $ctrl_my_booking->get_Money($giatien * $sochocandat); ?> <a class="unit"><?php echo $donvi; ?></a></td>
                        </tr>
                    </tbody>
                </table>

                <div class="pay">
                    <?php if ($trangthai == 0) { ?>
                        <div class="pay_frm">
                        <form action="form/pay_frm.php" method="post">
                            <input type="hidden" name="madattour" value="<?php echo $madattour ?>">
                            <input type="hidden" name="trangthai" value="<?php echo $trangthai ?>">
                            <button onclick="showConfirmation()" type="submit" name="pay" class="btn-pay">Thanh Toán <i class='bx bx-credit-card'></i></button>
                        </form>
                        </div>
                        <div class="cancel_frm">
                        <form action="form/cancel_booktour.php" method="POST">
                            <input type="hidden" name="madattour" value="<?php echo $madattour ?>">
                            <input type="hidden" name="trangthai" value="<?php echo $trangthai ?>">
                            <input type="hidden" name="sochocandat" value="<?php echo $sochocandat ?>">
                            <button onclick="BookCancel_message()" type="submit" name="cancel_book" class="btn-cancel">Hủy</button>
                        </form>
                        </div>
                    <?php } elseif ($trangthai == 1) { ?>
                        <h3 style="color: #00b09b; font-weight: 600; font-size: 2rem;">Đã thanh toán <i class='bx bxs-check-circle'></i></h3>
                    <?php } elseif ($trangthai == 2) { ?>
                        <h3 style="color: red; font-weight: 600; font-size: 2rem;">Đã hủy</h3>
                    <?php } ?>
                </div>

            </div>

        </div>
    </div>