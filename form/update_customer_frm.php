<?php
require_once ("../control/connect.php");
$connect = new connect;
$link = $connect->getLink();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updatecustomer'])) {
    $hoten = $_POST['hoten'];
    $ngaysinh = $_POST['ngaysinh'];
    $gioitinh = $_POST['gioitinh'];
    $sdt = $_POST['sdt'];
    $cccd = $_POST['cccd'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $quocgia = $_POST['quocgia'];
    $loaihv = $_POST['loaihv'];
    $anhprofile = $_POST['anhprofile'];
    $ghichu = $_POST['ghichu'];

    $makh = $_POST['makh'];

    $query = "UPDATE KHACHHANG SET HO_TEN='$hoten', NGAY_SINH='$ngaysinh', GIOI_TINH='$gioitinh', SDT='$sdt', CCCD='$cccd', EMAIL='$email', DIA_CHI='$diachi', USERNAME='$username', PASSWORD='$password', MA_QUOCGIA='$quocgia', MA_LOAI_HV='$loaihv', GHI_CHU='$ghichu' WHERE MA_KH='$makh'";

    if ($link->query($query)) {
        // Truy vấn thành công
        header('location: ../admin.php?pid=5');
        exit;
    } else {
        // Truy vấn thất bại
        echo 'Lỗi khi thực hiện truy vấn: ' . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>