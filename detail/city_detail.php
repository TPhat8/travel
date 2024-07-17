<?php
    include_once("control/ctrl_frm.php");

    $ctrl_city = new ctrl_frm();
    $kq = $ctrl_city->get_City();

    while ($row = $kq->fetch_assoc()) {?>   

        <option value="<?php echo $row["MA_TINH"] ?>"><?php echo $row["TEN_TINH"] ?></option>
    
    <?php 
    } ?>
