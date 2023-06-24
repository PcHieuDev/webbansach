<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css">
	<!-- <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" /> -->
	<title>THUNDERBOLTS</title>
</head>
<body>
	<div class="container">
		<?php
			session_start();
			include("trangquantri/connect.php");
			include("cacthanhphantrang/header.php");
			include("cacthanhphantrang/menu.php");
			/* include("cacthanhphantrang/ads.php");*/
		?>
		<?php
			include("cacthanhphantrang/main.php");
			include("cacthanhphantrang/footer.php");
		?>
	</div>
	 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        	<script type="text/javascript">
        		// Show the first tab and hide the rest
        	$('#tabs-nav li:first-child').addClass('active');
        	$('.tab-content').hide();
        	$('.tab-content:first').show();
        	// Click function
        	$('#tabs-nav li').click(function(){
        	$('#tabs-nav li').removeClass('active');
        	$(this).addClass('active');
        	$('.tab-content').hide();
        	var activeTab = $(this).find('a').attr('href');
        	$(activeTab).fadeIn();
        	return false;
        	});
        	</script>
        <!--	<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
                  <script>
                    AOS.init({
                		offset:100,
                		duration:1000
                	});
                  </script> -->
</body>
</html>
