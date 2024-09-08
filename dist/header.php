<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Ecommerce Dashboard &mdash; Stisla</title>

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
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
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
        <ul class="navbar-nav ml-auto navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div></a>
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
            <a href="index.html">Stisla</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
            <li>
                <a class="nav-link" href="index.php"><i class="far fa-square"></i> 
                  <span>Dashboard</span>
                </a>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Product Category</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="addcategory.php">Add Product Category</a></li>
                <li><a class="nav-link" href="managecategory.php">Manage Product Category</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Product</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="addproduct.php">Add Product</a></li>
                <li><a class="nav-link" href="manageproduct.php">Manage Product</a></li>
              </ul>
            </li>
            <li>
                <a class="nav-link" href="vieworders.php"><i class="far fa-square"></i> 
                  <span>View Orders</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="manageusers.php"><i class="far fa-square"></i> 
                  <span>Manage Users</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="managefeedbacks.php"><i class="far fa-square"></i> 
                  <span>Manage Feedback</span>
                </a>
            </li>
          </ul>      
        </aside>
      </div>