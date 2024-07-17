<?php
require_once("../control/connect.php");
$connect = new connect;
$link = $connect->getLink();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updatebooktour_dt'])) {
    $mactdt = $_POST['mactdt']; // Mã chi tiết đặt Tour
    $madt = $_POST['madt']; // Mã đặt Tour
    $hoten = $_POST['hoten'];
    $ngaysinh = $_POST['ngaysinh'];
    $cccd = $_POST['cccd'];
    $ghichu = $_POST['ghichu'];

    //echo $hoten;

    // Lấy thông tin về tour cần sửa (nếu có) để sử dụng trong câu truy vấn UPDATE

    $query = "UPDATE CHITIET_DATTOUR SET HO_TEN='$hoten', NGAY_SINH='$ngaysinh', CCCD='$cccd', GHI_CHU='$ghichu' WHERE MA_CHITIET_DATTOUR='$mactdt'";

    if ($link->query($query)) {
        // Truy vấn thành công
        header('location: ../admin.php?pid=4');
        exit;
    } else {
        // Truy vấn thất bại
        echo 'Lỗi khi thực hiện truy vấn: ' . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>