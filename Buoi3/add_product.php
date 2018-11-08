<?php 
	session_start();
	if (!isset($_SESSION['usr'])) {
		header("location: redirect.html");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thêm sản phẩm</title>
	<link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico">
	<style>
	.container {
		width: 500px;
		margin: auto;
		border: 1px solid #000;
		padding: 10px;
	}
	.container > h1 {
		color: red;
		text-align: center;
	}
	.container > p {
		text-align: center;
	}
	.form {
		background-color: #d3d3d3;
	}
	table, table td {
		padding: 10px;
	}
</style>
</head>
<body>
	<div class="container">
		<a href="information.php" style="font-weight: bold;">&#8617; Trở lại</a>

		<h1>Thêm sản phẩm mới</h1>
		<p>Vui lòng điền đầy đủ thông tin bên dưới để thêm sản phẩm mới</p>
		<div class="form">
			<form action="save_product.php" method="POST" enctype="multipart/form-data">
				<table>
					<tr>
						<th>Tên sản phẩm</th>
						<td><input type="text" name="product-name" autofocus="autofocus" required="required"></td>
					</tr>
					<tr>
						<th>Chi tiết sản phẩm</th>
						<td><textarea name="product-detail" cols="30" rows="6"></textarea></td>
					</tr>
					<tr>
						<th>Giá sản phẩm</th>
						<td><input type="number" name="product-price" min="0" required="required" max="1000000000" step="5000">(VND)</td>
					</tr>
					<tr>
						<th>Hình đại diện</th>
						<td><input type="file" name="product-avatar"></td>
					</tr>
					<tr>
						<th></th>
						<td>
							<input type="submit" value="Lưu sản phẩm" name="submit-btn">
							<input type="reset" value="Làm lại">
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</body>
</html>