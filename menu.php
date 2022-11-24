<!DOCTYPE html>
<html>
<title>Pupils</title>
    
</head>
<body>
   <h1>MENU</h1>
<?php
//show only admin stuff if role of logged in user is admin and v.v
//first update login to store role as session variable
//need to set pages not to be directly accessed too if not admin logged in
session_start();

if ($_SESSION["Role"]==1){
    echo("Admin Functions <br>");
    echo ('<a href="tuck.php">Add Tuck</a><br>');
    echo('<a href="pupil.php">Add pupil</a><br><br>');
}
?>
    <a href="buystuff.php">Create order</a><br>
    <a href="vieworders.php">view orders</a><br>
    <a href="Statspupils.php">View Total purchases</a><br>
    <a href="logout.php">log out</a>
</body>
</html>