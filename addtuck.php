
<?php
header('Location: tuck.php');

try{
	include_once('connection.php');
	array_map("htmlspecialchars", $_POST);
    

	
	$stmt = $conn->prepare("INSERT INTO TblTuck(TuckID,Tuckname,Tuckdescription,Quantity,Price)VALUES (NULL,:tuckname,:tuckdesc,:quantity,:price)");
	$stmt->bindParam(':tuckname', $_POST["tuckname"]);
	$stmt->bindParam(':tuckdesc', $_POST["description"]);
    $stmt->bindParam(':quantity', $_POST["Quantity"]);
    $stmt->bindParam(':price', $_POST["Price"]);

	$stmt->execute();
	}
catch(PDOException $e)
{
    echo "error".$e->getMessage();
}
$conn=null;
?>