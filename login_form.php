<?php
include('login_connectivity.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
header("location: student_homepage.php"); // Redirecting To Profile Page
}
?> 

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="LoginStyle.css" rel="stylesheet"
 	  type="text/css" />
</head>
<body>

<h2>My Student Homepage Login</h2>

<form method="POST" action="login_connectivity.php">
  <div class="imgcontainer">
    <img src="logo_transparent.png" alt="University of Nottingham" class="logo">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <input id=button type="submit" name="submit" value="Login">
    <span><?php echo $error; ?></span>
  </div>

</form>

</body>
</html>
