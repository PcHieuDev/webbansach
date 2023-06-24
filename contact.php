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
        <div class="main_contact">
            <h3>Bạn Cần Tư Vấn Về Sách ?  </h3><br>
            <img style="width: 80%;margin-left: 10%; border-radius: 20px;" src="https://www.kidsplaza.vn/blog/wp-content/uploads/2013/09/Anh-post-holine-QC-1024x1024-1.png"><br>
            <br>
            <h2 style="text-align: center;">Hãy Truy Cập Trang Web Và Đặt Hàng Nào ! </h2><br>
                <br>
              
    <div style="display: flex;padding: 2rem 0;" class="title-bottom">
        <div style="font-size: 16px;color: #170000;width: calc(100% - 150px);padding-left: 300px;margin-top: -10px;" class="summary">
                        <h3>Đăng kí kênh Youtube của THUNDERBOLTS tại đây! <i class="fas fa-hand-point-right"></i></h3>
                    </div>
                   <iframe width="560" height="315" src="https://www.youtube.com/embed/806nxCdF0bg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <?php
            include("cacthanhphantrang/footer.php");
            ?>
        </div>
    </body>
    </html>