<?php
require 'db.php';
session_start();
if($_SERVER['REQUEST_METHOD']=='POST')
{$email= $mysqli->escape_string($_POST['email']);
$result= $mysqli->query("SELECT * FROM users WHERE email='$email'");
if($result->num_rows==0)
{
$_SESSION['message']=" Acest utilizator nu exista! ";
header("location: error.php");
}
else {
$user=$result->fetch_assoc();
$email=$user['email'];
$hash=$user['hash'];
$first_name=$user['firstname'];

$_SESSION['message']=" <p> Un link pentru resetarea parolei a fost trimis la adresa de email <span>$email</span> !";
 $to=$email;
 $subject='Resetarea parolei';
 $message='
 Salut'.$firstname.',
 Pentru a reseta parola contului tau apasa pe linkul atasat acestui mesaj:
 https://localhost/ /reset.php?email='.$email.'&hash='.$hash;
 mail($to,$subject,$message);
 header("location: success.php");
 }
 }
 ?>
