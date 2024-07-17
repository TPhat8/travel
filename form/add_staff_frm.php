<?php
require_once ("../control/connect.php");
$connect = new connect;
$link = $connect->getLink();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addstaff'])) {
    $hotennv = $_POST['hotennv'];
    $ngaysinh = $_POST['ngaysinh'];
    $gioitinh = $_POST['gioitinh'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    $chucvu = $_POST['chucvu'];
    $diachi = $_POST['diachi'];
    $adminname = $_POST['adminname'];
    $password = $_POST['password'];
    $anhprofile = 'profile_img_default.png';
    $ghichu = $_POST['ghichu'];

    $manv = manv_auto();

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO NHANVIEN (MA_NV, HO_TEN_NV, NGAY_SINH, GIOITINH, SDT, EMAIL, MA_CHUCVU, DIACHI, USERNAME, PASSWORD, ANH_PROFILE, GHI_CHU) VALUES
    ('$manv', '$hotennv', '$ngaysinh', '$gioitinh', '$sdt', '$email', '$chucvu', '$diachi', '$adminname', '$hashed_password', '$anhprofile', '$ghichu')";

    if ($link->query($sql)) {
        // Truy vấn thành công
        header('location:../admin.php?pid=6');
        exit;
    } else {
        // Truy vấn thất bại
        echo 'Lỗi khi thực hiện truy vấn: ' . mysqli_error($connection);
    }
}

function manv_auto()
{
    $prefix = 'NV'; // Tiền tố của mã khách hàng 
    $length = 3; // Độ dài của phần số tự động
    $randomDigits = rand(pow(100, $length - 1), pow(100, $length) - 1); // Sinh một số ngẫu nhiên có độ dài $length

    $timestamp = time(); // Thời gian hiện tại
    $ma_nv = $prefix . $timestamp . $randomDigits; // Kết hợp tiền tố, thời gian và số ngẫu nhiên

    return $ma_nv;
}
?>