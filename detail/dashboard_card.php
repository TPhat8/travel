<?php include("dashboard_card_config.php"); ?>

    <div class="card-single">
        <div>
            <h1><?php echo $row_khachhang["TONG_SO_KHACHHANG"]; ?></h1>
            <span><a href="./admin.php?pid=5">Khách hàng</a></span>
        </div>
        <div>
            <span class="las la-users"></span>
        </div>
    </div>

    <div class="card-single">
        <div>
            <h1><?php echo $row_tour["TONG_SO_TOUR"]; ?></h1>
            <span><a href="./admin.php?pid=1">Tours</a></span>
        </div>
        <div>
            <span class="las la-clipboard"></span>
        </div>
    </div>

    <div class="card-single">
        <div>
            <h1><?php echo $row_dattour["TONG_SO_DATTOUR"]; ?></h1>
            <span><a href="./admin.php?pid=2">Books</a></span>
        </div>
        <div>
            <span class="las la-shopping-bag"></span>
        </div>
    </div>

    <div class="card-single">
        <div>
            <h1><?php echo get_Money($row_doanhthu["DOANH_THU"]); ?></h1>
            <span style="font-size: 1rem;">Doanh số (đồng)</span>
        </div>
    </div>