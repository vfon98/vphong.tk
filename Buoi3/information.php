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
		header("location:/");
	}

	$conn->close();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thông tin cá nhân</title>
	<style>
		#container {
			float: left;
			padding: 10px;
			border: 1px solid red;
			/*margin: 0 auto;*/
		}
		table {
			background-color: lightgrey;
			margin: 0 auto;
		}
		table tr td {
			/*width: 200px;*/
		}
		img#usr-avatar {
			width: 300px;
			height: auto;
		}
		#title {
			color: red;
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
		<table border="1">
			<tr><td id="title" colspan="2">Chào bạn <?php echo $usr; ?></td></tr>
			<tr>
				<th rowspan="6">
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
					<form action="logout.php"><input type="submit" value="Đăng xuất" id="logout"></form>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>