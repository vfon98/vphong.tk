<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng xuất</title>
</head>
<body>
	<h1 style="color: green">Đăng xuất thành công !</h1>
	<a href="sign_in.php">Trở lại trang đăng nhập</a>
</body>
</html>