<?php
if (isset($_GET['q'])) {
	$id = $_GET['q'];
	require 'sql_connection.php';
	$sql = "SELECT * FROM sanpham WHERE idsp = '$id'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$tensp = $row['tensp'];
	}

	$conn->close();
}
else {
	header("location: product_list.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chỉnh sửa sản phẩm</title>
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
	table th {
		text-align: left;
	}
	img {
		width: 50px;
	}
</style>
</head>
<body>
	<div class="container">
		<h1>Chỉnh sửa thông tin cho sản phẩm</h1>
		<h1 style="color: orange;">-- <?php echo $tensp; ?> --</h1>
		<p>Điền thông tin cần chỉnh sửa</p>
		<div class="form">
			<form action="update_product.php?q=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
				<table width="100%">
					<tr>
						<td colspan="2" style="text-align: center;">
							<img src="<?php echo $row['hinhanhsp'] ?>" alt="chưa có ảnh đại diện">
						</td>
					</tr>
					<tr>
						<th>Tên sản phẩm</th>
						<td><input type="text" name="name" autofocus="autofocus"></td>
					</tr>
					<tr>
						<th>Chi tiết sản phẩm</th>
						<td>
							<textarea name="detail" cols="30" rows="6"></textarea>
						</td>
					</tr>
					<tr>
						<th>Giá sản phẩm</th>
						<td><input type="number" name="price" min="0" required="required" max="1000000000" step="5000">(VND)</td>
					</tr>
					<tr>
						<th>Hình đại diện</th>
						<td><input type="file" name="avatar"></td>
					</tr>
					<tr>
						<th></th>
						<td>
							<input type="submit" value="Lưu thay đổi">
							<form action="product_list.php" method="POST">
								<input type="submit" value="Hủy bỏ">
							</form>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</body>
</html>