<?php
/*	session_start();
	include("../../trangquantri/connect.php");
	include("../../mail/sendmail.php");
	$id_khachhang = $_SESSION['id_khachhang'];
	$code_order = rand(0,9999);
	$insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status) VALUE('".$id_khachhang."','".$code_order."',1)";
	$cart_query = mysqli_query($mysqli,$insert_cart);
	if($cart_query){
		//them gio hang
		foreach ($_SESSION['cart'] as $key => $value) {
			$id_sanpham = $value['id'];
			$soluong = $value['soluong'];
			$insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua) VALUE('".$id_sanpham."','".$code_order."','".$soluong."')";
			mysqli_query($mysqli,$insert_order_details);
		}
		$tieude = "Đặt Hàng sách mới Thành Công";
		$noidung = "<p>Cảm ơn bạn đã đặt hàng của chúng tôi, mã đơn hàng của Ngài là:".$code_order."</p>";
		$noidung .= "<h4>Đơn hàng của bạn bao gồm:<h4>";
foreach($_SESSION['cart'] as $key => $val){
	$noidung .= "<ul style='border:1px solid blue;margin:10px;'>
			<Li>Tên sp:".$val['tensanpham']."</li>
			<Li>Mã Sản Phẩm:".$val['masp']."</li>
			<Li>Giá:".number_format($val['giasp'],0,',','.')."đ</Li>
			<li>Số Lượng:".$val['soluong']."</li>
			</ul>";
}
$mailDh = mysqli_query($mysqli,"SELECT * FROM tbl_dangky WHERE id_dangky = '$id_khachhang'");
$showMail = mysqli_fetch_array($mailDh);
		$maildathang = $showMail['email'];
		$mail->setFrom('phanhieu164nt@gmail.com', 'Web_book_online');
    $mail->addAddress((String)$maildathang);
    $mail->isHTML(true);   
    $mail->Subject = $tieude;
    $mail->Body = $noidung;
    $mail->send();
 }	
 unset($_SESSION['cart']);
 header('Location:../../index.php?quanly=camon');
*/?>

<?php
session_start();
require_once("../../trangquantri/connect.php");
require_once("../../mail/sendmail.php");

$id_khachhang = $_SESSION['id_khachhang'];
$code_order = rand(0,9999);

$insert_cart_query = "INSERT INTO tbl_cart (id_khachhang, code_cart, cart_status) VALUES ('$id_khachhang','$code_order', 1)";
$cart_query = mysqli_query($mysqli, $insert_cart_query);

if ($cart_query) {
    // thêm đơn hàng chi tiết vào bảng tbl_cart_details
    $cart_details_values = '';
    foreach ($_SESSION['cart'] as $key => $value) {
        $id_sanpham = $value['id'];
        $soluong = $value['soluong'];
        $cart_details_values .= "('$id_sanpham','$code_order','$soluong'),";
    }
    $cart_details_values = rtrim($cart_details_values, ",");
    $insert_order_details_query = "INSERT INTO tbl_cart_details (id_sanpham, code_cart, soluongmua) VALUES $cart_details_values";
    mysqli_query($mysqli, $insert_order_details_query);

  /*  // gửi email xác nhận đặt hàng
    $tieude = "Đặt Hàng sách mới Thành Công";
    $noidung = "<p>Cảm ơn bạn đã đặt hàng của chúng tôi, mã đơn hàng của Ngài là:".$code_order."</p>";
    $noidung .= "<h4>Đơn hàng của bạn bao gồm:<h4>";
    foreach($_SESSION['cart'] as $key => $val){
        $noidung .= "<ul style='border:1px solid blue;margin:10px;'>
                        <li>Tên sp:".$val['tensanpham']."</li>
                        <li>Mã Sản Phẩm:".$val['masp']."</li>
                        <li>Giá:".number_format($val['giasp'],0,',','.')."đ</li>
                        <li>Số Lượng:".$val['soluong']."</li>
                    </ul>";*/
    }

   /* $mail_dh_query = mysqli_query($mysqli,"SELECT email FROM tbl_dangky WHERE id_dangky = '$id_khachhang'");
    $show_mail = mysqli_fetch_array($mail_dh_query);
    $mail_to = $show_mail['email'];
    $mail->setFrom('phanhieu164nt@gmail.com', 'Web_book_online');
    $mail->addAddress((string) $mail_to);
    $mail->isHTML(true);
    $mail->Subject = $tieude;
    $mail->Body = $noidung;
    $mail->send();*/
// }

// hủy giỏ hàng sau khi đã đặt hàng thành công
unset($_SESSION['cart']);
header('Location:../../index.php?quanly=camon');

