<?php
  include "header.php";

  if(isset($_POST['formsubmit']))
  {
    $email=$_POST['email'];
    $q1 = "SELECT * FROM login_tbl WHERE email_id='$email'";
    $res1 = mysqli_query($con,$q1);
    $n = mysqli_num_rows($res1);

    if ($n==1){

        /*require_once 'PHPMailer-master/src/PHPMailer.php';
        require_once 'PHPMailer-master/src/Exception.php';
        require_once 'PHPMailer-master/src/SMTP.php';*/
        $otp = rand(100000,999999);
        /*$to=$_POST['email']; //any value of email coming from the input control
        $subject="Fabric Seekers";
        $msg="Dear User, Your one time password for forgot password is: ".$otp." Thank you.";

        $mail = new PHPMailer\PHPMailer\PHPMailer(true);                      // Passing `true` enables exceptions

        //Server settings
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'Project Email Id';                 // SMTP username
        $mail->Password = 'Email Password';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('project email id');

        $mail->addAddress($to);

         $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $msg;

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } 
        else{*/
            $q2 = "UPDATE login_tbl SET password='$otp' WHERE email_id='$email'";
            $res2 = mysqli_query($con, $q2);
            echo ("<script LANGUAGE='JavaScript'>
             window.location.href='forgotpass.php?flag=1';
            </script>");
        //}
    }
    else{
        echo ("<script LANGUAGE='JavaScript'>
             window.location.href='forgotpass.php?flag=0';
            </script>");
    }
}
?>
 <!--banner-->
<div class="banner-top">
	<div class="container">
		<h3 >Forgot Password</h3>
		<h4><a href="index.php">Home</a><label>/</label>Forgot Password</h4>
		<div class="clearfix"> </div>
	</div>
</div>
<!--login-->

	<div class="login">
	
		<div class="main-agileits">
				<div class="form-w3agile">
					<h3>Forgot Password</h3>
					<form method="post">
						<div class="key">
							<i class="fa fa-envelope-square" aria-hidden="true"></i>
							<input  type="text" name="email" required>
							<div class="clearfix"></div>
						</div>
						<input type="submit" name="formsubmit" value="Reset Password">
					</form>
				</div>
				<div class="forg">
					<?php
                            if (isset($_GET['flag'])){
                              if ($_GET['flag']==1){
                                  echo "<center><font color='success'>OTP Sent.</font></center>";
                              }elseif($_GET['flag']==0){
                                  echo "<center><font color='red'>Please Enter your Valid Email Id.</font></center>";
                              }
                            }
                        ?>
				</div>
			</div>
		</div>
<?php
		include "footer.php";
?>