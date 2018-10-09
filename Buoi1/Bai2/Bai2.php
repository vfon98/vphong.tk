<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Thực hành bài 2</title>
	<link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico">
	<style>
	.container {
		border: 1px solid black;
		margin: 0 auto;
		width: 450px;
		padding: 10px;
	}
	table {
		width: 450px;
		padding: 15px;
		background-color: #d3d3d3;
	}
</style>
</head>
<body>
	<div class="container">
		<h1 style="color: red; text-align: center;">Đăng kí tài khoản mới</h1>
		<p style="text-align: center;">Vui lòng điền đầy đủ thông tin bên dưới để đăng kí tài khoản mới</p>
		<form method="post" action="/Buoi3/sign_up.php" enctype="multipart/form-data">
			<table>
				<tr>
					<td><p>Tên đăng nhập</p></td>
					<td><input type="text" name="usr" required="required" autofocus="autofocus"><br>
						<?php 
						if (isset($_GET['error'])) {
							if ($_GET['error'] === "true") {
								echo '<i style="color: red;">Tài khoản đã tồn tại !</i>';
							}
						}
						?>
					</td>
				</tr>
				<tr>
					<td><p>Mật khẩu</p></td>
					<td><input type="password" name="pass" required="required" id="pass"></td>
				</tr>
				<tr>
					<td><p>Gõ lại mật khẩu</p></td>
					<td>
						<input type="password" name="re_pass" required="required" id="repass">
						<span id="tick" style="color: green; font-size: 20px;"></span>
					</td>
				</tr>
				<tr>
					<td><p>Hình đại diện</p></td>
					<td><input type="file" name="usr_avatar"></td>
				</tr>
				<tr>
					<td><p>Giới tính</p></td>
					<td> 
						<input type="radio" name="gender" value="Nam">Nam
						<input type="radio" name="gender" value="Nữ">Nữ
						<input type="radio" name="gender" value="Khác" checked="checked">Khác
					</td> 
				</tr>
				<tr>
					<td><p>Nghề nghiệp</p></td>
					<td>
						<select name="job">
							<option value="Học sinh">Học sinh</option>
							<option value="Sinh viên">Sinh viên</option>
							<option value="Giáo viên">Giáo viên</option>
							<option value="Khác">Khác</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><p>Sở thích</p></td>
					<td>
						<input type="checkbox" name="hobbies[]" value="Thể thao">Thể thao
						<input type="checkbox" name="hobbies[]" value="Du lịch">Du lịch <br> 
						<input type="checkbox" name="hobbies[]" value="Âm nhạc">Âm nhạc
						<input type="checkbox" name="hobbies[]" value="Thời trang">Thời trang
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" value="Đăng ký" name="submit_click" disabled="disabled">
						<input type="reset" value="Làm lại">
					</td>
				</tr>
			</table>
		</form>
	</div>

	<script>
		var pass = document.getElementById("pass");
		var repass = document.getElementById("repass");
		var tick = document.getElementById("tick");
		var submit = document.querySelector('input[type="submit"]');
		repass.oninput = function () {
			if (pass.value === repass.value && pass.value !== "") {
				pass.style.backgroundColor = "lightgreen";
				repass.style.backgroundColor = "lightgreen";
				tick.innerHTML = "&#10004;";
				submit.disabled = false;
			}
			else {
				repass.style.backgroundColor = "#ff6666";
				tick.innerHTML = "";
			}
		}
	</script>
</body>
</html>