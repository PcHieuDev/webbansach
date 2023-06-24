<div class="header">
			<div class="icon">
				<a href="index.php" ><img src="image/logoh1.png" alt=""></a>
			</div>
			<form class="top" action="index.php?quanly=timkiem" method="POST">
			<div class="seach">
				<div class="seach_box">
					<input type="text" placeholder="tìm kiếm sản phẩm..." name="tukhoa">
				</div>
				<div class="submitbot">
					<button name="timkiem"><img src="image/search.png" alt=""></button>
				</div>
			</div>
			</form>
			<div class="header_nav">
				<li><a href="index.php?quanly=giohang"><img src="image/shopping cart2.png" alt=""></a></li>
				
					<?php
				if(isset($_SESSION['dangky'])){
					?>
                    <li><a href="index.php?dangxuat=1" onclick="return confirm('Bạn có chắc chắn muốn đăng xuất không?')"><i class="fas fa-sign-out-alt"></i> ĐĂNG XUẤT</a></li>

                    <li><a href="arepass.php"><i class="fas fa-key"></i> Đổi Pass</a></li>
						<li><a href="index.php?quanly=lichsudonhang"><i class="fas fa-shopping-cart"></i>Lịch Sử</a></li>
					<?php
					}else{
					?>
						<li><a href="dangnhapnguoidung.php"><img src="image/user.png" alt=""></a></li>
					<?php
					}
					?>
			</div>
</div>
