<?php
require "file_db.php";
$newcontent = file_get_contents("template.html");
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
 $album_name=$_POST["alb_name"];
 $album_folder_name=$_POST['alb_name'];
$result = $mysqli->query("SELECT * FROM albums WHERE name ='$album_name' ") or die($mysqli->error());

    if($result->num_rows > 0)
{
    $_SESSION['message']='Exista deja un album cu acest nume!';
}
    else
    {  $sql="INSERT INTO albums (name,user_id)"."VALUES('$album_name','1')";
 if($mysqli->query($sql))
 { if(mkdir("$album_name"));
  { $handle = fopen("$album_folder_name/$album_name.html",'w+');
   fwrite($handle,$newcontent); 
  fclose($handle);}
     $_SESSION['message']="A fost creat albumul $album_name .";
  header('location:albume.html');
 }
    }
}
echo $_SESSION['message'];}
else
{
    $_SESSION['messagelog']="Trebuie sa te conectezi pentru a putea incarca fisiere!";
    header("location:testphp.php");
}
?>
