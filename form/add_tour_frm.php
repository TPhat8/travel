<?php
require_once ("../control/connect.php");
$connect = new connect;
$link = $connect->getLink();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addtour'])) {
    $tentour = $_POST['tentour'];
    $maloaitour = $_POST['maloaitour'];
    $khuvuc = $_POST['khuvuc'];
    $tinhdi = $_POST['tinhdi'];
    $tinhden = $_POST['tinhden'];
    $quocgiadi = $_POST['quocgiadi'];
    $quocgiaden = $_POST['quocgiaden'];
    $giatien = $_POST['giatien'];
    $donvi = $_POST['donvi'];
    $songay = $_POST['songay'];
    $sodem = $_POST['sodem'];
    $socho = $_POST['socho'];
    $noidung = $_POST['noidung'];
    $hinhanh = $_POST['hinhanh'];
    $trongoi = $_POST['trongoi'];
    $matour = matour_auto();
    
    $ma_lt_tour = ma_lt_tour_auto();
    $ma_tour = $matour;
    $ngaydi = $_POST["ngaydi"];
    $ngayve = $_POST["ngayve"];
    $sochodadat = 0;

    $link->begin_transaction();

    try {
        $_request = "INSERT INTO TOUR (MA_TOUR, TEN_TOUR, MA_LOAITOUR, LOAI_IN_OUT, MA_TINH_DI, MA_TINH_DEN, MA_QUOCGIA_DI, MA_QUOCGIA_DEN, GIA_TIEN, DONVI, SO_NGAY, SO_DEM, SO_CHO, NOI_DUNG, HINH_ANH, TRON_GOI) VALUES
        ('$matour', '$tentour', '$maloaitour', '$khuvuc', '$tinhdi', '$tinhden', '$quocgiadi', '$quocgiaden', '$giatien', '$donvi', '$songay', '$sodem', '$socho', '$noidung', '$hinhanh', '$trongoi')";

        $sql = "INSERT INTO LICH_TRINH_TOUR (MA_LICHTRINH, MA_TOUR, NGAY_DI, NGAY_VE, SO_CHO_DADAT) VALUES
        ('$ma_lt_tour', '$ma_tour', '$ngaydi', '$ngayve', $sochodadat)";

        // Thực hiện câu truy vấn đầu tiên
        $link->query($_request);

        // Thực hiện câu truy vấn thứ hai
        $link->query($sql);

        // Commit giao dịch
        $link->commit();

        // Truy vấn thành công
        header('location:../admin.php?pid=1');
        exit;
    } catch (Exception $e) {
        // Rollback giao dịch nếu có lỗi
        $link->rollback();

        // Truy vấn thất bại
        echo 'Lỗi khi thực hiện truy vấn: ' . $e->getMessage();
    }
}

function matour_auto()
{
    $prefix = 'T'; // Tiền tố của mã khách hàng (không bắt buộc)
    $length = 3; // Độ dài của phần số tự động
    $randomDigits = rand(pow(1000, $length - 1), pow(1000, $length) - 1); // Sinh một số ngẫu nhiên có độ dài $length

    $timestamp = time(); // Thời gian hiện tại
    $ma_tour = $prefix . $timestamp . $randomDigits; // Kết hợp tiền tố, thời gian và số ngẫu nhiên

    return $ma_tour;
}

function ma_lt_tour_auto()
{
    $prefix = 'T'; // Tiền tố của mã khách hàng (không bắt buộc)
    $length = 3; // Độ dài của phần số tự động
    $randomDigits = rand(pow(1000, $length - 1), pow(1000, $length) - 1); // Sinh một số ngẫu nhiên có độ dài $length

    $timestamp = time(); // Thời gian hiện tại
    $ma_lt_tour = $prefix . $timestamp . $randomDigits; // Kết hợp tiền tố, thời gian và số ngẫu nhiên

    return $ma_lt_tour;
}
?>