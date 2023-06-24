<p>Liệt kê đơn hàng</p>
<?php
	$sql_lietke_dh = "SELECT * FROM tbl_cart,tbl_dangky WHERE tbl_cart.id_khachhang=tbl_dangky.id_dangky ORDER BY id_cart DESC";
	$query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
?>

<table style="width: 100%" border="1" style="border-collapse: collapse;border: none;">
	<tr>
		<th>Id <i class="fas fa-sort-alpha-down-alt"></i></th>
		
		<th>Mã đơn hàng <i class="far fa-file-code"></i></th>
		<th>Tên khách hàng <i class="far fa-user"></i></th>
		<th>Địa chỉ <i class="fas fa-map-marker-alt"></i></th>
		<th>Email <i class="far fa-envelope"></i></th>
		<th>Số điện thoại <i class="fas fa-phone"></i></th>
		<th>Duyệt Đơn <i class="fas fa-battery-three-quarters"></i></th>
		<th>Quản lí <i class="fas fa-wrench"></i></th>
	</tr>
	<?php
	$i = 0;
	while($row = mysqli_fetch_array($query_lietke_dh)){
		$i++;
	?>
	<tr>
		<td><?php echo $i ?></td>
		<td><?php echo $row['code_cart'] ?></td>
	
		<td><?php echo $row['tenkhachhang'] ?></td>
		<td><?php echo $row['diachi'] ?></td>
		<td><?php echo $row['email'] ?></td>
		<td><?php echo $row['dienthoai'] ?></td>
		<td>
			<?php if($row['cart_status']==1){
				echo '<a href="tinhnangquantri/quanlydonhang/xuly.php?code='.$row['code_cart'].'">Click Để Duyệt Đơn Hàng <i class="fas fa-mouse-pointer"></i></a>';
			}else{
				echo 'Đã Duyệt Đơn Hàng <i class="far fa-check-circle"></i>';
			}
			?>
		</td>
		<td>
			<a href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['code_cart'] ?>">Xem đơn hàng <i class="far fa-eye"></i></a>
		</td>
	</tr>
	<?php
	}
	?>
</table>