<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<div class="form">
<h1>Error</h1>
<p>
<?php
if( isset($_SESSION['message']) AND !empty($_SESSION['message']) )
    echo $_SESSION['message'];
    else
        header("location:index.html");
?>
<a href="index.hmtl"><button class="home-btn">Acasa</button></a>
</p>
</div>
</body>
</html>
