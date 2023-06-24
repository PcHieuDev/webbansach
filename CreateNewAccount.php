<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css">
    <meta charset="UTF-8">
</head>
<body>
<div class="container">
		<?php
			session_start();
			include("trangquantri/connect.php");
			include("cacthanhphantrang/header.php");	
			include("cacthanhphantrang/menu.php");
            include "mail/sendmail.php";
        ?>
        <div class="main_dangky">
            <div class="ochuachucnang">
              <!--  --><?php
/*                $error ='';
                    if (isset($_POST['dangky'])) {
                        // Kiểm tra các dữ liệu nhập vào có bị bỏ trống hay không
                        if (empty($_POST['hovaten']) || empty($_POST['email']) || empty($_POST['dienthoai']) || empty($_POST['matkhau']) || empty($_POST['diachi'])) {
                            $error = "Vui lòng nhập đầy đủ thông tin.";
                        } else {
                            $tenkhachhang = trim($_POST['hovaten']);
                            $email = trim($_POST['email']);
                            $dienthoai = trim($_POST['dienthoai']);
                            $matkhau = md5(trim($_POST['matkhau']));
                            $diachi = trim($_POST['diachi']);
                            $CheckMail = mysqli_query($mysqli, "SELECT * FROM tbl_dangky WHERE email = '$email'");
                                if (mysqli_num_rows($CheckMail) > 0) {
                                    $error = "email đã tồn tại";
                                } else {
                                    $otp = rand(1000,9999);
                                    $tinhtrang = "Chưa xác nhận";
                                    $sql_dangky = mysqli_query($mysqli,
                                        "INSERT INTO tbl_dangky(tenkhachhang,email,dienthoai,matkhau,diachi,otp,tinhtrang) VALUE('".$tenkhachhang."','".$email."','".$dienthoai."','".$matkhau."','".$diachi."','".$otp."','".$tinhtrang."')");
                                    if ($sql_dangky) {
                                        // Thông báo đăng ký thành công
                                        echo '<div style="background-color:#f0f8ff; padding:20px;">';
                                        echo '<h2 style="color:#008000;">Bạn đã đăng ký thành công</h2>';
                                        echo '<p>Cảm ơn bạn đã đăng ký tài khoản trên website của chúng tôi.</p>';
                                        echo '<p>Chúng tôi đã gửi một mã xác nhận đến địa chỉ email của bạn.</p>';
                                        echo '<p>Vui lòng kiểm tra email và nhập mã xác nhận để hoàn tất quá trình đăng ký.</p>';
                                        echo '</div>';
                                        // Gửi email xác nhận
                                        $mail->setFrom('phanhieu164nt@gmail.com', 'Web_Book_Online');
                                        $mail->addAddress($email);
                                        $mail->isHTML(true);
                                        $mail->Subject = "Account verification code";
                                        $mail->Body = '<div style="background-color:#f0f8ff; padding:20px;">';
                                        $mail->Body .= '<h2 style="color:#008000;">Mã xác nhận của bạn là:</h2>';
                                        $mail->Body .= '<p style="font-size:24px; font-weight:bold;">'.$otp.'</p>';
                                        $mail->Body .= '<p>Vui lòng nhập mã này vào trang xác nhận để hoàn tất quá trình đăng ký.</p>';
                                        $mail->Body .= '</div>';
                                        $mail->send();
                                        // Chuyển hướng đến trang xác nhận
                                        header('Location:checkmail.php');
                                    }
                                }
                            }
                    }
                */?>
                <?php
$error ='';
if (isset($_POST['dangky'])) {
    // Kiểm tra các dữ liệu nhập vào có bị bỏ trống hay không
    if (empty($_POST['hovaten']) || empty($_POST['email']) || empty($_POST['dienthoai']) || empty($_POST['matkhau']) || empty($_POST['diachi'])) {
        $error = "Vui lòng nhập đầy đủ thông tin.";
    } else {
        $tenkhachhang = trim($_POST['hovaten']);
        $email = trim($_POST['email']);
        $dienthoai = trim($_POST['dienthoai']);
        $matkhau = md5(trim($_POST['matkhau']));
        $diachi = trim($_POST['diachi']);

        // Validate định dạng email, check đủ ký tự @,.com
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Định dạng email không hợp lệ.";
        } else {
            $CheckMail = mysqli_query($mysqli, "SELECT * FROM tbl_dangky WHERE email = '$email'");
            if (mysqli_num_rows($CheckMail) > 0) {
                $error = "Email đã tồn tại.";
            } else {
                $otp = rand(1000, 9999);
                $tinhtrang = "Chưa xác nhận";
                $sql_dangky = mysqli_query($mysqli,
                    "INSERT INTO tbl_dangky(tenkhachhang,email,dienthoai,matkhau,diachi,otp,tinhtrang) VALUE('".$tenkhachhang."','".$email."','".$dienthoai."','".$matkhau."','".$diachi."','".$otp."','".$tinhtrang."')");
                if ($sql_dangky) {
                    // Thông báo đăng ký thành công
                    echo '<div style="background-color:#f0f8ff; padding:20px;">';
                    echo '<h2 style="color:#008000;">Bạn đã đăng ký thành công</h2>';
                    echo '<p>Cảm ơn bạn đã đăng ký tài khoản trên website của chúng tôi.</p>';
                    echo '<p>Chúng tôi đã gửi một mã xác nhận đến địa chỉ email của bạn.</p>';
                    echo '<p>Vui lòng kiểm tra email và nhập mã xác nhận để hoàn tất quá trình đăng ký.</p>';
                    echo '</div>';
                    // Gửi email xác nhận
                    $mail->setFrom('phanhieu164nt@gmail.com', 'Web_Book_Online');
                    $mail->addAddress($email);
                    $mail->isHTML(true);
                    $mail->Subject = "Account verification code";
                    $mail->Body = '<div style="background-color:#f0f8ff; padding:20px;">';
                    $mail->Body .= '<h2 style="color:#008000;">Mã xác nhận của bạn là:</h2>';
                    $mail->Body .= '<p style="font-size:24px; font-weight:bold;">'.$otp.'</p>';
                    $mail->Body .= '<p>Vui lòng nhập mã này vào trang xác nhận để hoàn tất quá trình đăng ký.</p>';
                    $mail->Body .= '</div>';
                    $mail->send();
                    // Chuyển hướng đến trang xác nhận
                    header('Location:checkmail.php');
                }
            }
        }
        }
    }
                ?>
                <h3 >Đăng Kí Thành Viên <i class="fas fa-users"></i></h3>
                <p style="text-align: center;color: red;"><?php echo $error ?></p>
                <form action="" method="POST">
                <table class="dangky" border="1" width="50%" size="50" style="border-collapse: collapse;">
                    <tr>
                        <td>Họ Và Tên <i class="fas fa-user"></i></td>
                        <td><div class="thongtin_dangnhap"><input type="text" size="50" name="hovaten" required></div></td>
                    </tr>
                    <tr>
                        <td>Email <i class="fas fa-envelope"></i></td>
                        <td><div class="thongtin_dangnhap"><input type="text" size="50" name="email" required></div></td>
                    </tr>
                    <tr>
                        <td>Địa Chỉ <i class="fas fa-map-marker-alt"></i></td>
                        <td><div class="thongtin_dangnhap"><input type="text" size="50" name="diachi" required></div></td>
                    </tr>
                        <td>Số Điện Thoại <i class="fas fa-phone"></i></td>
                        <td><div class="thongtin_dangnhap"><input type="text" size="50" name="dienthoai" required></div></td>
                    </tr>
                    <tr>
                        <td>Mật Khẩu <i class="fas fa-key"></i></td>
                        <td><div class="thongtin_dangnhap"><input type="password" size="50" name="matkhau" required></div></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input class="nutinput" type="submit" name="dangky" value="Đăng ký"></td>
                    </tr>
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