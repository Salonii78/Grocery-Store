<?php
	include "header.php";

  if(isset($_GET['pid'])){
      $pid = $_GET['pid'];
      $q1 = "SELECT * FROM product_detail WHERE pro_id='$pid'";
      $res1 = mysqli_query($con, $q1);
      $row1 = mysqli_fetch_array($res1);
      $catid = $row1['pro_cat_id'];
      $pname = $row1['pro_name'];
      $pimage = $row1['pro_image'];
      $pdesc = $row1['pro_desc'];
      $pprice = $row1['pro_price'];

      if(isset($_POST['formsubmit'])){
        $pcat = $_POST['pcat'];
        $pname = $_POST['pname'];
        $pdesc = $_POST['pdesc'];
        $pprice = $_POST['pprice'];
        $fname=addslashes($_FILES['pimage']['name']);
        $tmpname=addslashes($_FILES['pimage']['tmp_name']);

        if(!empty($fname)){
              move_uploaded_file($_FILES["pimage"]["tmp_name"],"productimages/".$_FILES["pimage"]["name"]);
              $q4 = "UPDATE product_detail SET pro_image='$fname' WHERE pro_id='$pid'";
              $res4 = mysqli_query($con, $q4);
        }

        $q2 = "UPDATE product_detail SET pro_cat_id='$pcat', pro_name='$pname', pro_desc='$pdesc', 
               pro_price='$pprice' WHERE pro_id='$pid'";
        $res2 = mysqli_query($con, $q2);
        if($res2){
              echo ("<script LANGUAGE='JavaScript'>
              window.alert('Product Edited Successfully.');
              window.location.href='manageproduct.php';
              </script>");
        }
      }
  }
?>
	<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Edit Product</h1>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <form method="post" enctype="multipart/form-data">
                <div class="card">
                  <div class="card-body">
                    <div class="form-group">
                      <label>Product Category</label>
                      <select class="form-control" name="pcat">
                        <option disabled>Select Product Category</option>
                        <?php
                            $q3 = "SELECT * FROM product_category";
                            $res3 = mysqli_query($con, $q3);
                            while($row3 = mysqli_fetch_array($res3)){
                                $catid1 = $row3['pro_cat_id'];
                                $catname = $row3['pro_cat_name'];
                                if($catid1==$catid){
                                    echo "<option value='$catid' selected>$catname</option>";
                                }else{
                                    echo "<option value='$catid1'>$catname</option>";  
                                }
                            }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Product Name</label>
                      <input type="text" name="pname" value="<?php echo $pname;?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Product Description</label>
                      <textarea class="form-control" name="pdesc" required><?php echo $pdesc;?></textarea> 
                    </div>
                    <div class="form-group">
                      <label>Product Image</label>
                      <div class="custom-file">
                          <input type="file" name="pimage" accept="image/jpg,image/jpeg,image/png" 
                          class="custom-file-input">
                          <label class="custom-file-label">Choose File</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Product Price</label>
                      <input type="number" step="any" min="1" name="pprice" value="<?php echo $pprice;?>" class="form-control" required>
                    </div>
                    <button type="submit" name="formsubmit" onclick="return confirm('Are you sure you want to edit?');" class="btn btn-primary">Edit Product</button>
                </div>
               </div>
              </form>
              </div>
             </div>
            </section>
           </div>
<?php
	include "footer.php";
?>