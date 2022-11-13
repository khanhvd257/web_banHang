<?php
	session_start();
	unset($_SESSION['user']);
	header("Location: /BTL_WEB/auth");
?>