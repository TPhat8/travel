<?php
    session_start();
    $adminname = $_SESSION["adminname"];

    include_once("control/ctrl_frm.php");
    $ctrl_staff = new ctrl_frm();
    $kq = $ctrl_staff->get_ThongTin_NhanVien($adminname);

    while ($row = $kq->fetch_assoc()) {?>   

        <img src="img/<?php echo $row["HO_TEN_NV"]; ?>" alt="" width="30px" height="30px">
        <div>
            <h4><?php echo $row["HO_TEN_NV"]; ?></h4>
            <small><?php echo $row["MA_CHUCVU"]; ?></small>
        </div>  
    
    <?php 
    } ?>