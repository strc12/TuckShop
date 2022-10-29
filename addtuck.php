<?php
	include_once('connection.php');
	$stmt = $conn->prepare("SELECT * FROM TblTuck");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			echo($row["Tuckname"].' '.$row["Tuckdescription"].' '.$row["Price"].' '.$row["Quantity"]."<br>");
		}
?>   