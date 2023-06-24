<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css">
</head>
<body>
<script type="text/javascript">
    var lastTime = localStorage.getItem('lastTime');
    var currentTime = new Date().getTime();
    var diffTime = (currentTime - lastTime) / (1000 * 60 * 60);

    if (diffTime > 1 || !lastTime) {
        alert('Bạn Đang Ở Trang Thay Đổi Mật Khẩu!');
        localStorage.setItem('lastTime', new Date().getTime());
    }
</script>
<div class="container">
		<?php
			session_start();
			include("trangquantri/connect.php");
			include("cacthanhphantrang/header.php");	
			include("cacthanhphantrang/menu.php");
        ?>
        <div class="main_doimatkhau">
            <div class="ochuachucnang">
                <?php
                    if(isset($_POST['doimatkhau'])){
                        $taikhoan = $_POST['email'];
                        $matkhau_cu = md5($_POST['password_cu']);
                        $matkhau_moi = md5($_POST['password_moi']);
                        $sql = "SELECT * FROM tbl_dangky WHERE email='$taikhoan' AND matkhau='$matkhau_cu' LIMIT 1 ";
                        $row = mysqli_query($mysqli,$sql);
                        $count = mysqli_num_rows($row);
                        if($count>0){

                            $sql_update = mysqli_query($mysqli,"UPDATE tbl_dangky SET matkhau='".$matkhau_moi."' ");
                            echo'<p style="color:black;margin-left: 50px;padding-top: 20px;">  Mật khẩu đã thay đổi <i class="fas fa-check"></i></p>';
                        }else{
                            echo'<p style="color:black;margin-left: 50px;padding-top: 20px;">  Tài khoản hoặc mật khẩu sai <i class="fas fa-times"></i></p>';
                        }
                    }
                ?>
                <form action="" autocomplete="off" method="POST">
                    <table border="1" class="table-login" style="text-align: center; border-collapse: collapse;">
                        <tr>
                            <td colspan="2" ><h3>Đổi mật khẩu <i class="fas fa-key"></i></h3></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Email <i class="far fa-envelope"></i></td>
                            <td><div class="thongtin_dangnhap"><input type="text" name="email"></div></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">   Mật khẩu cũ <i class="fas fa-key"></i></td>
                            <td><div class="thongtin_dangnhap"><input type="text" name="password_cu"></div></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">   Mật khẩu mới <i class="fas fa-key"></i></td>
                            <td><div class="thongtin_dangnhap"><input type="text" name="password_moi"></div></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" name="doimatkhau" value="Lưu" onclick="return confirm('Bạn có chắc chắn muốn đổi mật khẩu?')"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <?php
			include("cacthanhphantrang/footer.php");
		?>

	</div>
</body>
</html>