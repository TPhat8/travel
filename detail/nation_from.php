<?php
    include_once("control/ctrl_frm.php");

    $ctrl_nation = new ctrl_frm();
    $kq = $ctrl_nation->get_Nation_from();

    while ($row = $kq->fetch_assoc()) {
        if (isset($quocgiadi) && $row["MA_QUOCGIA"] == $quocgiadi) {
            $selected = "selected";
        } else {
            $selected = "";
        }
        
        echo "<option value='" . $row["MA_QUOCGIA"] . "' " . $selected . ">" . $row["TEN_QUOCGIA"] . "</option>";
    }
?>