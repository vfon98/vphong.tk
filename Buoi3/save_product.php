<?php
session_start();
header("Content-Type: text/html; charset=utf-8");

if (isset($_SESSION['usr']) && isset($_SESSION['id_thanhvien'])) {
	$usr = $_SESSION['usr'];
	$id_thanhvien = $_SESSION['id_thanhvien'];
	$name = $_POST['product-name'];
	$detail = $_POST['product-detail'];
	$price = $_POST['product-price'];
	$file_location = "";

	if (isset($_FILES['product-avatar']) && $_FILES['product-avatar']['error'] === 0) {
		$is_img = getimagesize($_FILES['product-avatar']['tmp_name']);
		if ($is_img) {
			$file_location = "upload/product-avatar/" . $_FILES['product-avatar']['name'];
			if (!file_exists($file_location)) {
				move_uploaded_file($_FILES['product-avatar']['tmp_name'], $file_location);
			}
		}
	}

	require 'sql_connection.php';
		// $sql = "SELECT id FROM thanhvien WHERE tendangnhap = '$usr'";
		// $result = $conn->query($sql);
		// $row = $result->fetch_assoc();
		// $id_thanhvien = $row['id'];


	$sql = "INSERT INTO sanpham VALUES ('', '$name', '$detail', '$price', '$file_location', '$id_thanhvien')";
	$conn->query($sql);
		// echo $sql;
	header("location: product_list.php");
	$conn->close();
}
else {
	header("location: sign_in.php");
}
?>