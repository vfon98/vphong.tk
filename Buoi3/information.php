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
	<style>
		body {
			background-color: #1396C2;
		}
		#container {
			position: relative;
			width: 60%;
			margin: 0 auto;
			box-shadow: 4px 4px 10px grey;
		}
		table {
			border: 1px solid red;
			width: 100%;
			background-color: #013082;
			color: white;
		}
		table tr th {
			width: 350px;
		}
		table tr td {
			font-size: 1.2em;
			padding-left: 15px;
			padding-right: 50px;
		}
		img#usr-avatar {
			margin: 15px;
			width: 350px;
			height: auto;
			border: 2px solid white;
			border-radius: 8px;
		}
		#title {
			padding: 20px;
			border-bottom: 1px dashed red;
			font-weight: bold;
			color: orange;
			text-align: center;
			font-size: 30px;
		}
		#logout {
			width: 100%;
			padding: 15px;
		}
	</style>
</head>
<body>
	<div id="container">
		<table>
			<tr><td id="title" colspan="2">Chào bạn <?php echo $usr; ?>!</td></tr>
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
					<form action="sign_out.php" method="POST"><input type="submit" value="Đăng xuất" id="logout"></form>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>