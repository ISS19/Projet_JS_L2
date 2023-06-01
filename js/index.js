function majNom()
{
    var nom = document.form.nom.value;
    var subNom = nom.substring(0,nom.length).toUpperCase();
    document.form.nom.value = subNom;
}
function majPrenom()
{
    var prenom = document.form.prenom.value;
    var subPrenom = prenom.charAt(0).toUpperCase() + prenom.slice(1);
    document.form.prenom.value = subPrenom;
}
