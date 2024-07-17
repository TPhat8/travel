<?php 
    $severname = "localhost";
    $username = "root";
    $password = "";
    $databasename = "db_dulich";

    $conn = new mysqli($severname, $username, $password, $databasename);

    // Truy vấn số lượng khách hàng
    $sql_khachhang = "SELECT COUNT(*) AS TONG_SO_KHACHHANG
                    FROM KHACHHANG;";
    $result_khachhang = $conn->query($sql_khachhang);
    $row_khachhang = $result_khachhang->fetch_assoc();

    // Truy vấn số lượng tour
    $sql_tour = "SELECT COUNT(*) AS TONG_SO_TOUR
                FROM TOUR;";
    $result_tour = $conn->query($sql_tour);
    $row_tour = $result_tour->fetch_assoc();

    // Truy vấn số lượng đặt tour
    $sql_tour = "SELECT COUNT(*) AS TONG_SO_DATTOUR
                FROM DATTOUR;";
    $result_dattour = $conn->query($sql_tour);
    $row_dattour = $result_dattour->fetch_assoc();

    // Truy vấn doanh thu
    $sql_doanhthu = "SELECT SUM(TONG_DOANH_THU) AS DOANH_THU
                    FROM (
                        SELECT SUM(DATTOUR.SO_CHO_CANDAT * CASE WHEN TOUR.DONVI = 'USD' THEN 23000 ELSE 1 END * TOUR.GIA_TIEN) AS TONG_DOANH_THU
                        FROM TOUR
                        JOIN DATTOUR ON TOUR.MA_TOUR = DATTOUR.MA_TOUR
                        WHERE DATTOUR.TRANG_THAI = 1
                        GROUP BY TOUR.MA_TOUR
                    ) AS DOANH_THU";
    $result_doanhthu = $conn->query($sql_doanhthu);
    $row_doanhthu = $result_doanhthu->fetch_assoc();

    function get_Money($number)
        {
            if (!empty($number)) {
                return number_format($number, 0, ",", ".");
            }
        }

?>