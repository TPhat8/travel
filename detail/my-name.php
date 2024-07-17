<?php 
    include_once("control/ctrl_frm.php");
    $ctrl_customer_name = new ctrl_frm();
    $username = $_SESSION['username'];
    $result = $ctrl_customer_name->get_ThongTin_KhachHang($username);

?>

<?php
    while ($row = $result->fetch_assoc()) {
?>
    <div class="img"><img src="img/<?php echo $row["ANH_PROFILE"] ?>" alt=""></div>
    <div class="name">
        <h4><?php echo $row["HO_TEN"] ?></h4>
        <p><?php echo $row["NGAY_SINH"] ?></p>
    </div>
        
<?php
    }
?>