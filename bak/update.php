<?php
require 'connexionBDD.php';
session_start();
$idC = connexion();
$reqSelection = "select * from utilisateur where Nom_Utilisateur ='" . $_SESSION['login'] . "';";
$reponse = $idC->query($reqSelection);

while ($donnees = $reponse->fetch())
{
    $nom = $donnees["Nom_Utilisateur"];
    $prenom = $donnees["Prenom_Utilisateur"];
    $mail = $donnees["Email_Utilisateur"];
    $tel = $donnees["Tel_Utilisateur"];
    $adresse = $donnees["Adresse_Utilisateur"];
    $CP = $donnees["CP_Utilisateur"];
    $ville = $donnees["Ville_Utilisateur"];
}

if (isset($_POST['nom']) && isset($_POST['prenom'])&& isset($_POST['mail']) && isset($_POST['mail']) && isset($_POST['tel']) && isset($_POST['adresse']) && isset($_POST['CP']) && isset($_POST['Ville']))
{
    $sql_nom = "UPDATE utilisateur  set Nom_Utilisateur = '" . $_POST['nom'] . "',Prenom_Utilisateur = '" . $_POST['prenom'] . "',Email_Utilisateur = '" . $_POST['mail'] . "',Tel_Utilisateur = '" . $_POST['tel'] . "',Adresse_Utilisateur = '" . $_POST['adresse'] . "',CP_Utilisateur = '" . $_POST['CP'] . "',Ville_Utilisateur = '" . $_POST['ville'] . "' WHERE Nom_Utilisateur ='" . $_SESSION['login'] . "';";
    $q = $pdo->prepare($sql_nom);
    $q->execute(array($_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['tel'],$_POST['adresse'],$_POST['CP'],$_POST['Ville']));
    echo "Success";
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
<?php include 'header.php' ?>
<div id="navbar">
    <a href="#">Accueil</a>
    <?php
    if (isset($_SESSION['Droits']) && $_SESSION['Droits'] == 1) {
        echo '<a href="#" class="active">Profil</a>';
        echo '<a href="#">Suivre un colis</a>';
        echo '<a style="float:right" class="active" href="logout.php">Déconnexion</a>';
    } else
        echo '<a style="float:right" class="active" href="login.php">Connexion</a>'
    ?>
</div>
<br>
<div class="container">
    <center>
        <div class="login">
            <h3>Modification du profil</h3>

            <form action="update.php" method="post">
                <input name="nom" type="text" placeholder="Nom" value="<?php echo $nom; ?>">
                <input name="prenom" type="text" placeholder="Prénom" value="<?php echo $prenom; ?>">
                <input name="mail" type="text" placeholder="Email" value="<?php echo $mail; ?>" disabled>
                <input name="tel" type="text" placeholder="Téléphone" value="<?php echo $tel; ?>">
                <input name="adresse" type="text" placeholder="Adresse" value="<?php echo $adresse; ?>">
                <input name="CP" type="text" placeholder="Code postal" value="<?php echo $CP; ?>">
                <input name="Ville" type="text" placeholder="Ville" value="<?php echo $ville; ?>">
                <input type="submit" id="connexion" value="Valider" name="modif">
            </form>
        </div>
    </center>
</div>
</body>
</html>

