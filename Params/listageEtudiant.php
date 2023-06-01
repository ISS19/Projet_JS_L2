<?php
include 'connexDb.php';
include 'connexion.php';
$liste = $db->prepare("SELECT id, NomEt, PrenomEt, Sexe, Adresse, NumTel, Email, Filiere, Niveau FROM etudiant WHERE Filiere = ?");
$liste->execute([$_SESSION['filiere']]);
?>