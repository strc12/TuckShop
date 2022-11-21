<?php
session_start();

#next line used to reset basket
#$_SESSION["tuck"]=array();



if (!isset($_SESSION["tuck"])){
$_SESSION["tuck"]=array();#creates basket if not created already!
}


//deal with if already in array
$found=FALSE;
foreach ($_SESSION["tuck"] as &$entry){//& allows us to change
    
    if ($entry["tuck"]===$_POST["TuckId"]){
        $found=TRUE;
        #increase basket by existing qty
        $entry["qty"]=$entry["qty"]+$_POST["qty"];
        
        
    }
}
#echo($found."<br>");
if ($found===FALSE){
    array_push($_SESSION["tuck"],array("tuck"=>$_POST["TuckId"],"qty"=>$_POST["qty"]));
}
header('Location: buystuff.php')
?>