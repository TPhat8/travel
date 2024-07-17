<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <link rel="stylesheet" href="css/signup.css">
    <title>Đăng ký</title>
</head>
<body>
    <div class="container">
        <div class="title">
            <h1>Fast Travel</h1>
        </div>

        <div class="signup-box">
            <div class="head">
                <div class="name">
                    <h2>Đăng ký thành viên</h2>
                </div>
            </div>
            <?php if (isset($_GET['error']) && $_GET['error'] === 'true') : ?>
                <div class="error-box">
                    <p>Mật khẩu nhập lại không khớp.</p>
                </div>
            <?php endif; ?>
            <form action="form/signup_frm.php" method="post">
                <table>
                    <tr>
                        <th>Họ tên</th>
                        <td>
                            <ion-icon name="person-outline"></ion-icon>
                            <input type="text" name="hoten" value="<?php echo isset($_POST['hoten']) ? $_POST['hoten'] : ''; ?>">
                        </td>
                    </tr>
                    <tr>
                        <th>Tên đăng nhập</th>
                        <td>
                            <ion-icon name="person-outline"></ion-icon>
                            <input type="text" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>">
                        </td>
                    </tr>
                    <tr>
                        <th>Mật khẩu</th>
                        <td>
                            <ion-icon name="lock-closed-outline"></ion-icon>
                            <input type="password" name="password">
                        </td>
                    </tr>
                    <tr>
                        <th>Nhập lại mật khẩu</th>
                        <td>
                            <ion-icon name="lock-closed-outline"></ion-icon>
                            <input type="password" name="confirm_password">
                        </td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>
                            <ion-icon name="mail-outline"></ion-icon>
                            <input type="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                        </td>
                    </tr>
                    <tr>
                        <th>Số điện thoại</th>
                        <td>
                            <ion-icon name="calendar-outline"></ion-icon>
                            <input type="text" name="sdt" value="<?php echo isset($_POST['sdt']) ? $_POST['sdt'] : ''; ?>">
                        </td>
                    </tr>
                    <tr>
                        <th>Số CCCD</th>
                        <td>
                            <ion-icon name="calendar-outline"></ion-icon>
                            <input type="text" name="cccd" value="<?php echo isset($_POST['cccd']) ? $_POST['cccd'] : ''; ?>">
                        </td>
                    </tr>
                    <tr>
                        <th>Ngày sinh</th>
                        <td>
                            <ion-icon name="calendar-outline"></ion-icon>
                            <input type="date" name="ngaysinh" value="<?php echo isset($_POST['ngaysinh']) ? $_POST['ngaysinh'] : ''; ?>">
                        </td>
                    </tr>
                    <tr>
                        <th>Quốc tịch</th>
                        <td>
                            <ion-icon name="calendar-outline"></ion-icon>
                            <select name="quoctich">
                                <?php include ("detail/nation_detail.php"); ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Giới tính</th>
                        <td>
                            <input type="radio" name="gioitinh" value="Nam" <?php echo isset($_POST['gioitinh']) && $_POST['gioitinh'] === 'Nam' ? 'checked' : ''; ?>>
                            <label for="">Nam</label>
                            <br>
                            <input type="radio" name="gioitinh" value="Nữ" <?php echo isset($_POST['gioitinh']) && $_POST['gioitinh'] === 'Nữ' ? 'checked' : ''; ?>>
                            <label for="">Nữ</label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="signup" value="Đăng ký">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
