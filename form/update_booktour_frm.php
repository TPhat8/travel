<?php
require_once ("../control/connect.php");
$connect = new connect;
$link = $connect->getLink();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updatebooktour'])) {
    $madattour = $_POST['madattour'];
    $matour = $_POST['matour'];
    $sokhach = $_POST['sokhach'];
    $trangthai = $_POST['trangthai'];
    $ngaydat = $_POST['ngaydat'];

    $query = "UPDATE DATTOUR SET SO_CHO_CANDAT='$sokhach', TRANG_THAI='$trangthai', NGAY_DAT='$ngaydat' WHERE MA_DATTOUR='$madattour'";

    if ($link->query($query)) {
        // Truy vấn thành công
        header('location: ../admin.php?pid=2');
        exit;
    } else {
        // Truy vấn thất bại
        echo 'Lỗi khi thực hiện truy vấn: ' . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>