<?php
    include_once("control/ctrl_frm.php");

    $ctrl_Type_Tour = new ctrl_frm();
    $kq = $ctrl_Type_Tour->get_TypeTour();

    while ($row = $kq->fetch_assoc()) {
        if (isset($maloaitour) && $row["MA_LOAITOUR"] == $maloaitour) {
            $selected = "selected";
        } else {
            $selected = "";
        }
        
        echo "<option value='" . $row["MA_LOAITOUR"] . "' " . $selected . ">" . $row["TEN_LOAI_TOUR"] . "</option>";
    }
?>