<?php
	include "header.php";

  if(isset($_GET['catid'])){
      $catid = $_GET['catid'];
      $q2 = "DELETE FROM product_category WHERE pro_cat_id='$catid'";
      $res2 = mysqli_query($con, $q2);
      if($res2){
          echo "<script>alert('Category Deleted Successfully.');</script>";
      }
  }
?>
		<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Manage Product Category</h1>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Manage Category</h4>
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
                          <th>Product Category Name</th>
                          <th>Action</th>
                        </tr>
                        <tr>
                        <?php
                            $q1 = "SELECT * FROM product_category";
                            $res1 = mysqli_query($con,$q1);
                            $count = 0;
                            while($row1 = mysqli_fetch_array($res1)){
                                $catid = $row1['pro_cat_id'];
                                $catname = $row1['pro_cat_name'];
                        ?>
                        <tr>
                            <td><?php echo ++$count;?></td>
                            <td><?php echo $catname;?></td>
                            <td>
                              <a href="editcategory.php?catid=<?php echo $catid;?>" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                               <a href="?catid=<?php echo $catid;?>" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>
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