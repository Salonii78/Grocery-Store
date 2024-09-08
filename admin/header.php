<?php
    session_start();
    include "connection.php";
    if(!isset($_SESSION['aemail'])){
        header("location:index.php");
    }

    $email = $_SESSION['aemail'];
    $q1 = "SELECT * FROM login_tbl WHERE email_id='$email'";
    $res1 = mysqli_query($con, $q1);
    $row1 = mysqli_fetch_array($res1);
    $lid = $row1['l_id'];
    $_SESSION['alid'] = $lid;
    $alid = $_SESSION['alid'];

    $q2 = "SELECT * FROM detail_tbl WHERE l_id='$lid'";
    $res2 = mysqli_query($con, $q2);
    $row2 = mysqli_fetch_array($res2);
    $name = $row2['name'];
    $dp = $row2['dp'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin | Dashboard</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        <ul class="navbar-nav ml-auto navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" style="width:2.5rem;height:2.5rem;border-radius:50%" src="photos/<?php echo $dp;?>" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $name;?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="editprofile.php" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Edit Profile
              </a>
              <a href="changepass.php" class="dropdown-item has-icon">
                <i class="fas fa-lock"></i> Change Password
              </a>
              <a href="logout.php" class="dropdown-item has-icon">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="dashboard.php"><?php echo $name;?></a>
          </div>
          <ul class="sidebar-menu">
            <li>
                <a class="nav-link" href="dashboard.php"><i class="fas fa-tachometer-fast"></i> 
                  <span>Dashboard</span>
                </a>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-tasks"></i> 
                <span>Product Category</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="addcategory.php">Add Product Category</a></li>
                <li><a class="nav-link" href="managecategory.php">Manage Product Category</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-tasks"></i> 
                <span>Product</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="addproduct.php">Add Product</a></li>
                <li><a class="nav-link" href="manageproduct.php">Manage Product</a></li>
              </ul>
            </li>
            <li>
                <a class="nav-link" href="stock.php"><i class="far fa-plus-square"></i> 
                  <span>Add More Stock</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="manageorders.php"><i class="fas fa-check-double"></i> 
                  <span>Manage Orders</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="manageusers.php"><i class="fas fa-user-minus"></i> 
                  <span>Manage Users</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="managefeedbacks.php"><i class="fas fa-trash-alt"></i> 
                  <span>Manage Feedbacks</span>
                </a>
            </li>
          </ul>      
        </aside>
      </div>