<h1 style="padding-left:440px; margin-top:10px;">Chi Tiết Mua Hàng</h1>
<?php
$code = $_GET['code'];
	$sql_lietke_dh = "SELECT * FROM tbl_cart_details,tbl_sanpham WHERE tbl_cart_details.id_sanpham=tbl_sanpham.id_sanpham AND tbl_cart_details.code_cart='".$code."' ORDER BY tbl_cart_details.id_cart_details DESC";
	$query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
?>
<table style="width: 100%">
	<tr>
		<th>Id <i class="fas fa-sort-alpha-down-alt"></i></th>
		<th>Mã đơn hàng <i class="far fa-file-code"></i></th>
		<th>Tên sản phẩm <i class="fas fa-file-signature"></i></th>
		<th>Số Lượng <i class="fas fa-sort-amount-up"></i></th>
		<th>Đơn giá <i class="fas fa-dollar-sign"></i></th>
		<th>Thành tiền <i class="fas fa-dollar-sign"></i></th>
	</tr>
	<?php
	$i = 0;
	$tongtien = 0;
	while($row = mysqli_fetch_array($query_lietke_dh)){
		$i++;
		$thanhtien = $row['giasp']*$row['soluongmua'];
		$tongtien += $thanhtien;
	?>
	<tr>
		<td style="padding-left:64px"><?php echo $i ?></td>
		<td style="padding-left:64px"><?php echo $row['code_cart'] ?></td>
		<td style="padding-left:64px"><?php echo $row['tensanpham'] ?></td>
		<td style="padding-left:64px"><?php echo $row['soluongmua'] ?></td>
		<td style="padding-left:64px"><?php echo number_format($row['giasp'],0,',','.').'vnđ' ?></td>
		<td style="padding-left:64px"><?php echo number_format($thanhtien,0,',','.').'vnđ' ?></td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td colspan="6">
			<p>Tổng Tiền : <?php echo number_format($tongtien,0,',','.').'vnđ' ?></p>
		</td>
	</tr>
</table>