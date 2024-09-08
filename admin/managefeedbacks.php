<?php
	include "header.php";
  if(isset($_GET['fid'])){
    $fid = $_GET['fid'];
    $q6 = "DELETE FROM feedback_tbl WHERE feed_id='$fid'";
    $res6 = mysqli_query($con, $q6);
    if($res6){
      echo "<script>alert('Feedback deleted successfully.')</script>";
    }
  }
?>
		<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Manage Feedbacks</h1>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Manage Feedbacks</h4>
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
                          <th>User Image</th>
                          <th>User Name</th>
                          <th>User Email</th>
                          <th>Comment</th>
                          <th>Ratings</th>
                          <th>Action</th>
                        </tr>
                        <?php
                            $q1 = "SELECT * FROM feedback_tbl";
                            $res1 = mysqli_query($con, $q1);
                            $count = 0;
                            while($row1 = mysqli_fetch_array($res1)){
                                $fid = $row1['feed_id'];
                                $lid = $row1['l_id'];
                                $rate = $row1['ratings'];
                                $comment = $row1['comment'];

                                $q2 = "SELECT * FROM detail_tbl WHERE l_id='$lid'";
                                $res2 = mysqli_query($con, $q2);
                                $row2 = mysqli_fetch_array($res2);
                                $name = $row2['name'];
                                $dp = $row2['dp'];

                                $q3 = "SELECT * FROM login_tbl WHERE l_id='$lid'";
                                $res3 = mysqli_query($con, $q3);
                                $row3 = mysqli_fetch_array($res3);
                                $email = $row3['email_id'];
                        ?>
                        <tr>
                            <td><?php echo ++$count;?></td>
                            <td>
                                <img style="height:4rem;width:4rem;border-radius:50%;" class="rounded-circle my-2" 
                                src="../photos/<?php echo $dp; ?>" alt="Image not found">
                            </td>
                            <td><?php echo $name;?></td>
                            <td><?php echo $email;?></td>
                            <td><?php echo $comment;?></td>
                            <td>
                                <?php
                                    for($i=1; $i<=5; $i++) { 
                                      if ($rate >= 1) { 
                                        echo '<i class="fas fa-star text-primary"></i>';
                                        $rate--;
                                      }else{
                                          echo '<i class="far fa-star text-primary"></i>';
                                      }
                                  }
                                ?>
                            </td>
                            <td>
                                 <a href="?fid=<?php echo $fid;?>" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>
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