<?php
require "file_db.php";
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
 $album_name=$_POST["alb_name"];
$result = $mysqli->query("SELECT * FROM albums WHERE name ='$album_name' ") or die($mysqli->error());

    if($result->num_rows > 0)
{
    $_SESSION['message']='Exista deja un album cu acest nume!';
}
    else
    {
       $sql="INSERT INTO albums (name,user_id)"."VALUES('$album_name','1')";
 if($mysqli->query($sql))
 {
     echo 1;
     $_SESSION['message']="A fost creat albumul $album_name .";
 }
    }
}
echo $_SESSION['message'];
?>
