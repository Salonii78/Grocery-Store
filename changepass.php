<?php
  include "header.php";
  if(!isset($_SESSION['uemail'])){
		echo "<script LANGUAGE='JavaScript'>
					window.location.href='index.php';
					</script>";
	}

  if(isset($_POST['formsubmit']))
  {
    
    $q1="SELECT * FROM login_tbl WHERE l_id='$ulid'";
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
        $q1 = "UPDATE login_tbl SET password='$newpass' WHERE l_id='$ulid'";
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
 <!--banner-->
<div class="banner-top">
	<div class="container">
		<h3 >Change Password</h3>
		<h4><a href="index.php">Home</a><label>/</label>Change Password</h4>
		<div class="clearfix"> </div>
	</div>
</div>
<!--login-->

	<div class="login">
	
		<div class="main-agileits">
				<div class="form-w3agile">
					<h3>Change Password</h3>
					<form method="post">
						<label>Old Password:</label>
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" name="old_pass" required>
							<div class="clearfix"></div>
						</div>
						<label>New Password:</label>
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" name="pass1" id="pass1" required>
							<div class="clearfix"></div>
						</div>
						<label>Retype New Password:</label>
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" name="pass2" oninput="check(this)" id="pass2" required>
							<div class="clearfix"></div>
						</div>
						<input type="submit" name="formsubmit" value="Change">
					</form>
				</div>
			</div>
		</div>
										<script language='javascript' type='text/javascript'>
                        function check(input) {
                            if (input.value != document.getElementById('pass1').value) {
                                input.setCustomValidity('Password Must be Matching.');
                            } else {
                                input.setCustomValidity('');
                            }
                        }
                    </script>
<?php
		include "footer.php";
?>