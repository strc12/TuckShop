<!DOCTYPE html>
<html>
<head>
  
   <title>Login</title>
  
</head>
<body>

<form action="loginprocess.php" method= "POST">
 User name:<input type="text" name="Username"><br>
 Password:<input type="password" name="Pword"><br>
  <input type="submit" value="Login">
</form>

<?php
session_start();
echo ($_SESSION['backURL']);
?>
</body>
</html>