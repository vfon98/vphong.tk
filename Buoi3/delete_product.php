<?php 
	if (isset($_GET['q'])) {
		$id = $_GET['q'];
		require 'sql_connection.php';
		$sql = "DELETE FROM sanpham WHERE idsp = $id";
		$conn->query($sql);
		$conn->close();
	}
	header("location: product_list.php");
?>