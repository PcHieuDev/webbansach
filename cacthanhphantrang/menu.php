<?php

$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
$query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);


?>
<?php
if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
	unset($_SESSION['dangky']);
    header("Location: dangnhapnguoidung.php");
}
?>
		<div class="menu">
			<div class="muctrongmenu">
				<ul class="danhsach">
					<li><a href="index.php"><i class="fas fa-home"></i> HOME</a></li>
					<?php
					while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
					?>
					<li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><i class="fa-solid fa-boot-heeled"></i> <?php echo $row_danhmuc['tendanhmuc'] ?></a></li>
					<?php
					}
					?>
					<!--<li><a href="index.php?quanly=tintuc"><img src="image/newspaper.png" alt=""></a></li>-->
				</ul>
			</div>
		</div>

	
