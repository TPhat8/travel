<?php
require_once ("../control/connect.php");
$connect = new connect;
$link = $connect->getLink();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updatebooktourdt'])) {
    $mankdt = $_POST['mankdt'];
    $tenkh = $_POST['tenkh'];
    $ngaydat = $_POST['ngaydat'];
    $ghichu = $_POST['ghichu'];

    $query = "UPDATE CHITIET_DATTOUR SET MA_KH='$tenkh', NGAY_DAT='$ngaydat', GHI_CHU='$ghichu' WHERE MA_NKDT='$mankdt'";

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