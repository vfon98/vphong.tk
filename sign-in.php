<?php 
	header("Content-Type: text/html; charset=utf-8");
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$usr = validate($_POST['usr']});
		$pass = validate($_POST['pass']);
	}
	function validate($data)
	{
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng nhập</title>
</head>
<body>
	<div id="container">
		<form action="sign-in.php" method="POST">
			<input type="text" name="usr">
			<input type="password" name="pass">
			<input type="submit" value="Đăng nhập">
		</form>
	</div>
</body>
</html>