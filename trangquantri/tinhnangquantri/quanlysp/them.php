<p>Thêm sản phẩm</p>
<table border="1" width="100%" style="border-collapse: collapse;border: none;">
<form method="POST" action="tinhnangquantri/quanlysp/xuly.php" enctype="multipart/form-data">
		<tr>
			<td>Tên sản phẩm <i class="fas fa-file-signature"></i></td>
			<td><input type="text" name="tensanpham"></td>
		</tr>
		<tr>
			<td>Mã sp <i class="far fa-file-code"></i></td>
			<td><input type="text" name="masp"></td>
		</tr>
		<tr>
			<td>Giá sp <i class="fas fa-dollar-sign"></i></td>
			<td><input type="text" name="giasp"></td>
		</tr>
		<tr>
			<td>Số Lượng Thêm <i class="fas fa-sort-amount-up"></i></td>
			<td><input type="text" name="soluong"></td>
		</tr>
		<tr>
			<td>Hình ảnh <i class="far fa-image"></i></td>
			<td><input type="file" name="hinhanh"></td>
		</tr>
			<tr>
			<td>Tóm tắt <i class="far fa-list-alt"></i></td>
			<td><textarea rows="10" name="tomtat" style="resize: none"></textarea></td>
		</tr>
		<tr>
			<td>Nội dung <i class="fas fa-file-signature"></i></td>
			<td><textarea rows="10" name="noidung" style="resize: none"></textarea></td>
		</tr>
		<tr>
			<td>Tác Giả <i class="fas fa-file-signature"></i></td>
			<td><textarea rows="10" name="tacgia" style="resize: none"></textarea></td>
		</tr>
		<tr>
			<td>Danh mục sản phẩm <i class="fas fa-list-ol"></i></td>
			<td>
				<select name="danhmuc">
					<?php
					$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
					$query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
					while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
					?>
					<option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
					<?php
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Tình trạng <i class="fas fa-battery-three-quarters"></i></td>
			<td>
				<select name="tinhtrang">
					<option value="1"> Nguyên Seal Fullbox <i class="fas fa-box"></i></option>
					<option value="0">Đã Unbox <i class="fas fa-box-open"></i></option>

				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="themsanpham" value="Thêm sản phẩm"></td>
		</tr>
</form>
</table>
