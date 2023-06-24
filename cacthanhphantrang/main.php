<section data-aos="fade-left">
<div id="centerpage">
			<div class="maincontent">
				<?php
				if(isset($_GET['quanly'])){
					$action = $_GET['quanly'];
				}else{
					$action = '';
				}
				if($action=='danhmucsanpham'){
					include("chucnang/danhmuc.php");
				}elseif($action=='giohang'){
					include("chucnang/giohang.php");
				}elseif($action=='tintuc'){
					include("chucnang/tintuc.php");
				}elseif($action=='lienhe'){
					include("chucnang/lienhe.php");
				}elseif($action=='sanpham'){
					include("chucnang/sanpham.php");
				}elseif($action=='thanhtoan'){
					include("chucnang/thanhtoan.php");
				}elseif($action=='timkiem'){
					include("chucnang/timkiem.php");
				}elseif($action=='camon'){
					include("chucnang/thanks.php");
				}elseif($action=='vanchuyen'){
					include("chucnang/vanchuyen.php");
				}elseif($action=='thongtinthanhtoan'){
					include("chucnang/thongtinthanhtoan.php");
				}elseif($action=='donhangdadat'){
					include("chucnang/donhangdadat.php");	
				}elseif($action=='lichsudonhang'){
					include("chucnang/lichsudonhang.php");	
				}elseif($action=='xemdonhang'){
					include("chucnang/xemdonhang.php");	
				}
				else{
					include("chucnang/index.php");
				}
				?>
			</div>
		</div>
</section>