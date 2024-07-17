<?php
    include_once("control/ctrl_frm.php");

    $ctrl_nation = new ctrl_frm();
    $kq = $ctrl_nation->get_Nation_to();

    while ($row = $kq->fetch_assoc()) {
        if (isset($quocgiaden) && $row["MA_QUOCGIA"] == $quocgiaden) {
            $selected = "selected";
        } else {
            $selected = "";
        }
        
        echo "<option value='" . $row["MA_QUOCGIA"] . "' " . $selected . ">" . $row["TEN_QUOCGIA"] . "</option>";
    }
?>