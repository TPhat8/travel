<div class="container">
    <div class="container-title">
        <h1>Khách hàng</h1>
    </div>

    <!-- add button -->
    <div class="add-btn">
        <a href="admin.php?pid=11.php">Thêm khách hàng</a>
    </div>

    <!-- management table -->
    <div class="management-table">
        <table width="100%">
            <thead>
                <tr>
                    <td>Mã KH</td>
                    <td>Họ tên</td>
                    <td>Ngày sinh</td>
                    <td>Giới tính</td>
                    <td>SDT</td>
                    <td>Email</td>
                    <td>Quốc tịch</td>
                </tr>
            </thead>
            
            <tbody>
                <!-- customer_detail.php -->
                <?php include 'detail/customers_detail.php' ?>
            </tbody>
        </table>
    </div>     
</div>