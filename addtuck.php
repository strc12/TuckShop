<?php
session_start();
print_r($_SESSION);
//header('Location: tuck.php');
print_r($_POST);
try{
	include_once('connection.php');
	array_map("htmlspecialchars", $_POST);
	//create order if not already created
    $x=1;

	
	$stmt = $conn->prepare("INSERT INTO Tblbasket(OrderID,TuckID,Quantity)VALUES (:OrderID,:TuckID,:quantity)");
	$stmt->bindParam(':OrderID', $_SESSION["OrderID"]);
	$stmt->bindParam(':TuckID', $_POST["TuckId"]);
    $stmt->bindParam(':quantity',$x );
    
	$stmt->execute();
	}
catch(PDOException $e)
{
    echo "error".$e->getMessage();
}
$conn=null; 
?>