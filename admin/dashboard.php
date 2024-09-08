<?php
    include "header.php";

    $q1 = "SELECT * FROM product_detail";
    $res1 = mysqli_query($con, $q1);
    $total_products = mysqli_num_rows($res1);

    $q2 = "SELECT * FROM login_tbl WHERE role=2";
    $res2 = mysqli_query($con, $q2);
    $total_users = mysqli_num_rows($res2);

    $q3 = "SELECT * FROM product_order";
    $res3 = mysqli_query($con, $q3);
    $total_orders = mysqli_num_rows($res3);

    $q4 = "SELECT * FROM product_category";
    $res4 = mysqli_query($con, $q4);
    $total_categories = mysqli_num_rows($res4);
?>
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-tasks"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Categories</h4>
                  </div>
                  <div class="card-body">
                    <?php echo $total_categories;?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-tasks"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Products</h4>
                  </div>
                  <div class="card-body">
                    <?php echo $total_products;?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-check-double"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Orders</h4>
                  </div>
                  <div class="card-body">
                    <?php echo $total_orders;?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Users</h4>
                  </div>
                  <div class="card-body">
                    <?php echo $total_users;?>
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