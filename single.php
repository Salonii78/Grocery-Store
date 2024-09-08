<?php
		include "header.php";
			if(isset($_POST['formsubmit'])){
					$proid = $_GET['proid'];

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
										  </script>";
							}
					}else{
							echo "<script LANGUAGE='JavaScript'>
								  window.alert('Product already added to cart.');
								  </script>";
					}
			}
?>
<div class="banner-top">
	<div class="container">
		<h3 >Product</h3>
		<h4><a href="index.php">Home</a><label>/</label>Product</h4>
		<div class="clearfix"> </div>
	</div>
</div>
		<div class="single">
			<div class="container">
				<div class="single-top-main">
					<?php
						if(isset($_GET['proid'])){
								$proid = $_GET['proid'];
								$q1 = "SELECT * FROM product_detail WHERE pro_id='$proid'";
								$res1 = mysqli_query($con, $q1);
								$row1 = mysqli_fetch_array($res1);
								$proid = $row1['pro_id'];
								$proname = $row1['pro_name'];
								$proimg = $row1['pro_image'];
								$prodesc = $row1['pro_desc'];
								$proprice = $row1['pro_price'];
								$proquan = $row1['pro_quantity'];
					?>
	   			<div class="col-md-5 single-top">
	   				<div class="single-w3agile">
								<div id="picture-frame">
									<img style="height:30rem;width:100%;" src="admin/productimages/<?php echo $proimg;?>" data-src="admin/productimages/<?php echo $proimg;?>" alt="" class="img-responsive"/>
								</div>
								<script src="js/jquery.zoomtoo.js"></script>
								<script>
								$(function() {
									$("#picture-frame").zoomToo({
										magnify: 1
									});
								});
							</script>
						</div>
					</div>
			<div class="col-md-7 single-top-left ">
					<div class="single-right">
							<h3><?php echo $proname;?></h3>
							 <div class="pr-single">
							  <p class="reduced ">
							  	<?php
									if($proquan<1){
										echo '<p style="color:red;">Out Of Stock</p>';
									}
								?>	
							  </p>
							</div>
							<div class="block block-w3">
								<?php echo $proprice;?> Rs.
							</div>
							<p class="in-pa"><?php echo $prodesc;?></p>
							<div class="add add-3">
							<form method="post">
							<?php
								if(!isset($_SESSION['uemail'])){
							?>
									<button class="btn btn-danger my-cart-btn my-cart-b" onclick="return confirm('You must need to login to add an item to cart!!!');">Add to Cart</button>
							<?php
								}
								else{
									if($proquan<1){
							?>
									<button class="btn btn-danger my-cart-btn my-cart-b" onclick="return confirm('Cannot add an item to cart as an out of stock!!!');">Add to Cart</button>
							<?php
									}else{
							?>	
									<button class="btn btn-danger my-cart-btn my-cart-b" name="formsubmit">Add to Cart</button>
							<?php
									}
								}
							?>
						</form>
							</div>
						<div class="clearfix"> </div>
				</div>
				</div>
				<?php
						}
				?>
		   <div class="clearfix"> </div>
	   </div>	
	</div>
</div>
		<!---->
<div class="content-top offer-w3agile">
</div>
<?php
		include "footer.php";
?>