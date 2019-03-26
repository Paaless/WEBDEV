<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') 
$_SESSION['loggedin']=false;
session_destroy();
header('location:index.html');
?>
