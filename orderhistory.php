<?php
		include "header.php";
    if(!isset($_SESSION['uemail'])){
      echo "<script LANGUAGE='JavaScript'>
            window.location.href='index.php';
            </script>";
    }
?>
 <!--banner-->
<div class="banner-top">
	<div class="container">
		<h3 >Order History</h3>
		<h4><a href="index.php">Home</a><label>/</label>Order History</h4>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- typography -->
<div class="typrography">
	 <div class="container">
			<div class="spec ">
				<h3>Order History</h3>
				<div class="ser-t">
					<b></b>
					<span><i></i></span>
					<b class="line"></b>
				</div>
			</div>
	
		<section id="tables">
          <div class="bs-docs-example">
            <table class="table table-bordered">
              <thead>
                <tr style="font-size:2rem;">
                  <th>Sr. No</th>
                  <th>All Ordered Products</th>
                  <th>Order Date</th>
                  <th>Estimated Delivery Date</th>
                  <th>Total Amount</th>
                  <th>Order Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $q1 = "SELECT * FROM product_order WHERE l_id='$ulid'";
                    $res1 = mysqli_query($con, $q1);
                    $count = 0;
                    while($row1 = mysqli_fetch_array($res1)){
                        $orderid = $row1['order_id'];
                        $odate = $row1['timestamp'];
                        $tamnt = $row1['total_amount'];
                        $today = date('Y-m-d');
                        $odate = date('Y-m-d',strtotime($odate));
                        $ddate= date('Y-m-d', strtotime($odate. ' + 4 days'));

                        $q2 = "SELECT * FROM order_items WHERE order_id='$orderid'";
                        $res2 = mysqli_query($con, $q2);
                ?>
                    <tr style="font-size:2rem;">
                        <td><?php echo ++$count;?></td>
                        <td>
                          <?php
                            while($row2 = mysqli_fetch_array($res2)){
                            $cartid = $row2['cart_id'];

                            $q3 = "SELECT * FROM cart_tbl WHERE cart_id='$cartid'";
                            $res3 = mysqli_query($con, $q3);
                            $row3 = mysqli_fetch_array($res3);
                            $proid = $row3['pro_id'];
                            $quan = $row3['quantity'];

                            $q4 = "SELECT * FROM product_detail WHERE pro_id='$proid'";
                            $res4 = mysqli_query($con, $q4);
                            $row4 = mysqli_fetch_array($res4);
                            $proname = $row4['pro_name'];
                            $proimg = $row4['pro_image'];
                            $proprice = $row4['pro_price'];
                            $price = $quan * $proprice;

                            echo "<img style='height:5rem;width:7rem;margin:1rem 1rem 1rem 0;' src='admin/productimages/$proimg'><span style='margin-right:1rem;'><b>Name:</b> 
                              $proname</span><span style='margin-right:1rem;'><b>Quantity:</b> $quan</span><b>Price:</b> $proprice Rs.<br/>";
                          }
                          ?>
                        </td>
                        <td><?php echo $odate;?></td>
                        <td><?php echo $ddate;?></td>
                        <td><?php echo $tamnt;?> Rs.</td>
                        <td>
                            <?php
                              $today=strtotime($today);
                              $odate=strtotime($odate);
                              $ddate=strtotime($ddate);
                              if($today>$ddate){
                                  echo "<font color='green'>Order Delivered</font>";
                              }else if($today>=$odate && $today<=$ddate){
                                  echo "<font color='red'>Order Pending</font>";
                              }
                            ?>
                        </td>
                    </tr>
                <?php
                    }
                ?>
              </tbody>
            </table>
          </div>
		</section>
	</div>
</div>
<!-- //typography -->
<?php
		include "footer.php";
?>