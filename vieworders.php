<!DOCTYPE html>
<html>
<title>Tuck</title>
    
</head>
<body>
    <h1>Order history</h1>
    
       
    <?php
    include_once('connection.php');
    session_start();
    //select all orders made by logged un user and display in table
    //need some funky join stuff to get details needed
        $stmt = $conn->prepare("SELECT * FROM tblorders WHERE UserID=:userid ORDER by dateoforder DESC");
        $stmt->bindParam(':userid', $_SESSION["loggedinID"]);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {echo'<form action="examineorder.php" method="post">';
                echo($row["OrderID"].' '.$row["Dateoforder"]."
                <input type='submit' value='View Order'><input type='hidden' name='OrderId' value=".$row['OrderID']."><br></form>");

                //echo("<tr><td>".$row["OrderID"]."</td><td> ".$row["Dateoforder"]." </td></tr>");
                
            }
        }else{
            echo("none");
        }
    
    ?>
    </table>
   
</body>
</html>