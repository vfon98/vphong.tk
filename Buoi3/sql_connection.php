<?php 
$conn = new mysqli("localhost", "root", "", "Buoi3");
mysqli_set_charset($conn, "utf8");
if ($conn->connect_error) {
	die("Khong the ket noi Database");
}
?>