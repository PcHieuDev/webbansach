<?php
session_start();
if(!isset($_SESSION['dangnhap'])){
	header('Location:dangnhapadmin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đăng Nhập Admin</title>
	<link rel="stylesheet" type="text/css" href="css/styleadmincp.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css">
	<script type="text/javascript">
		</script>
</head>
<body>
	<div class="container">
	<?php
			include("connect.php");
			include("tinhnangquantri/header.php");
			include("tinhnangquantri/menu.php");
			include("tinhnangquantri/main.php");
	?>
	</div>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>
	  <script>
                        CKEDITOR.replace( 'tomtat' );
                        CKEDITOR.replace( 'noidung' );
      </script>
</body>
</html>