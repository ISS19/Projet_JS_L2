<?php
include 'connexDb.php';
if(isset($_POST['btn']))
{
    if(!empty($_POST['nom']) and !empty($_POST['pass']))
    {
        $nom = htmlspecialchars($_POST['nom']);
        $pass = sha1($_POST['pass']);
        $assign = $_POST['filiere'];
        $connex = $db->prepare('SELECT * FROM utilisateur WHERE Nom = ? and Mdp = ? and Assign = ?');
        $connex->execute(array($nom, $pass, $assign));
        if ($connex->rowCount() > 0) {
            $_SESSION['auth'] = true;
            $_SESSION['nom'] = $nom;
            $_SESSION['pass'] = $pass;
            $_SESSION['filiere'] = $assign;
            $_SESSION['id'] = $connex->fetch()['id'];
            header('Location: accueil.php');
        }
    }
    else
    {
        $err = "Veuillez remplir tout les champs";







        
    }
}
