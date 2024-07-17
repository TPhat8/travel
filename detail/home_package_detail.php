<?php
    include_once("control/ctrl_frm.php");
    $ctrl_home_package = new ctrl_frm();
    $kq = $ctrl_home_package->get_TourHot();

    // Biến đếm 
    $cnt = 0;

    while ($row = $kq->fetch_assoc()) {?>   
        <div class="box">
            <div class="image">
                <img src="img/<?php echo $row["HINH_ANH"] ?>" alt="" width="500px" height="300px">
            </div>
            <div class="content">
                <h3><a href="index.php?pid=5&matour=<?php echo $row["MA_TOUR"] ?>"><?php echo $row["TEN_TOUR"] ?></a></h3>
            </div>
            <div class="book-now">
                <h4><?php echo $ctrl_home_package->get_Money($row["GIA_TIEN"]) ?> <?php echo $row["DONVI"] ?></h4>
                <form action="index.php?pid=4" method="post">
                    <input type="hidden" name="matour" value="<?php echo $row['MA_TOUR']; ?>">
                    <input type="hidden" name="tentour" value="<?php echo $row['TEN_TOUR']; ?>">
                    <input type="hidden" name="giatien" value="<?php echo $row['GIA_TIEN']; ?>">
                    <input type="submit" class="btn" value="book ngay">
                </form>
            </div>
        </div>
    
    <?php
        // Nếu cnt >= 3 thì thoát, mục đích là để chỉ lấy ra 3 tour đầu tiên trong bảng TOUR
        $cnt++;
        if ($cnt >= 3) break;
    }
?>