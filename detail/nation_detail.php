<?php
    include_once("control/ctrl_frm.php");

    $ctrl_nation = new ctrl_frm();
    $kq = $ctrl_nation->get_Nation();

    while ($row = $kq->fetch_assoc()) {
        if (isset($quocgia) && $row["MA_QUOCGIA"] == $quocgia) {
            $selected = "selected";
        } else {
            $selected = "";
        }
        
        echo "<option value='" . $row["MA_QUOCGIA"] . "' " . $selected . ">" . $row["TEN_QUOCGIA"] . "</option>";
    }
?>