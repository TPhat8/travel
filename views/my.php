<div class="my">
    <div class="sidebar-my">
        <div class="info-my">
            <?php include 'detail/my-name.php' ?>
        </div>
        <div class="detail">
            <ul>
                <li><a href="index.php?pid=9&myid=0"><i class='bx bxs-user'></i> Thông tin cá nhân</a></li>
                <li><a href="index.php?pid=9&myid=1"><i class='bx bx-detail'></i> Tour đã đặt</a></li>
            </ul>
        </div>
    </div>

    <?php 
        if (!isset($_GET["myid"])) 
        {
            include 'views/my-info.php';
        } 
        else 
        {
            $myid = intval($_GET["myid"]);
            switch($myid) {
                case 0:
                    include 'views/my-info.php';
                    break;
                case 1:
                    include 'views/my-booking.php';
                    break;
                case 2:
                    include 'views/my-booktour_detail.php';
                    break;
                case 3:
                    include 'views/my-update-info.php';
                    break;
            }
        }
    ?>
</div>