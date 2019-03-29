<?php 
session_start();
$conn = mysqli_connect("localhost","root","","filesdb");

if(!$conn){
    die("Connection error: " . mysqli_connect_error()); 
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    $sql = "SELECT * FROM users WHERE email ='$email'";
    $rs = mysqli_query($conn,$sql);
    $numRows = mysqli_num_rows($rs);

    if($numRows  == 1){
        $row = mysqli_fetch_assoc($rs);
        if(password_verify($password,$row['password']))
        {
            echo "Password verified and ok";

// initialize session if things where ok.


session_start();
session_regenerate_id();

$_SESSION['lastname'] = $row['surname'];
$_SESSION['firstname'] = $row['first_name'];
$_SESSION['email'] = $row['email'];
$_SESSION['loggedin']=true;
// take me to welcome.php page
header('Location: index.html');

        }
        else{
            echo "Wrong Password details";
        }
    }
    else{
        echo "User does not exist";
    }
}

?>
