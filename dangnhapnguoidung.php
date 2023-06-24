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
<div class="container">
		<?php
			session_start();
			include("trangquantri/connect.php");
			include("cacthanhphantrang/header.php");	
			include("cacthanhphantrang/menu.php");
        ?>
        <div class="main_dangnhap">
            <div class="ochuachucnang">
                <?php
                    if(isset($_POST['dangnhap'])){
                        $email = $_POST['email'];
                        $matkhau = md5($_POST['password']);
                        $sql = "SELECT * FROM tbl_dangky WHERE email='".$email."' AND matkhau='".$matkhau."' LIMIT 1 ";
                        $row = mysqli_query($mysqli,$sql);
                        $count = mysqli_num_rows($row);
                        if($count>0){
                            $row_data =mysqli_fetch_array($row);
                            $_SESSION['dangky'] = $row_data['tenkhachhang'];
                            $_SESSION['email'] = $row_data['email'];
                            $_SESSION['id_khachhang'] = $row_data['id_dangky'];
                            header("Location:index.php?quanly=giohang");
                        }else{
                            echo'<p style="color:black; font-weight: bold;margin-left: 20px;padding-top: 20px;">mật khẩu hoặc email sai <i class="fas fa-times"></i></p>';
                        }
                    }
                ?>
                <form action="" autocomplete="off" method="POST">
                    <table border="1" width="60%" class="table-login" style="text-align: center; border-collapse: collapse;">
                        <tr>
                            <td colspan="2"><h3>Đăng nhập <i class="fas fa-users"></i></h3></td>
                        </tr>
                        <tr>
                            <td>User <i class="fas fa-user"></i></td>
                            <td><div class="thongtin_dangnhap"><input type="text" size="60" name="email" placeholder="Email...."></div></td>
                        </tr>
                        <tr>
                            <td>Password <i class="fas fa-key"></i></td>
                            <td><div class="thongtin_dangnhap"><input type="password" size="60" name="password" placeholder="Mật khẩu...."></div></td>
                        </tr>
                        <tr>

                            <td colspan="2"><input type="submit" name="dangnhap" value="Đăng nhập"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><h4>Bạn chưa có tài khoản?</h4><a href="CreateNewAccount.php" style="text-decoration: none; font-weight: bold;font-size: 20px; color: #119200;"><i class="fas fa-hand-point-right"></i>Đăng ký<i class="fas fa-hand-point-left"></i></a></td>
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