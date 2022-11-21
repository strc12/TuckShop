<!DOCTYPE html>
<html>
<title>Tuck</title>
    
</head>
<body>
    <h1>Basket contains</h1>
    <?php
    include_once('connection.php');
    session_start();
    foreach ($_SESSION["tuck"] as $tuck){
        //print_r($tuck);
        echo("<br>");
        $stmt = $conn->prepare("SELECT * FROM tbltuck WHERE TuckID=:tuckid");
        $stmt->bindParam(':tuckid', $tuck["tuck"]);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                echo($row["Tuckname"]." x ".$tuck["qty"]."<br>");
            }
    }
    ?>
</body>
</html>