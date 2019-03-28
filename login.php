<?php
require "file_db.php";
$email= $mysqli->escape_string($_POST['email']);
$result= $mysqli->query("SELECT *FROM users WHERE email='$email'");
if($result->num_rows == 0)
{
$SESSION['message']="Nu exista niciun utilizator cu acel email";
header("location:error.php");
}
else {
$user=$result->fetch_assoc();
if(password_verify($_POST['password'], $user['password']) ){
$_SESSION['email']=$user['email'];
$_SESSION['firstname']=$user['firstname'];
$_SESSION['lastname']=$user['lastname'];
$_SESSION['active']=$user['active'];
$_SESSION['loggedin']=true;
header("location:index.html");
}
else{
$_SESSION['message']="Ai introdus o parola gresita!";

    }
}
if (match_found_in_database()) {
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username; 
}

?>
