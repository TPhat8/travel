<?php 
    include_once("control/ctrl_frm.php");
    $ctrl_customer = new ctrl_frm();
    $result = $ctrl_customer->get_KhachHangMoi();

    $i=0;

    while ($row = $result->fetch_assoc()) {?>

    <div class="card-body">
        <div class="customer">
            <div class="info">
                <img src="img/<?php echo $row["ANH_PROFILE"] ?>" alt="" width="40px" height="40px">
                <div>
                    <h4><?php echo $row["HO_TEN"] ?></h4>
                    <small><?php echo $row["NGAY_SINH"] ?></small>
                </div>
            </div>
            <div class="contact">
                <span class="las la-user-circle" title="<?php echo $row["USERNAME"] ?>"></span>
                <span class="las la-comment" title="<?php echo $row["EMAIL"] ?>"></span>
                <span class="las la-phone" title="<?php echo $row["SDT"] ?>"></span>
            </div>
        </div>
    </div>

    <?php
    $i++;
    if ($i >= 6) break;
    }
    ?>