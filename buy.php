<?php
session_start();
print_r($_SESSION);
//create new order
try{
	include_once('connection.php');
	array_map("htmlspecialchars", $_POST);
    //create order
	$date=date_create()->format('Y-m-d H:i:s');
    print_r($date);
    
	$stmt = $conn->prepare("INSERT INTO Tblorders(OrderID,UserID,Dateoforder)VALUES (NULL,:Userid,:datey)");
	$stmt->bindParam(':Userid', $_SESSION["loggedinID"]);
	$stmt->bindParam(':datey', $date);
   
    
	$stmt->execute();
    //stores last inserted Order id
    $last=$conn->lastInsertId();
	}
catch(PDOException $e)
{
    echo "error".$e->getMessage();
}
 
//process array and create basket entries
foreach ($_SESSION["tuck"] as $entry){//& allows us to change
    $stmt = $conn->prepare("INSERT INTO Tblbasket(OrderID,TuckID,Quantity)VALUES (:orderid,:tuckid,:quantity)");
	$stmt->bindParam(':orderid', $last);
    $stmt->bindParam(':tuckid', $entry["tuck"]);
    $stmt->bindParam(':quantity', $entry["qty"]);
	$stmt->execute();
    $stmt->closeCursor(); 
}
$conn=null;
unset($_SESSION["tuck"]);
header('Location: menu.php');
?>
