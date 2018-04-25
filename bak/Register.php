<?php
require_once "connexionBDD.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<link rel="stylesheet" href="css/app.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

<?php include 'header.php' ?>

            <div id="navbar">
                <a href="index.php">Accueil</a>
                <a style="float:right" class="active" href="login.php">Connexion</a>
            </div>
<div class="content">
    <center>
        <div class="login">
            <form action="tt_register.php" method="POST">
                <label for="nom"></label>
                <input type="text" name="nom" id="nom" size="40" maxlength="50" autofocus required="required"
                       placeholder="Nom particulier ou entreprise *">
                <input type="text" name="prenom" id="prenom" size="40" maxlength="50"
                       placeholder="Prénom (particulier uniquement)">
                <input type="email" name="mail" required placeholder="xxxx@xxxx.xx *" value="<?php echo $_POST['identifiant'];?>">
                <input type="text" name="MDP" id="MDP" size="40" maxlength="50" required="required"
                       placeholder="Mot de passe *">
                <input type="text" name="tel" id="tel" size="40" maxlength="50"
                       placeholder="Téléphone">
                <input type="text" name="Addresse" id="Addresse" size="40" maxlength="50" required="required"
                       placeholder="Adresse *">
                <input type="text" name="CP" id="CP" size="40" maxlength="50" required="required"
                       placeholder="Code postal *"><input type="text" name="Ville" id="Ville" size="40" maxlength="50"
                                                        required="required" placeholder="Ville *">

                <input type="radio" name="typeC" value="0" id="Parti" checked>
                <label for="Parti">Particulier</label>
                <input type="radio" name="typeC" value="1" id="Pro">
                <label for="Pro">Professionel</label>

                <p style="color: red;">* Ces champs sont obligatoires</p>

                <input type="submit" value="Valider" id="connexion">
                <input type="reset" value="Annuler" id="inscription">
            </form>
        </div>
    </center>
</div>


</body>
</html>
