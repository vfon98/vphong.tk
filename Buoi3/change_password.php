<?php
session_start();
if (isset($_SESSION['usr'])) {
	$usr = $_SESSION['usr'];
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		require 'sql_connection.php';
		$sql = "SELECT matkhau FROM thanhvien WHERE tendangnhap = '$usr'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		if ($row['matkhau'] != md5($_POST['old-pass'])) {
			echo '<i style="color: red;">Mật khẩu cũ không đúng !</i>';
		}
		else {
			$new_pass = md5($_POST['new-pass']);
			$sql = "UPDATE thanhvien SET matkhau = '$new_pass' WHERE tendangnhap = '$usr'";
			$conn->query($sql);
			header("location: sign_in.php");
		}
		$conn->close();
	}
}
else {
	header("location: redirect.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đổi mật khẩu tài khoản</title>
	<style>
		table th {
			text-align: left;
		}
	</style>
</head>
<body>
	<div>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
			<table>
				<tr>
					<th>Mật khẩu cũ</th>
					<td><input type="password" name="old-pass" required="required"></td>
				</tr>
				<tr>
					<th>Mật khẩu mới</th>
					<td><input type="password" name="new-pass" id="new-pass" required="required"></td>
				</tr>
				<tr>
					<th>Nhập lại mật khẩu mới</th>
					<td>
						<input type="password" name="renew-pass" id="renew-pass" required="required">
						<div id="warning"></div>
					</td>
				</tr>
				<tr>
					<th colspan="2">
						<input type="submit" value="Đổi mật khẩu" id="submit-btn" disabled="disabled">
						<input type="button" value="Hủy bỏ" onclick="location.href='sign_in.php'">
					</th>
				</tr>
			</table>
		</form>
	</div>
	<script>
		window.onload = function () {
			var newPass = document.getElementById('new-pass');
			var renewPass = document.getElementById('renew-pass');
			var warning = document.getElementById('warning');
			var submitBtn = document.getElementById('submit-btn');
			renewPass.oninput = function () {
				if (newPass.value != renewPass.value) {
					warning.innerHTML = '<i style="color: red;">Mật khẩu không trùng nhau</i>';
					submitBtn.disabled = true;
				}
				else {
					warning.innerHTML = '';
					submitBtn.disabled = false;
				}
			}
		}
	</script>
</body>
</html>