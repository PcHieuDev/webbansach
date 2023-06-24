<?php
$sql_lietke_sp = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY id_sanpham DESC";
$query_lietke_sp = mysqli_query($mysqli,$sql_lietke_sp);
?>
<p>Liệt kê sản phẩm</p>
<table style="width: 100%" border="1" style="border-collapse: collapse;">
	<tr>
		<th>Id <i class="fas fa-sort-alpha-down-alt"></i></th>
		<th>Tên sản phẩm <i class="fas fa-file-signature"></i></th>
		<th style="border-radius: 10px;">Hình ảnh <i class="far fa-image"></i></th>
		<th>Giá sp <i class="fas fa-dollar-sign"></i></th>
		<th>Số lượng Trong Kho <i class="fas fa-sort-amount-up"></i></th>
		<th>Danh mục <i class="fas fa-list-ol"></i></th>
		<th>Mã sp <i class="far fa-file-code"></i></th>
		<th>Tóm Tắt <i class="far fa-list-alt"></i></th>
		<th>Tác Giả <i class="far fa-list-alt"></i></th>
		<th>Trạng thái <i class="fas fa-battery-three-quarters"></i></th>
		<th>Quản lí <i class="fas fa-wrench"></i></th>

	</tr>
	<?php
	$i = 0;
	while($row = mysqli_fetch_array($query_lietke_sp)){
		$i++;
		?>
		<tr>
			<td><?php echo $i ?></td>
			<td><?php echo $row['tensanpham']?></td>
			<td><img src="tinhnangquantri/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="150px"></td>
			<td><?php echo $row['giasp']?></td>
			<td><?php echo $row['soluong']?></td>
			<td><?php echo $row['tendanhmuc']?></td>
			<td><?php echo $row['masp']?></td>
			<td><?php echo $row['tomtat']?></td>
			<td><?php echo $row['tacgia']?></td>
			<td><?php if($row['tinhtrang']==1){
				echo 'Nguyên Seal FullBox';

			}else{
				echo 'Đã Unbox';

			} 
			?>
			
		</td>
		<td>
			<a href="tinhnangquantri/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>"><i style="padding-left: 30px;" class="fas fa-trash"></i></a> | <a href="?action=quanlysp&query=sua&idsanpham=<?php echo $row['id_sanpham'] ?>"><i class="fas fa-wrench"></i></a>
		</td>
	</tr>
	<?php
}
?>
</table>