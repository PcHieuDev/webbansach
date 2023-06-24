<?php
// Kiểm tra xem biến "trang" đã được gửi qua phương thức GET chưa
if(isset($_GET['trang'])){
    $page = $_GET['trang'];
} else {
    $page = '';
}

// Tính toán vị trí bắt đầu của các sản phẩm trong câu truy vấn SQL dựa trên số trang hiện tại
if($page == '' || $page == 1) {
    $begin = 0; // Nếu không có trang nào được gửi qua, hoặc trang đầu tiên được yêu cầu, bắt đầu từ sản phẩm đầu tiên
} else {
    $begin = ($page * 10) - 10; // Nếu không, tính toán vị trí bắt đầu dựa trên số trang hiện tại
}

// Tạo câu truy vấn SQL để lấy thông tin của các sản phẩm và danh mục sản phẩm từ cơ sở dữ liệu
$sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham DESC LIMIT $begin,10";

// Thực thi câu truy vấn SQL và lưu kết quả trả về vào biến $query_pro để hiển thị sản phẩm trên trang web
$query_pro = mysqli_query($mysqli, $sql_pro);
?>

<h3>Tất Cả Sản Phẩm</h3>
<img style="width:100%" src="image/luongve.png">
<ul class="product">
	<?php
	while($row = mysqli_fetch_array($query_pro)){
		?>
		<li>
			<a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
				<img src="trangquantri/tinhnangquantri/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
				<p class="title_product"><?php echo $row['tensanpham'] ?></p>
				<p class="price_product"><?php echo number_format($row['giasp']).'vnđ' ?></p>
				<!--<p style="text-align: center; font-size:11px; color: black;margin-left: 5px;">Danh Mục:<?php /*echo $row['tendanhmuc'] */?></p>-->
			</a>
		</li>
		<?php
	}
	?>
</ul>
<div style="clear: both;"></div>
<style type="text/css">
	ul.list_trang{
		padding: 0;
		margin: 0;
		list-style: none;
	}
	ul.list_trang li {
		float: left;
		padding: 5px 13px;
		margin: 5px;
		background-color: #626456;
		display: block;
		border-radius: 20px;
	}
	ul.list_trang li a{
		color: black;
		text-align: center;
		text-decoration: none;
	}
</style>

<?php
$sql_trang = mysqli_query($mysqli,"SELECT * FROM tbl_sanpham");
$row_count = mysqli_num_rows($sql_trang);
$trang = ceil($row_count/10);
?>
<ul class="list_trang">
	<?php
	for($i=1;$i<=$trang;$i++){
		?>
		<li <?php if($i==$page) {echo 'style="background:brown;"' ;}else{echo '';} ?>><a href="index.php?trang=<?php echo $i ?>"><?php echo $i ?></a></li>
		<?php
	}
	?>
</ul>