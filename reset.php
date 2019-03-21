<?php
require 'db.php';
session_start();

if(isset($_GET['email']) $$ !empty($_GET['email']) AND isset($_GET['hash'] $$ !empty($_GET['hash']) )
   {
     $email=$mysqli->escape_string($_GET['email']);
     $hash=$mysqli->escape_string($_GET['hash']);
     $result=$mysqli->query("SELECT * FROM users WHERE email='$email' AND hash='$hash'");
    if($result->num_rows== 0)
    { 
    $_SESSION['message'] ='Link-ul accesat a intampinat o eroare!';
      header("location: error.php");
    }
   }
   else
   {$_SESSION['message']="Verificarea a intampinat o eroare!";
    header("location:error.php");}
?>
<!DOCTYPE HTML>
<html>
<body>
  <div class="form">
    <form action="resetpass.php" method="post">
      <div>
        <label>Noua parola</label>
        <input type="password" required name="newpassword" autocomplete="off">
      </div>
      <div>
        <label>Confirma parola</label>
        <input type="password" required name="confirmpassowrd" autocomplete="off">
      </div>
    </form>
   </div>
   </body>
</html>
