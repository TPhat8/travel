<div class="container">
    <div class="container-title">
        <h1>Nhân viên</h1>
    </div>

    <!-- add button -->
    <div class="add-btn">
        <a href="admin.php?pid=9.php">Thêm nhân viên</a>
    </div>

    <!-- management table -->
    <div class="management-table">
        <table width="100%">
            <thead>
                <tr>
                    <td>Mã NV</td>
                    <td>Họ tên</td>
                    <td>Ngày sinh</td>
                    <td>Giới tính</td>
                    <td>SDT</td>
                    <td>Email</td>
                    <td>Chức vụ</td>
                    <td>Địa chỉ</td>
                </tr>
            </thead>
            
            <tbody>
                <!-- detail/staff_detail.php -->
                <?php include 'detail/staff_detail.php' ?>
            </tbody>
        </table>
    </div>     
</div>