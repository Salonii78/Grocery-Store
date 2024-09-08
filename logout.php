<?php
	include "connection.php";
	session_start();
	unset($_SESSION['uemail']);
	unset($_SESSION['total_amount']);
	header("location:index.php");
?>