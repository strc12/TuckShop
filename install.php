<?php 
    // note this does not use connection.php as connection made at the time of creation
   $servername = 'localhost';
   $username = 'root';
   $password= '';
//note no Database mentioned here!!
try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS TuckShop";
    $conn->exec($sql);
    //next 3 lines optional only needed really if you want to go on an do more SQL here!
    $sql = "USE TuckShop";
    $conn->exec($sql);
    echo "DB created successfully";
    $stmt1 = $conn->prepare("DROP TABLE IF EXISTS TblUser;
    CREATE TABLE TblUser 
    (UserID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Surname VARCHAR(20) NOT NULL,
    Forename VARCHAR(20) NOT NULL,
    Password VARCHAR(200) NOT NULL,
    Year INT(2) NOT NULL,
    Role TINYINT(1))");
    $stmt1->execute();
    $stmt1->closeCursor(); 

    $stmt2 = $conn->prepare("DROP TABLE IF EXISTS TblTuck;
    CREATE TABLE TblTuck
    (TuckID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Tuckname VARCHAR(40) NOT NULL,
    Tuckdescription VARCHAR(200) NOT NULL,
    Quantity INT(4) NOT NULL,
    Price DECIMAL(15,2) NOT NULL)");
    $stmt2->execute();
    $stmt2->closeCursor();

    $stmt3 = $conn->prepare("DROP TABLE IF EXISTS TblOrders;
    CREATE TABLE TblOrders
    (OrderID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    UserID INT(4),
    Dateoforder DATE,
    Orderstatus INT(1) NOT NULL)");
    $stmt3->execute();
    $stmt3->closeCursor(); 

    $stmt7 = $conn->prepare("DROP TABLE IF EXISTS TblBasket;
    CREATE TABLE TblBasket
    (OrderID INT(4),
    TuckID INT(4),
    Quantity INT(2))");
    $stmt7->execute();
    $stmt7->closeCursor(); 
    $hashed_password = password_hash("password", PASSWORD_DEFAULT);
    $stmt4 = $conn->prepare("INSERT INTO TblUser(UserID,Surname,Forename,Password,Year,Role)VALUES 
    (NULL,'Cunniffe','Robert',:hp,13,1),
    (NULL,'Strachan','Ally',:hp,13,1),
    (NULL,'Smith','John',:hp,13,0),
    (NULL,'Jones','Davy',:hp,13,0),
    (NULL,'Patel','Nish',:hp,13,0)
    ");
    $stmt4->bindParam(':hp', $hashed_password);

    $stmt4->execute();
    $stmt4->closeCursor();
    $stmt5 = $conn->prepare("INSERT INTO TblTuck(TuckID,Tuckname,Tuckdescription,Quantity,Price)VALUES 
    (NULL,'Mars Bar','Sugary bar',100,0.60),
    (NULL,'Pringles','pringles minipack',30,1.20),
    (NULL,'Coke','Fizzy Pop',20,1.00)
    ");
    $stmt5->execute();
    $stmt5->closeCursor();
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}
$conn=Null;
?>