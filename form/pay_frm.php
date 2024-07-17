<?php
require_once ("../control/connect.php");
$connect = new connect;
$link = $connect->getLink();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pay'])) {
    $madattour = $_POST['madattour'];
    $trangthai = 1;

    $query = "UPDATE DATTOUR SET TRANG_THAI='$trangthai' WHERE MA_DATTOUR='$madattour'";

    if ($link->query($query)) {
        // Truy vấn thành công
        header('location: ../index.php?pid=9&myid=1');
        exit;
    } else {
        // Truy vấn thất bại
        echo 'Lỗi khi thực hiện truy vấn: ' . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>