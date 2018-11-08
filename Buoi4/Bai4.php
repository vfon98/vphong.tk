<?php
session_start();
if (!isset($_SESSION['usr'])) {
	header("location: /Buoi3/redirect.html");
}
$usr = $_SESSION['usr'];
require '../Buoi3/sql_connection.php';
$sql = "SELECT tensp, hinhanhsp FROM sanpham JOIN thanhvien ON idtv = id WHERE tendangnhap = '$usr'";
$result = $conn->query($sql);
// $conn->close();
?>
<!DOCTYPE html>
<html>
<head> 
	<title>Bài 4 - Images from database</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	        
	<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
	<script>
		var IMAGE_PATHS = [];
		<?php
		while ($row = $result->fetch_assoc()) {
			if ($row['hinhanhsp'] != "") {
				echo 'IMAGE_PATHS.push("/Buoi3/'. $row['hinhanhsp'] .'");';
			}
		}
		?>
		var imgIndex = 0;

		function changeSlide(pos) {
			imgIndex += pos;
			if (imgIndex < 0) {
				imgIndex = IMAGE_PATHS.length - 1;
			}
			if (imgIndex >= IMAGE_PATHS.length) {
				imgIndex = 0;
			}
			chooseSlide(imgIndex);
			document.getElementById('laptopSel').value = imgIndex;
		}

		function chooseSlide(pos) {
			document.getElementById('laptopImg').src = IMAGE_PATHS[pos];
			imgIndex = parseInt(pos);
		}
		window.onload = function () {
			chooseSlide(0);
		}
	</script>

</head>	
<body>
	<div id="wrap">
		<div id="title">
			<h1>Bài 4 - Buổi 4</h1>
		</div> <!--end div title-->
		<div id="menu">
			<!-- chèn menu của sinh viên vào-->
		</div> <!--end div menu-->
		<div id="content">
			<!--Nội dung trang web-->
			<h1>Images from database</h1>
			<h3 style="color: red;"><b>Vui lòng thêm ít nhất 2 sản phẩm kèm hình ảnh để hiển thị Slide show</b></h3>

			<form>
				<img id="laptopImg" src="" height="300" alt="Đang load ảnh từ Database, đợi xíu !" />
				<br/>
				<button type="button" onclick="changeSlide(-1)"><i class="fa fa-angle-double-left"></i> Previous</button>
				<button type="button" onclick="changeSlide(1)">Next <i class="fa fa-angle-double-right"></i></button>
				<br/>
				<select id="laptopSel" onchange="chooseSlide(value)">
					<?php
					$count = 0;
					$result = $conn->query($sql);
					while ($row = $result->fetch_assoc()) {
						if ($row['hinhanhsp'] != "") {
							echo "<option value='$count'>" . $row['tensp'] . "</option>";
							$count++;
						}
					}
					$conn->close();
					?>
				</select> 
			</form>
			<a href="../Buoi3/add_product.php" id="add-link">Thêm sản phẩm</a>
		</div> <!--end div content-->
	</div> <!--end div wrap-->
</body>
</html>