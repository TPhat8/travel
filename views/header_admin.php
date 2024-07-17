<header>
    <h2>
        <label for="nav-toggle">
            <span class="las la-bars"></span>
        </label>
        Dashboard
    </h2>

    <div class="user-wrapper">
        <?php if (isset($_SESSION["adminname"])) { ?>
            <img src="img/<?php echo $_SESSION["anhprofile"]; ?>" alt="" width="30px" height="30px">
            <div>
                <h4><?php echo $_SESSION["hotennv"]; ?></h4>
                <small><?php echo $_SESSION["chucvu"]; ?></small>
            </div>
        <?php } ?>
    </div>

    <div class="logout">
        <a href="views/logout.php" class="btn-logout"><i class='bx bx-log-out-circle' ></i> Đăng xuất</a>
    </div>
</header>