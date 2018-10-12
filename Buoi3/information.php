<?php
session_start();
require 'sql_connection.php';	

if (isset($_SESSION['usr'])) {
	$usr = $_SESSION['usr'];
	$sql = "SELECT * FROM thanhvien WHERE tendangnhap = '$usr'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$usr_avatar = $row['hinhanh'];
		$gender = $row['gioitinh'];
		$job = $row['nghenghiep'];
		$hobbies = $row['sothich'];
	}
}
else {
	echo "<h1>Bạn chưa đăng nhập</h1>";
	header("location: sign_in.php");
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thông tin cá nhân</title>
	<link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico">
	<link rel="stylesheet" href="info.css">
	<style>
	form input {
		box-shadow: 0px 0px 15px 2px white;
		color: white;
		font-weight: bold;
		background-color: green;
	}
	#logout {
		background-color: #C9302C;
		width: 110px;
	}
	#logout:hover {
		color: black;
		background-color: orange !important;
	}
	form input:hover {
		color: yellow;
		background-color: darkgreen !important;
	}
</style>
</head>
<body>
	<div class="container">
		<table class="info">
			<tr>
				<td colspan="2" class="title"><h1>Chào bạn <?php echo $usr; ?> !</h1></td>
			</tr>
			<tr>
				<th rowspan="5">
					<img class="avatar" src="<?php echo $usr_avatar; ?>" alt="Ảnh bạn upload bị lỗi">
				</th>
				<td><b>Nickname:</b> <?php echo $usr; ?></td>
			</tr>
			<tr>
				<td><b>Giới tính:</b> <?php echo $gender ?></td>
			</tr>
			<tr>
				<td><b>Nghề nghiệp:</b> <?php echo $job ?></td>
			</tr>
			<tr>
				<td><b>Sở thích:</b> <?php echo $hobbies ?></td>
			</tr>
			<tr>
				<td>
					<div>
						<form action="add_product.php" method="POST"><input type="submit" value="Thêm sản phẩm"></form>
						<form action="product_list.php" method="POST"><input type="submit" value="Danh sách sản phẩm"></form>
						<form action="sign_out.php" method="POST"><input type="submit" value="Đăng xuất" id="logout"></form>
					</div>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>