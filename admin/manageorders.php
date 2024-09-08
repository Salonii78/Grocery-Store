<?php
	include "header.php";
  if(isset($_GET['orderid'])){
    $orderid = $_GET['orderid'];
    $q6="UPDATE product_order SET order_status=0 WHERE order_id='$orderid'";
    $res6=mysqli_query($con,$q6);
    if($res6){
      echo "<script>alert('Order deleted successfully.')</script>";
    }
  }
?>
		<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Manage Orders</h1>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Manage Orders</h4>
                    <!-- <div class="card-header-form">
                      <form>
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search">
                          <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div> -->
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr style="border-bottom:0.0001rem solid #DCDCDC;">
                          <th>Sr. No</th>
                          <th>User Name</th>
                          <th>All Ordered Items</th>
                          <th>Delivery Address</th>
                          <th>Order Date</th>
                          <th>Order Status</th>
                          <th>Total Amount</th>
                          <th>Action</th>
                        </tr>
                        <?php
                        $q1 = "SELECT * FROM product_order WHERE order_status=1;";
                        $res1 = mysqli_query($con, $q1);
                        $count = 0;
                        while($row1 = mysqli_fetch_array($res1)){
                            $orderid = $row1['order_id'];
                            $odate = $row1['timestamp'];
                            $tamnt = $row1['total_amount'];
                            $lid = $row1['l_id'];
                            $dadd = $row1['address'];
                            $otype = $row1['payment_status'];
                            $ostatus = $row1['order_status'];
                            $odate = date('Y-m-d',strtotime($odate));

                            $q5 = "SELECT * FROM detail_tbl WHERE l_id='$lid'";
                            $res5 = mysqli_query($con, $q5);
                            $row5 = mysqli_fetch_array($res5);
                            $name = $row5['name'];

                            $q2 = "SELECT * FROM order_items WHERE order_id='$orderid'";
                            $res2 = mysqli_query($con, $q2);
                        ?>
                        <tr style="border-bottom:0.0001rem solid #DCDCDC;">
                          <td class="p-0 text-center">
                            <?php echo ++$count;?>
                          </td>
                          <td class="align-middle">
                            <?php echo $name;?>
                          </td>
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

                                echo "<img class='my-2' style='height:3rem;width:4rem;margin-right:1rem;' src='productimages/$proimg'><span style='margin-right:1rem;'>$proname</span><br/>";
                               }
                          ?>
                          </td>
                          <td><?php echo $dadd;?></td>
                          <td><?php echo $odate;?></td>
                          <td>
                            <?php
                              $today = date('Y-m-d');
                              $odate = date('Y-m-d',strtotime($odate));
                              $ddate= date('Y-m-d', strtotime($odate. ' + 4 days'));
                              if($today>$ddate){
                                  echo "<font color='green'>Order Delivered</font>";
                              }else if($today>=$odate && $today<=$ddate){
                                  echo "<font color='red'>Order Pending</font>";
                              }
                            ?>
                          </td>
                          <td><?php echo $tamnt;?> Rs.</td>
                          <td>
                               <a href="?orderid=<?php echo $orderid;?>" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>
                          </td>
                        </tr>
                        <?php
                            }
                        ?>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
<?php
	include "footer.php";
?>