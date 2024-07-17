<?php
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Trang hiện tại
    $itemsPerPage = 6; // Số mục hiển thị trên mỗi trang
?>

<div class="heading" style="background: url(img/header-bg-2.jpg) no-repeat">
    <h1 color="black">Gói tour</h1>
</div>

<section class="menu">
    <div class="menu-left">
        <div class="menu-bar">
            <h2>Menu</h2>
            <ul>
                <!-- menu-left.php -->
                <?php include("menu-left.php") ?>
            </ul>
        </div>
    </div>
</section>

<!-- packages section starts -->

<section class="packages">

    <!-- <h1 class="heading-title">gói tour</h1> -->

    <div class="box-container">

        <!-- package_detail.php -->
        <?php include("detail/package_detail.php") ?>

    </div>

    <!-- Pagination -->
    <div class="pagination">
        <?php echo generatePaginationLinks($currentPage, $totalPages); ?>
    </div>

</section>

<!-- packages section ends -->

<script>
    function changePage(page) {
        window.location.href = "index.php?pid=2&page=" + page;
    }
</script>