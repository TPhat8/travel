<?php 
    include_once("control/ctrl_frm.php");
    $madiemden = $_GET["madiemden"];
    $ctrl_diemden = new ctrl_frm();
    $kq_diemden = $ctrl_diemden->get_Destination($madiemden);

    while($row = $kq_diemden->fetch_assoc()) 
    {?>
        <div class="destination-detail-box">
            <div class="image">
                <img src="img/<?php echo $row["HINH_ANH"]  ?>" alt="" width="800px" height="auto">
            </div>

            <div class="content">
                <h3><?php echo $row["TEN_DIADANH_TN"] ?></h3>
                <div class="review">
                    <p><?php echo $row["MO_TA"] ?></p>
                </div>
            </div>           
        </div>
    <?php
    }
?>