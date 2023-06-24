	<?php 
			session_start();
                require("../../trangquantri/connect.php");
				require("../../mail/sendmail.php");
				$id_khachhang = $_SESSION['id_khachhang'];
				$code_order = rand(1000,9999);
				$cart_payment = $_POST['payment'];
				//lay id thong tin van chuyen
				$id_dangky = $_SESSION['id_khachhang'];
			    $sql_get_vanchuyen = mysqli_query($mysqli,"SELECT * FROM tbl_shipping WHERE id_dangky= '$id_dangky' LIMIT 1");
			    $row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
			    $id_shipping = $row_get_vanchuyen['id_shipping'];
				    //insert vào đơn hàng
					$insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status,cart_payment,cart_shipping) VALUE('".$id_khachhang."','".$code_order."',1,'".$cart_payment."','".$id_shipping."')";
					$cart_query = mysqli_query($mysqli,$insert_cart);
					if($cart_query){
						//them đơn hang chi tiet
						foreach($_SESSION['cart'] as $key => $value) {
							$id_sanpham = $value['id'];
							$soluong = $value['soluong'];
							$SanPham = mysqli_query($mysqli,"SELECT * FROM tbl_sanpham WHERE id_sanpham ='$id_sanpham'");
							$ShowSp = mysqli_fetch_array($SanPham);
							$SoluongGoc = $ShowSp['soluong'];
							$newsl = $SoluongGoc - $soluong;
							mysqli_query($mysqli,"UPDATE tbl_sanpham SET soluong = '$newsl' WHERE id_sanpham = '$id_sanpham'");
							$insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua) VALUE('".$id_sanpham."','".$code_order."','".$soluong."')";
							mysqli_query($mysqli,$insert_order_details);
						}
                        //gui maill
                        $tieude = "Ordering Successful";
                        $noidung = "<html>
                <head>
                    <title>Đơn hàng đã được đặt thành công</title>
                    <style>
                        * {
                            font-family: Arial, Helvetica, sans-serif;
                        }
                        table {
                            border-collapse: collapse;
                            width: 100%;
                            margin-bottom: 20px;
                        }
                        th, td {
                            text-align: left;
                            padding: 8px;
                            border-bottom: 1px solid #ddd;
                        }
                        th {
                            background-color: #4CAF50;
                            color: white;
                        }
                        h2 {
                            color: #4CAF50;
                            margin-top: 0;
                            margin-bottom: 20px;
                        }
                        p {
                            margin-bottom: 20px;
                        }
                        .highlight {
                            font-weight: bold;
                        }
                        .order-code {
                            font-size: 20px;
                            margin-bottom: 20px;
                        }
                        .footer {
                            font-size: 14px;
                            color: #888;
                        }
                    </style>
                </head>
                <body>
                    <h2>Cảm ơn bạn đã đặt hàng!</h2>
                    <p>Thông tin đơn hàng của bạn như sau:</p>
                    <table>
                        <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Mã sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>                                                    
                            </tr>
                        </thead>
                        <tbody>";
                        foreach ($_SESSION['cart'] as $key => $val) {
                            $id_sanpham = $val['id'];
                            $SanPham = mysqli_query($mysqli,"SELECT * FROM tbl_sanpham WHERE id_sanpham ='$id_sanpham'");
                            $ShowSp = mysqli_fetch_array($SanPham);
                            $noidung .= "<tr>
                    <td>" . $val['tensanpham'] . "</td>
                    <td>" . $val['masp'] . "</td>
                    <td>" . number_format($val['giasp'],0,',','.') . "đ</td>
                    <td>" . $val['soluong'] . "</td>
                   
                </tr>";
                        }
                        $noidung .= "        </tbody>                 
                    </table>   
                                   
                    <p class=\"highlight\">Mã đơn hàng của Ngài là:</p>                              
                    <p class=\"order-code\">" . $code_order . "</p>
                    <p>Xin vui lòng đợi chúng tôi liên hệ với bạn để xác nhận đơn hàng và giao hàng trong thời gian sớm nhất.</p>
                    <p class=\"footer\">Đây là email tự động, vui lòng không trả lời. Nếu bạn có bất kỳ câu hỏi nào về đơn hàng của mình, vui lòng liên hệ với chúng tôi qua email hoặc số điện thoại được cung cấp trên trang web của chúng tôi.</p>
                </body>
            </html>";
// Thiết lập header cho email
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                        $mailDh = mysqli_query($mysqli,"SELECT * FROM tbl_dangky WHERE id_dangky = '$id_khachhang'");
		$showMail = mysqli_fetch_array($mailDh);
		if($_SESSION['emailDh']){
			$email = $_SESSION['emailDh'];
		}else{
			$email = $showMail['email'];
		}
		$maildathang = $email;
		$mail->setFrom('phanhieu164nt@gmail.com', 'Thunderbolts');
    	$mail->addAddress((String)$maildathang);
    	$mail->isHTML(true);   
    	$mail->Subject = $tieude;
    	$mail->Body = $noidung;
   	 $mail->send();
 				unset($_SESSION['emailDh']);
				unset($_SESSION['cart']);
				}
				header('Location:../../index.php?quanly=lichsudonhang');
			?>