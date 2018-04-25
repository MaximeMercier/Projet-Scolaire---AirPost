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
<body>
<?php include 'header.php' ?>

<div id="navbar">
    <a href="#">Accueil</a>
    <a style="float:right" class="active" href="#about">Connexion</a>
</div>
<div class="content">
    <center>
        <div class="login">
            <h3>Connexion</h3>
            <form action="tt_login.php" method="post">
                <input type="text" id="identifiant" name="identifiant" placeholder="Identifiant" required>
                <input type="password" id="password" name="password" placeholder="Mot de passe" required>
                <input type="submit" id="connexion" value="Se connecter" name="login">
            </form>
            <form action="Register.php">
                <input type="submit" id="inscription" value="S'inscrire" name="register">
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