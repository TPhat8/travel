<?php 
    include_once("control/ctrl_frm.php");
    if (isset($_GET["loaitour"])) 
        $loai = $_GET["loaitour"];

    $ctrl_package = new ctrl_frm();
    if (!isset($loai))
        $kq = $ctrl_package->get_Tour_simple();
    else
        $kq = $ctrl_package->get_LoaiTour($loai);

    $totalItems = $kq->num_rows; // Tổng số mục
    $totalPages = ceil($totalItems / $itemsPerPage); // Tổng số trang
    $startIndex = ($currentPage - 1) * $itemsPerPage; // Chỉ số bắt đầu của mục trên trang hiện tại
    $kq->data_seek($startIndex); // Di chuyển con trỏ đến chỉ số bắt đầu
?>

<?php 
    $count = 0; // Biến đếm số mục đã hiển thị
    while ($row = $kq->fetch_assoc()) {
        $count++;
        if ($count > $itemsPerPage) {
            break; // Thoát vòng lặp nếu đã hiển thị đủ số mục trên trang hiện tại
        }
?>
        <div class="box">
            <div class="image" width="500px" height="300px">
                <img src="img/<?php echo $row["HINH_ANH"] ?>" alt="" width="100%" height="100%">
            </div>
            <div class="content">
                <h3><a href="index.php?pid=5&matour=<?php echo $row["MA_TOUR"] ?>"><?php echo $row["TEN_TOUR"] ?></a></h3>
                <!-- <p><?php echo $row["NOI_DUNG"] ?></p> -->
            </div>
            <div class="book-now">
                <h4><?php echo $ctrl_package->get_Money($row["GIA_TIEN"]) ?> <?php echo $row["DONVI"] ?></h4>
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
?>

<?php
    function generatePaginationLinks($currentPage, $totalPages)
    {
        $links = '';
    
        if ($totalPages > 1) {
            if ($currentPage > 1) {
                $links .= '<a href="javascript:changePage(' . ($currentPage - 1) . ')"><i class="bx bx-left-arrow-alt"></i></a>';
            }
    
            for ($i = 1; $i <= $totalPages; $i++) {
                if ($i == $currentPage) {
                    $links .= '<b class="current-page">' . $i . '</b>';
                } else {
                    $links .= '<a href="javascript:changePage(' . $i . ')">' . $i . '</a>';
                }
            }
    
            if ($currentPage < $totalPages) {
                $links .= '<a href="javascript:changePage(' . ($currentPage + 1) . ')"><i class="bx bx-right-arrow-alt"></i></a>';
            }
        }
    
        return $links;
    }    
?>