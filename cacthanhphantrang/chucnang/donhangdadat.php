<h1>CHi tiết đơn hàng đã đặt</h1>

<div class="container">
    <?php
    if(isset($_SESSION['id_khachhang'])){
    ?>
  <!-- Responsive Arrow Progress Bar -->
  <div class="arrow-steps clearfix">
     <div class="step done"> <span> <a href="index.php?quanly=giohang" >Giỏ Hàng</a></span> </div>
    <div class="step done"> <span><a href="index.php?quanly=vanchuyen" >Vận Chuyển</a></span> </div>
    <div class="step done"> <span><a href="index.php?quanly=thongtinthanhtoan" >Thanh Toán</a><span> </div>
    <div class="step current"> <span><a href="index.php?quanly=donhangdadat" >Lịch Sử Đơn Hàng</a><span> </div>
  
  </div>
  <!-- end Responsive Arrow Progress Bar -->
    <?php
    }
    ?>
</div>