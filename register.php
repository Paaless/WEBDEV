<?php

$conn=mysqli_connect("localhost","root","","filesdb");
$checkemail=$_POST['email'];
if(!$conn){
    die("Connection error: " . mysqli_connect_error()); 
}
$result=$conn->query("SELECT * FROM users WHERE email='$checkemail'") or die($conn->error);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
if($result->num_rows > 0)
{ 
echo "Exista deja un utilizator cu acest email!";
}
else{
        $firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
        $lastname = mysqli_real_escape_string($conn,$_POST['lastname']);
        $email= mysqli_real_escape_string($conn,$_POST['email']);
        $password=mysqli_real_escape_string($conn,$_POST['password']);
        $userhash=mysqli_real_escape_string($conn,md5(rand(0,1000)));
        $options = array("cost"=>4);
        $hashpassword = password_hash($password,PASSWORD_BCRYPT,$options);

        $sql = "INSERT INTO users (firstname,lastname,email,password,hash)".
        "VALUES('$firstname','$lastname','$email','$hashpassword','$userhash')";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            echo "Inregistrare reusita!";
        }
    }
    }
?>
