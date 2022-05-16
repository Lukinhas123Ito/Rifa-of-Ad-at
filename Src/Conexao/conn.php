<?php

//Part for connect Data base 
$host = "sql209.epizy.com";
$database= "epiz_31448453_sysrifa";
$user= "epiz_31448453";
$pass= "AGhCmIfXUfn";

try{
    $pdo = new PDO('mysql:host='.$host.';dbname='.$database,$user,$pass);
    $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Fumfando";
}
catch(PDOException $e) {
    echo "Deu Pau ".$e ->getMessage();
}

?>