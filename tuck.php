
<!DOCTYPE html>
<html>
<title>Tuck</title>
    
</head>
<body>
   	<form action="addtuck.php" method="post">
  	Tuck name:<input type="text" name="tuckname"><br>
  	Description:<p><textarea name="description" rows=5 cols=80 >Enter description here...</textarea></p>
	Quantity: <input type="number" id="Quantity" name="Quantity" min="1" max="500"><br>
	Price: <input type="text" name="Price" >
  	<input type="submit" value="Add Tuck">
	</form>
	<h1>Current tuck:</h1>
<?php
	include_once('connection.php');
	$stmt = $conn->prepare("SELECT * FROM TblTuck");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			echo($row["Tuckname"].' '.$row["Tuckdescription"].' '.$row["Price"].' '.$row["Quantity"]."<br>");
		}
?>   
</body>
</html>