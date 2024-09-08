<?php
			session_start();
			$ulid = $_SESSION['ulid'];
			include "connection.php";
			if(isset($_GET['proid'])){
					$proid = $_GET['proid'];
					$catid = $_GET['catid'];

					$q6 = "SELECT * FROM cart_tbl WHERE l_id='$ulid' AND pro_id='$proid' AND status=1";
					$res6 = mysqli_query($con, $q6);
					$n = mysqli_num_rows($res6);
					if($n==0){
							$q4 = "INSERT INTO cart_tbl(l_id, pro_id, quantity, status) VALUES ('$ulid', '$proid', 1, 1)";
							$res4 = mysqli_query($con, $q4);

							$q5 = "UPDATE product_detail SET pro_quantity = pro_quantity - 1 WHERE pro_id='$proid'";
							$res5 = mysqli_query($con, $q5);

							if($res4 && $res5){
									echo "<script LANGUAGE='JavaScript'>
										  window.alert('Product added to cart successfully.');
										  window.location.href='products.php?catid=$catid';
										  </script>";
							}
					}else{
							echo "<script LANGUAGE='JavaScript'>
								  window.alert('Product already added to cart.');
								  window.location.href='products.php?catid=$catid';
								  </script>";
					}
			}

?>