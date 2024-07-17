<?php
require_once("../control/connect.php");
$connect = new connect;
$link = $connect->getLink();

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
    $hoten = $_POST['hoten'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_POST['email'];
    $sdt = $_POST['sdt'];
    $cccd = $_POST['cccd'];
    $ngaysinh = $_POST['ngaysinh'];
    $gioitinh = $_POST['gioitinh'];
    $quoctich = $_POST['quoctich'];
    $diachi = "";
    $anh_profile = "profile_img_default.png";
    $maloaihv = "HV01";
    $ghichu = "";
    $makh = makh_auto();

    // Kiểm tra mật khẩu và mật khẩu nhập lại
    if ($password !== $confirm_password) {
        $errors[] = "Mật khẩu nhập lại không khớp.";
        header('Location: ../signup.php?error=true');
    }

    // Nếu không có lỗi, thực hiện truy vấn
    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $_request = "INSERT INTO KHACHHANG (MA_KH, HO_TEN, NGAY_SINH, GIOI_TINH, SDT, CCCD, EMAIL, DIA_CHI, USERNAME, PASSWORD, MA_QUOCGIA, MA_LOAI_HV, ANH_PROFILE, GHI_CHU) VALUES
        ('$makh', '$hoten', '$ngaysinh', '$gioitinh', '$sdt', '$cccd', '$email', '$diachi', '$username', '$hashed_password', '$quoctich', '$maloaihv', '$anh_profile', '$ghichu')";

        if ($link->query($_request)) {
            // Truy vấn thành công
            header('Location: ../views/login.php');
            exit;
        } else {
            // Truy vấn thất bại
            echo 'Lỗi khi thực hiện truy vấn: ' . mysqli_error($link);
        }
    }
}

function makh_auto()
{
    $prefix = 'KH'; // Tiền tố của mã khách hàng (không bắt buộc)
    $length = 8; // Độ dài của phần số tự động
    $randomDigits = rand(pow(10, $length - 1), pow(10, $length) - 1); // Sinh một số ngẫu nhiên có độ dài $length

    $timestamp = time(); // Thời gian hiện tại
    $ma_kh = $prefix . $timestamp . $randomDigits; // Kết hợp tiền tố, thời gian và số ngẫu nhiên

    return $ma_kh;
}
?>