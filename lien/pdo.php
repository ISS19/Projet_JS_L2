











<?php
    $user = "root";
    $mdp = "";

    try{
        $db = new PDO("mysql:host=localhost; dbname = bibliogestion", $user, $mdp);
    }
    catch(PDOException $e){
        echo "erreur" .$e -> getMessage();
    }
?>