<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/app.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">


    <title>Connexion</title>
</head>
<?php
require_once "connexionBDD.php";
session_start();
$idC = connexion();
$reqSelection = "select count(*) from utilisateur where Nom_Utilisateur ='".$_POST['identifiant']."' and MotDePasse_Utilisateur = '".$_POST['password']."';";

if (isset($_POST['identifiant']) && isset($_POST['password'])){

    if (isset($_POST['login']) /*&& $idC!=false*/) { // le bouton inserer a a été cliqué
            $lignesResult = $idC->query($reqSelection);
            foreach ($lignesResult as $uneLigne){
                if ($uneLigne[0] == 1) {
                    echo "<h3>Connexion en cours ...</h3>";
                    $_SESSION['Droits'] = 1;
                    $_SESSION['login'] = $_POST['identifiant'];
                    header("refresh:2;url=espace_client.php");
                }
                else {
                    echo "<center><p class='error'>Erreur ou compte inconnu ! Vous aller être redirigé</p></center>";
                    $_SESSION['Droits'] = 0;
                    header("refresh:2;url=register.php");
                }
            }
    }
    else {
        if (isset($_POST['register']) /*&& $idC!=false*/) { // le bouton verifier a été cliqué
            header('Location: register.php');
        }
    }

}
else{
    //header('Location: contact.php');	//redirection automatique vers la page contact
    echo "<a href='login.php'>MERCI de saisir tous les champs du formulaire d'avis...</a>";
}
?>