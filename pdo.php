<?php
session_start();
   $utilisateur = "root";
   $mdp = "";
   try{
      $db = new PDO("mysql:host=localhost; dbname = logne", $utilisateur, $mdp);
   }catch(PDOException $e){
      echo "erreur". $e -> getMessage();
   }
?>