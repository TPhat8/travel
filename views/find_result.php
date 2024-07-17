<?php 
    include_once("control/ctrl_frm.php");
    $ctrl_find = new ctrl_frm();

    if (isset($_GET["loaitour"])) {
        $loai = $_GET["loaitour"];
    } else {
        $loai = "";
    }

    $ctrl_package = new ctrl_frm();
    if (!isset($_GET["loaitour"])) {
        $kq = $ctrl_package->get_Tour();
    } else {
        $kq = $ctrl_package->get_LoaiTour($loai);
    }
    
    // Lấy các giá trị tìm kiếm từ form
    $tentour = isset($_POST["tentour"]) ? $_POST["tentour"] : "";
    $ngaydi = isset($_POST["ngaydi"]) ? $_POST["ngaydi"] : "";
    $ngayve = isset($_POST["ngayve"]) ? $_POST["ngayve"] : "";
    $sokhach = isset($_POST["sokhach"]) ? $_POST["sokhach"] : "";
    
    // Gọi hàm tìm kiếm tour và lưu kết quả
    $kq_find = $ctrl_find->find_Tour($tentour, $ngaydi, $ngayve, $sokhach);

    if ($kq_find && $kq_find->num_rows > 0) { 
        while ($row = $kq_find->fetch_assoc()) {
            // Hiển thị kết quả tìm kiếm
?>
        <div class="box">
            <div class="image">
                <img src="img/<?php echo $row["HINH_ANH"] ?>" alt="" width="500px" height="300px">
            </div>
            <div class="content">
                <h3><a href="index.php?pid=5&matour=<?php echo $row["MA_TOUR"] ?>"><?php echo $row["TEN_TOUR"] ?></a></h3>
                <p><?php echo $row["NOI_DUNG"] ?></p>
                <h4><?php echo $ctrl_package->get_Money($row["GIA_TIEN"]) ?> <?php echo $row["DONVI"] ?></h4>
            </div>
            <div class="book-now">
                <form action="index.php?pid=4" method="post">
                    <input type="hidden" name="matour" value="<?php echo $row['MA_TOUR']; ?>">
                    <input type="hidden" name="tentour" value="<?php echo $row['TEN_TOUR']; ?>">
                    <input type="hidden" name="giatien" value="<?php echo $row['GIA_TIEN']; ?>">
                    <input type="submit" class="btn" value="book ngay">
                </form>
            </div>
        </div>
<?php
        }
    } else {
        // Hiển thị thông báo khi không có kết quả tìm kiếm
?>
        <p style="font-size: 24px; text-align: center; padding-bottom: 2rem; color: #000;">Không có kết quả tìm kiếm! <br> <a href="index.php?pid=6">Tìm kiếm lại</a></p>
<?php
    }
?>