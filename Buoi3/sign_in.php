<?php 
session_start();
header("Content-Type: text/html; charset=utf-8");
if (isset($_SESSION['usr'])) {
	header("location: information.php");
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
	<link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico">
	<style>
	body {
		background-color: #1396C2;
	}
	#container {
		position: fixed;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -60%);
		box-sizing: border-box;
		width: 500px;
		background-color: #013082;
		padding: 40px;
		margin: 0 auto;
		border-radius: 10px;
		box-shadow: 4px 4px 10px 1px rgba(0, 0, 0, 0.2);
		-webkit-animation-name: slideIn;
		-o-animation-name: slideIn;
		animation-name: slideIn;
		-webkit-animation-duration: 1.5s;
		-o-animation-duration: 1.5s;
		animation-duration: 1.5s;
	}
	@-webkit-keyframes slideIn {
		from { top: 100% }
		to { top: 50% }
	}
	@-o-keyframes slideIn {
		from { top: 100% }
		to { top: 50% }
	}
	@-moz-keyframes slideIn {
		from { top: 100% }
		to { top: 50% }
	}
	@keyframes slideIn {
		from { top: 100% }
		to { top: 50% }
	}
	input {
		width: 80%;
		font-size: 1.2em;
		display: block;
		margin: 0 auto;
		padding: 20px;
		border-radius: 16px;
		box-shadow: 4px 4px 10px 1px rgba(0, 0, 0, 0.2);
		border: none;
	}
	input[type="submit"] {
		margin-top: 20px;
		width: 90%;
		background-color: #5CB85C;
		color: white;
		font-size: 1.4em;
		font-weight: bold;
	}
	h1 {
		margin-top: 0;
		font-size: 40px;
		color: white;
		text-align: center;
	}
	#alert {
		color: orange;
		font-weight: bold;
		text-align: center;
		margin: 0;
	}
	#signup-link {
		text-align: center;
		color: white;
		font-size: 1.2em;
	}
</style>
</head>
<body>
	<div id="container">
		<form action="sign_in.php" method="POST">
			<h1>Login</h1>
			<input class="info" type="text" name="usr" placeholder="Username" autofocus="autofocus"><br>
			<input class="info" type="password" name="pass" placeholder="Password"><br>
			<?php 
			if ($_SERVER['REQUEST_METHOD'] == "POST") {
				$usr = validate($_POST['usr']);
				$pass = md5(validate($_POST['pass']));
				require 'sql_connection.php';
				$sql = "SELECT * FROM thanhvien WHERE tendangnhap = '$usr' AND matkhau = '$pass'";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();
				if ($result->num_rows > 0) {
					$_SESSION['usr'] = $usr;
					$_SESSION['id_thanhvien'] = $row['id'];
					header("location: information.php");
				}
				else {
					echo "<p id='alert'>Sai tài khoản hoặc mật khẩu !</p>";
				}
				$conn->close();
			}
			?>
			<input type="submit" value="Đăng nhập">
			<a href="/Buoi1/Bai2/Bai2.html" id="signup-link"><p>Đăng kí tài khoản mới ?</p></a>
		</form>
	</div>
</body>
</html>