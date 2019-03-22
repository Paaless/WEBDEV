<?php
require "file_db.php";
$target_dir="uploads/";
$target_file=$target_dir.basename($_FILES["file"]);
$uploadOk=1;
$imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["submit"])) 
{
    $image_name=$_POST["img_name"];
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) 
    {
        $uploadOk = 1;
    } 
    else 
    {
        echo "Fisierul nu este suportat.";
        $uploadOk = 0;
    }
}
if (file_exists($target_file)) 
{
    echo "Fisierul deja exista.";
    $uploadOk = 0;
}
else
{ 
$sql="INSERT INTO files (name,type)"."VALUES('$file_name','$imageFileType')";
}
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Marimea fisierului este prea mare.";
    $uploadOk = 0;
}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif") 
{
    echo "Sunt suportate numai fisierele JPG, JPEG, PNG & GIF.";
    $uploadOk = 0;
}
if($image_name=="")
{
    $error="Denumeste imaginea!";
}
else
if ($uploadOk == 0) {
    echo "Fisierul nu a fost incarcat";
    } else 
{
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
        {
    if($mysqli->query($sql))
        echo "Fisierul". basename( $_FILES["fileToUpload"]["name"]). " a fost incarcat.";
        else
        echo "A aparut o eroare la inregistrarea fisierului in baza noastra de date!";
     } 
    else 
    {
        echo "A aparut o eroare la incarcarea fisierului.";
    }
}
?>
