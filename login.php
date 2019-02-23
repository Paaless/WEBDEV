<?php
$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT *FROM users WHERE email='$email'");
if($result->num_rows == 0)
{
$SESSION['message']="User with that email doesn't exist!";
header("location:error.php");
}
else {
$user=$result->fetch_assoc();
if(password_verify($_POST['password'], $user['password']) ){
$_SESSION['email']=$user['email'];
$_SESSION['firstname']=$user[firstname];
$_SESSION['lastname']=$user[lastname];
$_SESSION['active']=$user[active];
$_SESSION['loggedin']=true;
header("location:profile.php");
}
else{
$_SESSION['message']="You have entered wrong password, try again!"
}
}
?>
