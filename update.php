<?php include 'php/header.php';
require_once "php/connexionBDD.php";
$idC = connexion();
$reqSelection = "select * from utilisateur where Email_Utilisateur ='" . $_SESSION['login'] . "';";
$reponse = $idC->query($reqSelection);
while ($donnees = $reponse->fetch()) {
    $nom = $donnees["Nom_Utilisateur"];
    $prenom = $donnees["Prenom_Utilisateur"];
    $mail = $donnees["Email_Utilisateur"];
    $tel = $donnees["Tel_Utilisateur"];
    $adresse = $donnees["Adresse_Utilisateur"];
    $CP = $donnees["CP_Utilisateur"];
    $ville = $donnees["Ville_Utilisateur"];
}

if (isset($_POST['modif'])) {
    $sql_nom = "UPDATE utilisateur  set Nom_Utilisateur = '" . $_POST['nom'] . "',Prenom_Utilisateur = '" . $_POST['prenom'] . "',Tel_Utilisateur = '" . $_POST['tel'] . "',Adresse_Utilisateur = '" . $_POST['adresse'] . "',CP_Utilisateur = '" . $_POST['CP'] . "',Ville_Utilisateur = '" . $_POST['Ville'] . "' WHERE Email_Utilisateur ='" . $_SESSION['login'] . "';";
    $q = $idC->prepare($sql_nom);
    $q->execute(array($_POST['nom'], $_POST['prenom'], $_POST['tel'], $_POST['adresse'], $_POST['CP'], $_POST['Ville']));
    echo "Success";
    header("Location : espace_client.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/app.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">


    <title>Modification du profil</title>
</head>
<body>
<br>
<div id="wrapper">
    <div id="featured-wrapper">
        <div class="content">
            <div class="container">
                <center>
                    <div class="login">
                        <h3>Modification du profil</h3>

                        <form action="update.php" method="post">
                            <input name="nom" type="text" placeholder="Nom" value="<?php echo $nom; ?>">
                            <input name="prenom" type="text" placeholder="Prénom" value="<?php echo $prenom; ?>">
                            <input name="tel" type="text" placeholder="Téléphone" maxlength=10 value="<?php echo $tel; ?>">
                            <input name="adresse" type="text" placeholder="Adresse" value="<?php echo $adresse; ?>">
                            <input name="CP" type="text" placeholder="Code postal" maxlength=5 value="<?php echo $CP; ?>">
                            <input name="Ville" type="text" placeholder="Ville" value="<?php echo $ville; ?>">
                            <input type="submit" id="connexion" value="Valider" name="modif">
                        </form>
                    </div>
            </div>
        </div>
    </div>
    </center>
</div>
</body>
</html>

