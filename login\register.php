<!DOCTYPE html>
<html>
<head>
<style>
    .bckgr{background-image:url(bg.png);}
    .tab active{
     text-align: center;
    }
    .tab{
     text-align: center;
    }
    .field-wrap{
     text-align: center;
    }
    .button{
         border: none;
        padding: 15px 32px;
          float: inherit;
        text-decoration: none;
        background-color:rgba(247, 247, 255, 1);
        font-size: 15;
        font-family: fantasy;
        position: absolute;

    }
    .wrapper{
        text-align: center;
    }
     .button:hover {
  background-color:rgba(189, 213, 234, 1);
}

</style>

</head>
    <body class="bckgr">
<?php
    if($_SERVER['REQUEST_METHOD']== 'POST')
    {
        if(isset($_POST['login']))
        {
            require 'login.php';
        }
        elseif(isset($_POST['register']))
        {
        require 'register.php';    
        }
    }
?>
    <div class="message" style="float:center;">
    </div>
<div class="form"> 
      <div class="tab-content">
        <div id="signup">   
          <h1 style="color:white; text-align: center;">Register</h1>
          
          <form action="register1.php" method="post">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">* &nbsp; &nbsp; &nbsp; &nbsp;</span>
              </label>
              <input type="text" required autocomplete="off" name="firstname" />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">* &nbsp; &nbsp; &nbsp; &nbsp;</span>
              </label>
              <input type="text"required autocomplete="off" name="lastname"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">* &nbsp;</span>
            </label>
            <input type="email"required autocomplete="off" name="email"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name="password"/>
          </div>
          <div class="wrapper" style="margin-bottom:50px;">
          <br><button type="submit" class="button">Get Started</button>
         </div>
          
          </form>

        </div>
        
        <div id="login">   
          <h1 style="color: white; text-align: center;">Welcome Back!</h1>
          
          <form action="login1.php" method="post">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name="email"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">* &nbsp; &nbsp; &nbsp; &nbsp;</span>
            </label>
            <input type="password"required autocomplete="off" name="password"/>
          </div>
          
          <p class="forgot" style="text-align: center;"><a href="forgot.html" style="text-decoration: none;text-decoration-color: aliceblue;">Forgot Password?</a></p>
          <div class="wrapper">
              <button type="submit" class="button">Log In</button>
          </div>
          </form>

        </div>
        
      </div>
      
    </div>
</body>  
</html>
