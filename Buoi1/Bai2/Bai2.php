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
		padding-right: 0;
		background-color: #d3d3d3;
	}
	table td {
		width: 400px;
	}
	table th {
		text-align: left;
	}
	#user-warning, #pass-warning, #repass-warning {
		padding-top: 5px;
		color: red;
		font-style: italic;
		font-weight: bold;
		font-size: 14px;
	}
</style>
</head>
<body>
	<div class="container">
		<h1 style="color: red; text-align: center;">Đăng kí tài khoản mới</h1>
		<p style="text-align: center;">Vui lòng điền đầy đủ thông tin bên dưới để đăng kí tài khoản mới</p>
		<form method="post" action="/Buoi3/sign_up.php" enctype="multipart/form-data" onsubmit="return isValidForm()">
			<table>
				<tr>
					<th><p>Tên đăng nhập</p></th>
					<td>
						<input type="text" name="usr" id="user" autofocus="autofocus" onchange="checkUser()">
						<?php 
						if (isset($_GET['error'])) {
							if ($_GET['error'] === "true") {
								echo '<br><i style="color: red;">Tài khoản đã tồn tại !</i>';
							}
						}
						?>
						<div id="user-warning"></div>
					</td>
				</tr>
				<tr>
					<th><p>Mật khẩu</p></th>
					<td>
						<input type="password" name="pass" id="pass" onchange="checkPass()">
						<div id="pass-warning"></div>
					</td>
				</tr>
				<tr>
					<th><p>Gõ lại mật khẩu</p></th>
					<td>
						<input type="password" name="re_pass" id="repass">
						<span id="tick" style="color: green; font-size: 25px;"></span>
						<div id="repass-warning"></div>
					</td>
				</tr>
				<tr>
					<th><p>Hình đại diện</p></th>
					<td><input type="file" name="usr_avatar" required></td>
				</tr>
				<tr>
					<th><p>Giới tính</p></th>
					<td> 
						<input type="radio" name="gender" id="male" value="Nam"><label for="male">Nam</label>
						<input type="radio" name="gender" id="female" value="Nữ"><label for="female">Nữ</label>
						<input type="radio" name="gender" id="other" value="Khác" checked="checked"><label for="other">Khác</label>
					</td> 
				</tr>
				<tr>
					<th><p>Nghề nghiệp</p></th>
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
					<th><p>Sở thích</p></th>
					<td>
						<input type="checkbox" name="hobbies[]" id="hob1" value="Thể thao"><label for="hob1">Thể thao</label>
						<input type="checkbox" name="hobbies[]" id="hob2" value="Du lịch"><label for="hob2">Du lịch</label> <br> 
						<input type="checkbox" name="hobbies[]" id="hob3" value="Âm nhạc"><label for="hob3">Âm nhạc</label>
						<input type="checkbox" name="hobbies[]" id="hob4" value="Thời trang"><label for="hob4">Thời trang</label>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" value="Đăng ký" name="submit_click" id="submit-btn">
						<input type="reset" value="Làm lại">
					</td>
				</tr>
			</table>
		</form>
	</div>
	<script src="validation.js"></script>
</body>
</html>