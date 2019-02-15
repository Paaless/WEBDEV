<?php
$target_dir= "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) 
    {
        echo "Fisierul este - " . $check["name"] . ".";
        $uploadOk = 1;
    } 
    else 
    {
        echo "Fisierul nu este suportat.";
        $uploadOk = 0;
    }
}
if (file_exists($target_file)) {
    echo "Fisierul deja exista.";
    $uploadOk = 0;
}
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Marimea fisierului este prea mare.";
    $uploadOk = 0;
}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif") 
{
    echo "Sunt suportate numai fisierele JPG, JPEG, PNG & GIF.";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Fisierul nu a fost incarcat";
    } else 
{
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Fisierul". basename( $_FILES["fileToUpload"]["name"]). " a fost incarcat.";
    } else {
        echo "A aparut o eroare la incarcarea fisierului.";
    }
}
?>