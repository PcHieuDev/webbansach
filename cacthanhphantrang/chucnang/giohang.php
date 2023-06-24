<p class="fas fa-shopping-cart"> Giỏ Hàng :
	<?php
	if(isset($_SESSION['dangky'])){
		echo $_SESSION['dangky'];
		
	}
?>
</p>
<?php
if(isset($_SESSION['cart'])){
}
?>
<?php
if(isset($_SESSION['id_khachhang'])){
?>
<div class="container">
  <!-- Responsive Arrow Progress Bar -->
  <div class="arrow-steps clearfix">
     <div class="step current"> <span> <a href="index.php?quanly=giohang" >Giỏ Hàng</a></span> </div>
    <div class="step"> <span><a href="index.php?quanly=vanchuyen" >Vận Chuyển</a></span> </div>
    <div class="step"> <span><a href="index.php?quanly=thongtinthanhtoan" >Thanh Toán</a><span> </div>
    <div class="step"> <span><a href="index.php?quanly=lichsudonhang" >Lịch Sử Đơn Hàng</a><span> </div>
  </div>
  <!-- end Responsive Arrow Progress Bar -->
</div>
<?php
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
		<th>Quản lý <i class="fas fa-wrench"></i></th>
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
				<td><a href="cacthanhphantrang/chucnang/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>"><img class="thungrac" src="image/trash-bin.png" alt=""></a></td>
			</tr>
			<?php
		}
		?>
		<tr>
			<td colspan="8"><p  class="fas fa-dollar-sign" style="float: left; padding-left: 20px;"> Tổng tiền thanh toán: <?php echo number_format($tongtien,0,',','.').'vnđ' ?></p>
				<p style="float: right; padding-right: 30px;"><a href="cacthanhphantrang/chucnang/themgiohang.php?xoatatca=1"><img class="thungrac" src="image/trash-bin.png" alt="">Giỏ hàng</a></p>
				<div style="clear: both;"></div>
				<?php
				if(isset($_SESSION['dangky'])){
					?>
					<p style=" text-decoration: none;"><a style=" text-decoration: none; font-weight: bold;" href="index.php?quanly=vanchuyen">Thông Tin Vận Chuyển </a><i class="fas fa-shopping-bag"></i></p>
				<?php
				}else{
				?>
				<p><a  style=" text-decoration: none; font-weight: bold;" href="dangnhapnguoidung.php">Đăng nhập để đặt hàng đi</a></p>
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