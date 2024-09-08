<?php
  include "connection.php";

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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Forgot Password</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->

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
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Forgot Password</h4></div>

              <div class="card-body">
                <p class="text-muted">We will send a link to reset your password</p>
                <form method="POST">
                  <div class="form-group">
                    <label for="email">Email</label>
                  <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                  </div>

                  <div class="form-group">
                    <button type="submit" name="formsubmit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Reset Password
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
                       <?php
                            if (isset($_GET['flag'])){
                              if ($_GET['flag']==1){
                                  echo "<br/><center><font color='success'>OTP Sent.</font></center>";
                              }elseif($_GET['flag']==0){
                                  echo "<br/><center><font color='red'>Please Enter your Valid Email Id.</font></center>";
                              }
                            }
                        ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="assets/modules/jquery.min.js"></script>
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
</body>
</html>