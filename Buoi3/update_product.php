<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_GET['q'])) {
		$id = $_GET['q'];
	}
	$name = $_POST['name'];
	$detail = $_POST['detail'];
	$price = $_POST['price'];
	$file_location = "";
	if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
		$is_img = getimagesize($_FILES['avatar']['tmp_name']);
		if ($is_img) {
			$file_location = "upload/product-avatar/" . $_FILES['avatar']['name'];
			if (!file_exists($file_location)) {
				move_uploaded_file($_FILES['avatar']['tmp_name'], $file_location);
			}
		}
	}
	require 'sql_connection.php';
	$sql = "UPDATE sanpham SET tensp = '$name', chitietsp = '$detail', giasp ='$price', hinhanhsp = '$file_location' WHERE idsp = '$id'";
	// echo $sql;
	header("location: product_list.php");
	$conn->query($sql);
}

?>