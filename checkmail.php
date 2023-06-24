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
        <div class="main_dangky">
            <div class="ochuachucnang">
                <?php
                $error ='';
                    if (isset($_POST['xacminh'])) {
                        $ma = $_POST['otp'];
                        $CheckMail = mysqli_query($mysqli,"SELECT * FROM tbl_dangky WHERE otp = '$ma'");
                        if(mysqli_num_rows($CheckMail) > 0){
                            $otp = 0;
                        $tinhtrang = "Đã xác nhận";
                        $sql_dangky = mysqli_query($mysqli,"UPDATE tbl_dangky SET otp = '$otp', tinhtrang = '$tinhtrang' WHERE otp = '$ma'");
                        if($sql_dangky){
                            echo "<script>alert('Đăng ký tài khoản thành công')</script>";
                            echo "<script>window.location = 'dangnhapnguoidung.php'</script>";
                        }
                        }else{
                         $error = "Mã xác minh sai";
                    }
                    }
                ?>
                <h3 >Xác Minh tài khoản <i class="fas fa-users"></i></h3>
                <p style="text-align: center;color: red;"><?php echo $error ?></p>
                <form action="" method="POST">
                <table class="dangky" border="1" width="50%" size="50" style="border-collapse: collapse;">
                    <tr>
                        <td>Mã xác minh <i class="fas fa-user"></i></td>
                        <td><div class="thongtin_dangnhap"><input type="text" size="50" name="otp" required></div></td>
                    </tr>
                    <tr>  
                        <td colspan="2"><input class="nutinput" type="submit" name="xacminh" value="Xác Minh"></td>
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