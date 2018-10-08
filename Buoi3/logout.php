<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
session_destroy();
echo "<h1>Đăng xuất thành công</h1>";
?>