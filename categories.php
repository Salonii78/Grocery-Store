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
						window.location.href = 'categories.php';
						</script>";
			}
		}else{
			echo "<script LANGUAGE='JavaScript'>
					window.alert('Product already added to cart.');
					window.location.href = 'categories.php';
					</script>";
		}
	}
?>

<div class="banner-top">
	<div class="container">
		<h3>Categories</h3>
		<h4><a href="index.php">Home</a><label>/</label>Categories</h4>
		<div class="clearfix"> </div>
	</div>
</div>

<!--content-->
<div class="kic-top ">
	<div class="container ">
	<div class="kic ">
			<h3>Popular Categories</h3>
		</div>
		<?php
			$q1 = "SELECT * FROM product_category";
			$res1 = mysqli_query($con, $q1);
			while($row1 = mysqli_fetch_array($res1)){
				$catid = $row1['pro_cat_id'];
				$catname = $row1['pro_cat_name'];

				$q2 = "SELECT * FROM product_detail WHERE pro_cat_id='$catid' ORDER BY rand() LIMIT 1";
				$res2 = mysqli_query($con, $q2);
				$row2 = mysqli_fetch_array($res2);
				$proimg = $row2['pro_image'];
		?>
		<div class="col-md-3 pro-1">
			<div class="col-m">
			<a href="products.php?catid=<?php echo $catid;?>" class="offer-img">
				<img style="width:100%;height:20rem;" src="admin/productimages/<?php echo $proimg;?>" class="img-responsive" alt="">
			</a>
			<br/>
			<center><h4><b><?php echo $catname;?></b></h4></center>
		</div>
	</div>
		<?php
			}
		?>
	</div>
</div>

<!--content-->
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
				$q3 = "SELECT * FROM product_detail";
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
									onclick="return confirm('Cannot add an item to cart as an out of stock!!!');">Add to Cart</a>
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
<?php
		include "footer.php";
?>