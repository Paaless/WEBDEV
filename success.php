<?php
 session_start();
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<div class="form">
<h1><?= 'Success';?></h1>
<p>
<?php
if( isset($_SESSION['message']) AND !empty($_SESSION['message']))
echo $_SESSION['message'];
else
header("location:index.html");
endif;
?>
</p>
<a href="index.html"><button class="home-btn">Acasa</button></a>
    </div>
    </body>
</html>
