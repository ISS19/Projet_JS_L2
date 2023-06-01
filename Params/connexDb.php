<?php
@session_start();
$user = "root";
$pass ="";

try{
    $db = new PDO('mysql:host=localhost;dbname=gestionscolarite',$user, $pass);
}
catch(PDOException $e){
    echo('erreur'.$e->getMessage());
}



