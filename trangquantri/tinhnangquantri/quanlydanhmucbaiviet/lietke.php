<?php
	$sql_lietke_danhmucbv = "SELECT * FROM tbl_danhmucbaiviet ORDER BY thutu DESC";
	$query_lietke_danhmucbv = mysqli_query($mysqli,$sql_lietke_danhmucbv);
?>
<p>Liệt kê danh mục bài viết</p>
<table style="width: 100%"; style="border-collapse: collapse;border: none;background-color: gray; border-radius: 10px;">
	<tr>
		<th style="padding-right: 200px;">Id <i class="fas fa-sort-alpha-down-alt"></i></th>
		<th style="padding-right: 200px;">Tên danh mục <i class="fas fa-file-signature"></i></th>
		<th style="padding-right: 200px;">Quản lí <i class="fas fa-wrench"></i></th>
	</tr>
	<?php
	$i = 0;
	while($row = mysqli_fetch_array($query_lietke_danhmucbv)){
		$i++;
	?>
	<tr>
		<td style="padding-left: 75px;"><?php echo $i ?></td>
		<td style="padding-left: 115px;"><?php echo $row['tendanhmuc_baiviet']?></td>
		<td>
			<a href="tinhnangquantri/quanlydanhmucbaiviet/xuly.php?idbaiviet=<?php echo $row['id_baiviet'] ?>"><i style="padding-left: 90px;" class="fas fa-trash"></i></a></a> | <a href="?action=quanlydanhmucbaiviet&query=sua&idbaiviet=<?php echo $row['id_baiviet'] ?>"><i class="fas fa-wrench"></i></a>
		</td>
	</tr>
	<?php
	}
	?>
</table>