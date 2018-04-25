<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/app.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <title>Suivi du colis</title>
</head>
<body>
<?php include 'header.php' ?>

<div id="navbar">
    <a href="index.php">Accueil</a>
    <?php
    if (isset($_SESSION['Droits']) && $_SESSION['Droits'] == 1) {
        echo '<a href="espace_client.php">Profil</a>';
        echo '<a href="#" class="active">Suivre un colis</a>';
        echo '<a style="float:right" class="active" href="logout.php">Déconnexion</a>';
    } else
        echo '<a style="float:right" class="active" href="login.php">Connexion</a>'
    ?>
</div>
<div class="content">
    <center>
        <div class="login">
            <h3>Suivre votre colis</h3>
            <form action="tt_suivi.php" method="post">
                <label for="colis">Rechercher votre colis : </label>
                <input type="text" id="identifiant" name="colis" placeholder="Numéro du colis" required>
                <input type="submit" id="connexion" value="Rechercher" name="login">
            </form>
        </div>
    </center>
</div>

<script>
    window.onscroll = function () {
        myFunction()
    };

    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop;

    function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    }
</script>
</body>
</html>