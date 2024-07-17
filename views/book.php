<?php 
    if (!isset($_SESSION['username'])) {
        $_SESSION['errorMessage'] = 'Hãy đăng nhập để tiếp tục';
        header('Location: views/login.php');
        exit();
    }
?>

<!-- Hiển thị thông báo -->
<?php if (isset($errorMessage)): ?>
    <div class="alert"><?php echo $errorMessage; ?></div>
<?php endif; ?>

<div class="heading" style="background: url(img/header-bg-3.jpg) no-repeat">
    <h1>Đặt tour</h1>
</div>

<!-- booking section starts -->

<section class="booking">

    <h1 class="heading-title">Đặt tour của bạn</h1>

    <form action="form/book_frm.php" method="post" class="book-form">

        <div class="flex">
            <div class="inputBox">
                <span>Tên Tour</span>
                <input type="text" name="tentour" value="<?php echo isset($_POST['tentour']) ? $_POST['tentour'] : ''; ?>" readonly>
            </div>
            <div class="inputBox">
                <span>Mã Tour</span>
                <input type="text" name="matour" value="<?php echo isset($_POST['matour']) ? $_POST['matour'] : ''; ?>" readonly>
            </div>
            <div class="inputBox">
                <span>Giá tiền</span>
                <input type="text" name="giatien" value="<?php echo isset($_POST['giatien']) ? $_POST['giatien'] : ''; ?>" readonly>
            </div>
            <div class="inputBox">
                <span>Số khách</span>
                <input type="number" min="1" placeholder="Nhập số khách" name="sokhach" oninput="handleSokhachChange(event)">
            </div>
            <div class="inputBoxContainer"></div>
        </div>

        <input type="submit" value="Xác nhận" class="btn" name="book">

    </form>

</section>

<!-- booking section ends -->