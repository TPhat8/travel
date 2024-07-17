<?php
session_start(); // Khởi tạo session

require_once("../control/connect.php");
$connect = new connect;
$link = $connect->getLink();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book'])) {
    $matour = $_POST['matour'];
    $sokhach = $_POST['sokhach'];
    $trangthai = 'Chưa thanh toán';
    $ngaydat = date("Y-m-d");
    $ma_kh = $_SESSION['username'];

    $id_book = idbook_auto($link);

    // Lấy mã khách hàng (MA_KH) từ bảng KHACHHANG dựa trên giá trị $_SESSION['username']
    $sqlMaKH = "SELECT MA_KH FROM KHACHHANG WHERE USERNAME = '$ma_kh'";
    $resultMaKH = $link->query($sqlMaKH);

    if ($resultMaKH->num_rows > 0) {
        $rowMaKH = $resultMaKH->fetch_assoc();
        $ma_kh = $rowMaKH['MA_KH'];

        // Lấy thông tin số chỗ còn lại từ bảng TOUR dựa trên mã tour (MA_TOUR)
        $sqlSoChoConLai = "SELECT SO_CHO FROM TOUR WHERE MA_TOUR = '$matour'";
        $resultSoChoConLai = $link->query($sqlSoChoConLai);

        if ($resultSoChoConLai->num_rows > 0) {
            $rowSoChoConLai = $resultSoChoConLai->fetch_assoc();
            $soChoConLai = $rowSoChoConLai['SO_CHO'];

            if ($soChoConLai < $sokhach) {
                // Số chỗ còn lại trong tour ít hơn số chỗ cần đặt
                echo 'Không thể đặt tour. Số chỗ còn lại trong tour không đủ.';
            } else {
                // Thực hiện truy vấn INSERT vào bảng DATTOUR với mã khách hàng (MA_KH) đã lấy được
                $sql = "INSERT INTO DATTOUR (MA_DATTOUR, MA_TOUR, MA_KH, SO_CHO_CANDAT, TRANG_THAI, NGAY_DAT) 
                VALUES ('$id_book', '$matour', '$ma_kh', '$sokhach', '$trangthai', '$ngaydat')";

                if ($link->query($sql)) {
                    // Truy vấn thành công

                    // Lưu thông tin chi tiết đặt tour
                    for ($i = 1; $i <= $sokhach; $i++) {
                        $id_book_detail = idbook_detail_auto($link);
                        $hoten = $_POST['hoten' . $i];
                        $ngaysinh = $_POST['ngaysinh' . $i];
                        $cccd = $_POST['cccd' . $i];

                        // Thực hiện truy vấn để lưu thông tin khách hàng vào bảng CHITIET_DATTOUR
                        $sqlChiTiet = "INSERT INTO CHITIET_DATTOUR (MA_CHITIET_DATTOUR, MA_DATTOUR, HO_TEN, NGAY_SINH, CCCD, GHI_CHU) VALUES ('$id_book_detail', '$id_book', '$hoten', '$ngaysinh', '$cccd', '')";
                        $link->query($sqlChiTiet);
                    }

                    // Cập nhật số chỗ còn lại trong bảng TOUR
                    $sqlUpdateSoCho = "UPDATE TOUR SET SO_CHO = SO_CHO - $sokhach WHERE MA_TOUR = '$matour'";
                    $link->query($sqlUpdateSoCho);

                    // Kiểm tra trạng thái và xóa session nếu cần
                    if ($trangthai === "Đã thanh toán") {
                        session_unset(); // Xóa tất cả các biến trong session
                        session_destroy(); // Hủy bỏ session
                    }
                    
                    header('location:../index.php?pid=9&myid=1');
                    exit;
                } else {
                    // Truy vấn thất bại
                    echo 'Lỗi khi thực hiện truy vấn: ' . mysqli_error($link);
                }
            }
        } else {
            // Không tìm thấy thông tin tour
            echo 'Không tìm thấy thông tin tour.';
        }
    } else {
        // Không tìm thấy thông tin khách hàng
        echo 'Không tìm thấy thông tin khách hàng.';
    }
}

// Các hàm idbook_auto() và idbook_detail_auto() đã được chỉnh sửa

function idbook_auto($link)
{
    $prefix = 'DT'; // Tiền tố của mã đặt tour
    $length = 3; // Độ dài của phần số tự động

    do {
        $randomDigits = rand(pow(10, $length - 1), pow(10, $length) - 1); // Sinh một số ngẫu nhiên có độ dài $length

        $timestamp = time(); // Thời gian hiện tại
        $id_book = $prefix . $timestamp . $randomDigits; // Kết hợp tiền tố, thời gian và số ngẫu nhiên

        // Kiểm tra mã đặt tour có tồn tại trong bảng DATTOUR hay không
        $sqlCheckIdBook = "SELECT MA_DATTOUR FROM DATTOUR WHERE MA_DATTOUR = '$id_book'";
        $resultCheckIdBook = $link->query($sqlCheckIdBook);
    } while ($resultCheckIdBook->num_rows > 0); // Lặp lại quá trình sinh số ngẫu nhiên cho đến khi mã không trùng

    return $id_book;
}

function idbook_detail_auto($link)
{
    $prefix = 'CTDT'; // Tiền tố của mã đặt tour

    do {
        $randomDigits = mt_rand(0, 999999); // Sinh một số ngẫu nhiên có độ dài tối đa 6 ký tự

        // Đảm bảo số ngẫu nhiên có đủ 6 chữ số
        $randomDigits = str_pad($randomDigits, 6, '0', STR_PAD_LEFT);

        $id_book = $prefix . $randomDigits; // Kết hợp tiền tố và số ngẫu nhiên

        // Kiểm tra mã chi tiết đặt tour có tồn tại trong bảng CHITIET_DATTOUR hay không
        $sqlCheckIdBookDetail = "SELECT MA_CHITIET_DATTOUR FROM CHITIET_DATTOUR WHERE MA_CHITIET_DATTOUR = '$id_book'";
        $resultCheckIdBookDetail = $link->query($sqlCheckIdBookDetail);
    } while ($resultCheckIdBookDetail->num_rows > 0); // Lặp lại quá trình sinh số ngẫu nhiên cho đến khi mã không trùng

    return $id_book;
}
?>