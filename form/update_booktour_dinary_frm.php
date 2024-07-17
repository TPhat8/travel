<?php
require_once ("../control/connect.php");
$connect = new connect;
$link = $connect->getLink();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updatebooktourdinary'])) {
    $mankdt = $_POST['mankdt'];
    $madattour = $_POST['madattour'];
    $tiencoc = $_POST['tiencoc'];
    $nhanvien = $_POST['nhanvien'];

    $query = "UPDATE NHATKY_DATTOUR SET MA_DATTOUR='$madattour', TIEN_COC='$tiencoc', MA_NV='$nhanvien' WHERE MA_NKDT='$mankdt'";

    if ($link->query($query)) {
        // Truy vấn thành công
        header('location: ../admin.php?pid=3');
        exit;
    } else {
        // Truy vấn thất bại
        echo 'Lỗi khi thực hiện truy vấn: ' . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>