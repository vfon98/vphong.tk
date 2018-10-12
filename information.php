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
</head>
<body>
	<div id="container">
		<table id="usr-info">
			<tr>
				<td colspan="2" class="title"><h1>Chào bạn <?php echo $usr; ?> !</h1></td>
			</tr>
			<tr>
				<th rowspan="5">
					<?php 
						echo '<img id="usr-avatar" src="' . $usr_avatar . '" alt="Ảnh bạn upload bị lỗi"/>';
					 ?>
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
					<a href="add_product.html"><input type="text" value="Thêm sản phẩm"></a>
					<a href="product_list.php"><input type="text" value="Danh sách sản phẩm"></a>
					<a href="sign_out.php"><input type="text" value="Đăng xuất"></a>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>