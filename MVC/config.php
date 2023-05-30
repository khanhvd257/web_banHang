<?php

//lay du lieu Muc chung
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopBanHang";
$conn = mysqli_connect($servername, $username, $password, $dbname);
date_default_timezone_set('Asia/Ho_Chi_Minh');



// define('_DIR_ROOT', __DIR__); //Lấy ra thư mục trong ổ
// //echo _DIR_ROOT;
// //Xử lí http root
// if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
// 	$web_root = 'https://' . $_SERVER['HTTP_HOST'];
// } else {
// 	$web_root = 'http://' . $_SERVER['HTTP_HOST'];
// }
// $folder_root = str_replace('\\', '/', strtolower(_DIR_ROOT));
// $folder = str_replace(strtolower($_SERVER['DOCUMENT_ROOT']), '', $folder_root);
// $web_root = $web_root . $folder;

// define('_WEB_ROOT', $web_root);
// 	echo _DIR_ROOT;


include "./mvc/bridge.php";
