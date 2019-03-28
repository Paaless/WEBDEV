<?php
session_start();
require 'file_db.php';
if($_SERVER['REQUEST_METHOD']=='POST')
{if($_POST['newpassword']==$_POST['confirmpassword'])
{
 $new_pass=password_hash($_POST['newpassword'],PASSWORD_BCRYPT);
 
 $email=$mysqli->escape_string($_POST['email']);
 $hash=$mysqli->escape_string($_POST['hash']);
 
 $sql="UPDATE users SET password='$new_pass',hash='$hash WHERE email='$email'";
 if($mysqli->query($sql))
 {$_SESSION['message']="Parola a fost resetata cu succces!";
  header("location:succes.php");
  
}
}
 else{
   $_SESSION['message']="Cele doua parole introduse nu se potrivesc!Incearca din nou!";
   header("location:error.php");
 }
}
?>
