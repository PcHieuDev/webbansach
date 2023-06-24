<?php

$mysqli = new mysqli("localhost","root","","webbansach");

// Check connection
if ($mysqli->connect_errno) {
	echo "Lỗi khi kết nối tới MySQLi: " . $mysqli->connect_error;
	exit();
}

?>