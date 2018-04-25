<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/app.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">


    <title>Espace Client</title>
</head>
<body>
<?php
include 'header.php';
require_once "connexionBDD.php";
session_start();
$idC = connexion();
$reqSelection = "select * from utilisateur where Nom_Utilisateur ='" . $_SESSION['login'] . "';";
$reponse = $idC->query($reqSelection);
?>
<div id="navbar">
    <a href="index.php">Accueil</a>
    <?php
    if (isset($_SESSION['Droits']) && $_SESSION['Droits'] == 1) {
        echo '<a href="#" class="active">Profil</a>';
        echo '<a href="suivi_colis.php">Suivre un colis</a>';
        echo '<a style="float:right" class="active" href="logout.php">Déconnexion</a>';
    } else
        echo '<a style="float:right" class="active" href="login.php">Connexion</a>'
    ?>
</div>
<?php
if (isset($_SESSION['Droits']) && $_SESSION['Droits'] == 0)
    echo "<center><p class='error'>Veuillez vous connecter pour pouvoir accéder à cette page!</p></center>";
else {
    echo '
<div class="content">
    <center>
        <div class="login">
            <h3>Votre profil</h3>     
            <p>Merci de vérifier vos informations personnelles pour pouvoir bien recevoir vos colis. Si ce n\'est pas le cas merci de bien vouloir <a href="update.php">cliquer ici</a></p> 
            <hr>  
<table>
';
    while ($donnees = $reponse->fetch()) {
        switch ($donnees["Rang_Utilisateur"]) {
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
    <script >
    window . onscroll = function () {
        myFunction()
        };

        var navbar = document . getElementById("navbar");
        var sticky = navbar . offsetTop;

        function myFunction()
        {
            if (window . pageYOffset >= sticky) {
                navbar . classList . add("sticky")
            } else {
                navbar . classList . remove("sticky");
            }
        }
    </script >

';
}
?>
</body>
</html>