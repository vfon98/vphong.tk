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
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
			<table>
				<tr>
					<td><p>Tên đăng nhập</p></td>
					<td><input type="text" name="usr" required="required"></td>
				</tr>
				<tr>
					<td><p>Mật khẩu</p></td>
					<td><input type="password" name="pass" required="required"></td>
				</tr>
				<tr>
					<td><p>Gõ lại mật khẩu</p></td>
					<td><input type="password" name="re_pass" required="required"></td>
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
						<input type="submit" value="Đăng ký" name="submit_click">
						<input type="reset" value="Làm lại">
					</td>
				</tr>
			</table>
		</form>
	</div>
	<?php 
	if (isset($_POST['submit_click'])) {
		unset($_POST['submit_click']);
		$usr = $_POST['usr'];
		$pass = md5($_POST['pass']);
		$re_pass = $_POST['re_pass'];
		$gender = $_POST['gender'];
		$job = $_POST['job'];
		$file_location = "";
		$signup_ok = false;

		$hobbies = "";
		if (isset($_POST['hobbies'])) {
			foreach ($_POST['hobbies'] as $key => $value) {
				if ($value !== end($_POST['hobbies'])) {
					$hobbies .= $value . ", ";
				}
				else {
					$hobbies .= $value;
				}
			}
		}
		echo $hobbies;

		if (isset($_FILES['usr_avatar']) && $_FILES['usr_avatar']['error'] === 0) {
			$is_img = getimagesize($_FILES['usr_avatar']['tmp_name']);
			if ($is_img) {
				$file_location = "upload/usr-avatar/" . $_FILES['usr_avatar']['name'];
				move_uploaded_file($_FILES['usr_avatar']['tmp_name'], $file_location);
			}
			else {
				echo 'Khong phai hinh';
			}
		}

		require 'sql_connection.php';
		if ($signup_ok) {
			$sql = "INSERT INTO thanhvien VALUES
			(null, '$usr', '$pass', '$file_location', '$gender', '$job', '$hobbies')";
			echo $sql;
			if($conn->query($sql)) {
				echo '<br>Them thành cong';
			}
			else {
				echo '<br>That bại';
			}
			$conn->close();
		}
	}
	?>
</body>
</html>