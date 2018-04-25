<?php include 'php/header.php' ?>
<head>
    <title>Connexion</title>
</head>
<div id="wrapper">
    <div id="featured-wrapper">
        <div class="content">
            <center>
                <div class="login">
                    <h3>Connexion</h3>
                    <form action="php/tt_login.php" method="post">
                        <input type="text" id="identifiant" name="identifiant" placeholder="Identifiant (mail)" required>
                        <input type="password" id="password" name="password" placeholder="Mot de passe" required>
                        <input type="submit" id="connexion" value="Se connecter" name="login">
                    </form>
                    <form action="Register.php">
                        <input type="submit" id="inscription" value="S'inscrire" name="register">
                    </form>
            </center>
        </div>
    </div>
</div>
</div>
<div id="stamp" class="container">
    <div class="hexagon"><span class="icon icon-wrench"></span></div>
</div>
<div id="copyright" class="container">
    <p>&copy; PPE 2018. Site par <a href="#">Maxime</a> et <a href="#">Damyen</a>.<br>Héberger par <a href="#">Maxence</a> et <a href="#">Alexandre</a></p>
</div>
</body>
</html>