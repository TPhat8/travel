<?php 
    include_once("control/ctrl_frm.php");
    $ctrl_loaitour = new ctrl_frm();
    $kq = $ctrl_loaitour->get_TenLoaiTour();

    
        while ($row = $kq->fetch_assoc()) 
        {?>

            <li><a href="index.php?pid=2&loaitour=<?php echo $row["MA_LOAITOUR"] ?>"><?php echo $row["TEN_LOAI_TOUR"] ?></a></li>

        <?php
        }
        ?>