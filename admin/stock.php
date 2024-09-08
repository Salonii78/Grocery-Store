
		<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Product Available Stock</h1>
          </div>

          <div class="section-body">      
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Product Available Stock</h4>
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
                        <tr>
                          <th>Sr. No</th>
                          <th>Product Image</th>
                          <th>Product Name</th>
                          <th>Product Description</th>
                          <th>Product Available Quantity</th>
                          <th>Action</th>
                        </tr>
                        <?php
                            $q1 = "SELECT * FROM product_detail";
                            $res1 = mysqli_query($con, $q1);
                            $count = 0;
                            while($row1 = mysqli_fetch_array($res1)){
                              $pid = $row1['pro_id'];
                              $catid = $row1['pro_cat_id'];
                              $pname = $row1['pro_name'];
                              $pimage = $row1['pro_image'];
                              $pquan = $row1['pro_quantity'];
                              $pdesc = $row1['pro_desc'];

                              $q2 = "SELECT * FROM product_category WHERE pro_cat_id='$catid'";
                              $res2 = mysqli_query($con, $q2);
                              $row2 = mysqli_fetch_array($res2);
                              $catname = $row2['pro_cat_name'];
                        ?>
                        <tr>
                            <td><?php echo ++$count;?></td>
                            <td>
                              <img class="my-2" src="productimages/<?php echo $pimage;?>" style="width:7rem;height:5rem;"/>
                            </td>
                            <td><?php echo $pname;?></td>
                            <td><?php echo $pdesc;?></td>
                            <td>
                                <?php
                                    if($pquan<=1){
                                        echo "<p class='badge badge-danger rounded'>$pquan</p><br/>
                                              <p class='text-danger'><b>Add More Stock</b></p>";
                                    }else{
                                        echo $pquan;
                                    }
                                ?>    
                            </td>
                            <td>
                              <a href="addmorestock.php?pid=<?php echo $pid;?>" class="btn btn-sm btn-primary">
                              <i class="fas fa-plus"></i> Add More Stock</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
	include "header.php";
  error_reporting(0);
  if(isset($_GET['pid'])){
      $pid = $_GET['pid'];
      $q2 = "DELETE FROM product_detail WHERE pro_id='$pid'";
      $res2 = mysqli_query($con, $q2);
      if($res2){
          echo "<script>alert('Product Deleted Successfully.');</script>";
      }
  }
?>
<?php
	include "footer.php";
?>