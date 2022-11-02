<?php

header('Location: pupil.php');
try{
	include_once('connection.php');
	array_map("htmlspecialchars", $_POST);
    switch($_POST["role"]){
		case "Pupil":
			$role=0;
			break;
		case "Admin":
			$role=1;
			break;
	}
    $username=$_POST["surname"].".".$_POST["forename"][0];//creates username - should we check this does not exist already...
    
	$hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);//hashes password for security
	$stmt = $conn->prepare("INSERT INTO TblUser(UserID,Username,Surname,Forename,Password,Year,Balance,Role)VALUES (NULL,:username,:surname,:forename,:password,:year,:balance,:role)");
	$stmt->bindParam(':surname', $_POST["surname"]);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':forename', $_POST["forename"]);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->bindParam(':year', $_POST["year"]);
    $stmt->bindParam(':balance', $_POST["balance"]);
    $stmt->bindParam(':role', $role);
	
	$stmt->execute();
	}
catch(PDOException $e)
{
    echo "error".$e->getMessage();
}
$conn=null;
?>