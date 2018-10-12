<?php 
	if (isset($_GET['q'])) {
		$id = $_GET['q'];
		$sql = "SELECT * FROM sanpham WHERE idsp = '$id'";
		require 'sql_connection.php';
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$name = $row['tensp'];
			$avatar = $row['hinhanhsp'];
			$detail = $row['chitietsp'];
			$price = $row['giasp'];
		}
	}
	else {
		header("location: sign_in.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chi tiết sản phẩm</title>
	<link rel="stylesheet" href="info.css">
	<style>
		table td {
			padding: 10px !important;
		}
		#avatar {
			width: 350px !important;
		}
	</style>
</head>
<body>
	<div class="container">
		<table class="info">
			<tr>
				<th colspan="2" class="title"><h1>Sản phẩm: <?php echo $name; ?></h1></th>
			</tr>
			<tr>
				<td rowspan="4"><img id="avatar" src="<?php echo $avatar; ?>" alt="Bạn chưa upload ảnh"></td>
				<td><b>Tên sản phẩm:</b> <?php echo $name; ?></td>
			</tr>
			<tr>
				<td><b>Chi tiết sản phẩm:</b> <?php echo $detail; ?></td>
			</tr>
			<tr>
				<td><b>Giá tiền:</b> <?php echo $price; ?> VND</td>
			</tr>
			<tr>
				<td>
					<form action="product_list.php" method="POST">
						<input type="submit" value="Danh sách sản phẩm">
					</form>
					<form action="sign_out.php" method="POST">
						<input type="submit" value="Đăng xuất">
					</form>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>