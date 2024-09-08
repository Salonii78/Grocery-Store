<?php
		include "header.php";
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
?>
<!--banner-->
<div class="banner-top">
	<div class="container">
		<h3 >Register</h3>
		<h4><a href="index.php">Home</a><label>/</label>Register</h4>
		<div class="clearfix"> </div>
	</div>
</div>

<!--login-->

	<div class="login">
		<div class="main-agileits">
				<div class="form-w3agile form1">
					<h3>Register</h3>
					<form action="checkreg.php" method="post" enctype="multipart/form-data">
						<label>Name:</label>
						<div class="key">
							<i class="fa fa-user" aria-hidden="true"></i>
							<input type="text" name="name" required>
							<div class="clearfix"></div>
						</div>
						<label>Email:</label>
						<div class="key">
							<i class="fa fa-envelope-square" aria-hidden="true"></i>
							<input style="<?php echo $style;?>" type="email" name="email" required>
							<div class="clearfix"></div>
						</div>
						<label>Password:</label>
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input type="password" name="pass" maxlength="8" required>
							<div class="clearfix"></div>
						</div>
						<label>Confirm Password:</label>
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input type="password" name="cpass" maxlength="8" required>
							<div class="clearfix"></div>
						</div>
						<label>Mobile Number:</label>
						<div class="key">
							<i class="fa fa-mobile-alt" aria-hidden="true"></i>
							<input style="<?php echo $style;?>" type="phone" name="phone" maxlength="10" required>
							<div class="clearfix"></div>
						</div>
						<label>Address:</label>
						<div class="key">
							<i class="fas fa-address-card" aria-hidden="true"></i>
							<textarea style="<?php echo $style2;?>" row="3" name="add" required></textarea>
							<div class="clearfix"></div>
						</div>
						<label>Birth Date:</label>
						<div class="key">
							<i class="fas fa-birthday-cake" aria-hidden="true"></i>
							<input style="<?php echo $style1;?>" type="date" name="dob" required>
							<div class="clearfix"></div>
						</div>
						<label>Your Profile Pic:</label>
						<div class="key">
							<i class="fas fa-images" aria-hidden="true"></i>
							<input style="margin-top:0.9rem;outline:none;" type="file" name="dp" accept="image/jpg,image/jpeg,image/png" required>
							<div class="clearfix"></div>
						</div>
						<input type="submit" name="formsubmit" value="Register">
					</form>
				</div>
			</div>
<?php
		include "footer.php";
?>