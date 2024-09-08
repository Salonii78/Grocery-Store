<?php
	include "header.php";
	if(!isset($_SESSION['uemail'])){
		echo "<script LANGUAGE='JavaScript'>
					window.location.href='index.php';
					</script>";
	}

	if(isset($_GET['type'])){
		if($_GET['type']=='increase')
		{
			if(isset($_GET['cartid']) && isset($_GET['proid']))
			{
				$cartid = $_GET['cartid'];
				$proid = $_GET['proid'];
				$q1 = "UPDATE cart_tbl SET quantity = quantity + 1 WHERE cart_id='$cartid'";
				$res1 = mysqli_query($con, $q1);
				$q2 = "UPDATE product_detail SET pro_quantity = pro_quantity - 1 WHERE pro_id='$proid'";
				$res2 = mysqli_query($con, $q2);
				if($res1 && $res2){
					echo '<script LANGUAGE="JavaScript">
							window.location.href = "cart.php";
							</script>';
				}
			}
		}
		else if($_GET['type']=='decrease')
		{
			if(isset($_GET['cartid']) && isset($_GET['proid']))
			{
				$cartid = $_GET['cartid'];
				$proid = $_GET['proid'];
				$q1 = "UPDATE cart_tbl SET quantity = quantity - 1 WHERE cart_id='$cartid'";
				$res1 = mysqli_query($con, $q1);
				$q2 = "UPDATE product_detail SET pro_quantity = pro_quantity + 1 WHERE pro_id='$proid'";
				$res2 = mysqli_query($con, $q2);
				if($res1 && $res2){
					echo '<script LANGUAGE="JavaScript">
							window.location.href = "cart.php";
							</script>';
				}
			}
	 	}
	}
?>

   <!--banner-->
<div class="banner-top">
	<div class="container">
		<h3 >My Cart</h3>
		<h4><a href="index.php">Home</a><label>/</label>My Cart</h4>
		<div class="clearfix"> </div>
	</div>
</div>

	<!-- contact -->
		<div class="check-out">	 
		<div class="container">	 
	 <div class="spec ">
				<h3>My Cart</h3>
					<div class="ser-t">
						<b></b>
						<span><i></i></span>
						<b class="line"></b>
					</div>
			</div>
		<?php
				$q1 = "SELECT * FROM cart_tbl WHERE l_id='$ulid' AND status=1";
		  		$res1 = mysqli_query($con, $q1);
		  		$num = mysqli_num_rows($res1);
		  		if($num>0){
				 		echo '<table class="table ">
								  <tr>
								  	<th class="t-head">Sr. No</th>
										<th class="t-head">Products</th>
										<th class="t-head">Price</th>
										<th class="t-head">Quantity</th>
										<th class="t-head">Purchase</th>
								  </tr>';
		  			$count = 0;
		  			$total_amount = 0;
		  			while($row1 = mysqli_fetch_array($res1)){
		  				$proid = $row1['pro_id'];
		  				$cartid = $row1['cart_id'];
		  				$cartquan = $row1['quantity'];

		  				$q2 = "SELECT * FROM product_detail WHERE pro_id='$proid'";
		  				$res2 = mysqli_query($con, $q2);
		  				$row2 = mysqli_fetch_array($res2);
		  				$proid = $row2['pro_id'];
							$proname = $row2['pro_name'];
							$proimg = $row2['pro_image'];
							$prodesc = $row2['pro_desc'];
							$proprice = $row2['pro_price'];
							$proquan = $row2['pro_quantity'];
							$amount = $cartquan * $proprice;
							$total_amount+=$amount;
		  ?>
		  <tr class="cross">
		  	<form action="placeorder.php" method="post">
		  	<td class="t-data"><?php echo ++$count;?></td>
			<td class="ring-in t-data">
				<a href="#" class="at-in">
					<img style="height:10rem;width:12rem;" src="admin/productimages/<?php echo $proimg;?>" class="img-responsive" alt="">
				</a>
			<div class="sed">
				<h5><?php echo $prodesc;?></h5>
			</div>
			 </td>
			<td class="t-data"><span id="price"><?php echo $proprice*$cartquan;?> Rs.</span></td>
			<td class="t-data">
				<div class="quantity"> 
					<div class="quantity-select">
					<?php
						if($cartquan>1){
								echo "<a class='entry value-minus' 
								href='?cartid=$cartid&proid=$proid&type=decrease'>&nbsp;
								</a>";
						}else{
								echo '<a class="entry value-minus" disabled>&nbsp;</a>';
						}
					?>
						<div class="entry value"><span class="span-1"><?php echo $cartquan;?></span></div>
						<?php
							if($proquan>0){
								echo "<a class='entry value-plus' 
								href='?cartid=$cartid&proid=$proid&type=increase'>&nbsp;
								</a>";
							}else{
						?>
						<a class="entry value-plus" 
							onclick="return confirm('Now You cannot add more quantity!!!');">&nbsp;
						</a>
						<?php
							}
						?>
					</div>
				</div>
			</td>
			<td class="t-data t-w3l"><a class="add-1" style="background-color:red;" 
				href="removefromcart.php?proid=<?php echo $proid;?>&cartid=<?php echo $cartid;?>&cqnt=<?php
				echo $cartquan;?>">
				Remove From Cart</a></td>
		  </tr>
		  <?php
		  			}
		  			echo '<table>';
		  			$_SESSION['total_amount'] = $total_amount;
		  	?>
		  			<center>
		  				<label>Total Amount: <?php echo $total_amount;?> Rs.</label>&nbsp;&nbsp;&nbsp;&nbsp;
		  				<button class="add-1" name="order">Order Now</button>
		  			</center>
		  		</form>
		  	<?php
		  		}
		  		else{
		  				echo '<div class="alert alert-danger" role="alert" id="my-cart-empty-message">Your cart is empty</div>';
		  		}
		  ?>
		</table>
		 </div>
		 </div>
		 	
	<!--<script type="text/javascript">
		$(document).ready(function(){
		var quantity = [];
      var price = [];

		$('input[id^="qnt"]').each(function(){
        	var qnt = this.value;
         quantity.push(qnt);
         alert(qnt);
		});

		$('input[id^="price"]').each(function(){
        	var pprice = this.value;
         price.push(pprice);
         alert(pprice);
      });

      for (var i = 0; i < price.length; i++) {
       	//alert(price[i]);
        	//alert(quantity[i]);
    	}


      //alert(quantity);
      //alert(price);
        	//var id2 = this.getAttribute('id');
        	//alert(id2);
        //var price =document.getElementById('pprice').value;
        //qunt = parseInt(quantity);
        //price1 = parseInt(price);
        //ans = qunt * price1;
        //document.getElementById("price").innerHTML=ans; 
});

	</script>-->			
			<!--script>

			 $(document).ready(function(){
		    $('.value-minus').on('click', function(){   
		    var proid = $('#proid').val(); 
		    // alert(proid);
		        // if(decrease){
		        // 	alert(decrease);
		        //     // $.ajax({
		        //     //     type:'POST',
		        //     //     url:'ajaxeditcutoff.php',
		        //     //     data:{'decrease': decrease, 'bid': bid, 'cid': cid},
		        //     //     success:function(html){
		        //     //         $('#cutoff_output').html(html);
		        //     //     }
		        //     // });  
		            
		        // }else{
		        //     //$('#tbl').html();
		        //     alert("No value in CG");       
		        // }
		    });
		  });

			$('.value-plus').on('click', function(){
				var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
				divUpd.text(newVal);
			});

			$('.value-minus').on('click', function(){
				var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
				if(newVal>=1) divUpd.text(newVal);
			});
			</script>-->
<?php
		include "footer.php";
?>