<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thông tin sản phẩm</title>
	<link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico">
	<link rel="stylesheet" href="info.css">
</head>
<body>
	<div class="container">
		<div id="wrap">
			<?php 
			if (isset($_SESSION['usr']) && isset($_SESSION['id_thanhvien'])) {
				$usr = $_SESSION['usr'];
				$id_thanhvien = $_SESSION['id_thanhvien'];
				echo "<h1 class='title'>Chào bạn $usr !</h1>";
				echo "<p style='padding-left: 1.5%;'>Danh sách sản phẩm của bạn là: </p>";

				require 'sql_connection.php';
				$sql = "SELECT * FROM sanpham WHERE idtv = '$id_thanhvien'";
				$result = $conn->query($sql);
				echo '<table border="1" id="pro-list">';
				echo '<tr>';
				echo '<th>STT</th>';
				echo '<th>Tên sản phẩm</th>';
				echo '<th>Giá sản phẩm</th>';
				echo '<th colspan="3">Lựa chọn</th>';
				echo '</tr>';
				while ($row = $result->fetch_assoc()) {
					echo '<tr>';
					echo '<td class="center-content">' . $row['idsp'] . '</td>';
					echo '<td>' . $row['tensp'] . '</td>';
					echo '<td>' . $row['giasp'] . ' (VND)</td>';
					echo '<td><a href="detail_product.php?q=' . $row['idsp'] . '">Xem chi tiết</a></td>';
					echo '<td class="center-content"><a href="edit_product.php?q=' . $row['idsp'] . '"><img class="modify-icon" src="/img/edit.png"/></a></td>';
					echo '<td class="center-content"><a href="delete_product.php?q=' . $row['idsp'] . '"><img class="modify-icon" src="/img/delete.png"/></a></td>';
					echo '</tr>';
				}
				echo '</table>';
				$conn->close();
			}
			else {
				header("location: redirect.html");
			}
			?>
			<div class="btn-container">
				<form action="add_product.php" method="POST">
					<input type="submit" value="Thêm sản phẩm" class="logout">
				</form>
				<form action="sign_out.php" method="POST">
					<input type="submit" value="Đăng xuất" class="logout">
				</form>
			</div>
		</div>
	</div>
</body>
</html>