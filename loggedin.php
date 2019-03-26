<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 
{
$_SESSION['messagelog']='';
}
else
{
$_SESSION['messagelog']='Pentru a putea incarca fisiere trebuie sa te conectezi/creezi un cont';
}
?>
