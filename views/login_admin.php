<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/login_admin.css">
        <link rel="icon" type="image/x-icon" href="../img/logo.png">
        <title>Đăng nhập Admin</title>
    </head>
    <body>
        <div class="container">
            <div class="title">
                <h1>Fast Travel</h1>
            </div>
            <div class="login-box">
                <div class="head">
                    <div class="name">
                        <h2>Đăng nhập Admin</h2>
                    </div>
                </div>
                <form action="../form/login_admin_frm.php" method="POST">
                    <div class="input-box">
                        <ion-icon name="person-outline"></ion-icon>
                        <label>Tên đăng nhập</label>
                        <input type="text" name="adminname">
                    </div>
                    <div class="input-box">
                        <ion-icon name="lock-closed-outline"></ion-icon> 
                        <label>Mật khẩu</label>
                        <input type="password" name="password">
                    </div>
                    <div class="error-message">
                       <?php if (isset($_SESSION['errorMessage'])): ?>
                            <p><?php echo $_SESSION['errorMessage']; ?></p>
                            <?php unset($_SESSION['errorMessage']); ?>
                        <?php endif; ?> 
                    </div>
                    <div class="btn-login">
                        <input type="submit" name="login" value="Đăng nhập">
                    </div>
                </form>
            </div>
        </div>

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>