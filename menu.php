<!DOCTYPE html>
<html>
<title>Pupils</title>
    
</head>
<body>
   	<form action="addpupil.php" method="post">
  	Surname:<input type="text" name="surname"><br>
    Forename:<input type="text" name="forename"><br>
  	Password:<input type="password" name ="password"><br>
    Year:<input type="text" name="year"><br><!-- might put dome numeric validation here-->
	Initial balance: <input type="text" name="balance" ><br>
    Role:<br>   
    <input type="radio" name="role" value="Pupil" checked> Pupil<br><!--default pupil-->
            <input type="radio" name="role" value="Admin"> Admin<br>
  	<input type="submit" value="Add Pupil">
	</form>
	<h1>Current tuck:</h1>
<?php
	include_once('connection.php');
	$stmt = $conn->prepare("SELECT * FROM TblUser");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			echo($row["Forename"].' '.$row["Surname"].' '.$row["Balance"].' '.$row["Year"]."<br>");
		}
?>   
</body>
</html>