<div class="clear"></div>
<div class="main">
	<?php

	if(isset($_GET['action']) && $_GET['query']){
		$action = $_GET['action'];
		$query = $_GET['query'];
	}else{
		$action = '';
		$query= '';
	}
	if($action=='quanlydanhmucsanpham' && $query=='them'){
		include("tinhnangquantri/quanlydanhmucsp/them.php");
		include("tinhnangquantri/quanlydanhmucsp/lietke.php");

	}elseif ($action=='quanlydanhmucsanpham' && $query=='sua') {
		include("tinhnangquantri/quanlydanhmucsp/sua.php");	

	}elseif ($action=='quanlysp' && $query=='them') {
		include("tinhnangquantri/quanlysp/them.php");
		include("tinhnangquantri/quanlysp/lietke.php");

	}elseif ($action=='quanlysp' && $query=='sua'){
			include("tinhnangquantri/quanlysp/sua.php");

	}elseif ($action=='quanlydonhang' && $query=='lietke'){
			include("tinhnangquantri/quanlydonhang/lietke.php");

	}elseif ($action=='donhang' && $query=='xemdonhang'){
			include("tinhnangquantri/quanlydonhang/xemdonhang.php");

	}elseif ($action=='quanlydanhmucbaiviet' && $query=='them'){
			include("tinhnangquantri/quanlydanhmucbaiviet/them.php");
			include("tinhnangquantri/quanlydanhmucbaiviet/lietke.php");

	}elseif ($action=='quanlydanhmucbaiviet' && $query=='sua'){
			include("tinhnangquantri/quanlydanhmucbaiviet/sua.php");
	}elseif ($action=='quanlydanhmucbaiviet' && $query=='lietke'){
			
	}
	?>
	
	
</div>

