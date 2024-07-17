<?php
session_start();
require_once("../control/connect.php");
$connect = new connect;
$link = $connect->getLink();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $adminname = $_POST['adminname'];
    $password = $_POST['password'];

    // Truy vấn để lấy thông tin khách hàng từ tên đăng nhập
    $query = "SELECT * FROM NHANVIEN 
            JOIN CHUCVU ON NHANVIEN.MA_CHUCVU = CHUCVU.MA_CHUCVU
            WHERE USERNAME = '$adminname'";
    $result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row['PASSWORD'];

        // Kiểm tra mật khẩu
        if (password_verify($password, $storedPassword)) {
            // Đăng nhập thành công
            $_SESSION['adminname'] = $adminname;
            $_SESSION['hotennv'] = $row['HO_TEN_NV'];
            $_SESSION['chucvu'] = $row['TEN_CHUCVU'];
            $_SESSION['anhprofile'] = $row['ANH_PROFILE'];
            header('Location: ../admin.php'); // Chuyển hướng đến trang admin sau khi đăng nhập thành công
            exit;
        } else {
            // Sai mật khẩu
            $_SESSION['errorMessage'] = 'Tên đăng nhập hoặc mật khẩu không chính xác. nha';
            header('Location: ../views/login_admin.php'); // Chuyển hướng về trang login.php
            exit;
        }
    } else {
        // Tên đăng nhập không tồn tại
        $_SESSION['errorMessage'] = 'Tên đăng nhập hoặc mật khẩu không chính xác. anh';
        header('Location: ../views/login_admin.php'); // Chuyển hướng về trang login.php
        exit;
    }
}
?>