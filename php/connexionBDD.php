<?php
function connexion(){

    $PARAM_hote='192.168.128.1'; // le chemin vers le serveur BDD
    $PARAM_utilisateur='admin'; // nom d'utilisateur BDD
    $PARAM_mot_passe='admin'; // mot de passe BDD
    $PARAM_nom_bd='airpost'; //nom de ma base de données

    $idConnexionBDD = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
    //Il faut ajouter pour gerer les accents et caractères non utf8
    $idConnexionBDD->exec("SET NAMES 'utf8'");

    if ($idConnexionBDD){
       // echo "<h3>SUCESS connexion BDD</h3>";
        return $idConnexionBDD;
    }
    else{
        echo "<h3>ERREUR : </h3>";
        return FALSE;
    }
}
?>
