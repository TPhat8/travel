<?php
require_once ("../control/connect.php");
$connect = new connect;
$link = $connect->getLink();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updatestaff'])) {
    $hotennv = $_POST['hotennv'];
    $ngaysinh = $_POST['ngaysinh'];
    $gioitinh = $_POST['gioitinh'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    $chucvu = $_POST['chucvu'];
    $diachi = $_POST['diachi'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $anhprofile = $_POST['anhprofile'];
    $ghichu = $_POST['ghichu'];

    $manv = $_POST['manv'];

    $query = "UPDATE NHANVIEN SET HO_TEN_NV='$hotennv', NGAY_SINH='$ngaysinh', GIOITINH='$gioitinh', SDT='$sdt', EMAIL='$email', MA_CHUCVU='$chucvu', DIACHI='$diachi', USERNAME='$username', PASSWORD='$password', ANH_PROFILE='$anhprofile', GHI_CHU='$ghichu' WHERE MA_NV='$manv'";

    if ($link->query($query)) {
        // Truy vấn thành công
        header('location: ../admin.php?pid=6');
        exit;
    } else {
        // Truy vấn thất bại
        echo 'Lỗi khi thực hiện truy vấn: ' . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>