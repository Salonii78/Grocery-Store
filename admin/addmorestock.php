<?php
	include "header.php";

  if(isset($_GET['pid'])){
      $pid = $_GET['pid'];
      $q1 = "SELECT * FROM product_detail WHERE pro_id='$pid'";
      $res1 = mysqli_query($con, $q1);
      $row1 = mysqli_fetch_array($res1);
      $avail_pquan = $row1['pro_quantity'];

    if(isset($_POST['formsubmit'])){
        $pquan = $_POST['pquan'];
        $pquan = $avail_pquan + $pquan;
        $q2 = "UPDATE product_detail SET pro_quantity='$pquan' WHERE pro_id='$pid'";
        $res2 = mysqli_query($con, $q2);
        if($res2){
            echo ("<script LANGUAGE='JavaScript'>
              window.alert('More Stock Added.');
              window.location.href='stock.php';
            </script>");
        }
    }
  }
?>
	<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Add More Stock</h1>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <form method="post">
                <div class="card">
                  <div class="card-body">
                    <div class="form-group">
                      <label>Add More Quantity *</label>
                      <input type="number" step="any" min="0" name="pquan" value="<?php echo $avail_pquan;?>" class="form-control" required>
                    </div>
                    <button type="submit" name="formsubmit" class="btn btn-primary" onclick="return confirm('Are you sure you want to add more quantity?');">Add More</button>
                  </div>
                </div>
              </form>
               </div>
              </div>
             </div>
            </section>
           </div>
<?php
	include "footer.php";
?>