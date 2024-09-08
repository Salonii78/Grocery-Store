<?php
	include "header.php";

  if(isset($_GET['lid'])){
    $lid = $_GET['lid'];
    $q3 = "UPDATE login_tbl SET status=0 WHERE l_id='$lid'";
    $res3 = mysqli_query($con, $q3);
    if($res3){
      echo "<script>alert('User deleted successfully.')</script>";
    }
  }
?>
		<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Manage Users</h1>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Manage Users</h4>
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
                          <th>Image</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Mobile</th>
                          <th>Action</th>
                        </tr>
                        <?php
                          $q1 = "SELECT * FROM login_tbl WHERE role=2 AND status=1";
                          $res1 = mysqli_query($con, $q1);
                          $count = 0;
                          while($row1 = mysqli_fetch_array($res1)){
                              $lid = $row1['l_id'];
                              $email = $row1['email_id'];
                              $phone = $row1['phone_no'];
                              
                              $q2 = "SELECT * FROM detail_tbl WHERE l_id='$lid'";
                              $res2 = mysqli_query($con, $q2);
                              $row2 = mysqli_fetch_array($res2);
                              $name = $row2['name'];
                              $dp = $row2['dp'];
                          ?>
                            <tr>
                              <td><?php echo ++$count;?></td>
                              <td>
                                <img style="height:4rem;width:4rem;border-radius:50%;" class="rounded-circle my-2" 
                                src="../photos/<?php echo $dp; ?>" alt="Image not found">
                              </td>
                              <td><?php echo $name;?></td>
                              <td><?php echo $email;?></td>
                              <td><?php echo $phone;?></td>
                              <td> 
                                  <a href="?lid=<?php echo $lid;?>" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>
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