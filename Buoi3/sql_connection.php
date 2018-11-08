<?php 
// $conn = new mysqli("localhost", "id7075750_vfon", "vphong98", "id7075750_buoi3");
$conn = new mysqli("localhost", "root", "", "Buoi3");
mysqli_set_charset($conn, "utf8");
if ($conn->connect_error) {
	die("Khong the ket noi Database");
}
?>