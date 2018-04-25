<?php
include 'php/header.php';
require_once "php/connexionBDD.php";
$idC = connexion();
$reqSelection = "select * from utilisateur where Email_Utilisateur ='" . $_SESSION['login'] . "';";
$reponse = $idC->query($reqSelection);
?>
<head>
    <title>Espace Client</title>
</head>
<?php
if (isset($_SESSION['Droits']) && $_SESSION['Droits'] == 0)
    echo "<center><p class='error'>Veuillez vous connecter pour pouvoir accéder à cette page!</p></center>";
else {
    echo '
<div id="wrapper">
    <div id="featured-wrapper">
<div class="content">
    <center>
        <div class="login">
            <h3>Votre profil</h3>     
            <p>Merci de vérifier vos informations personnelles pour pouvoir bien recevoir vos colis. Si ce n\'est pas le cas merci de bien vouloir <a href="update.php">cliquer ici</a></p> 
            <hr>  
<table>
';
    while ($donnees = $reponse->fetch()) {
        switch ($donnees["Type_Utilisateur"]) {
            case '0':
                $situation = "Particulier";
                break;
            case '1':
                $situation = "Professionnel";
        }
        echo '
    <tr>
    <td style="width: 130px">Nom :</td>
    <td>' . $donnees["Nom_Utilisateur"] . '</td>
</tr>
<tr>
<td>Prénom :</td>
<td>' . $donnees["Prenom_Utilisateur"] . '</td>
</tr>
<tr>
<td>Mail :</td>
<td>' . $donnees["Email_Utilisateur"] . '</td >
</tr>
<tr>
<td>Téléphone :</td>
<td>' . $donnees["Tel_Utilisateur"] . '</td>
</tr>
<tr>
<td> Adresse :</td>
<td>' . $donnees["Adresse_Utilisateur"] . '</td>
</tr>
<tr>
<td>Code postal :</td>
<td>' . $donnees["CP_Utilisateur"] . '</td>
</tr>
<tr>
<td>Ville :</td>
<td>' . $donnees["Ville_Utilisateur"] . '</td >
</tr>
<tr>
<td>Type :</td>
<td>' . $situation . '</td>
</tr>';
    }
    ' 
</table >
        </div >
    </center >
</div >
</div >
</div >
';
}
?>
</body>
</html>