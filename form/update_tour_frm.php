<?php
require_once ("../control/connect.php");
$connect = new connect;
$link = $connect->getLink();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updatetour'])) {
    $matour = $_POST["matour"];
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

    $malttour = $_POST["malttour"];
    $ngaydi = $_POST["ngaydi"];
    $ngayve = $_POST["ngayve"];
    $sochodadat = $_POST["sochodadat"];

    $link->begin_transaction();

    try {
        $query = "UPDATE TOUR SET TEN_TOUR='$tentour', MA_LOAITOUR='$maloaitour', LOAI_IN_OUT='$khuvuc', MA_TINH_DI='$tinhdi', MA_TINH_DEN='$tinhden', MA_QUOCGIA_DI='$quocgiadi', MA_QUOCGIA_DEN='$quocgiaden', GIA_TIEN='$giatien', DONVI='$donvi', SO_NGAY='$songay', SO_DEM='$sodem', SO_CHO='$socho', NOI_DUNG='$noidung', HINH_ANH='$hinhanh', TRON_GOI='$trongoi' WHERE MA_TOUR='$matour'";

        $sql = "UPDATE LICH_TRINH_TOUR SET NGAY_DI='$ngaydi', NGAY_VE='$ngayve', SO_CHO_DADAT='$sochodadat' WHERE MA_LICHTRINH='$malttour'";

        // Thực hiện câu truy vấn đầu tiên
        $link->query($query);

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

mysqli_close($connection);
?>