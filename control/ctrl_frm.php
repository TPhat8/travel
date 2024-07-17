<?php 
    include ("connect.php");
    class ctrl_frm extends connect
    {
        function get_Tour()
        {
            $sql = "SELECT t.*, td.TEN_TINH AS TEN_TINH_DI, dd.TEN_TINH AS TEN_TINH_DEN, qd.TEN_QUOCGIA AS TEN_QUOCGIA_DI, qn.TEN_QUOCGIA AS TEN_QUOCGIA_DEN, LICH_TRINH_TOUR.*, DATTOUR.MA_DATTOUR
                    FROM TOUR t
                    JOIN TINH_THANHPHO td ON t.MA_TINH_DI = td.MA_TINH
                    JOIN TINH_THANHPHO dd ON t.MA_TINH_DEN = dd.MA_TINH
                    JOIN QUOCGIA qd ON t.MA_QUOCGIA_DI = qd.MA_QUOCGIA
                    JOIN QUOCGIA qn ON t.MA_QUOCGIA_DEN = qn.MA_QUOCGIA
                    JOIN LICH_TRINH_TOUR ON t.MA_TOUR = LICH_TRINH_TOUR.MA_TOUR
                    LEFT JOIN DATTOUR ON t.MA_TOUR = DATTOUR.MA_TOUR
                    ORDER BY t.MA_TOUR;";
            $kq = $this->link->query($sql);
            return $kq;
        }

        function get_TourHot()
        {
            $sql = "SELECT t.*, td.TEN_TINH AS TEN_TINH_DI, dd.TEN_TINH AS TEN_TINH_DEN, qd.TEN_QUOCGIA AS TEN_QUOCGIA_DI, qn.TEN_QUOCGIA AS TEN_QUOCGIA_DEN, LICH_TRINH_TOUR.*, dt.MA_DATTOUR
                    FROM TOUR t
                    JOIN TINH_THANHPHO td ON t.MA_TINH_DI = td.MA_TINH
                    JOIN TINH_THANHPHO dd ON t.MA_TINH_DEN = dd.MA_TINH
                    JOIN QUOCGIA qd ON t.MA_QUOCGIA_DI = qd.MA_QUOCGIA
                    JOIN QUOCGIA qn ON t.MA_QUOCGIA_DEN = qn.MA_QUOCGIA
                    JOIN LICH_TRINH_TOUR ON t.MA_TOUR = LICH_TRINH_TOUR.MA_TOUR
                    LEFT JOIN DATTOUR dt ON t.MA_TOUR = dt.MA_TOUR
                    WHERE t.MA_TOUR NOT IN (
                        SELECT DISTINCT MA_TOUR
                        FROM DATTOUR
                    )
                    ORDER BY (SELECT COUNT(*) FROM DATTOUR WHERE DATTOUR.MA_TOUR = t.MA_TOUR) DESC, t.SO_CHO ASC
                    LIMIT 3;";
            $kq = $this->link->query($sql);
            return $kq;
        }

        function get_Tour_simple()
        {
            $sql = "select * from TOUR";
            $kq = $this->link->query($sql);
            return $kq;
        }

        function get_List_Customer_Tour($matour)
        {
            $sql = "SELECT DATTOUR.*, CHITIET_DATTOUR.*
                    FROM DATTOUR
                    JOIN CHITIET_DATTOUR ON DATTOUR.MA_DATTOUR = CHITIET_DATTOUR.MA_DATTOUR
                    WHERE DATTOUR.MA_TOUR = '$matour'";
            $kq = $this->link->query($sql);
            return $kq;
        }

        function get_dashTour()
        {
            $sql = "SELECT TOUR.*, LICH_TRINH_TOUR.SO_CHO_DADAT 
                    FROM TOUR
                    INNER JOIN LICH_TRINH_TOUR
                    ON TOUR.MA_TOUR = LICH_TRINH_TOUR.MA_TOUR";
            $kq = $this->link->query($sql);
            return $kq;
        }

        // Trong class chứa hàm get_Diadanh_Trongnuoc
        function get_Diadanh_Trongnuoc()
        {
            $sql = "SELECT * FROM DIADANH_TRONGNUOC";
            $kq = $this->link->query($sql);
            return $kq;
        }


        function get_TenLoaiTour()
        {
            $sql = "select * from LOAI_TOUR";
            $kq = $this->link->query($sql);
            return $kq;
        }

        function get_TourWithLimit($startIndex, $itemsPerPage) {
            $query = "SELECT * FROM tour_table LIMIT $startIndex, $itemsPerPage";
            $kq = $this->link->query($query);
            return $kq;
        }

        function get_LoaiTour($loai)
        {
           
            $sql = "select * from TOUR where MA_LOAITOUR = '$loai'";
            $kq = $this->link->query($sql);
            return $kq;
        }

        function get_TourDetail($matour) {
            $sql = "select * from TOUR where MA_TOUR = '$matour'";
            $kq = $this->link->query($sql);
            return $kq;
        }

        function get_LichTrinhTour($matour) {
            $sql = "SELECT *
                    FROM TOUR
                    JOIN LICH_TRINH_TOUR ON TOUR.MA_TOUR = LICH_TRINH_TOUR.MA_TOUR
                    WHERE TOUR.MA_TOUR = '$matour';";
            $kq = $this->link->query($sql);
            return $kq;
        }

        function get_Destination($madiemden) {
            $sql = "SELECT *
                    FROM DIADANH_TRONGNUOC
                    WHERE MA_DIADANH_TN = '$madiemden'";
            $kq = $this->link->query($sql);
            return $kq;
        }
        function get_DatTour()
        {
            $sql = "select * from DATTOUR ";
            $result = $this->link->query($sql);
            return $result;
        }

        function get_NhatkyDatTour()
        {
            $sql = "SELECT NHATKY_DATTOUR.*, NHANVIEN.HO_TEN_NV 
                    FROM NHATKY_DATTOUR
                    INNER JOIN NHANVIEN
                    ON NHATKY_DATTOUR.MA_NV = NHANVIEN.MA_NV ";
            $result = $this->link->query($sql);
            return $result;
        }

        function get_ChitietDatTour()
        {
            $sql = "select * from CHITIET_DATTOUR";
            $result = $this->link->query($sql);
            return $result;
        }

        function get_KhachHang()
        {
            $sql = "SELECT KHACHHANG.*, QUOCGIA.TEN_QUOCGIA 
                    FROM KHACHHANG 
                    INNER JOIN QUOCGIA 
                    ON KHACHHANG.MA_QUOCGIA = QUOCGIA.MA_QUOCGIA";
            $result = $this->link->query($sql);
            return $result;
        }

        function get_KhachHangMoi()
        {
            $sql = "SELECT *
                    FROM KHACHHANG
                    ORDER BY NGAY_DANG_KY";
            $result = $this->link->query($sql);
            return $result;
        }

        function get_ChucVu()
        {
            $sql = "select * from CHUCVU ";
            $result = $this->link->query($sql);
            return $result;
        }

        function get_NhanVien()
        {
            $sql = "SELECT NHANVIEN.*, CHUCVU.* 
                    FROM NHANVIEN 
                    JOIN CHUCVU ON NHANVIEN.MA_CHUCVU = CHUCVU.MA_CHUCVU";
            $result = $this->link->query($sql);
            return $result;
        }

        function find_Tour($tentour, $ngaydi, $ngayve, $sokhach) {
            $sql = "SELECT *
                    FROM TOUR, LICH_TRINH_TOUR
                    WHERE TOUR.MA_TOUR = LICH_TRINH_TOUR.MA_TOUR
                    AND TEN_TOUR LIKE '%$tentour%'
                    AND NGAY_DI <= '$ngaydi'
                    AND NGAY_VE >= '$ngayve'
                    AND SO_CHO >= $sokhach;";  
            $kq = $this->link->query($sql);
            return $kq;
        }        

        function get_Nation()
        {
            $sql = "select * from QUOCGIA ";
            $kq = $this->link->query($sql);
            return $kq;
        }

        function get_Nation_from()
        {
            $sql = "select * from QUOCGIA ";
            $kq = $this->link->query($sql);
            return $kq;
        }

        function get_Nation_to()
        {
            $sql = "select * from QUOCGIA ";
            $kq = $this->link->query($sql);
            return $kq;
        }

        function get_TinhTP_di()
        {
            $sql = "select * from TINH_THANHPHO";
            $kq = $this->link->query($sql);
            return $kq;
        }

        function get_TinhTP_den()
        {
            $sql = "select * from TINH_THANHPHO";
            $kq = $this->link->query($sql);
            return $kq;
        }

        function get_TypeTour()
        {
            $sql = "select * from LOAI_TOUR ";
            $kq = $this->link->query($sql);
            return $kq;
        }

        function get_Money($number)
        {
            if (!empty($number)) {
                return number_format($number, 0, ",", ".");
            }
        }

        function get_Staff()
        {
            $sql = "select * from NHANVIEN ";
            $kq = $this->link->query($sql);
            return $kq;
        }

        function get_City()
        {
            $sql = "select * from TINH_THANHPHO ";
            $kq = $this->link->query($sql);
            return $kq;
        }
        function get_HoiVien()
        {
            $sql = "select * from HOIVIEN ";
            $kq = $this->link->query($sql);
            return $kq;
        }

        function get_ThongTin_KhachHang($username)
        {
            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                $sql = "SELECT KHACHHANG.*, HOIVIEN.LOAI_HOI_VIEN
                        FROM KHACHHANG, HOIVIEN 
                        WHERE KHACHHANG.MA_LOAI_HV = HOIVIEN.MA_LOAI_HV
                        AND USERNAME = '$username'";
            }
            $result = $this->link->query($sql);
            return $result;
        }

        function get_ThongTin_NhanVien($adminname)
        {
            if (isset($_SESSION['adminname'])) {
                $adminname = $_SESSION['username'];
                $sql = "SELECT * FROM KHACHHANG WHERE USERNAME = '$adminname'";
            }
            $result = $this->link->query($sql);
            return $result;
        }

        function get_Booking() {
            $ma_kh = $_SESSION['username'];
        
            $sql = "SELECT DATTOUR.*, TOUR.*, CHITIET_DATTOUR.*
                    FROM DATTOUR 
                    INNER JOIN TOUR ON DATTOUR.MA_TOUR = TOUR.MA_TOUR
                    INNER JOIN CHITIET_DATTOUR ON DATTOUR.MA_DATTOUR = CHITIET_DATTOUR.MA_DATTOUR
                    WHERE DATTOUR.MA_KH = '$ma_kh'";
        
            $kq = $this->link->query($sql);
            return $kq;
        }        

        function get_my_Booking() {
            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                $sql = "SELECT DT.*, CT.*, TOUR.*, LICH_TRINH_TOUR.*
                        FROM DATTOUR DT
                        JOIN CHITIET_DATTOUR CT ON DT.MA_DATTOUR = CT.MA_DATTOUR
                        JOIN TOUR ON DT.MA_TOUR = TOUR.MA_TOUR
                        JOIN LICH_TRINH_TOUR ON TOUR.MA_TOUR = LICH_TRINH_TOUR.MA_TOUR
                        WHERE DT.MA_KH = (
                            SELECT MA_KH
                            FROM KHACHHANG
                            WHERE USERNAME = '$username')";
                $kq = $this->link->query($sql);
                return $kq;
            }
            return false;
        }
        
        function get_my_Booking_detail($madattour) {
            $sql = "SELECT DATTOUR.*, CHITIET_DATTOUR.*
                    FROM DATTOUR
                    JOIN CHITIET_DATTOUR ON DATTOUR.MA_DATTOUR = CHITIET_DATTOUR.MA_DATTOUR
                    WHERE DATTOUR.MA_DATTOUR = '$madattour'";
            $kq = $this->link->query($sql);
            return $kq;
        }
    }
?>