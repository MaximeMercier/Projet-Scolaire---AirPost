<?php
include 'php/header.php';
require_once "php/connexionBDD.php";
$idC = connexion();
$reqColis = "select * from colis where Num_Coli ='" . $_POST['colis'] . "';";
$reponseC = $idC->query($reqColis);
while ($donnees = $reponseC->fetch()) {
    $colis_num = $donnees["Num_Coli"];
    $colis_statut = $donnees["Id_Statut"];
    $colis_poids = $donnees["Poid"];
    $colis_lieu = $donnees["Id_Lieu"];
}
$reqColisLieu = "select * from lieux where Id_Lieu ='" . $colis_lieu . "';";
$reponseCL = $idC->query($reqColisLieu);
while ($donnees = $reponseCL->fetch()) {
    $nom_lieu = $donnees["Nom_Lieu"];
    $detail_lieu = $donnees["Adresse_Lieu"];
}

$reqColisStatut = "select * from statut where Id_Statut ='" . $colis_statut . "';";
$reponseCS = $idC->query($reqColisStatut);
while ($donnees = $reponseCS->fetch()) {
    $nom_statut = $donnees["Nom_Statut"];
}
?>
<head>
    <title>Suivi du colis</title>
</head>
<div id="wrapper">
    <div id="featured-wrapper">
        <div class="content">
            <center>
                <div class="login">
                    <h3>Suivre votre colis</h3>
                    <?php
                    if ($colis_num != "") {
                        echo '<table class="tableau1" style="display: inline-block;">
                        <tr><td class="td1">Numéro de suivi</td><td>:</td>
                        <td class="td2">' . $colis_num . '</td></tr>
                        <tr><td class="td1">Statut du suivi</td><td>:</td>
                        <td class="td2">' . $nom_statut . '</td></tr>
                        <tr><td class="td1">Poids du colis</td><td>:</td>
                        <td class="td2">' . $colis_poids . '</td></tr>
                        <tr><td class="td1">Lieu de livraison</td><td>:</td>
                        <td class="td2">' . $nom_lieu . '</td></tr>
                        <tr><td class="td1">Adresse de livraison</td><td>:</td>
                        <td class="td2">' . $detail_lieu . '</td></tr>
                        </table>';
                    } else {
                        echo "<h3>Aucun colis</h3>";
                    } ?>
                    <br><br><br><br>
                </div>
            </center>
        </div>
    </div>
</div>
</body>
</html>