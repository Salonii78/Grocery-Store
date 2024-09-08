<?php
	include "header.php";

  if(isset($_POST['formsubmit'])){
      $pcat = $_POST['pcat'];
      $q1 = "INSERT INTO product_category(pro_cat_name) VALUES('$pcat')";
      $res1 = mysqli_query($con, $q1);
      if($res1){
          echo "<script>alert('Product Category Added Successfully.');</script>";
      }
  }
?>
	<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Add Product Category</h1>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <form method="post">
                <div class="card">
                  <div class="card-body">
                    <div class="form-group">
                      <label>Product Category Name *</label>
                      <input type="text" name="pcat" class="form-control" required>
                    </div>
                    <button type="submit" name="formsubmit" class="btn btn-primary">Add Category</button>
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