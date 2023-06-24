<h1 style="padding-left:440px; margin-top:10px;">Liệt Kê Đơn Hàng</h1>
    <div class="container">
        <!-- Responsive Arrow Progress Bar -->
        <div class="arrow-steps clearfix">
            <div class="step"> <span> <a href="index.php?quanly=giohang" >Giỏ Hàng</a></span> </div>
            <div class="step"> <span><a href="index.php?quanly=vanchuyen" >Vận Chuyển</a></span> </div>
            <div class="step"> <span><a href="index.php?quanly=thongtinthanhtoan" >Thanh Toán</a><span> </div>
            <div class="step current"> <span><a href="index.php?quanly=lichsudonhang" >Lịch Sử Đơn Hàng</a><span> </div>
        </div>
        <!-- end Responsive Arrow Progress Bar -->
    </div>
<?php

    $id_khachhang = $_SESSION['id_khachhang'];
    $sql_lietke_dh = "SELECT * FROM tbl_cart,tbl_dangky WHERE tbl_cart.id_khachhang=tbl_dangky.id_dangky AND tbl_cart.id_khachhang='$id_khachhang' ORDER BY tbl_cart.id_cart DESC";
    $query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);

?>
<table style="width: 100%" style="border: none;">
    <tr style="height:40px;">
        <!-- <th>Id <i class="fas fa-sort-alpha-down-alt"></i></th> -->
        <th>Mã đơn hàng </th>
        <th>Tên khách hàng</th>
        <th>Địa chỉ</th>
        <th>Email </th>
        <th>Số điện thoại </th>
        <th>Tình trạng</th>
        <th>Xem</th>
        <th>Thanh Toán</th>
    </tr>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_dh)) {
        $i++;
        ?>
                <tr>
                    <td style="padding-left:30px"><?php echo $row['code_cart'] ?></td>
                    <td style="padding-left:30px"><?php echo $row['tenkhachhang'] ?></td>
                    <td style="padding-left:30px"><?php echo $row['diachi'] ?></td>
                    <td style="padding-left: 14px;"><?php echo $row['email'] ?></td>
                    <td style="padding-left:18px"><?php echo $row['dienthoai'] ?></td>
                    <td style="padding-left: 37px;">
                        <?php if($row['cart_status']==1){
                            echo '<a href="tinhnangquantri/quanlydonhang/xuly.php?code='.$row['code_cart'].'" style="padding-left: 10px; text-decoration: none; color: black">Chờ Duyệt</a>';
                        }else{
                            echo 'Đã được duyệt <i class="far fa-check-circle"></i>';
                        }
                        ?>
                    </td>
                    <td>
                        <a style="text-decoration: none;color:black; padding-left:20px;" href="index.php?quanly=xemdonhang&code=<?php echo $row['code_cart'] ?>"><i class="far fa-eye"></i></a>
                    </td>
                    <td style="padding-left:30px"><?php echo $row['cart_payment'] ?></td>
                </tr>
        <?php
    }
    ?>
</table>



