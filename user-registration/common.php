<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title> Login Form | Nothing4us </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'><link rel="stylesheet" href="style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<!-- Mixins-->
<!-- Pen Title-->
<div class="pen-title">
  
</div>
<div class="rerun"><a href="">Reload</a></div>
<div class="container">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Login</h1>
    <form name="login" action="" method="post"
					onsubmit="return loginValidation()">
          <?php if(!empty($loginResult)){?>
				<div class="error-msg"><?php echo $loginResult;?></div>
				<?php }?>
      <div class="input-container">
        <input type="text" name="username" id="username" required="required"/>
        <label for="text" id="password">Username</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" name="login-password" id="login-password" required="required"/>
        <label for="password" id="login-password-info">Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
      <input class="btn" type="submit" name="login-btn"
							id="login-btn" value="Login">
      </div>
      
    </form>
  </div>
  <div class="card alt">
    <div class="toggle"></div>
    <h1 class="title">Register
      <div class="close"></div>
    </h1>
    <form name="sign-up" action="login.php" method="post"
					onsubmit="return signupValidation()">
          <?php
    if (! empty($registrationResponse["status"])) {
        ?>
                    <?php
        if ($registrationResponse["status"] == "error") {
            ?>
				    <div class="server-response error-msg"><?php echo $registrationResponse["message"]; ?></div>
                    <?php
        } else if ($registrationResponse["status"] == "success") {
            ?>
                    <div class="server-response success-msg"><?php echo $registrationResponse["message"]; ?></div>
                    <?php
        }
        ?>
				<?php
    }
    ?>
      <div class="input-container">
        <input type="text" id="username" required="required"/>
        <label for="text" id="username-info" >Username</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="email" name=email id="email" required="required"/>
        <label for="email" id="email-info">Email</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" name="signup-password" id="signup-password" required="required"/>
        <label for="password" id="signup-password-info">Password</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" name="confirm-password" id="confirm-password" required="required"/>
        <label for="password" id="confirm-password-info">Repeat Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
      <!-- <input class="btn" type="submit" name="signup-btn"
							id="signup-btn" value="signup"> -->
        <button type="submit" name="signup-btn" id="signup-btn"><span>Next</span></button>
      </div>
    </form>
  </div>
</div>

<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="script.js"></script>
  <script src="vendor/jquery/jquery-3.3.1.js" type="text/javascript"></script>
  <script  src="logvalid.js"></script>
  <script  src="regvalid.js"></script>
</body>
</html>
