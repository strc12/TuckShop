<?php
print_r($_POST);
session_start();
#print_r($_SESSION);
//create new order
//should probably calculate if enough balance in users account to buy first...

	include_once('connection.php');
	array_map("htmlspecialchars", $_POST);
    //create order
	
    
	$stmt = $conn->prepare("SELECT * FROM tblbasket where OrderID=:orderid");
	$stmt->bindParam(':orderid', $_POST["OrderId"]);
	$stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
            print_r($row);
			echo("<br>");
		}
?>