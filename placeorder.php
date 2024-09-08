<?php
	include "header.php";
	if(!isset($_SESSION['uemail'])){
		echo "<script LANGUAGE='JavaScript'>
			   window.location.href='index.php';
			  </script>";
	}

	$style="width:99%;
			height:5rem;
			margin-bottom:2rem;
			outline:none;
			padding-left:1rem;
			border: 1px solid #CECECE;
			font-size: 13px;
  			color: #5b5b5b;";
  	if(isset($_SESSION['total_amount'])){
		$tamount = $_SESSION['total_amount'];
		if(isset($_POST['formsubmit']))
		{
			$paytype = $_POST['paytype'];
			$add = $_POST['add'];
			$q1 = "INSERT INTO product_order(l_id, total_amount, address, payment_status, order_status) VALUES ('$ulid', '$tamount', '$add', '$paytype', 1)";
			$res1 = mysqli_query($con, $q1);

			$q2 = "SELECT * FROM product_order WHERE l_id='$ulid' ORDER BY order_id DESC LIMIT 1";
			$res2 = mysqli_query($con, $q2);
			$row2 = mysqli_fetch_array($res2);
			$orderid = $row2['order_id'];

			$q3 = "SELECT * FROM cart_tbl WHERE l_id='$ulid' AND status=1";
			$res3 = mysqli_query($con, $q3);
			$count1 = mysqli_num_rows($res3);
			$count2 = 0;
			while($row3 = mysqli_fetch_array($res3)){
				$cartid = $row3['cart_id'];
				$q4 = "INSERT INTO order_items(l_id, cart_id, order_id) 
					  VALUES ('$ulid', '$cartid', '$orderid')";
				$res4 = mysqli_query($con, $q4);
				if($res4){
					$q5 = "UPDATE cart_tbl SET status=0 WHERE cart_id='$cartid'";
					$res5 = mysqli_query($con, $q5);
					if($res5){
						++$count2;
					}
				}
			}

			if($res1 && ($count1==$count2)){
				echo "<script LANGUAGE='javascript'>
						window.alert('Order Placed Successfully!!!');
						window.location.href='cart.php';
					  </script>";
				unset($_SESSION['total_amount']);
			}
		}
	}
?>
	<div class="banner-top">
	<div class="container">
		<h3 >Place Order</h3>
		<h4><a href="index.php">Home</a><label>/</label>Place Order</h4>
		<div class="clearfix"> </div>
	</div>
</div>
<div class="contact">
	<div class="container">
		<div class="spec ">
			<h3>Place Order</h3>
				<div class="ser-t">
					<b></b>
					<span><i></i></span>
					<b class="line"></b>
				</div>
		</div>
		<div class=" contact-w3">	
			<div class="col-md-12 contact-left">
				<div id="container">
					<!--Horizontal Tab-->
					<div id="parentHorizontalTab">
						<div class="resp-tabs-container hor_1">
							<div>
								<form method="post">
									<div class="contact-left">
									<div id="paytype_output"><font color="red">Select Payment Type</font></div><br/>
									<select name="paytype" id="paytype" style="<?php echo $style;?>">
										<option value="0" selected disabled>Select Payment Type</option>
										<option value="1">Online</option>
										<option value="2">Cash On Delivery</option>
									</select>
									<textarea name="add" style="height:12rem;" row="3">Address...</textarea>
									</div>
									<input type="submit" name="formsubmit" id="formsubmit" value="Place Order" onclick="return confirm('Are you sure you want to place this order?');" disabled>
								</form>
							</div>
							<div>
							</div>
						</div>
					</div>
				</div>				
			</div>
		<div class="clearfix"></div>
	</div>
	</div>
</div>
<script>
 $(document).ready(function(){
    $('#paytype').on('change', function(){   
        var paytype = $(this).val(); 
        if(paytype){
            if(paytype==0){
                document.getElementById('formsubmit').disabled = true;
                $("#paytype_output").show();
            }else{
                document.getElementById('formsubmit').disabled = false;
                $("#paytype_output").hide();
            }
        }else{
            alert("No value in CG");       
        }
    });
  });
</script>
<?php
	include "footer.php";
?>