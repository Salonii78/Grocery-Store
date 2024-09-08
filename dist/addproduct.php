<?php
	include "header.php";
?>
	<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Add Product</h1>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <div class="form-group">
                      <label>Product Category *</label>
                      <select class="form-control">
                        <option value="0" selected disabled>Select Product Category</option>
                        <option>Option 2</option>
                        <option>Option 3</option>
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
                      <input type="file" name="pimage" class="form-control" required> 
                    </div>
                    <div class="form-group">
                      <label>Product Price*</label>
                      <input type="text" name="pprice" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Product Quantity *</label>
                      <input type="text" name="pquantity" class="form-control" required>
                    </div>
                    <button type="submit" name="formsubmit" class="btn btn-primary">Add Product</button>
                </div>
               </div>
              </div>
             </div>
            </section>
           </div>
<?php
	include "footer.php";
?>