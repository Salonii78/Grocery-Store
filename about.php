<?php
	include "header.php";
	$q1 = "SELECT * FROM product_detail";
    $res1 = mysqli_query($con, $q1);
    $tproducts = mysqli_num_rows($res1);

    $q2 = "SELECT * FROM login_tbl WHERE role=2";
    $res2 = mysqli_query($con, $q2);
    $tcustomers = mysqli_num_rows($res2);

    $q3 = "SELECT * FROM product_order";
    $res3 = mysqli_query($con, $q3);
    $torders = mysqli_num_rows($res3);

    $q4 = "SELECT * FROM feedback_tbl";
    $res4 = mysqli_query($con, $q4);
    $tfeedbacks = mysqli_num_rows($res4);
?>
    <!--banner-->
<div class="banner-top">
	<div class="container">
		<h3 >About</h3>
		<h4><a href="index.php">Home</a><label>/</label>About</h4>
		<div class="clearfix"> </div>
	</div>
</div>

<!-- faqs -->
	<div class="about-w3 ">
		<div class="container">
			<div  class="about">
				<div class="spec ">
					<h3>About</h3>
						<div class="ser-t">
							<b></b>
							<span><i></i></span>
							<b class="line"></b>
						</div>
				</div>
			
			<div class="col-md-4 about-right">
			<img class="img-responsive" src="images/ab.jpg" alt="">
			</div>
			<div class="col-md-4 about-left">
				<h3><b>Why Should I buy products from The Online Groceries Shop?</b></h3>
				<p>The Online Groceries Shop is the leader in Indian e-commerce with maximum online reach and highest credibility. With more than 10 crore registered customers, 10 million daily page visits and the lowest cost of doing business.</p>
			</div>
			<div class="col-md-4 about-right">
			<img class="img-responsive" src="images/ab1.jpg" alt="">
			</div>
			
			<div class="clearfix"> </div>
		</div>
	</div>
	<!--//about-->
<?php
		include "footer.php";
?>