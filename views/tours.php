<div class="container">
    <div class="container-title">
        <h1>Tours</h1>
    </div>

    <!-- add button -->
    <div class="add-btn">
        <a href="admin.php?pid=7.php" role="button" class="btn-add">Thêm tour</a>
    </div>
    

    <!-- management table -->
    <div class="management-table">
        <table width="100%" height="auto">
            <thead>
                <tr>
                    <td>Mã Tour</td>
                    <td>Tên Tour</td>
                    <td>Nơi đến</td>
                    <td>Quốc gia đến</td>
                    <td>Số ngày</td>
                    <td>Số đêm</td>
                    <td>Số chỗ</td>
                    <td>Giá tiền</td>
                    <td>Đơn vị</td>
                </tr>
            </thead>
            
            <tbody>
                <!--  tours_detail -->
                <?php include 'detail/tours_detail.php' ?>
            </tbody>
        </table>
    </div>     
</div>