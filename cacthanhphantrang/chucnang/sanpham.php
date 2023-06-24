<p style="font-weight: bold;color: #29313a; font-size:25px;">Chi tiết sản phẩm</p>
<?php
$sql_chitiet = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.id_sanpham='$_GET[id]' LIMIT 1";
$query_chitiet = mysqli_query($mysqli,$sql_chitiet);
while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {

	?>
	<div class="wrapper_chitiet">
		<div class="hinhanh_sanpham">
			<img  width="100%" border-radius="15px" src="trangquantri/tinhnangquantri/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?>">
		</div>
		<form method="POST" action="cacthanhphantrang/chucnang/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>">
			<div class="chitiet_sanpham">
				<h2 style="margin:0;margin-left: 120px; color: #3a1f00"><?php echo $row_chitiet['tensanpham'] ?></h2>
				<p>● Mã sách  <i class="far fa-file-code"></i>: <?php echo $row_chitiet['masp'] ?></p>
				<p>● Giá  <i class="fas fa-dollar-sign"></i>: <?php echo number_format($row_chitiet['giasp']).'vnd' ?></p>
				<p>● Còn :  <i class="fas fa-sort-amount-up"></i>: <?php echo $row_chitiet['soluong'] ?></p>
				<p>● Danh Mục  <i class="fas fa-place-of-worship"></i>: <?php echo $row_chitiet['tendanhmuc'] ?></p>
				<p>● Tác giả  <i class="fas fa-place-of-worship"></i>: <?php echo $row_chitiet['tacgia'] ?></p>
				<p><input class="themgiohang" name="themgiohang" type="submit" value="Thêm vào giỏ" ></p>
			</div>
		</form>
	</div>
<div class="clear"></div>
<div class="tabs">
<ul id="tabs-nav">
<li><a href="#tab1">Thông tin sách</a></li>
<li><a href="#tab2">Nội Dung Chi Tiết</a></li>
<li><a href="#tab3">Hình Ảnh</a></li>

</ul> <!-- END tabs-nav -->
<div id="tabs-content">
<div id="tab1" class="tab-content">
 	<?php echo $row_chitiet['tomtat'] ?>
</div>
<div id="tab2" class="tab-content">
 	<?php echo $row_chitiet['noidung'] ?>
</div>
<div id="tab3" class="tab-content">
	<img  width="100%" border-radius="15px" src="trangquantri/tinhnangquantri/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?>">
</div>

</div> <!-- END tabs-content -->
</div> <!-- END tabs -->
	<?php
}
?>

