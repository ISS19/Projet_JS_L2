<?php
include 'Params/connexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>
<body>
    <h1>Scolarité</h1>
    <div class="img"></div>
    <div class="cercle"></div>
    <div class="cercle1"></div>
    <form method="post" class="form" name="form">
        <fieldset class="table">
            <legend><strong>LOGIN</strong></legend>
            <table>
                <tr>
                    <td><label for="">Nom: </label></td>
                    <td><input type="text" name="nom" id="nom" placeholder="Nom" class="inText" onkeyup="majNom()"></td>
                </tr>
                <tr>
                    <td><label for="">Mot de passe: </label></td>
                    <td><input type="password" name="pass" class="inText" placeholder="Mot de passe"></td>
                </tr>
                <tr>
                    <td><label for="">Assignement: </label></td>
                    <td><select name="filiere" id="" >
                        <option value="RPM">RPM</option>
                        <option value="AES">AES</option>
                        <option value="DA2I">DA2I</option>
                    </select></td>
                </tr>
            </table>
        </fieldset>
        <br>
        <input type="submit" value="Valider" name="btn" class="btn" style="margin-left: 11%;">
    </form>
    <?php if (isset($err)) {echo '<p style="margin-left: 40%; color: red">' . $err . '</p>';}?>
    <a href="index.php" style="margin-left: 43%; font-size: 12px;">Vous n'avez pas de compte?</a>
    <script src="js/index.js"></script>
</body>
</html>