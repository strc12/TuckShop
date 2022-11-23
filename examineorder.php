<!DOCTYPE html>
<html>
<title>Tuck</title>
    
</head>
<body>
    
<?php
echo ("<h2> Order ".$_POST["OrderId"]." contained the following items</h2>");

session_start();
#print_r($_SESSION);
//create new order
//should probably calculate if enough balance in users account to buy first...

	include_once('connection.php');
	array_map("htmlspecialchars", $_POST);
    //create order
	
    $total=0;
	$stmt = $conn->prepare("SELECT tbltuck.Tuckname as tn, tbltuck.Price as tp, tblbasket.Quantity as qty FROM tblbasket INNER JOIN tbltuck on tbltuck.TuckID = tblbasket.TuckID where tblbasket.OrderID=:orderid");
	$stmt->bindParam(':orderid', $_POST["OrderId"]);
	$stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
            $total=$total+($row["qty"]*$row["tp"]);
			echo($row["qty"]." x ".$row["tn"]." at ".$row["tp"]."<br>");
		}
    echo("Total spent £".number_format($total,2)."<br>");
    
?>
<a href="vieworders.php">Back to list of orders</a>
</body>
</html>
