<?php
include 'connexDb.php';
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$error = "";
$nomEt = "";
$prenomEt = "";
$message = "";
if(isset($_POST['btnEtudiant']))
{
    if(!empty($_POST['nomEt']) and !empty($_POST['prenomEt']) and !empty($_POST['dateNaiss']) and !empty($_POST['lieuNaiss']) and !empty($_POST['nation']) and !empty($_POST['sexe']) and !empty($_POST['pere']) and !empty($_POST['mere']) and !empty($_POST['adr']) and !empty($_POST['NTel']) and !empty($_POST['email']) and !empty($_POST['niveau']) and !empty($_POST['filiere']))
    {
        $nomEt = htmlspecialchars($_POST['nomEt']);
        $prenomEt = htmlspecialchars($_POST['prenomEt']);
        $dateNaiss = htmlspecialchars($_POST['dateNaiss']);
        $lieuNaiss = htmlspecialchars($_POST['lieuNaiss']);
        $nation = htmlspecialchars($_POST['nation']);
        $sexe = htmlspecialchars($_POST['sexe']);
        $pere = htmlspecialchars($_POST['pere']);
        
        $mere = htmlspecialchars($_POST['mere']);
        $adr = htmlspecialchars($_POST['adr']);
        $NTel = htmlspecialchars($_POST['NTel']);
        $email = htmlspecialchars($_POST['email']);
        $niveau = htmlspecialchars($_POST['niveau']);
        $filiere = htmlspecialchars($_POST['filiere']);

        $ajoutEt = $db->prepare('INSERT INTO etudiant (NomEt, PrenomEt, DateNaissEt, LieuNaissEt, Nationalite, Sexe, NomPere, NomMere, Adresse, NumTel, Email, Filiere, Niveau) VALUES (:NomEt, :PrenomEt, :DateNaissEt, :LieuNaissEt, :Nationalite, :Sexe, :NomPere, :NomMere, :Adresse, :NumTel, :Email, :Filiere, :Niveau)');
        $ajoutEt->execute(array(
            ':NomEt' => $nomEt,
            ':PrenomEt' => $prenomEt,
            ':DateNaissEt' => $dateNaiss,
            ':LieuNaissEt' => $lieuNaiss,
            ':Nationalite' => $nation,
            ':Sexe' => $sexe,
            ':NomPere' => $pere,
            ':NomMere' => $mere,
            ':Adresse' => $adr,
            ':NumTel' => $NTel,
            ':Email' => $email,
            ':Filiere' => $filiere,
            ':Niveau' => $niveau 
        ));
        

        $dompdf = new Dompdf();

        $html = '<h1>Informations sur l\'étudiant</h1>';
        $html .= '<p><strong>Nom :</strong> '.$nomEt.'</p>';
        $html .= '<p><strong>Prénom :</strong> '.$prenomEt.'</p>';
        $html .= '<p><strong>Date de naissance :</strong> '.$dateNaiss.'</p>';
        $html .= '<p><strong>Lieu de naissance :</strong> '.$lieuNaiss.'</p>';
        $html .= '<p><strong>Nationalité :</strong> '.$nation.'</p>';
        $html .= '<p><strong>Sexe :</strong> '.$sexe.'</p>';
        $html .= '<p><strong>Adresse :</strong> '.$adr.'</p>';
        $html .= '<p><strong>Numéro de téléphone :</strong> '.$NTel.'</p>';
        $html .= '<p><strong>Filière :</strong> '.$filiere.'</p>';
        $html .= '<p><strong>Niveau :</strong> '.$niveau.'</p> <br><br>';
        $html .= '<p><strong>BIEN INSCRIT A L\'EMIT</strong></p>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $pdf_content = $dompdf->output();
        file_put_contents('Recu/Recu_'.$nomEt.'_'.$prenomEt.'.pdf', $pdf_content);
        $message = "Inscription fais avec succès";
    }       
    else{
        $error = "Veuillez remplir tout les champs";
    }
}

?>