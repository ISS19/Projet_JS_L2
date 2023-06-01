<?php
include "Params/connexion.php";
include "Params/ajoutEtudiant.php";
include "Params/listageEtudiant.php";
include "Params/ModifSuppr.php";
if(!isset($_SESSION['id'])){header('Location: login.php');}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/accueil.css">
    <link rel="stylesheet" href="asset/font/bootstrap-icons.css">
    <link rel="stylesheet" href="asset/aos/aos.css">
    <script src="asset/font/bootstrap-icons.json"></script>
    <script src="js/node_modules/jquery/dist/jquery.js"></script>
    <title>Accueil</title>
</head>
<body>
    <div class="leftNav">
        <div class="logo"></div>
        <h2>SCOLARITE</h2>
        <hr>
        <br>
        <ul>
            <li><button class="crud" onclick="inscri()" id="btnAll">Inscription</button></li><br>
            <li><button class="crud" onclick="liste()" id="btnAll">Liste actuel</button></li><br>
            <li><button class="crud" onclick="modifSuppr()" id="btnAll">Modif & Suppr</button></li><br>
            <li><button class="crud" id="vocale"><i class="bi bi-mic-mute-fill" style="color: #8b8d9f;"></i></button></li><br>
            <li>
                <form action="" method="post">
                    <button class="deconnex" type="submit" onmouseleave="change()" onmouseenter="changement()"><a href="Params/deconnexion.php" style="text-decoration: none;"><i class="bi bi-door-closed" id="porte"></i> Deconnexion</a></button>
                </form>
            </li>
        </ul><br><br><br><br>
    </div>

<!--------------------------------------------------------------------------->
<!------------------Contenu à droite de l'application------------------------>
    <div class="containt" id="containt">
            <i class="bi bi-house-fill" id="petitIm" style=" margin-left: 1030px; color: #0C1033; float: right;" data-aos="fade-up" data-aos-delay="80" data-aos-duration="1500"></i>
        <div id="bienvenu" data-aos="fade-up" data-aos-delay="80" data-aos-duration="1500">
            <h1 class="bienvenu">BIENVENUE <?php echo $_SESSION['nom']; ?></h1>
            <p class="messagePHP"><?php echo $error; echo $message; ?></p>
        </div>  
       <!--Contenu de l'inscription des élève-->
        <div class="contenuInscri" id="inscri">
            <form action="" method="post" name="formIns">
                <fieldset class="table" id="table">
                    <legend class="legend" id="legend"><strong>Mention <?php echo $_SESSION['filiere']; ?></strong></legend>
                    <table>
                        <tr>
                            <td style="padding: 5px;"><label for="">Nom: </label></td>
                            <td style="padding: 5px;"><input type="text" name="nomEt" placeholder="Nom" style="border-left: none; border-right: none; border-top: none; border-color: #0C1033; background: transparent;" id="inputNom" onkeyup="MajNom()"></td>
                        </tr>
                        <script>
                            function MajNom()
                            {
                                var nom = document.getElementById('inputNom').value;
                                var subNom = nom.substring(0,nom.length).toUpperCase();
                                document.getElementById('inputNom').value = subNom;
                            }
                        </script>
                        <tr>
                            <td style="padding: 5px;"><label for="">Prénom(s): </label></td>
                            <td style="padding: 5px;"><input type="text" name="prenomEt" placeholder="Prenom" style="border-left: none; border-right: none; border-top: none; border-color: #0C1033; background: transparent;"  id="inputPrenom" onkeyup="majPrenom()"></td>
                        </tr>
                        <script>
                            function majPrenom()
                            {
                                var prenom = document.formIns.prenomEt.value;
                                var subPrenom = prenom.charAt(0).toUpperCase() + prenom.slice(1);
                                document.formIns.prenomEt.value = subPrenom;
                            }
                        </script>
                        <tr>
                            <td style="padding: 5px;"><label for="">Date de naissance: </label></td>
                            <td style="padding: 5px;"><input type="date" name="dateNaiss" id="" style="border-left: none; border-right: none; border-top: none; border-color: #0C1033; background: transparent;"></td>
                        </tr>
                        <tr>
                            <td style="padding: 5px;"><label for="">Lieu de naissance: </label></td>
                            <td style="padding: 5px;"><input type="text" name="lieuNaiss" id="" placeholder="Lieu de naissance" style="border-left: none; border-right: none; border-top: none; border-color: #0C1033; background: transparent;"></td>
                        </tr>
                        <tr>
                            <td style="padding: 5px;"><label for="">Nationalité: </label></td>
                            <td style="padding: 5px;">
                                <select name="nation"  style="border-left: none; border-right: none; border-top: none; border-color: #0C1033; background: transparent;">
                                    <option value="Malagasy">Malagasy</option>
                                    <option value="Etranger">Etranger</option>
                                </select>
                            </td>
                            
                        </tr>
                        <tr>
                            <td style="padding: 5px;"><label for="">Sexe: </label></td>
                            <td style="padding: 5px;"><input type="radio" name="sexe"  id="homme" value="Homme"><label for="homme">Homme</label><br>
                                <input type="radio" name="sexe" id="femme" value="Femme"><label for="femme">Femme</label></td>
                        </tr>
                        <tr>
                            <td style="padding: 5px;"><label for="">Fils de: </label></td>
                            <td style="padding: 5px;"><input type="text" id="pere" name="pere" placeholder="Nom du Père" style="border-left: none; border-right: none; border-top: none; border-color: #0C1033; background: transparent;" onclick="majPrenoms()"> et de <input type="text" name="mere" id="" placeholder="Nom de la mère" style="border-left: none; border-right: none; border-top: none; border-color: #0C1033; background: transparent;"></td>
                        </tr>
                        <tr>
                            <td style="padding: 5px;">Adresse: </td>
                            <td style="padding: 5px;"><input type="text" name="adr" id="" placeholder="Adresse" style="border-left: none; border-right: none; border-top: none; border-color: #0C1033; background: transparent;"></td>
                        </tr>
                        <tr>
                            <td style="padding: 5px;">Tel: </td>
                            <td style="padding: 5px;"><input type="text" id="Ntel"name="NTel" src="" alt="" placeholder="N°Tel" style="border-left: none; border-right: none; border-top: none; border-color: #0C1033; background: transparent;"></td>
                        </tr>
                        <script>
                            const inputNbr = document.getElementById("Ntel");
                            inputNbr.addEventListener("input", function(event) {
                                const value = inputNbr.value;
                                inputNbr.value = value.replace(/[^0-9]/g, '');
                            });
                        </script>
                        <tr>
                            <td style="padding: 5px;">Email: </td>
                            <td style="padding: 5px;"><input type="email" name="email" id="" placeholder="exemple@email.com" style="border-left: none; border-right: none; border-top: none; border-color: #0C1033; background: transparent;"></td>
                        </tr>
                        <tr>
                            <td style="padding: 5px;">Niveau: </td>
                            <td style="padding: 5px;"><select id="niveau" name="niveau" style="border-left: none; border-right: none; border-top: none; border-color: #0C1033; background: transparent;">
                                <option value="L1">Licence 1</option>
                                <option value="L1 Sabaka">L1 non remplie</option>
                                <option value="L2">Licence 2</option>
                                <option value="L2 Sabaka">L2 non remplie</option>
                                <option value="L3">Licence 3</option>
                                <option value="M1">Master 1</option>
                                <option value="M2">Master 2</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td class="td">Filiere: </td>
                            <td class="td">
                                <select name="filiere" id="">
                                    <option value="<?php echo $_SESSION['filiere'];?>"><?php echo $_SESSION['filiere'];?></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="td">Frais: </td>
                            <td class="td"><p id="indexation"></p>
                                <script>
                                    var frais = document.getElementById("niveau");
                                    var ind = document.getElementById("indexation");
                                    frais.addEventListener('mouseup', function(){
                                        var index = frais.selectedIndex;
                                        if(index =="0")
                                            ind.innerHTML = "450000 ar";
                                        else if(index =="1")
                                            ind.innerHTML = "555000 ar";
                                        else if(index =="2")
                                            ind.innerHTML = "505000 ar";
                                        else if(index =="3")
                                            ind.innerHTML = "555000 ar";
                                        else if(index =="4")
                                            ind.innerHTML = "505000 ar";
                                        else if(index =="5")
                                            ind.innerHTML = "600000 ar";
                                        else if(index =="6")
                                            ind.innerHTML = "650000 ar";
                                    })
                                </script>
                            </td>
                        </tr>
                    </table>
                </fieldset>
                <input type="button" value="Inscrire" class="btnInscri" id="btnInscri">
                <h1 class="sessionFil" style="margin-top: 2.5%;" id="sessionFil">INSCRIPTION <?php echo $_SESSION['filiere'];?></h1>
                <div class="alert hide">
                    <span class="bi bi-shield-fill-exclamation"></span>
                    <span class="msg">Validation de l'inscription</span>
                    <span class="closebtn">
                        <span class="bi bi-x-lg"></span>
                    </span>
                    <button type="submit" id="valbtn" name="btnEtudiant"><i class="bi bi-check-lg"></i></button>
                </div>
            </form>
        </div>

        <!--Contenu de la liste des tudiants-->
        <div class="contenuListe" id="liste">
            <table class="tableListe">
                <thead>
                    <tr class = "trr" id="trr">
                        <td class="tdd"> <strong>MATRICULE</strong> </td>
                        <td class="tdd"> <strong>NOM</strong> </td>
                        <td class="tdd"> <strong>PRENOM</strong> </td>
                        <td class="tdd"> <strong>SEXE</strong> </td>
                        <td class="tdd"> <strong>ADRESSE</strong> </td>
                        <td class="tdd"> <strong>TEL</strong> </td>
                        <td class="tdd"> <strong>EMAIL</strong> </td>
                        <td class="tdd"> <strong>FILIERE</strong> </td>
                        <td class="tdd"> <strong>NIVEAU</strong></td>
                    </tr>
                </thead>
                <tbody class="tcorp" >
                    <?php while ($row = $liste->fetch(PDO::FETCH_ASSOC)){ ?>
                    <tr class = "trr">
                        <td class="tdd"><?php echo $row['id'];?></td>
                        <td class="tdd"><?php echo $row['NomEt'];?></td>
                        <td class="tdd"><?php echo $row['PrenomEt'];?></td>
                        <td class="tdd"><?php echo $row['Sexe'];?></td>
                        <td class="tdd"><?php echo $row['Adresse'];?></td>
                        <td class="tdd"><?php echo $row['NumTel'];?></td>
                        <td class="tdd"><?php echo $row['Email'];?></td>
                        <td class="tdd"><?php echo $row['Filiere'];?></td>
                        <td class="tdd"><?php echo $row['Niveau'];?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
                    
        </div>

        <!--Contenu de la modification et de suppression d'etudiant des Etudiant-->
        <div class="contenuModif" id="modifSuppr">
            <div id="listeModifSuppr">
                <form method="post">
                        <form>
                            <label for="">Recherche: </label>
                            <input type="text" id="searchInput" placeholder="Recherche..." class="barreRecherche">
                        </form>
                    <table class="tableListe">
                        <thead>
                            <tr class = "trr">
                                <td class="tdd"> <strong>MATRICULE</strong> </td>
                                <td class="tdd"> <strong>NOM</strong> </td>
                                <td class="tdd"> <strong>PRENOM</strong> </td>
                                <td class="tdd"> <strong>SEXE</strong> </td>
                                <td class="tdd"> <strong>ADRESSE</strong> </td>
                                <td class="tdd"> <strong>TEL</strong> </td>
                                <td class="tdd"> <strong>EMAIL</strong> </td>
                                <td class="tdd"> <strong>FILIERE</strong> </td>
                                <td class="tdd"> <strong>NIVEAU</strong></td>
                            </tr>
                        </thead>
                        <tbody class="tcorp" id="dataTable">
                            <?php
                                $query = $db->prepare("SELECT * FROM etudiant WHERE NomEt LIKE ? AND Filiere=?");
                                $query->execute(array("%".@$_POST["search"]."%", $_SESSION['filiere']));
                                while ($data = $query->fetch()) {
                                    echo "<tr class='trr' style='cursor: pointer;' onclick='recupLigne(this)'>";
                                    echo "<td class='tdd'>" . $data['id'] . "</td>";
                                    echo "<td class='tdd'>" . $data['NomEt'] . "</td>";
                                    echo "<td class='tdd'>" . $data['PrenomEt'] . "</td>";
                                    echo "<td class='tdd'>" . $data['Sexe'] . "</td>";
                                    echo "<td class='tdd'>" . $data['Adresse'] . "</td>";
                                    echo "<td class='tdd'>" . $data['NumTel'] . "</td>";
                                    echo "<td class='tdd'>" . $data['Email'] . "</td>";
                                    echo "<td class='tdd'>" . $data['Filiere'] . "</td>";
                                    echo "<td class='tdd'>" . $data['Niveau'] . "</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>

                </form>
            </div>
            <div id="formModifSuppr" class="formModifSuppr">
                <form method="post">
                    <fieldset class="table2">
                        <legend><strong>Modif & Suppr</strong></legend>
                        <table>
                            <tr>
                                <td style="padding: 5px;"><label for="matricule" class="labFormModSuppr">Matricule:</label></td>
                                <td style="padding: 5px;"><input type="text" id="ms-matricule" class="form-input" onkeydown="matrNbr()" name="matriculeMS"/></td>
                            </tr>
                            <script>
                                const inputNbr = document.getElementById("ms-matricule");
                                inputNbr.addEventListener("input", function(event) {
                                    const value = inputNbr.value;
                                    inputNbr.value = value.replace(/[^0-9]/g, '');
                                });
                            </script>
                            <tr>
                                <td style="padding: 5px;"><label for="nom" class="labFormModSuppr">Nom:</label></td>
                                <td style="padding: 5px;"><input type="text" id="ms-nom" class="form-input" onkeyup="majNom()" name="nomMS"/></td>
                            </tr>
                            <script>
                                function majNom()
                                {
                                    var nom = document.getElementById('ms-nom').value;
                                    var subNom = nom.substring(0,nom.length).toUpperCase();
                                    document.getElementById('ms-nom').value = subNom;
                                }
                            </script>
                            <tr>
                                <td style="padding: 5px;"><label for="prenom" class="labFormModSuppr">Prenom:</label></td>
                                <td style="padding: 5px;"><input type="text" id="ms-prenom" class="form-input" onkeyup="MajPrenom()" name="prenomMS"/></td>
                            </tr>
                            <script>
                                function MajPrenom()
                                {
                                    var prenom = document.getElementById('ms-prenom').value;
                                    var subPrenom = prenom.charAt(0).toUpperCase() + prenom.slice(1);
                                    document.getElementById('ms-prenom').value = subPrenom;
                                }
                            </script>
                            <tr>
                                <td style="padding: 5px;"><label for="sexe" class="labFormModSuppr">Sexe:</label></td>
                                <td style="padding: 5px;">
                                    <select id="ms-sexe" class="form-input" style="width: 124px" name="sexeMS">
                                        <option value="Homme">Homme</option>
                                        <option value="Femme">Femme</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 5px;"><label for="adresse" class="labFormModSuppr">Adresse:</label></td>
                                <td style="padding: 5px;"><input type="text" id="ms-adresse" class="form-input" name="adresseMS"/></td>
                            </tr>
                            <tr>
                                <td style="padding: 5px;"><label for="numTel" class="labFormModSuppr">Tel:</label></td>
                                <td style="padding: 5px;"><input type="text" id="ms-numTel" class="form-input" name="numTelMS"/></td>
                            </tr>
                            <script>
                                const inputNb = document.getElementById("ms-numTel");
                                inputNb.addEventListener("input", function(event) {
                                    const value = inputNb.value;
                                    inputNb.value = value.replace(/[^0-9]/g, '');
                                });
                            </script>
                            <tr>
                                <td style="padding: 5px;"><label for="email" class="labFormModSuppr">Email:</label></td>
                                <td style="padding: 5px;"><input type="email" id="ms-email" class="form-input" name="emailMS"/></td>
                            </tr>
                            <tr>
                                <td style="padding: 5px;"><label for="filiere" class="labFormModSuppr">Filiere:</label></td>
                                <td style="padding: 5px;"><input type="text" id="ms-filiere" class="form-input" name="filiereMS" readonly/></td>
                            </tr>
                            <tr>
                                <td style="padding: 5px;"><label for="niv" class="labFormModSuppr">Niveau:</label></td>
                                <td style="padding: 5px;"><select name="niveauMS" id="ms-niv" class="form-input">
                                <option value="L1">Licence 1</option>
                                <option value="L1 Sabaka">L1 non remplie</option>
                                <option value="L2">Licence 2</option>
                                <option value="L2 Sabaka">L2 non remplie</option>
                                <option value="L3">Licence 3</option>
                                <option value="M1">Master 1</option>
                                <option value="M2">Master 2</option>
                            </select></td>
                            </tr>
                        </table> 
                    </fieldset>
                    <div class="alerts hides">
                        <span class="bi bi-shield-fill-exclamation"></span>
                        <span class="msg" id="msg">Valider?</span>
                        <span class="closebtns">
                            <span class="bi bi-x-lg"></span>
                        </span>
                        <button type="submit" id="valibtn"><i class="bi bi-check-lg"></i></button>
                    </div>
                    <input type="button" value="Modifier" class="form-submit" id="form-submit"/>
                    <input type="button" value="Supprimer" class="form-submit" id="form-submit2"/>
                    <input type="button" value="Annuler" class="form-submit" onclick="fermeture()"/>
                </form>
            </div>
        </div>

<!------------------------------------------- Les Scripts ---------------------------------------------------->
        <script src="./js/accueil.js"></script>
        <script src="asset/aos/aos.js"></script>
        <script>
            AOS.init();    
        </script>
        <script>
            const regex = /^[a-zA-Z ]+$/;
            const inputNom = document.getElementById('inputNom');

            inputNom.addEventListener("input", (event) => {
            const value = event.target.value;
            if (!regex.test(value)) {
                event.target.value = value.match(regex)?.[0] || "";
            }
            });
        </script>
        <script>
            const reg = /^[a-zA-Z ]+$/;
            const inputPrenom = document.getElementById('inputPrenom');

            inputPrenom.addEventListener("input", (event) => {
            const value = event.target.value;
            if (!regex.test(value)) {
                event.target.value = value.match(reg)?.[0] || "";
            }
            });
        </script>
        <script>
            $(document).ready(function() {
                $("#searchInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#dataTable tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
        <script>
            $('.btnInscri').click(function(){
                $('.alert').removeClass('hide');
                $('.alert').addClass('show');
                $('.alert').addClass('showAlert');
            });
            $('.closebtn').click(function(){
                $('.alert').addClass('hide');
                $('.alert').removeClass('show');
            });

            $('#form-submit').click(function(){
                $('.alerts').removeClass('hides');
                $('.alerts').addClass('shows');
                $('.alerts').addClass('showAlerts');
            });
            $('#form-submit2').click(function(){
                $('.alerts').removeClass('hides');
                $('.alerts').addClass('shows');
                $('.alerts').addClass('showAlerts');
            });
            $('.closebtns').click(function(){
                $('.alerts').addClass('hides');
                $('.alerts').removeClass('shows');
            });
        </script>
        <script>
</body>
</html>