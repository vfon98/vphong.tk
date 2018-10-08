<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
if (isset($_POST['submit_click'])) {
	$usr = $_POST['usr'];
	$pass = md5($_POST['pass']);
	$re_pass = $_POST['re_pass'];
	$gender = $_POST['gender'];
	$job = $_POST['job'];
	$file_location = "";
	$signup_ok = true;

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
	echo $hobbies;

	if (isset($_FILES['usr_avatar']) && $_FILES['usr_avatar']['error'] === 0) {
		$is_img = getimagesize($_FILES['usr_avatar']['tmp_name']);
		if ($is_img) {
			$file_location = "upload/usr-avatar/" . $_FILES['usr_avatar']['name'];
			if (!file_exists($file_location)) {
				move_uploaded_file($_FILES['usr_avatar']['tmp_name'], $file_location);
			}
		}
		else {
			echo '<h1 style="color:red; text-align:center;">File bạn upload không phải hình ảnh</h1>';
		}
	}

	require 'sql_connection.php';
	if ($signup_ok) {
		$sql = "INSERT INTO thanhvien VALUES
		(null, '$usr', '$pass', '$file_location', '$gender', '$job', '$hobbies')";
		if($conn->query($sql)) {
			echo $sql . "<br>";
			echo '<br>Them thành cong';
		}
		else {
			echo '<br>That bại';
		}
		$conn->close();
		$_SESSION['usr'] = $usr;
		header("location:information.php");
	}
}
?>