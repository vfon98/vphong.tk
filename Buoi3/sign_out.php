<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico">
	<title>Đăng xuất</title>
</head>
<body>
	<h1 style="color: green; font-size: 50px;">Đăng xuất thành công !</h1>
	<a href="sign_in.php" style="font-size: 20px;">Trở lại trang đăng nhập trong <span id="counter">2</span> giây</a>
	<script>
		var count = 2;
		var counter = document.getElementById("counter");
		setInterval(() => {
			counter.innerHTML = count--;
		}, 1000);
		setTimeout(() => {
			window.location.assign("sign_in.php");
		}, 3000);
	</script>
</body>
</html>