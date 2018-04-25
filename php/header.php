<?php session_start();
if(!isset($_SESSION['Droits']))
$_SESSION['Droits'] = 0;
require_once "connexionBDD.php";
$idC = connexion();
$reqSelection = "select * from utilisateur where Email_Utilisateur ='" . $_SESSION['login'] . "';";
$reponse = $idC->query($reqSelection);
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet"/>
    <link href="css/default.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="css/fonts.css" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
<div id="header-wrapper">
    <div id="header" class="container">
        <div id="logo">
            <img style="width: 20%;" src="img/logo.png" alt="">
            <h1><a href="#">AirPost</a></h1>
            <?php
            if (isset($_SESSION['Droits']) && $_SESSION['Droits'] == 0) {
                echo '<span></span>';
            } else {
                while ($donnees = $reponse->fetch()) {
                    echo '<span style="color : #3D3D3D; font-weight: bold;">Bonjour, ' . $donnees["Nom_Utilisateur"].' '.$donnees["Prenom_Utilisateur"] . '</span>';
                }
            }
            ?>
        </div>
        <div id="triangle-up"></div>
    </div>
</div>
<div id="menu-wrapper">
    <div id="menu">
        <ul>
            <li><a href="index.php" accesskey="1" title="">Accueil</a></li>
            <?php
            if (isset($_SESSION['Droits']) && $_SESSION['Droits'] == 1) {
                echo '<li><a href="espace_client.php" accesskey="2" title="">Profil</a></li>';
                echo '<li><a href="suivi_colis.php" accesskey="3" title="">Suivre un colis</a></li>';
                echo '<li><a href="php/logout.php" accesskey="4" title="">Déconnexion</a></li>';
            } else
                echo '<li><a href="login.php" accesskey="4" title="">Connexion</a></li>'
            ?>
        </ul>
    </div>
</div>