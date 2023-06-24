  <h1 style="margin-left: 470px;margin-top: 20px;margin-bottom: 10px;">Vận Chuyển</h1>
  <div class="container">
      <?php
      if(isset($_SESSION['id_khachhang'])){
      ?>
    <!-- Responsive Arrow Progress Bar -->
    <div class="arrow-steps clearfix">
       <div class="step done"> <span> <a href="index.php?quanly=giohang" >Giỏ Hàng</a></span> </div>
      <div class="step current"> <span><a href="index.php?quanly=vanchuyen" >Vận Chuyển</a></span> </div>
      <div class="step"> <span><a href="index.php?quanly=thongtinthanhtoan" >Thanh Toán</a><span> </div>
      <div class="step"> <span><a href="index.php?quanly=lichsudonhang" >Lịch Sử Đơn Hàng</a><span> </div>
    </div>
     <?php } ?>
    <h4>Thông Tin Vận Chuyển</h4>
    <?php 
        if(isset($_POST['themvanchuyen'])){
          $name = $_POST['name'];
          $phone = $_POST['phone'];
          $address = $_POST['address'];
          $note = $_POST['note'];
          $id_dangky = $_SESSION['id_khachhang'];
          
          $sql_them_vanchuyen = mysqli_query($mysqli,"INSERT INTO tbl_shipping(name,phone,address,note,id_dangky) VALUES('$name','$phone','$address','$note','$id_dangky')");
          if($sql_them_vanchuyen){
              echo '<script>alert("Thêm vận chuyển thành công")</script>';
          }
        }elseif(isset($_POST['capnhatvanchuyen'])){
              $name = $_POST['name'];
              $phone = $_POST['phone'];
              $address = $_POST['address'];
              $note = $_POST['note'];
              $id_dangky = $_SESSION['id_khachhang'];
                $_SESSION['emailDh'] = $_POST['email'];
          $sql_update_vanchuyen = mysqli_query($mysqli,"UPDATE tbl_shipping set name='$name',phone='$phone',address='$address' ,note='$note' ,id_dangky='$id_dangky' WHERE id_dangky='$id_dangky'");
          if($sql_update_vanchuyen){
              echo '<script>alert("Cập nhật vận chuyển thành công")</script>';
          }
        }
    ?>
                  <form action="" method="POST">
                    <?php 
                     $id_dangky = $_SESSION['id_khachhang'];
                    $sql_get_vanchuyen = mysqli_query($mysqli,"SELECT * FROM tbl_shipping WHERE id_dangky= '$id_dangky' LIMIT 1");
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
                      $sql_get_email = mysqli_query($mysqli,"SELECT * FROM tbl_dangky WHERE id_dangky= '$id_dangky' LIMIT 1");
                      $row_get_email = mysqli_fetch_array($sql_get_email);
                    ?>
                  <table class="dangky" border="1" width="50%" size="50" style="border-collapse: collapse;">
                      <tr>
                          <td>Họ Và Tên <i class="fas fa-user"></i></td>
                          <td><div class="thongtin_dangnhap"><input type="text" size="50" name="name" value="<?php echo $row_get_email['tenkhachhang'] ?>"></div></td>
                      </tr>
                      <tr>
                          <td>Phone <i class="fas fa-envelope"></i></td>
                          <td><div class="thongtin_dangnhap"><input type="text" size="50" name="phone" value="<?php echo $row_get_email['dienthoai'] ?>"></div></td>
                      </tr>
                      <tr>
                          <td>Địa Chỉ <i class="fas fa-map-marker-alt"></i></td>
                          <td><div class="thongtin_dangnhap"><input type="text" size="50" name="address"value="<?php echo $row_get_email['diachi'] ?>"></div></td>

                      </tr>
                          <td>Ghi Chú <i class="fas fa-phone"></i></td>
                          <td><div class="thongtin_dangnhap"><input type="text" size="50" name="note" value=""></div></td>
                      </tr>
                      </tr>
                          <td>Mail <i class="fas fa-phone"></i></td>
                          <td><div class="thongtin_dangnhap"><input type="text" size="50" name="email" value="<?php 
                          if(isset($_SESSION['emailDh'])){
                            echo $_SESSION['emailDh'];
                          }else{
                            echo $row_get_email['email'];
                          }?>"></div></td>
                      </tr>

                      <?php
                      if($name=='' && $phone=='') {
                       ?>
                      <tr>
                          <td colspan="2"><input class="nutinput" type="submit" name="themvanchuyen" value="Thêm Vận Chuyển"></td>
                      </tr>
                    <?php 
                        } elseif($name!='' && $phone!=''){
                    ?>
                     <tr>
                          <td colspan="2"><input class="nutinput" type="submit" name="capnhatvanchuyen" value="Update"></td>
                          </tr>
                    <?php 
                    }
                    ?>
                      </tr>
                  </table>
                  </form>

   
  <?php
  if(isset($_SESSION['cart'])){
    
  }
  ?>
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
      
          <div style="clear: both;"></div>
         <?php
        if(isset($_SESSION['dangky'])){
          ?>
          <p style=" text-decoration: none;"><a style=" text-decoration: none; font-weight: bold;" href="index.php?quanly=thongtinthanhtoan"> Thanh Toán </a><i class="fas fa-shopping-bag"></i></p>
        <?php
        }else{
        ?>
        <p><a  style=" text-decoration: none; font-weight: bold;" href="dangnhapnguoidung.php">Đăng nhập để đặt hàng</a></p>
        <?php 
        }
        ?>
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