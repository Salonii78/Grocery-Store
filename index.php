<?php
	include "header.php";
	if(isset($_GET['proid'])){
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
						window.location.href = 'index.php';
						</script>";
				}
		}else{
				echo "<script LANGUAGE='JavaScript'>
						window.alert('Product already added to cart.');
						window.location.href = 'index.php';
						</script>";
		}
	}
?>
<div data-vide-bg="video/video">
    <div class="container">
		<div class="banner-info">
			<br/><h3>Online Groceries Shopping</h3><br/>
			<!-- <div class="search-form">
				<form action="#" method="post">
					<input type="text" placeholder="Search..." name="Search...">
					<input type="submit" value=" " >
				</form>
			</div>	 -->	
		</div>	
    </div>
</div>

    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')</script>
    <script src="js/jquery.vide.min.js"></script>

<!--content-->
<!-- <div class="banner-top">
	<div class="container">
		<h3>Home</h3>
		<div class="clearfix"> </div>
	</div>
</div> -->
	<div class="product">
		<div class="container">
			<div class="spec">
				<h3>Latest Products</h3>
				<div class="ser-t">
					<b></b>
					<span><i></i></span>
					<b class="line"></b>
				</div>
			</div>
				<div class="con-w3l">
					<?php
							$q3 = "SELECT * FROM product_detail ORDER BY pro_id DESC LIMIT 4";
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
							<img style="height:20rem;" src="admin/productimages/<?php echo $proimg;?>" class="img-responsive" alt="">
						</a>
					</div>
					<div class="mid-1">
						<div class="women">
						<span>
							<a href="single.php?proid=<?php echo $proid;?>"><?php echo $proname;?>
							</a>
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
									onclick="return confirm('cannot add an item to cart as an out of stock!!!');">Add to Cart</a>
								</div>
								<?php
								}else{
									echo "<div class='add'>
											<a href='?proid=$proid' class='btn btn-danger my-cart-b'>Add to Cart</a>
											</div>";
									}
								}
								?>
							</div>
						</div>
					</div>
				<?php
					}
				?>
			<div class="clearfix"></div>
			</div>
		</div>
	</div>

<div style="margin-bottom:10rem;">
		<div class="container">
			<div class="spec ">
				<h3>Happy Users & Feedbacks</h3>
				<div class="ser-t">
					<b></b>
					<span><i></i></span>
					<b class="line"></b>
				</div>
			</div>
				<div class=" con-w3l">
				<?php
					$q1 = "SELECT * FROM feedback_tbl";
					$res1 = mysqli_query($con, $q1);
					while($row1 = mysqli_fetch_array($res1)){
						$lid = $row1['l_id'];
						$rate = $row1['ratings'];
						$comment = $row1['comment'];

						$q2 = "SELECT * FROM detail_tbl WHERE l_id='$lid'";
						$res2 = mysqli_query($con, $q2);
						$row2 = mysqli_fetch_array($res2);
						$name = $row2['name'];
						$dp = $row2['dp'];
				?>
							<div class="col-md-3 pro-1">
								<div class="col-m">
									<div class="offer-img">
										<img style="border-radius:50%;" src="photos/<?php echo $dp;?>" class="img-responsive" alt="">
									</div>
									<div class="mid-1">
										<div class="women">
											<h6><?php echo $comment;?></h6>			
										</div>
										<div class="mid-2">
											<p class="item_price"><?php echo $name;?></p>
											  	<div class="block">
												<?php
				                                    for($i=1; $i<=5; $i++) { 
				                                      if ($rate >= 1) { 
				                                        echo '<i style="color:blue;" class="fas fa-star"></i>';
				                                        $rate--;
				                                      }else{
				                                          echo '<i style="color:blue;" class="far fa-star"></i>';
				                                      }
				                                  }
				                                ?>
												</div>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							</div>
				<?php
					}
				?>
			</div>
		</div>
	</div>
<?php
	include "footer.php";
?>