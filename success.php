<?php
 session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        .bckgr{
            background-image: url(bg.png);
        }
                 #buttongr{
       text-align: center;
        background-color:rgba(247, 247, 255, 1);
        text-decoration: none;
    }
    
    .button{
         border: none;
        padding: 15px 32px;
          float: inherit;
        text-decoration: none;
        background-color:rgba(247, 247, 255, 1);
        font-size: 15;
        font-family: fantasy;
    }
     .button:hover {
  background-color:rgba(189, 213, 234, 1);
}
    </style>
</head>
<body class="bckgr">
<div class="form">
<h1><?= 'Succes';?></h1>
<p>
<?php
if( isset($_SESSION['message']) AND !empty($_SESSION['message']))
echo $_SESSION['message'];
else
header("location:index.html");
?>
</p>
    <button class="button"><a href="index.html">Acasa</a></button>
    </div>
    </body>
</html>
