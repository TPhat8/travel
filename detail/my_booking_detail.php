<?php 
    include_once("control/ctrl_frm.php");
    $ctrl_my_booking = new ctrl_frm();
    $result = $ctrl_my_booking->get_my_Booking_detail($madattour);

    $i = 0;
?>

<?php
    while ($row = $result->fetch_assoc()) { $i++;
?>

    <tr>
        <td style="font-weight: 600;"><?php echo $i; ?></td>
        <td><?php echo $row["HO_TEN"]; ?></td>
        <td><?php echo $row["NGAY_SINH"]; ?></td>
        <td><?php echo $row["CCCD"]; ?></td>
        <td><?php echo $row["GHI_CHU"]; ?></td>
    </tr>

<?php
    }
?>