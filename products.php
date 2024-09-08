<?php
	include "header.php";
?>

<div class="banner-top">
	<div class="container">
		<h3>Products</h3>
		<h4><a href="index.php">Home</a><label>/</label>Products</h4>
		<div class="clearfix"> </div>
	</div>
</div>

		<div class="product">
		<div class="container">
			<div class="spec ">
				<h3>Products</h3>
				<div class="ser-t">
					<b></b>
					<span><i></i></span>
					<b class="line"></b>
				</div>
			</div>
			<div class=" con-w3l agileinf">
			<?php
				if(isset($_GET['catid'])){
					$catid = $_GET['catid'];
					$q3 = "SELECT * FROM product_detail WHERE pro_cat_id='$catid'";
					$res3 = mysqli_query($con, $q3);
					while($row3 = mysqli_fetch_array($res3))
					{
						$proid = $row3['pro_id'];
						$proname = $row3['pro_name'];
						$proimg = $row3['pro_image'];
						$prodesc = $row3['pro_desc'];
						$proprice = $row3['pro_price'];
						$proquan = $row3['pro_quantity'];
			?>
					<div class="col-md-3 pro-1">
						<div class="col-m">
							<div class="offer-img">
							<a href="single.php?proid=<?php echo $proid;?>" class="offer-img">
								<img style="height:10rem;" src="admin/productimages/<?php echo $proimg;?>" class="img-responsive" alt="">
							</a>
							</div>
							<div class="mid-1">
								<div class="women">
									<span>
										<a href="single.php?proid=<?php echo $proid;?>">
										<?php echo $proname;?></a>
									</span>
									<div class="block">
									<?php
										if($proquan<1){
											echo '<p style="color:red;">Out Of Stock</p>';
										}
									?>	
									</div>
									<div class="clearfix"></div>
									</div>
									<div class="mid-2">
										<p><?php echo $prodesc;?></p><br/>
										<p><em class="item_price"><?php echo $proprice;?> Rs.</em></p>
											<div class="clearfix"></div>
										</div>
										<?php
											if(!isset($_SESSION['uemail'])){
										?>
											<div class="add">
											<a class="btn btn-danger my-cart-b"
											onclick="return confirm('You must need to login to add an item to cart!!!');">Add to Cart</a>
											</div>
										<?php
											}
											else{
												if($proquan<1){
										?>
												<div class="add">
													<a class="btn btn-danger my-cart-b"
													onclick="return confirm('Cannot add an item to cart as an out of stock!!!');">Add to Cart</a>
												</div>	
										<?php
											}else{
												echo "<div class='add'>
														<a href='addtocart.php?catid=$catid&proid=$proid' class='btn btn-danger my-cart-b'>Add to Cart</a>
													</div>";
												}
											}
										?>
									</div>
								</div>
							</div>
							<?php
									}
								}
							?>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
<?php
		include "footer.php";
?>