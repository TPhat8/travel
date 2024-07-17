<?php
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Trang hiện tại
    $itemsPerPage = 6; // Số mục hiển thị trên mỗi trang
?>

<div class="heading" style="background: url(img/header-bg-4.jpg) no-repeat">
    <h1>Điểm đến</h1>
</div>

<!-- destination section starts -->
<section class="destination">

    <h1 class="heading-title">các điểm đến</h1>

    <div class="box-container">
        <!-- destination_detail.php -->
        <?php include 'detail/destination_detail.php'; ?>
    </div>

    <!-- Pagination -->
    <div class="pagination">
        <?php echo generatePaginationLinks($currentPage, $totalPages, 'destination.php'); ?>
    </div>
</section>
<!-- destination section ends -->

<!-- packages section ends -->

<script>
    function changePageDD(page) {
        window.location.href = "index.php?pid=3&page=" + page;
    }
</script>