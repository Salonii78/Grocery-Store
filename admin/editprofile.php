<?php
	include "header.php";

    $q1 = "SELECT * FROM login_tbl WHERE l_id='$alid'";
    $res1 = mysqli_query($con,$q1);
    $row1 = mysqli_fetch_array($res1);
    $email=$row1['email_id'];
    $phone=$row1['phone_no'];

    $q2 = "SELECT * FROM detail_tbl WHERE l_id='$alid'";
    $res2 = mysqli_query($con,$q2);
    $row2 = mysqli_fetch_array($res2);
    $name = $row2['name'];
    $add = $row2['address'];
    $dob = $row2['dob'];

    if(isset($_POST['formsubmit']))
    {
      unset($_SESSION['aemail']);
      unset($_SESSION['aphone']);
      $name=$_POST['name'];
      $email=$_POST['email'];
      $_SESSION['aemail']=$email;
      $phone=(double)$_POST['phone'];
      $_SESSION['aphone']=$phone;
      $add=$_POST['add'];
      $dob=$_POST['dob'];
      $dpfname=addslashes($_FILES['dp']['name']);
      $dptmpname=addslashes($_FILES['dp']['tmp_name']);
      
      $q3="UPDATE login_tbl SET email_id='$email',phone_no=$phone WHERE l_id='$alid'";
      $res3=mysqli_query($con,$q3);

      $q4="UPDATE detail_tbl SET name='$name', address='$add', dob='$dob' WHERE l_id='$alid'";
      $res4=mysqli_query($con,$q4); 

      if(!empty($dpfname)){
        $q6="UPDATE detail_tbl SET dp='$dpfname' WHERE l_id='$alid'";
        $res6=mysqli_query($con,$q6);
        move_uploaded_file($_FILES["dp"]["tmp_name"],"photos/".$_FILES["dp"]["name"]);
      }

      if($res3 && $res4){
        echo ("<script LANGUAGE='JavaScript'>
              window.alert('Profile updated successfully.');
            </script>");
      }
    }  
?>
	<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Edit Profile</h1>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <form method="post" enctype="multipart/form-data">
                <div class="card">
                  <div class="card-body">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="name" value="<?php echo $name;?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" value="<?php echo $email;?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Mobile Number</label>
                      <input type="phone" name="phone" maxlength="10" value="<?php echo $phone;?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Address</label>
                      <textarea class="form-control" name="add" required><?php echo $add;?></textarea> 
                    </div>
                    <div class="form-group">
                      <label>Date Of Birth</label>
                      <input type="date" name="dob" value="<?php echo $dob;?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Profile Pic</label>
                      <div class="custom-file">
                          <input type="file" name="dp" accept="image/jpg,image/jpeg,image/png"
                          class="custom-file-input">
                          <label class="custom-file-label">Choose File</label>
                      </div>
                    </div>
                    <button type="submit" name="formsubmit" class="btn btn-primary">Modify Profile</button>
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