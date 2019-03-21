<?php
require 'db.php';
$_SESSION['email']=$_POST['email'];
$_SESSION['firstname']=$_POST['firstname'];
$_SESSION['lastname']=$_POST['lastname'];

$firstname = $mysqli->escape_string($_POST['firstname']);
$lastname = $mysqli->escape_string($_POST['lastname']);
$email = $mysqli->escape_string($_POST['email']);
$password =$mysqli->escape_string(password_hash($_POST['password'],PASSWORD_BCRYPT));
$hash = $mysqli->escape_string(md5(rand(0,1000) ) );

$result = $mysqli->query("SELECT * FROM users WHERE email ='$email' ") or die($mysqli->error());

if($result->num_rows > 0)
{
    $_SESSION['message']='Exista un utilizator cu acest email deja!';
    header("location:error.php");
}
else{
    $sql="INSERT INTO users (firstname,lastname,email,password,hash)".
        "VALUES('$firstname','$lastname','$email','$password','$hash')";
    if( $mysqli->query($sql) ){
        $_SESSION['active']=0;
        $_SESSION['loggedin']=true
        $_SESSION['message']="Link  de confirmare a fost trimis la $email, te rugam sa iti verifici contul accesand link-ul trimis in email!";
        $to = $email;
        $subject='Account Verification'
        $messageb='
        Salut'.$firstname.',
        Multumim pentru ca te-ai inscris!
        Apasa pe acest link pentru a-ti activa contul:
        https://localhost/ /verify.php?email='.$email.'&hash='.$hash;
        mail($to, $subject, $message_body);
        
        header("location:profile.php");
    }
    else{
        $_SESSION['message']='Inregistrarea a intampinat o eroare!';
        header("location: error.php");
    }
}
?>
