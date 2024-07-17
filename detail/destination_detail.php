<?php
    include_once("control/ctrl_frm.php");
    $ctrl_destination = new ctrl_frm();
    $kq = $ctrl_destination->get_Diadanh_Trongnuoc();

    $totalItems = $kq->num_rows; // Tổng số mục
    $totalPages = ceil($totalItems / $itemsPerPage); // Tổng số trang
    $startIndex = ($currentPage - 1) * $itemsPerPage; // Chỉ số bắt đầu của mục trên trang hiện tại
    $kq->data_seek($startIndex); // Di chuyển con trỏ đến chỉ số bắt đầu

    $count = 0; // Biến đếm số mục đã hiển thị
    while ($row = $kq->fetch_assoc()) {
        $count++;
        if ($count > $itemsPerPage) {
            break; // Thoát vòng lặp nếu đã hiển thị đủ số mục trên trang hiện tại
        }
    ?>
        <div class="box">
            <div class="image">
                <img src="img/<?php echo $row["HINH_ANH"]; ?>" alt="" width="600px" height="522px">
            </div>
            <div class="content">
                <h3><a href="index.php?pid=10&madiemden=<?php echo $row["MA_DIADANH_TN"]; ?>"><?php echo $row["TEN_DIADANH_TN"]; ?></a></h3>
                <a href="index.php?pid=10&madiemden=<?php echo $row["MA_DIADANH_TN"]; ?>" class="btn">xem ngay</a>
            </div>
        </div>
    <?php
    }
    ?>

<?php
    function generatePaginationLinks($currentPage, $totalPages, $destinationPage)
    {
        $links = '';

        if ($totalPages > 1) {
            if ($currentPage > 1) {
                $links .= '<a href="javascript:changePageDD(' . ($currentPage - 1) . ')"><i class="bx bx-left-arrow-alt"></i></a>';
            }

            for ($i = 1; $i <= $totalPages; $i++) {
                if ($i == $currentPage) {
                    $links .= '<b class="current-page">' . $i . '</b>';
                } else {
                    $links .= '<a href="javascript:changePageDD(' . $i . ')">' . $i . '</a>';
                }
            }

            if ($currentPage < $totalPages) {
                $links .= '<a href="javascript:changePageDD(' . ($currentPage + 1) . ')"><i class="bx bx-right-arrow-alt"></i></a>';
            }
        }

        return $links;
    }
?>