<?php
require_once "connexionBDD.php";


if (isset($_POST['nom']) && isset($_POST['mail']) && isset($_POST['MDP']) && isset($_POST['Addresse']) && isset($_POST['CP']) && isset($_POST['typeC'])) {

    echo '<h1>Voici le récapitulatif de votre inscription : </h1><br/>';


    if (($_POST['prenom']) == "") {
        echo 'Nom : ' . $_POST['nom'] . "<br/>";
    } else {
        echo 'Prénom Nom : ' . $_POST['prenom'] . " " . $_POST['nom'] . "<br/>";
    }

    echo 'Email : ' . $_POST['mail'] . "<br/>";


    echo 'MDP : ' . $_POST['MDP'] . "<br/>";
    if (($_POST['tel']) != "") {
        echo 'Télephone : ' . $_POST['tel'] . "<br/>";
    }

    echo 'Adresse : ' . $_POST['Addresse'] . "<br/>";

    echo 'Code Postal : ' . $_POST['CP'] . "<br/>";


    //STOCKAGE EN BDD
    $idC = connexion(); //je récupère l'identifiant de connexion afinn de pouvoir éxécuter mes requêtes
    $reqInsertAvis = "insert into utilisateur (Nom_Utilisateur,Prenom_Utilisateur,Email_Utilisateur,Tel_Utilisateur,Adresse_Utilisateur,CP_Utilisateur,Ville_Utilisateur,MotDePasse_Utilisateur) values ('" . $_POST['nom'] . "','" . $_POST['prenom'] . "','" . $_POST['mail'] . "','" . $_POST['tel'] . "','" . $_POST['Addresse'] . "','" . $_POST['CP'] . "','" . $_POST['Ville'] . "','" . $_POST['MDP'] . "');";
    //Affiche pour vérification
    echo "DEBUG : " . $reqInsertAvis . "</br>";
    try {
        $nb = $idC->exec($reqInsertAvis);
        if ($nb == 1) {
            echo "<h3>Avis sauvegardé </h3>";
            header("refresh:2;url=espace_client.php");
        }

    } catch (PDOException $e) {
        echo "<h3>ERREUR : </h3>" . $e->getMessage(); //gestion de l'erreur par la gestion des exception
        header("refresh:2;url=Register.php");
    }
}
    else{
        //header('Location: contact.php');	//redirection automatique vers la page contact
        echo "<a href='avis.php'>MERCI de saisir tous les champs du formulaire d'avis...</a>";
    }


?>