<div class="cards">
    <!-- dashboard_card -->
    <?php include 'detail/dashboard_card.php' ?>
</div>

<div class="recent-grid">
    <div class="projects">
        <div class="card">
            <div class="card-header">
                <h3>Tours</h3>

                <a href="admin.php?pid=1">chi tiết <span class="las la-arrow-right"></span></a>
            </div>

            <div class="card-body">
                <div class="table-reponsive">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>Tên Tour</td>
                                <td>Số chỗ còn lại</td>
                                <!-- <td>Đã đặt</td> -->
                            </tr>
                        </thead>
                        <tbody>
                            <!-- dashboard_package -->
                            <?php include 'detail/dashboard_package.php' ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
    </div>

    <div class="customers">
        <div class="card">
            <div class="card-header">
                <h3>Khách hàng</h3>

                <a href="admin.php?pid=5">Chi tiết <span class="las la-arrow-right"></span></a>
            </div>

            <!-- dashboard_customer -->
            <?php include 'detail/dashboard_customer.php' ?>
        </div>
    </div>
</div>