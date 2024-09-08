<?php
		include "header.php";
		if(!isset($_SESSION['uemail'])){
		echo "<script LANGUAGE='JavaScript'>
					window.location.href='index.php';
					</script>";
		}
		$style = "height:4.2rem;
				  outline:none;
				  border:none;
				  width:89.4%;";

		$style1 = "height:4.2rem;
				  outline:none;
				  border:none;
				  width:89.2%;";

		$style2 = "height:5rem;
				  outline:none;
				  margin: 0.7rem 0 0 0;
				  border:none;
				  width:88.2%;";

    $q1 = "SELECT * FROM login_tbl WHERE l_id='$ulid'";
    $res1 = mysqli_query($con,$q1);
    $row1 = mysqli_fetch_array($res1);
    $email=$row1['email_id'];
    $phone=$row1['phone_no'];

    $q2 = "SELECT * FROM detail_tbl WHERE l_id='$ulid'";
    $res2 = mysqli_query($con,$q2);
    $row2 = mysqli_fetch_array($res2);
    $name = $row2['name'];
    $add = $row2['address'];
    $dob = $row2['dob'];
    $dp=$row2['dp'];

    if(isset($_POST['formsubmit']))
    {
      unset($_SESSION['uemail']);
      unset($_SESSION['uphone']);
      $name=$_POST['name'];
      $email=$_POST['email'];
      $_SESSION['uemail']=$email;
      $phone=(double)$_POST['phone'];
      $_SESSION['uphone']=$phone;
      $add=$_POST['add'];
      $dob=$_POST['dob'];
      $dpfname=addslashes($_FILES['dp']['name']);
      $dptmpname=addslashes($_FILES['dp']['tmp_name']);
      
      $q3="UPDATE login_tbl SET email_id='$email',phone_no=$phone WHERE l_id='$ulid'";
      $res3=mysqli_query($con,$q3);

      $q4="UPDATE detail_tbl SET name='$name', address='$add', dob='$dob' WHERE l_id='$ulid'";
      $res4=mysqli_query($con,$q4); 

      if(!empty($dpfname)){
        $q6="UPDATE detail_tbl SET dp='$dpfname' WHERE l_id='$ulid'";
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
<!--banner-->
<div class="banner-top">
	<div class="container">
		<h3>Edit Profile</h3>
		<h4><a href="index.php">Home</a><label>/</label>Edit Profile</h4>
		<div class="clearfix"> </div>
	</div>
</div>

<!--login-->

	<div class="login">
		<div class="main-agileits">
				<div class="form-w3agile form1">
					<h3>Edit Profile</h3>
					<form method="post" enctype="multipart/form-data">
						<label>Name:</label>
						<div class="key">
							<i class="fa fa-user" aria-hidden="true"></i>
							<input type="text" name="name" value="<?php echo $name;?>" required>
							<div class="clearfix"></div> 
						</div>
						<label>Email:</label>
						<div class="key">
							<i class="fa fa-envelope-square" aria-hidden="true"></i>
							<input style="<?php echo $style;?>" type="email" name="email" 
							value="<?php echo $email;?>" required>
							<div class="clearfix"></div>
						</div>
						<label>Mobile Number:</label>
						<div class="key">
							<i class="fa fa-mobile-alt" aria-hidden="true"></i>
							<input style="<?php echo $style;?>" type="phone" name="phone" 
							value="<?php echo $phone;?>" maxlength="10" required>
							<div class="clearfix"></div>
						</div>
						<label>Address:</label>
						<div class="key">
							<i class="fas fa-address-card" aria-hidden="true"></i>
							<textarea style="<?php echo $style2;?>" row="3" name="add" 
							required><?php echo $add;?></textarea>
							<div class="clearfix"></div>
						</div>
						<label>Birth Date:</label>
						<div class="key">
							<i class="fas fa-birthday-cake" aria-hidden="true"></i>
							<input style="<?php echo $style1;?>" type="date" name="dob" 
							value="<?php echo $dob;?>" required>
							<div class="clearfix"></div>
						</div>
						<label>Your Profile Pic:</label>
						<div class="key">
							<i class="fas fa-images" aria-hidden="true"></i>
							<input style="margin-top:0.9rem;outline:none;" type="file" name="dp" accept="image/jpg,image/jpeg,image/png">
							<div class="clearfix"></div>
						</div>
						<input type="submit" name="formsubmit" value="Modify">
					</form>
				</div>
				
			</div>
		</div>
<?php
		include "footer.php";
?>