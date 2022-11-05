<!DOCTYPE html>
<html>
<title>Tuck</title>
    
</head>
<body>
<?php
session_start();
//gets last order ID allocated to check next
if (!isset ($_SESSION["Orderid"])){
	include_once('connection.php');
	$stmt = $conn->prepare("SELECT LAST_INSERT_ID();");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			$next=$row["LAST_INSERT_ID()"]+1;
		}
}
//display available tuck with a button to "add it to basket" ? number selector to select quantity???
$_SESSION["OrderID"]= $next;
echo($next);
	$stmt = $conn->prepare("SELECT * FROM TblTuck");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{//uses a hidden input which contains the ID of the tuck selected
			echo'<form action="addtuck.php" method="post">';
			echo($row["Tuckname"].' '.$row["Tuckdescription"].' '.$row["Price"].' '.$row["Quantity"]."<input type='submit' value='Add Tuck'><input type='hidden' name='TuckId' value=".$row['TuckID']."><br></form>");}
?>   
</form>
</body>
</html>