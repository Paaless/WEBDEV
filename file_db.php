<?php
session_start();
$host='localhost';
$user='root';
$pass='';
$db='filesdb';
$mysqli=new mysqli($host,$user,$pass,$db) or die($mysqli->error);
?>
