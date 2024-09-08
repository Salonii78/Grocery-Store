<?php
	include "header.php";

  if(isset($_POST['formsubmit'])){
      $pcat = $_POST['pcat'];
      $pname = $_POST['pname'];
      $pdesc = $_POST['pdesc'];
      $pprice = $_POST['pprice'];
      $pquan = $_POST['pquan'];
      $fname=addslashes($_FILES['pimage']['name']);
      $tmpname=addslashes($_FILES['pimage']['tmp_name']);

      move_uploaded_file($_FILES["pimage"]["tmp_name"],"productimages/".$_FILES["pimage"]["name"]);

      $q2 = "INSERT INTO product_detail(pro_cat_id, pro_name, pro_image, pro_desc, pro_price, pro_quantity) 
             VALUES('$pcat', '$pname', '$fname', '$pdesc', '$pprice', '$pquan')";
      $res2 = mysqli_query($con, $q2);
      if($res2){
          echo "<script>alert('Product Added Successfully.');</script>";
      }
  }
?>
	<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Add Product</h1>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <form method="post" enctype="multipart/form-data">
                <div class="card">
                  <div class="card-body">
                    <div id="pcat_output"><font color="red">Select Product Category</font></div>
                    <br/>
                    <div class="form-group">
                      <label>Product Category *</label>
                      <select class="form-control" name="pcat" id="pcat" required>
                        <option value="0" selected disabled>Select Product Category</option>
                        <?php
                            $q1 = "SELECT * FROM product_category";
                            $res1 = mysqli_query($con, $q1);
                            while($row1 = mysqli_fetch_array($res1)){
                                $catid = $row1['pro_cat_id'];
                                $catname = $row1['pro_cat_name'];
                                echo "<option value='$catid'>$catname</option>";
                            }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Product Name *</label>
                      <input type="text" name="pname" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Product Description *</label>
                      <textarea class="form-control" name="pdesc" required></textarea> 
                    </div>
                    <div class="form-group">
                      <label>Product Image *</label>
                      <div class="custom-file">
                          <input type="file" name="pimage" accept="image/jpg,image/jpeg,image/png"
                          class="custom-file-input" required>
                          <label class="custom-file-label">Choose File</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Product Quantity in stock *</label>
                      <input type="number" step="any" min="0" name="pquan" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Product Price *</label>
                      <input type="number" step="any" min="1" name="pprice" class="form-control" required>
                    </div>
                    <button type="submit" name="formsubmit" id="formsubmit" class="btn btn-primary" disabled>Add Product</button>
                </div>
               </div>
             </form>
              </div>
             </div>
            </section>
           </div>
<script>
 $(document).ready(function(){
    $('#pcat').on('change', function(){   
        var pcat = $(this).val(); 
        if(pcat){
            if(pcat==0){
                document.getElementById('formsubmit').disabled = true;
                $("#pcat_output").show();
            }else{
                document.getElementById('formsubmit').disabled = false;
                $("#pcat_output").hide();
            }
        }else{
            alert("No value in CG");       
        }
    });
  });
</script>
<?php
	include "footer.php";
?>