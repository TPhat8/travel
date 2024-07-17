<?php 
include("control/ctrl_frm.php");
$ctrl_dash_pack = new ctrl_frm();
$result = $ctrl_dash_pack->get_dashTour();

if ($result->num_rows > 0) { // Kiểm tra xem có kết quả trả về hay không
    while ($row = $result->fetch_assoc()) { ?>

        <tr>
            <td><?php echo $row["TEN_TOUR"] ?></td>
            <td>
                <span class="status green"></span>
                <?php echo $row["SO_CHO"] ?>
            </td>
        </tr>

<?php
    }
}
?>