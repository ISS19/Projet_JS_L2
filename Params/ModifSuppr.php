<?php
include 'connexDb.php';
$message ="";
$nomMS = "";
$prenomMS = "";
if(isset($_POST['Modif']))
{
    if(!empty($_POST['matriculeMS']) AND !empty($_POST['nomMS']) AND !empty($_POST['prenomMS']) AND !empty($_POST['sexeMS']) AND !empty($_POST['adresseMS']) AND !empty($_POST['numTelMS']) AND !empty($_POST['emailMS']) AND !empty($_POST['filiereMS']) AND !empty($_POST['niveauMS']))  
    {
        $matriculeMS = $_POST['matriculeMS'];
        $nomMS = $_POST['nomMS'];
        $prenomMS = $_POST['prenomMS'];
        $sexeMS = $_POST['sexeMS'];
        $adresseMS = $_POST['adresseMS'];
        $numTelMS = $_POST['numTelMS'];
        $emailMS = $_POST['emailMS'];
        $filiereMS = $_POST['filiereMS'];
        $niveauMS = $_POST['niveauMS'];

        $modif = $db->prepare("UPDATE etudiant SET NomEt=:NomEt, PrenomEt=:PrenomEt, Sexe=:Sexe, Adresse=:Adresse, NumTel=:NumTel, Email=:Email, Filiere=:Filiere, Niveau=:Niveau WHERE id=:id");
        $modif->bindParam(":id", $matriculeMS);
        $modif->bindParam(":NomEt", $nomMS);
        $modif->bindParam(":PrenomEt", $prenomMS);
        $modif->bindParam(":Sexe", $sexeMS);
        $modif->bindParam(":Adresse", $adresseMS);
        $modif->bindParam(":NumTel", $numTelMS);
        $modif->bindParam(":Email", $emailMS);
        $modif->bindParam(":Filiere", $filiereMS);
        $modif->bindParam(":Niveau", $niveauMS);

        $modif->execute();
        $message = "Modification effectué";
    }
    else
    {
        $message = "Veuillez remplir tout les champs";
    }
}

if(isset($_POST['Suppr']))
{
    if(!empty($_POST['matriculeMS']))
    {
        $matriculeMS = $_POST['matriculeMS'];
        $suppr = $db->prepare("DELETE FROM etudiant WHERE id=:id");
        $suppr->bindParam(":id", $matriculeMS);
        $suppr->execute();

        $message = "Suppression effectué";
    }
}

?>