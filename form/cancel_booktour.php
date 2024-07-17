<?php
session_start(); // Khởi tạo session

require_once("../control/connect.php");
$connect = new connect;
$link = $connect->getLink();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cancel_book'])) {
    $madattour = $_POST['madattour'];
    $trangthai = $_POST['trangthai'];
    $sochocandat = $_POST['sochocandat'];

    // Lấy thông tin đặt tour từ bảng DATTOUR dựa trên mã đặt tour (MA_DATTOUR)
    $sqlBook = "SELECT * FROM DATTOUR WHERE MA_DATTOUR = '$madattour'";
    $resultBook = $link->query($sqlBook);

    if ($resultBook->num_rows > 0) {
        $rowBook = $resultBook->fetch_assoc();
        $matour = $rowBook['MA_TOUR'];

        // Xóa thông tin chi tiết đặt tour từ bảng CHITIET_DATTOUR dựa trên mã đặt tour (MA_DATTOUR)
        $sqlDeleteChiTiet = "DELETE FROM CHITIET_DATTOUR WHERE MA_DATTOUR = '$madattour'";
        $link->query($sqlDeleteChiTiet);

        // Cập nhật số chỗ còn lại trong bảng TOUR
        $sqlUpdateSoCho = "UPDATE TOUR SET SO_CHO = SO_CHO + $sochocandat WHERE MA_TOUR = '$matour'";
        $link->query($sqlUpdateSoCho);

        // Xóa thông tin đặt tour từ bảng DATTOUR dựa trên mã đặt tour (MA_DATTOUR)
        $sqlDeleteBook = "DELETE FROM DATTOUR WHERE MA_DATTOUR = '$madattour'";
        $link->query($sqlDeleteBook);

        header('location:../index.php?pid=9&myid=1');
        exit;
    } else {
        // Không tìm thấy thông tin đặt tour
        echo 'Không tìm thấy thông tin đặt tour.';
    }
}
?>