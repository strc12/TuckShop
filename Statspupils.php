
<!DOCTYPE html>
<html>
<title>Pupils</title>
    
</head>
<body>
<?php
session_start();
include_once('connection.php');
array_map("htmlspecialchars", $_POST);

//collect first and last name.. - worthmaking into a function??
$stmt = $conn->prepare("SELECT * FROM tbluser  where UserID=:userid");
$stmt->bindParam(':userid', $_SESSION["loggedinID"]);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
       
        $first=$row["Forename"];
        $second=$row["Surname"];
    }
echo ("<h2>Order History for ".$first." ".$second."</h2>");
    $total=0;
	$stmt = $conn->prepare("SELECT sum(tblbasket.Quantity) as cnt,tblorders.DateofOrder as dord, 
    tblorders.OrderID as orid ,tbltuck.Tuckname as tn, tbltuck.Price as tp, tblbasket.Quantity as qty 
    FROM tblbasket
    INNER JOIN tbltuck on tbltuck.TuckID = tblbasket.TuckID 
    INNER JOIN tblorders on tblorders.OrderID = tblbasket.OrderID 
    INNER JOIN tbluser on tbluser.UserID=tblorders.UserID where tblorders.UserID=:userid GROUP BY tblbasket.TuckID ORDER BY tblorders.OrderID asc");
	$stmt->bindParam(':userid', $_SESSION["loggedinID"]);
	$stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
            $total=$total+($row["qty"]*$row["tp"]);
            echo("You ordered ".$row["cnt"]." x ".$row["tn"]."<br>");
		}

        echo("Total spent £".number_format($total,2)."<br>");
?>
<a href="vieworders.php">Back to list of orders</a>
</body>
</html>