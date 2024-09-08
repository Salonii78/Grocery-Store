<?php
		include "header.php";
?>
 <!--banner-->
<div class="banner-top">
	<div class="container">
		<h3 >Login</h3>
		<h4><a href="index.php">Home</a><label>/</label>Login</h4>
		<div class="clearfix"> </div>
	</div>
</div>
<!--login-->

	<div class="login">
		<div class="main-agileits">
				<div class="form-w3agile">
					<h3>Login</h3>
					<form action="checklogin.php" method="post">
						<div class="key">
							<i class="fa fa-envelope-square" aria-hidden="true"></i>
							<input  type="text" name="email" required>
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" name="pass" required>
							<div class="clearfix"></div>
						</div>
						<input type="submit" name="formsubmit" value="Login">
					</form>
					<?php
                        if(isset($_GET['flag'])){
                            if($_GET['flag']==1){
                                echo "<center><font color='red'>Incorrect email or  
                                	  password</font></center><br/>";
                                }
                            }
                    ?>  
				</div>
				<div class="forg">
					<a href="forgotpass.php" class="forg-left">Forgot Password?</a>
					<a href="register.php" class="forg-right">Register</a>
				<div class="clearfix"></div>
				</div>
			</div>
		</div>
<?php
		include "footer.php";
?>