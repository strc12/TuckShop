<!DOCTYPE html>
<html>
<title>Tuck</title>
    
</head>
<body>
   	<form action="addtuck.php" method="post">
  
  	
	
<?php
	include_once('connection.php');
	$stmt = $conn->prepare("SELECT * FROM TblTuck");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			echo($row["Tuckname"].' '.$row["Tuckdescription"].' '.$row["Price"].' '.$row["Quantity"]."<input type='submit' value='".$row["TuckID"]."Add Tuck'><br>");//not compelted
		}
?>   
</form>
</body>
</html>