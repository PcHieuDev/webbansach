<?php
	$sql_lietke_danhmucsp = "SELECT * FROM tbl_danhmuc ORDER BY thutu DESC";
	$query_lietke_danhmucsp = mysqli_query($mysqli,$sql_lietke_danhmucsp);
?>
<p>Danh mục,hãng sản phẩm</p>
<table style="width: 100%"; style="border-collapse: collapse;border: none;background-color: gray; border-radius: 10px;">
	<tr>
		<th style="padding-right: 200px;">Id <i class="fas fa-sort-alpha-down-alt"></i></th>
		<th style="padding-right: 200px;">Tên danh mục <i class="fas fa-file-signature"></i></th>
		<th style="padding-right: 200px;">Quản lí <i class="fas fa-wrench"></i></th>
	</tr>
	<?php
	$i = 0;
	while($row = mysqli_fetch_array($query_lietke_danhmucsp)){
		$i++;
	?>
	<tr>
		<td style="padding-left: 75px;"><?php echo $i ?></td>
		<td style="padding-left: 115px;"><?php echo $row['tendanhmuc']?></td>
		<td>
			<a href="tinhnangquantri/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>"><i style="padding-left: 90px;" class="fas fa-trash"></i></a></a> | <a href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc'] ?>"><i class="fas fa-wrench"></i></a>
		</td>
	</tr>
	<?php
	}
	?>
</table>