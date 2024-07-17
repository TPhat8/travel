<div class="navbar-top">
    <div class="welcome">
        <h4>Hotline: 0123456789</h4>
    </div>

    <?php if (isset($_SESSION['username'])): ?>
        <nav>
            <p><i class='bx bx-user' ></i> <a href="index.php?pid=9"><?php echo $_SESSION['hoten']; ?></a></p>
        </nav>

        <nav>
            <!-- <a href="views/logout.php"><i class="fas fa-right-to-bracket"></i> Đăng xuất</a> -->
            <button class="btn-login" onclick="window.location.href = 'views/logout.php';">
                <div class="sign"><i class='bx bx-log-in-circle' ></i></i></div>
                <div class="text">Đăng xuất</div>
            </button>
        </nav>
    <?php else: ?>
        <nav class="logout">
            <a href="views/login.php" ><i class='bx bx-log-in'></i> Đăng nhập</a>
            <a href="signup.php" ><i class='bx bx-user-plus'></i> Đăng ký</a>
        </nav>
    <?php endif; ?>
</div>

<section class="header">
    <a href="index.php?pid=0" class="logo"><img src="img/logo.png" width="35px" height="35px"/> <span>FTravel</span></a>
    
    <nav class="navbar">
        <a href="index.php?pid=1">Giới thiệu</a>
        <a href="index.php?pid=2">Gói Tour</a>
        <a href="index.php?pid=3">Điểm đến</a>
        <a href="index.php?pid=4">Đặt Tour</a>
        <a href="index.php?pid=6"><i class='bx bx-search'></i> Tìm kiếm</a>
    </nav>

    <div id="menu-btn" class="fas fa-bars"></div>
</section>