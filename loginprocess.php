<?php
session_start();
include_once ("connection.php");
array_map("htmlspecialchars", $_POST);
$stmt = $conn->prepare("SELECT * FROM tbluser WHERE username =:username ;" );
$stmt->bindParam(':username', $_POST['Username']);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{ 
    $hashed= $row['Password'];
    $attempt= $_POST['Pword'];
    if(password_verify($attempt,$hashed)){
        echo("yay");
        $_SESSION['name']=$row["Surname"];
        if (!isset($_SESSION['backURL'])){
            $backURL= "tuck.php";
        }else{
            $backURL=$_SESSION['backURL'];
        }
        
        unset($_SESSION['backURL']);
       
        header('Location: ' . $backURL);
    }else{
       echo("d");
        header('Location: login.php');
    }
}
$conn=null;
?>