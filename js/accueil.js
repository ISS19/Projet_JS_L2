/****************************Les variables***************************/
var contIns = document.getElementById('inscri');
var contListe = document.getElementById('liste');
var contModif = document.getElementById('modifSuppr');
var bienv = document.getElementById('bienvenu');
var im = document.getElementById('petitIm');
var btn = document.getElementById('btnAll');
var vocale = document.getElementById('vocale');
var formModifSuppr = document.getElementById('formModifSuppr');
var listeModifSuppr = document.getElementById('listeModifSuppr');
var formsubmit = document.getElementById('form-submit');
var formsubmit2 = document.getElementById('form-submit2');
var valbtn = document.getElementById('valibtn');
var msg = document.getElementById('msg');
var porte = document.getElementById('porte');
var btnSombre = document.getElementById('sombre');
/*********************************************************************/
var recognition = new webkitSpeechRecognition();
vocale.onclick = function() {
    recognition.start();
    vocale.className = 'bi bi-mic-fill';
};
recognition.onresult = function(event) {
    var last = event.results.length - 1;
    var command = event.results[last][0].transcript.toLowerCase();
    if (command === "inscription") {
        inscri();
    } else if (command === "liste") {
        liste();
    } else if (command === "recherche") {
        modifSuppr();
    }
};

function inscri()
{
    contIns.style.display = "block";
    contListe.style.display = "none";
    contModif.style.display = "none";
    bienv.style.display = "none";
    im.className = "bi bi-person-plus-fill";
    AOS.refresh();
}
function liste()
{
    contIns.style.display = "none";
    contListe.style.display = "block";
    contModif.style.display = "none";
    bienv.style.display = "none";
    im.className = "bi bi-journal-text";
    AOS.refresh();
}
function modifSuppr()
{
    contIns.style.display = "none";
    contListe.style.display = "none";
    contModif.style.display = "block";
    bienv.style.display = "none";
    formModifSuppr.style.display = "none";
    im.className = "bi bi-arrow-repeat";
    AOS.refresh();
}
function changement()
{
    porte.className = "bi bi-door-open";
}
function change()
{
    porte.className = "bi bi-door-closed";
}


function recupLigne(row) {
    var cells = row.getElementsByTagName("td");

    var matricule = cells[0].innerHTML;
    var nom = cells[1].innerHTML;
    var prenom = cells[2].innerHTML;
    var sexe = cells[3].innerHTML;
    var adresse = cells[4].innerHTML;
    var numTel = cells[5].innerHTML;
    var email = cells[6].innerHTML;
    var filiere = cells[7].innerHTML;
    var niveau = cells[8].innerHTML;


    document.getElementById("ms-matricule").value = matricule;
    document.getElementById("ms-nom").value = nom;
    document.getElementById("ms-prenom").value = prenom;
    document.getElementById("ms-sexe").value = sexe;
    document.getElementById("ms-adresse").value = adresse;
    document.getElementById("ms-numTel").value = numTel;
    document.getElementById("ms-email").value = email;
    document.getElementById("ms-filiere").value = filiere;
    document.getElementById("ms-niv").value = niveau;

    listeModifSuppr.style.display = "none";
    formModifSuppr.style.display = "block";
}

function fermeture(){
    listeModifSuppr.style.display = "block";
    formModifSuppr.style.display = "none";
}

formsubmit.addEventListener("click", function() {
    valbtn.setAttribute("name", "Modif");
    msg.innerHTML = "Valider la modification";
});
formsubmit2.addEventListener("click", function() {
    valbtn.setAttribute("name", "Suppr");
    msg.innerHTML = "Valider la suppression";
});