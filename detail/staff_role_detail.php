<?php
include_once("control/ctrl_frm.php");

$ctrl_staff_role = new ctrl_frm();
$kq = $ctrl_staff_role->get_ChucVu();

while ($row = $kq->fetch_assoc()) {
    if (isset($chucvu) && $row["MA_CHUCVU"] == $chucvu) {
        $selected = "selected";
    } else {
        $selected = "";
    }
    
    echo "<option value='" . $row["MA_CHUCVU"] . "' " . $selected . ">" . $row["TEN_CHUCVU"] . "</option>";
}
?>