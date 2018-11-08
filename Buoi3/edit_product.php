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
	table th {
		text-align: left;
	}
	img {
		width: 60px;
		vertical-align: middle;
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
						<td colspan="2" style="text-align: center; padding: 0;">
							<img src="<?php echo $row['hinhanhsp'] ?>" alt="chưa có ảnh đại diện">
						</td>
					</tr>
					<tr>
						<th>Tên sản phẩm</th>
						<td><input type="text" name="name" id="name" autofocus="autofocus" required="required"></td>
					</tr>
					<tr>
						<th>Chi tiết sản phẩm</th>
						<td>
							<textarea name="detail" id="detail" cols="30" rows="6"></textarea>
						</td>
					</tr>
					<tr>
						<th>Giá sản phẩm</th>
						<td><input type="number" name="price" id="price" min="0" max="1000000000" step="5000" required="required">(VND)</td>
					</tr>
					<tr>
						<th>Hình đại diện</th>
						<td><input type="file" name="avatar"></td>
					</tr>
					<tr>
						<th></th>
						<td>
							<input type="submit" value="Lưu thay đổi">
							<input type="button" value="Hủy bỏ" onclick="location.href='product_list.php'">
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
	<script>
		window.onload = function() {
			document.getElementById("name").value = "<?php echo $tensp; ?>";
			document.getElementById("detail").value = "<?php echo $row['chitietsp']; ?>";
			document.getElementById("price").value = "<?php echo $row['giasp']; ?>";
		}
	</script>
</body>
</html>