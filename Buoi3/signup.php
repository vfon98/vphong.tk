<?php 
$usr = $_POST['usr'];
$pass = md5($_POST['pass']);
$re_pass = $_POST['re-pass'];
$gender = $_POST['gender'];
$job = $_POST['job'];
$hobbies = "";
if (isset($_POST['hobbies'])) {
	foreach ($_POST['hobbies'] as $key => $value) {
		if ($value !== end($_POST['hobbies'])) {
			$hobbies .= $value . ", ";
		}
		else {
			$hobbies .= $value;
		}
	}
}

require 'sql_connection.php';

$sql = "INSERT INTO thanhvien VALUES
(
	null, '$usr', '$pass', 'Khong co', '$gender', '$job', '$hobbies'
);";
echo $sql;
if($conn->query($sql)) {
	echo '<br>Them thành cong';
}
else {
	echo '<br>That bại';
}
$conn->close();
?>