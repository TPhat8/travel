<?php
require_once ("../control/connect.php");
$connect = new connect;
$link = $connect->getLink();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addcustomer'])) {
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
    $ghichu = $_POST['ghichu'];
    $anh_profile = "profile_img_default.png";
    $makh = makh_auto();

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO KHACHHANG (MA_KH, HO_TEN, NGAY_SINH, GIOI_TINH, SDT, CCCD, EMAIL, DIA_CHI, USERNAME, PASSWORD, MA_QUOCGIA, MA_LOAI_HV, ANH_PROFILE, GHI_CHU) VALUES
    ('$makh', '$hoten', '$ngaysinh', '$gioitinh', '$sdt', '$cccd', '$email', '$diachi', '$username', '$hashed_password', '$quocgia', '$loaihv', '$anh_profile', '$ghichu')";

    if ($link->query($sql)) {
        // Truy vấn thành công
        header('location:../admin.php?pid=5');
        exit;
    } else {
        // Truy vấn thất bại
        echo 'Lỗi khi thực hiện truy vấn: ' . mysqli_error($connection);
    }
}

function makh_auto()
{
    $prefix = 'KH'; // Tiền tố của mã khách hàng 
    $length = 3; // Độ dài của phần số tự động
    $randomDigits = rand(pow(1000, $length - 1), pow(1000, $length) - 1); // Sinh một số ngẫu nhiên có độ dài $length

    $timestamp = time(); // Thời gian hiện tại
    $ma_kh = $prefix . $timestamp . $randomDigits; // Kết hợp tiền tố, thời gian và số ngẫu nhiên

    return $ma_kh;
}
?>