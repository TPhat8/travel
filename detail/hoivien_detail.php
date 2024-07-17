<?php
    include_once("control/ctrl_frm.php");

    $ctrl_hoivien = new ctrl_frm();
    $kq = $ctrl_hoivien->get_HoiVien();

    while ($row = $kq->fetch_assoc()) {?>   

        <option value="<?php echo $row["MA_LOAI_HV"] ?>"><?php echo $row["LOAI_HOI_VIEN"] ?></option>
    
    <?php 
    } ?>
