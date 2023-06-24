<?php
	session_start();
	include("connect.php");
	if(isset($_POST['dangnhap'])){
		$taikhoan = $_POST['username'];
		$matkhau = md5($_POST['password']);
		$sql = "SELECT * FROM tbl_admin WHERE username='".$taikhoan."' AND password='".$matkhau."' LIMIT 1 ";
		$row = mysqli_query($mysqli,$sql);
		$count = mysqli_num_rows($row);
		if($count>0){
			$_SESSION['dangnhap'] = $taikhoan;
			header("Location:index.php");
		}else{
			echo'<script>alert("tài khoản hoặc mật khẩu sai.");</script>';
			header("Location:index.php");
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Quản trị viên</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css">
    <style type="text/css">
        body {
            background-image: url("https://wallpaperaccess.com/full/732429.jpg");
        }

        .wrapper-login {
            width: 30%;
            margin: 0 auto;
        }

        table.table-login {
            width: 100%;
            margin-top: 220px;
            text-align: center;
            border-collapse: collapse;
        }

        table.table-login tr td {
            padding: 5px;
            color: white;
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            border-radius: 10px;
            padding: 10px;
            border: none;
            width: 100%;
        }

        input[type="submit"] {
            background-color: gray;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="wrapper-login">
    <form action="" autocomplete="off" method="POST">
        <table class="table-login">
            <tr>
                <td colspan="2">
                    <h3 style="color: white; font-weight: bold;">
                        Đăng nhập Admin
                        <i class="fas fa-user-shield" style="font-size: 30px;"></i>
                    </h3>
                </td>
            </tr>
            <tr>
                <td>User <i class="fas fa-user"></i></td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password <i class="fas fa-key"></i></td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="dangnhap" value="Đăng nhập"></td>
            </tr>
        </table>
    </form>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
