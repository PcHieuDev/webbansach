<style>
    .center {
        text-align: center;
        margin: 10px;
    }
</style>

<h1 class="center">Thông tin thanh toán</h1>


<div class="container">
    <?php
    if(isset($_SESSION['id_khachhang'])){
    ?>
  <!-- Responsive Arrow Progress Bar -->
  <div class="arrow-steps clearfix">
     <div class="step done"> <span> <a href="index.php?quanly=giohang" >Giỏ Hàng</a></span> </div>
    <div class="step done"> <span><a href="index.php?quanly=vanchuyen" >Vận Chuyển</a></span> </div>
    <div class="step current"> <span><a href="index.php?quanly=thongtinthanhtoan" >Thanh Toán</a><span> </div>
    <div class="step"> <span><a href="index.php?quanly=lichsudonhang" >Lịch Sử Đơn Hàng</a><span> </div>
  </div>
    <?php
    }
    ?>

<form action="cacthanhphantrang/chucnang/xulythanhtoan.php" method="POST">
 <div class="row">
  
  <!-- --><?php /*
                     $id_dangky = $_SESSION['id_khachhang'];
                    $sql_get_vanchuyen = mysqli_query($mysqli,"SELECT * FROM tbl_shipping WHERE id_dangky= '$id_dangky' LIMIT 1");
                    $sql_get_email = mysqli_query($mysqli,"SELECT email FROM tbl_dangky WHERE id_dangky= '$id_dangky' LIMIT 1");
                    $count = mysqli_num_rows($sql_get_vanchuyen);
                    if($count>0){
                        $row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
                        $name = $row_get_vanchuyen['name'];
                        $phone = $row_get_vanchuyen['phone'];
                        $address = $row_get_vanchuyen['address'];
                        $note = $row_get_vanchuyen['note'];
                       
                    }else{
                        $name = '';
                        $phone = '';
                        $address = '';
                        $note = '';
                    }
                    $row_get_email = mysqli_fetch_array($sql_get_email);
                    $email = $row_get_email['email'];
                    */?>
     <?php
     $id_dangky = $_SESSION['id_khachhang'];
     $sql_get_vanchuyen = mysqli_query($mysqli,"SELECT * FROM tbl_shipping WHERE id_dangky = '$id_dangky' LIMIT 1");

     $name = '';
     $phone = '';
     $address = '';
     $note = '';

     if(mysqli_num_rows($sql_get_vanchuyen) > 0){
         $row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
         $name = $row_get_vanchuyen['name'];
         $phone = $row_get_vanchuyen['phone'];
         $address = $row_get_vanchuyen['address'];
         $note = $row_get_vanchuyen['note'];
     }

     $email = '';
     $sql_get_email = mysqli_query($mysqli,"SELECT email FROM tbl_dangky WHERE id_dangky = '$id_dangky' LIMIT 1");
     if(mysqli_num_rows($sql_get_email) > 0){
         $row_get_email = mysqli_fetch_array($sql_get_email);
         $email = $row_get_email['email'];
     }
     ?>
     <div class="col-md-8">
        <h4>Thông Tin Khách Hàng</h4>
        <ul style="padding-left:15px; margin:10px;">
          <li style="list-style: none;margin:3px;";>Họ Tên Người Nhận : <b><?php echo $name ?></b></li>
          <li style="list-style: none;margin:3px;";>Số Điện Thoại Người Nhận : <b><?php echo $phone ?></b></li>
          <li style="list-style: none;margin:3px;";>Địa Chỉ Người Nhận : <b><?php echo $address ?></b></li>
          <li style="list-style: none;margin:3px;";>Ghi Chú Riêng : <b><?php echo $note ?></b></li>
         <!-- <li style="list-style: none;margin:3px;";>Mail : <b><?php /*echo  $_SESSION['emailDh'] */?></b></li>-->
            <?php if (isset($_SESSION['emailDh'])): ?>
                <li style="list-style: none;margin:3px;">Mail : <b><?php echo $_SESSION['emailDh']; ?></b></li>
            <?php else: ?>
                Mail: <li style="list-style: none;margin:3px;font-weight:bold;">Mail đã đky</li>
            <?php endif; ?>

        </ul>
          <div class="col-md-4">
        <h4>Phương thức thanh toán</h4>
        <div class="form_check" style="padding-left:15px; margin:20px;">
          <input class="form-check-input" type="radio" name="payment" id="exampleRadios1" value="tienmat" checked>
          <img src="image/tienmat.jpg" height="60" width="60">
          <label class="form-check-label" for="exampleRadios1">
            Ship Cod
          </label>
        </div>
              <div class="form_check" style="padding-left:15px; margin:20px;">
                  <input class="form-check-input" type="radio" name="payment" id="exampleRadios3" value="chuyenkhoan" >
                  <img src="image/banking.jpg" height="60" width="60">
                  <label class="form-check-label" for="exampleRadios3">
                      Chuyển Khoản
                  </label>
         </div>
              <div class="form_check" style="padding-left:15px; margin:20px;">
                  <input class="form-check-input" type="radio" name="payment" id="exampleRadios3" value="than" >
                  <img src="image/than.jpg" height="60" width="60">
                  <label class="form-check-label" for="exampleRadios3">
                     Một Quả Thận
                  </label>
         </div>
  </div>
    <input  type="submit" value="Thanh Toán Ngay" name="redirect">
</form>
</div>
        <table style="width: 100%; text-align:center;border-collapse: collapse;">
  <tr>
    <th>Id <i class="fas fa-id-badge"></i></th>
    <th>Mã sản phẩm <i class="far fa-file-code"></i></th>
    <th>Tên <i class="fas fa-file-signature"></i></th>
    <th>Hình ảnh <i class="far fa-image"></i></th>
    <th>Số lượng <i class="fas fa-sort-amount-up"></i></th>
    <th>Giá <i class="fas fa-dollar-sign"></i></th>
    <th>Thành tiền <i class="fas fa-money-bill-wave"></i></th>
  </tr>

            <?php
  if(isset($_SESSION['cart'])){
    $i = 0;
    $tongtien = 0;
    foreach($_SESSION['cart'] as $cart_item){
      $thanhtien = $cart_item['soluong']*$cart_item['giasp'];
      $tongtien+=$thanhtien;
      $i++;
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $cart_item['masp']; ?></td>
        <td><?php echo $cart_item['tensanpham']; ?></td>
        <td><img src="trangquantri/tinhnangquantri/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>"width="150px" ></td>
        <td>

          <a href="cacthanhphantrang/chucnang/themgiohang.php?cong=<?php echo $cart_item['id'] ?>"><i class="fas fa-plus fa-style"></i></a>
          <?php echo $cart_item['soluong']; ?>
          <a href="cacthanhphantrang/chucnang/themgiohang.php?tru=<?php echo $cart_item['id'] ?>"><i class="fas fa-minus fa-style"></i></a>

        </td>
        <td><?php echo number_format($cart_item['giasp'],0,',','.').'vnđ'; ?></td>
        <td><?php echo number_format($thanhtien,0,',','.').'vnđ' ?></td>
      </tr>
      <?php
    }
    ?>
    <tr>
      <td colspan="8"><p  class="fas fa-dollar-sign" style="float: left; padding-left: 20px;"> Tổng tiền thanh toán: <?php echo number_format($tongtien,0,',','.').'vnđ' ?></p>
       <p style=" text-decoration: none;"><a style=" text-decoration: none; font-weight: bold;" href="index.php?quanly=lichsudonhang">Lịch Sử Mua Hàng </a><i class="fas fa-shopping-bag"></i></p>
        <div style="clear: both;"></div>
      </td>
    </tr>
    <?php
  }else{
    ?>
    <tr>
      <td colspan="8"><p>Hiện tại giỏ hàng trống trơn như túi tiền của bạn<i class="far fa-angry"></i></td>
    </tr>
    <?php
  }
  ?>
</table>
   </div>
</table>
</div>
