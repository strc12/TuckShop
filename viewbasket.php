<!DOCTYPE html>
<html>
<title>Tuck</title>
    
</head>
<body>
    <h1>Basket contains</h1>
    <table>
        <tr>
        <th>Name</th>
        <th>quantity</th>
        <th>price</th>
    <?php
    include_once('connection.php');
    session_start();
    $total=0;
    echo("<tr>");
    foreach ($_SESSION["tuck"] as $tuck){

        echo("<br>");
        $stmt = $conn->prepare("SELECT * FROM tbltuck WHERE TuckID=:tuckid");
        $stmt->bindParam(':tuckid', $tuck["tuck"]);
        $stmt->execute();
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                echo("<td>".$row["Tuckname"]."</td><td> ".$tuck["qty"]." </td><td>- £".number_format(($tuck["qty"]*$row["Price"]),2)."</td></tr>");
                $total=$total+($tuck["qty"]*$row["Price"]);
            }
    }
    //could do some colouring here to indicate if over balance...
    echo("<tr><td></td><td>Total cost </td><td>£".number_format($total,2)."</td></tr>");
    //stores the basket total to subract from Balance
    $_SESSION["totalcost"]=$total;
    ?>
    </table>
    <a href="buy.php">Confirm and order</a>
</body>
</html>