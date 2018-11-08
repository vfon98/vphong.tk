<?php 
session_start();
header("Content-Type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="google-site-verification" content="U8gGd-WBAvsNgoBe7zlBEPK-puZrSecolLdJIOpNYuQ" />
	<meta name="description" content="Đăng nhập ngay">
	<meta name="author" content="Vphong">
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
	.alert {
		color: orange;
		font-weight: bold;
		text-align: center;
		font-style: italic;
		margin: 0;
		padding-top: 5px;
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
		<form action="sign_in.php" method="POST" onsubmit="return checkForm()">
			<h1>Login</h1>
			<input class="info" id="user" type="text" name="usr" placeholder="Username" autofocus="autofocus">
			<div id="user-warning" class="alert"></div> <br>
			<input class="info" id="pass" type="password" name="pass" placeholder="Password">
			<div id="pass-warning" class="alert"></div>
			<?php 
			if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit-btn'])) {
				$usr = addslashes($_POST['usr']);
				$pass = md5($_POST['pass']);
				require 'sql_connection.php';
				$sql = "SELECT id FROM thanhvien WHERE tendangnhap = '$usr' AND matkhau = '$pass'";
				$result = $conn->query($sql);
				$conn->close();
				if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();
					$_SESSION['usr'] = $usr;
					$_SESSION['id_thanhvien'] = $row['id'];
					header("location: information.php");
				}
				else {
					echo '<p class="alert">Sai tài khoản hoặc mật khẩu !</p>';
				}
			}
			?>
			<input type="submit" value="Đăng nhập" name="submit-btn">
			<a href="/Buoi1/Bai2/Bai2.php" id="signup-link"><p>Đăng kí tài khoản mới ?</p></a>
		</form>
	</div>
	<script>
		function checkForm() {
			var user = document.getElementById('user');
			var pass = document.getElementById('pass');
			var userWarnig = document.getElementById('user-warning');
			var passWarning = document.getElementById('pass-warning');
			var isValid = true;
			if (user.value == "") {
				isValid = false;
				userWarnig.innerHTML = "Bạn chưa nhập tài khoản !";
			}
			else {
				userWarnig.innerHTML = "";
			}

			if (pass.value == "") {
				isValid = false;
				passWarning.innerHTML = "Bạn chưa nhập mật khẩu !"
			}
			else {
				passWarning.innerHTML = "";
			}
			return isValid;
		}
	</script>
</body>
</html>