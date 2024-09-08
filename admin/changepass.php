<?php
	include "header.php";

  if(isset($_POST['formsubmit']))
  {
    
    $q1="SELECT * FROM login_tbl WHERE l_id='$alid'";
    $ans1=mysqli_query($con,$q1);
    $row1=mysqli_fetch_array($ans1);
    $currpass=$row1['password'];
    $old= $_POST['old_pass'];
    $newpass = $_POST['pass1'];
    $repass = $_POST['pass2'];


    if($currpass==$old)
    {
      if($newpass==$repass)  
      {
        $q1 = "UPDATE login_tbl SET password='$newpass' WHERE l_id='$alid'";
        $res1 = mysqli_query($con,$q1);
        
        if($res1)
        {
            echo ("<script LANGUAGE='JavaScript'>
               window.alert('Password changed successfully.');
            </script>");
        }
        else
        {
          echo "Error...";
        }
      }
    }
    else
    {
      echo "<script>alert('Old password incorrect.')</script>";
    }
  }
?>
	<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Change Password</h1>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <form method="post">
                <div class="card">
                  <div class="card-body">
                    <div class="form-group">
                      <label>Password *</label>
                      <input type="password" name="old_pass" maxlength="8" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>New Password *</label>
                      <input type="password" name="pass1" id="pass1" maxlength="8" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Retype New Password *</label>
                      <input type="password" name="pass2" id="pass2" maxlength="8" oninput="check(this)" class="form-control" required>
                    </div>
                    <script language='javascript' type='text/javascript'>
                                function check(input) {
                                    if (input.value != document.getElementById('pass1').value) {
                                        input.setCustomValidity('Password Must be Matching.');
                                    } else {
                                        // input is valid -- reset the error message
                                        input.setCustomValidity('');
                                    }
                                }
                    </script>
                    <button type="submit" name="formsubmit" class="btn btn-primary">Change Password</button>
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