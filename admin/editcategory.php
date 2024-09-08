<?php
	include "header.php";

  if(isset($_GET['catid'])){
      $catid = $_GET['catid'];
      $q1 = "SELECT * FROM product_category WHERE pro_cat_id='$catid'";
      $res1 = mysqli_query($con, $q1);
      $row1 = mysqli_fetch_array($res1);
      $catname = $row1['pro_cat_name'];

      if(isset($_POST['formsubmit'])){
           $pcat = $_POST['pcat'];
           $q2 = "UPDATE product_category SET pro_cat_name='$pcat' WHERE pro_cat_id='$catid'";
           $res2 = mysqli_query($con, $q2);
           if($res2){
              echo ("<script LANGUAGE='JavaScript'>
              window.alert('Category Edited Successfully.');
              window.location.href='managecategory.php';
              </script>");
          }
      }
  }
?>
	<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Edit Product Category</h1>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <form method="post">
                <div class="card">
                  <div class="card-body">
                    <div class="form-group">
                      <label>Product Category Name</label>
                      <input type="text" name="pcat" value="<?php echo $catname;?>" class="form-control" required>
                    </div>
                    <button type="submit" name="formsubmit" onclick="return confirm('Are you sure you want to edit?');" class="btn btn-primary">Edit Category</button>
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