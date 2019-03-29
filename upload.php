<?php
$_SESSION['messagelog']="";
$target_dir="uploads/";
$target_file=$target_dir . basename($_FILES["fileImg"]["name"]);
$uploadOk=1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin'] == true)
{ 
if($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $image_name=$_POST["img_name"];
    $check = getimagesize($_FILES["fileImg"]["tmp_name"]);
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
$sql="INSERT INTO files (name,type)"."VALUES('$image_name','$imageFileType')";
if ($_FILES["fileImg"]["size"] > 5000000) 
{
    echo "Marimea fisierului este prea mare.";
    $uploadOk = 0;
}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType !="mp3"  && $imageFileType !="mp4") 
{
    echo "Sunt suportate numai fisierele JPG, JPEG, PNG & GIF.";
    $uploadOk = 0;
}
if($image_name=="")
{
    $error="Denumeste imaginea!";
}
else
if ($uploadOk == 0) 
{
    echo "Fisierul nu a fost incarcat";
    } else 
{   
    if($mysqli->query($sql))
        {
    if (move_uploaded_file($_FILES["fileImg"]["tmp_name"], $target_file)) 
            
        echo "Fisierul". basename( $_FILES["fileImg"]["name"]). " a fost incarcat cu numele $image_name .";
        else
        echo "A aparut o eroare la incarcarea fisierului.";
     } 
    else 
    {
        echo "A aparut o eroare la inregistrarea fisierului in baza noastra de date!";
    }
}
    }
    else 
    {$_SESSION['messagelog']="Trebuie sa te conectezi pentru a putea incarca fisiere!";
    header("location:testphp.php");}
?>
