<!DOCTYPE html>
<html>
<title>Tuck</title>
    
</head>
<body>
<?php
include_once('connection.php');
session_start();
if (isset($_SESSION["tuck"])){
	//shows number in basket if basket exists
	echo ("Basket contains ");
	echo count($_SESSION["tuck"]);
	echo (" items<br>");
	echo ("<a href=viewbasket.php>View basket contents</a>");
}

	$stmt = $conn->prepare("SELECT * FROM TblTuck");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{//uses a hidden input which contains the ID of the tuck selected
			echo'<form action="addtobasket.php" method="post">';
			echo($row["Tuckname"].' '.$row["Tuckdescription"].' '.$row["Price"].' '.$row["Quantity"]."<input type='number' name='qty' min='1' max='5' value='1'>
			<input type='submit' value='Add Tuck'><input type='hidden' name='TuckId' value=".$row['TuckID']."><br></form>");
		}
?>   
<a href="checkout.php">Checkout</a>
</body>
</html>