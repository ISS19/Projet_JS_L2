<?php
include './Params/connexDb.php';
if(isset($_POST['btn']))
{
    if(!empty($_POST['nom']) and  !empty($_POST['prenom']) and !empty($_POST['filiere']) and !empty($_POST['pass']))
    {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $pass = sha1($_POST['pass']);
        $assign = htmlspecialchars($_POST['filiere']);
        $ajout = $db->prepare('INSERT INTO utilisateur (Nom, Prenom, Assign, Mdp) VALUES (:nom, :prenom, :assign, :pass)');
        $ajout->execute(array(
            ':nom'=>$nom,
            ':prenom'=>$prenom,
            ':assign'=>$assign,
            ':pass'=>$pass
        ));
        header('Location: login.php');
    }
    else
    {
        $err = "Veuillez remplir le formulaire d'inscription";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Inscription</title>
</head>
<body>
    <h1>Scolarité</h1>
    <div class="img"></div>
    <div class="cercle"></div>
    <div class="cercle1"></div>
    <form method="post" class="form" name="form">
        <fieldset class="table">
            <legend><strong>INSCRIPTION</strong></legend>
            <table>
                <tr>
                    <td><label for="">Nom: </label></td>
                    <td><input type="text" name="nom" id="nom" placeholder="Nom" class="inText" onkeyup="majNom()"></td>
                </tr>
                <tr>
                    <td><label for="">Prenom: </label></td>
                    <td><input type="text" name="prenom" id="prenom" placeholder="Prenom" class="inText" onkeyup="majPrenom()"></td>
                </tr>
                <tr>
                    <td><label for="">Assignement: </label></td>
                    <td><select name="filiere" id="" >
                        <option value="RPM">RPM</option>
                        <option value="AES">AES</option>
                        <option value="DA2I">DA2I</option>
                    </select></td>
                </tr>
                <tr>
                    <td><label for="">Mot de passe: </label></td>
                    <td><input type="password" name="pass" class="inText" placeholder="Mot de passe"></td>
                </tr>
            </table>
        </fieldset>
        <br>
        <input type="submit" value="Valider" name="btn" class="btn"><br>
        <a href="login.php" style="font-size: 12px; margin-left: 7%">Vous avez déjà un compte</a>
    </form>
    <?php if (isset($err)) {echo '<p style="margin-left: 40%; color: red">' . $err . '</p>';}?>
    <script src="js/index.js"></script>
</body>
</html>