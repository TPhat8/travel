<?php
    include_once("control/ctrl_frm.php");

    $ctrl_staff = new ctrl_frm();
    $kq = $ctrl_staff->get_Staff();

    while ($row = $kq->fetch_assoc()) {?>   

        <option value="<?php echo $row["MA_NV"] ?>"><?php echo $row["HO_TEN_NV"] ?></option>
    
    <?php 
    } ?>