<div class="container">
    <div class="container-title">
        <h1>Danh sách</h1>
    </div>

    <?php 
        $matour = $_POST["matour"];
        $madattour = $_POST["madattour"];
        $tentour = $_POST["tentour"];
        $ngaydi = $_POST["ngaydi"];
        $ngayve = $_POST["ngayve"];
    ?>

    <h2 style="text-align: center; margin-bottom: 0rem; font-size: 2rem;"><?php echo $tentour ?></h2>
    <h3 style="text-align: center; margin-bottom: 2rem; font-size: 1rem;"><?php echo "(".$ngaydi." -> ".$ngayve.")" ?></h3>
    <!-- management table -->
    <div class="management-table">
        <table width="100%" height="auto">
            <thead>
                <tr>
                    <td>STT</td>
                    <td>Họ tên</td>
                    <td>Ngày sinh</td>
                    <td>CCCD</td>
                    <td>Ghi chú</td>
                </tr>
            </thead>
            
            <tbody>
                <!--  list tours_detail -->
                <?php include 'detail/list_booktour_detail.php' ?>
            </tbody>
        </table>
    </div>     
</div>