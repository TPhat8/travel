<?php
    include_once("control/ctrl_frm.php");

    $ctrl_Tinh = new ctrl_frm();
    $kq = $ctrl_Tinh->get_TinhTP_di();

    while ($row = $kq->fetch_assoc()) {
        if (isset($tinhdi) && $row["MA_TINH"] == $tinhdi) {
            $selected = "selected";
        } else {
            $selected = "";
        }
        
        echo "<option value='" . $row["MA_TINH"] . "' " . $selected . ">" . $row["TEN_TINH"] . "</option>";
    }
?>