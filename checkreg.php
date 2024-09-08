<?php
  session_start();
  include"connection.php";
  if(isset($_POST['formsubmit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $cpass=$_POST['cpass'];
    $phone=(double)$_POST['phone'];
    $add = $_POST['add'];
    $dob = $_POST['dob'];
    $dpfname=addslashes($_FILES['dp']['name']);
    $dptmpname=addslashes($_FILES['dp']['tmp_name']);
    $role=2;
    $status=1;
    // date_default_timezone_set("Asia/Kolkata");
    // $date = date('Y-m-d H:i:s');
    if($pass==$cpass){
        $q1= "INSERT INTO login_tbl(email_id, password, phone_no, role, status) VALUES ('$email', '$pass', '$phone', '$role', '$status')";
        $res1= mysqli_query($con,$q1);

        $q3="SELECT * FROM login_tbl WHERE email_id='$email'";
        $res3=mysqli_query($con,$q3);
        $row3=mysqli_fetch_array($res3);
        $lid=$row3['l_id'];
        
        $q2= "INSERT INTO detail_tbl(l_id, name, dob, address, dp) VALUES ('$lid','$name','$dob', '$add', 
            '$dpfname')";
        $res2= mysqli_query($con,$q2);

        move_uploaded_file($_FILES["dp"]["tmp_name"],"photos/".$_FILES["dp"]["name"]);

        if($res1 && $res2){
                echo ("<script LANGUAGE='JavaScript'>
              window.alert('User registered successfully.');
             window.location.href='login.php';
            </script>");
        }
    }else{
        echo ("<script LANGUAGE='JavaScript'>
              window.alert('Password and Confirm passwords are not same.');
             window.location.href='register.php';
            </script>");
    }
  } 
?>