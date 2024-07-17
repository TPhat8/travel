<?php 
    include("control/ctrl_frm.php");
    $ctrl_booking_list = new ctrl_frm();
    $result = $ctrl_booking_list->get_List_Customer_Tour($matour);

    $i = 0;

    if ($result->num_rows == 0) { ?>
        <tr>
            <td colspan="5" style="font-size: 1.6rem; font-weight: 600; text-align: center;">Chưa có người đặt!</td>
        </tr>
    <?php } else {

    while ($row = $result->fetch_assoc()) { $i++;
?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row["HO_TEN"] ?></td>
        <td><?php echo $row["NGAY_SINH"] ?></td>
        <td><?php echo $row["CCCD"] ?></td>
        <td><?php echo $row["GHI_CHU"] ?></td>
    </tr>

<?php
    } }
?>