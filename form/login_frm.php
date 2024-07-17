<?php
session_start();
require_once("../control/connect.php");
$connect = new connect;
$link = $connect->getLink();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Truy vấn để lấy thông tin khách hàng từ tên đăng nhập
    $query = "SELECT * FROM KHACHHANG WHERE USERNAME = '$username'";
    $result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row['PASSWORD'];

        // Kiểm tra mật khẩu
        if (password_verify($password, $storedPassword)) {
            // Đăng nhập thành công
            $_SESSION['username'] = $username;
            $_SESSION['hoten'] = $row['HO_TEN'];
            $_SESSION['diemtl'] = $row['DIEM_TICH_LUY'];
            header('Location: ../index.php'); // Chuyển hướng đến trang index sau khi đăng nhập thành công
            exit;
        } else {
            // Sai mật khẩu
            $_SESSION['errorMessage'] = 'Tên đăng nhập hoặc mật khẩu không chính xác.';
            header('Location: ../views/login.php'); // Chuyển hướng về trang login.php
            exit;
        }
    } else {
        // Tên đăng nhập không tồn tại
        $_SESSION['errorMessage'] = 'Tên đăng nhập hoặc mật khẩu không chính xác.';
        header('Location: ../views/login.php'); // Chuyển hướng về trang login.php
        exit;
    }
}
?>