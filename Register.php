<?php include 'php/header.php';
//require 'php/connexionBDD.php'; ?>
<head>
    <title>Suivi du colis</title>
</head>
    <div id="wrapper">
        <div id="featured-wrapper">
            <div class="content">
                <center>
                    <div class="login">
                        <form action="php/tt_register.php" method="POST">
                            <label for="nom"></label>
                            <input type="text" name="nom" id="nom" size="40" maxlength="50" autofocus
                                   required="required"
                                   placeholder="Nom particulier ou entreprise *">
                            <input type="text" name="prenom" id="prenom" size="40" maxlength="50"
                                   placeholder="Prénom (particulier uniquement)">
                            <input type="email" name="mail" required placeholder="xxxx@xxxx.xx *">
                            <input type="password" name="MDP" id="MDP" size="40" maxlength="50" required="required"
                                   placeholder="Mot de passe *">
                            <input type="text" name="tel" id="tel" size="40" maxlength=10"
                                   placeholder="Téléphone">
                            <input type="text" name="Addresse" id="Addresse" size="40" maxlength="50"
                                   required="required"
                                   placeholder="Adresse *">
                            <input type="text" name="CP" id="CP" size="40" maxlength="5" required="required"
                                   placeholder="Code postal *"><input type="text" name="Ville" id="Ville" size="40"
                                                                      maxlength="50"
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
