<?php
	$sql_sua_sp = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$_GET[idsanpham]' LIMIT 1";
	$query_sua_sp = mysqli_query($mysqli,$sql_sua_sp);
?>
<p>Sửa sản phẩm</p>
<table border="1" width="100%" style="border-collapse: collapse;border: none;">
<?php
while ($row = mysqli_fetch_array($query_sua_sp)) {
	# code...
?>
<form method="POST" action="tinhnangquantri/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>" enctype="multipart/form-data">
		<tr>
			<td>Tên sản phẩm <i class="fas fa-file-signature"></i></td>
			<td><input type="text" value="<?php echo $row['tensanpham'] ?>" name="tensanpham"></td>
		</tr>
		<tr>
			<td>Mã sp <i class="far fa-file-code"></i></td>
			<td><input type="text" value="<?php echo $row['masp'] ?>" name="masp"></td>
		</tr>
		<tr>
			<td>Giá sp <i class="fas fa-dollar-sign"></i></td>
			<td><input type="text" value="<?php echo $row['giasp'] ?>" name="giasp"></td>
		</tr>
		<tr>
			<td>Số Lượng Thêm <i class="fas fa-sort-amount-up"></i></td>
			<td><input type="text" value="<?php echo $row['soluong'] ?>" name="soluong"></td>
		</tr>
		<tr>
			<td>Hình ảnh <i class="far fa-image"></i></td>
			<td>
				<input type="file" name="hinhanh">
				<img src="tinhnangquantri/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="150px">

			</td>

		</tr>
			<tr>
			<td>Tóm tắt <i class="far fa-list-alt"></i></td>
			<td><textarea rows="10" name="tomtat" style="resize: none"><?php echo $row['tomtat'] ?></textarea></td>
		</tr>
		<tr>
			<td>Nội dung <i class="fas fa-file-signature"></i></td>
			<td><textarea rows="10" name="noidung" style="resize: none"><?php echo $row['noidung'] ?></textarea></td>
		</tr>
		<tr>
			<td>Tác Giả <i class="fas fa-file-signature"></i></td>
			<td><textarea rows="10" name="tacgia" style="resize: none"><?php echo $row['tacgia'] ?></textarea></td>
		</tr>
		<tr>
			<td>Danh mục sản phẩm <i class="fas fa-list-ol"></i></td>
			<td>
				<select name="danhmuc">
					<?php
					$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
					$query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
					while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
						if($row_danhmuc['id_danhmuc']==$row['id_danhmuc']){

					?>
					<option selected value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
					<?php
						}else{
					?>
					<option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
					<?php		
						}
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Tình trạng <i class="fas fa-battery-three-quarters"></i></td>
			<td>
				<select name="tinhtrang">
					<?php
					if ($row['tinhtrang']==1) {
					?>
					<option value="1" selected>Nguyên Seal Fullbox</option>
					<option value="0">Đã Unbox</option>
					<?php
				}else{
				?>
				<option value="1">Nguyên Seal Fullbox</option>
				<option value="0" selected>Đã Unbox</option>
				<?php
				}
				?>

				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="suasanpham" value="Sửa sản phẩm"></td>
		</tr>
</form>
<?php
}
?>

</table>
