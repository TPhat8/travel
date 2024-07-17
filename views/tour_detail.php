<?php 
    include_once("control/ctrl_frm.php");
    $matour = $_GET["matour"];
    $ctrl_tour = new ctrl_frm();
    $kq = $ctrl_tour->get_TourDetail($matour);
    $kq_lichtrinh = $ctrl_tour->get_LichTrinhTour($matour);

    while($row = $kq_lichtrinh->fetch_assoc()) 
    {?>
        <div class="tour-detail-box">
            <div class="image">
                <img src="img/<?php echo $row["HINH_ANH"]  ?>" alt="" width="800px" height="auto">
            </div>

            <div class="content">
                <h3><?php echo $row["TEN_TOUR"] ?></h3>
                <table>
                    <tr>
                        <th>Ngày khởi hành</th>
                        <td><?php echo $row["NGAY_DI"] ?></td>
                    </tr>
                    <tr>
                        <th>Ngày kết thúc</th>
                        <td><?php echo $row["NGAY_VE"] ?></td>
                    </tr>
                    <tr>
                        <th>Thời gian</th>
                        <td><?php echo $row["SO_NGAY"] ?> ngày <?php echo $row["SO_DEM"] ?> đêm</tr>
                    </tr>
                    <tr>
                        <th>Số chỗ còn lại</th>
                        <td><?php if($row["SO_CHO"] <= 0) echo "Hết chỗ"; else echo $row["SO_CHO"]; ?> chỗ</tr>
                    </tr>
                    <tr>
                        <th>Giá tiền</th>
                        <td style="color: red;"><?php echo $ctrl_tour->get_Money($row["GIA_TIEN"]) ?> <?php echo $row["DONVI"] ?></tr>
                    </tr>
                </table>
                <div class="review">
                    <p><?php echo $row["NOI_DUNG"] ?></p>
                </div>

                <div class="book-now">
                    <form action="index.php?pid=4" method="post">
                        <input type="hidden" name="matour" value="<?php echo $row['MA_TOUR']; ?>">
                        <input type="hidden" name="tentour" value="<?php echo $row['TEN_TOUR']; ?>">
                        <input type="hidden" name="giatien" value="<?php echo $row['GIA_TIEN']; ?>">
                        <input type="submit" class="btn" value="book ngay">
                    </form>
                </div>
            </div>           
        </div>
    <?php
    }
?>