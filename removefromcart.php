<?php
	session_start();
	$ulid = $_SESSION['ulid'];
	include "connection.php";
	if(isset($_GET['proid'])){
		$proid = $_GET['proid'];
		$cartid = $_GET['cartid'];
		$cqnt = $_GET['cqnt'];
		$q1 = "DELETE FROM cart_tbl WHERE l_id='$ulid' AND pro_id='$proid' AND cart_id='$cartid'";
		$res1 = mysqli_query($con, $q1);

		$q2 = "UPDATE product_detail SET pro_quantity = pro_quantity + $cqnt WHERE pro_id='$proid'";
		$res2 = mysqli_query($con, $q2);

		if($res1){
			echo "<script LANGUAGE='JavaScript'>
					window.alert('Product removed from cart successfully.');
					window.location.href='cart.php';
					</script>";
		}
	}
?>