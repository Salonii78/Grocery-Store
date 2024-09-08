<?php
	include "connection.php";
	if(isset($_GET['cartid']) && isset($_GET['proid'])){
		$cartid = $_GET['cartid'];
		$proid = $_GET['proid'];
		$q1 = "UPDATE cart_tbl SET quantity = quantity + 1 WHERE cart_id='$cartid'";
		$res1 = mysqli_query($con, $q1);

		$q2 = "UPDATE pro_detail SET pro_quantity = quantity - 1 WHERE pro_id='$proid'";
		$res2 = mysqli_query($con, $q2);

		header("location:cart.php");
	}
?>