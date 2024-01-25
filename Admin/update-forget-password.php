<?php
require 'connection.php';

if (isset($_POST['passwordreset'], $_POST['reset_link_token'], $_POST['email'])) {
   $emailId = $_POST['email'];
   $token = $_POST['reset_link_token'];
   $password = $_POST['passwordreset'];
  
$hashedpassword = password_hash($password, PASSWORD_DEFAULT);

$loginpage = 'http://localhost/password_reset/index.php';
$reset = 'http://localhost/password_reset/reset-password.php';


$query = mysqli_query($con,"SELECT * FROM `customer` WHERE `reset_link_token`='".$token."' AND `email`='".$emailId."'");
$row = mysqli_num_rows($query);

$exp = "0000-00-00";
if($row){
mysqli_query($con,"UPDATE `customer` SET  `password`='" . $hashedpassword . "',`reset_link_token`='".NULL."',
 `exp_date`='" .$exp. "' WHERE `email`='" . $emailId . "'");
 
echo "<p style='text-align: center; color:green; '>Congratulations! Your password has been updated successfully <a href='$loginpage'></a>Login</p>";
header("refresh:1;url=login.php");
}else{
echo "<h1 style='text-align: center; color:red;  height: 100%;
  width: 100%;
  display: flex;
  position: fixed;
  align-items: center;
  justify-content: center;'><a href='$reset' style='color:red;'> Please try again!! </a></h1>";
}
}
?>