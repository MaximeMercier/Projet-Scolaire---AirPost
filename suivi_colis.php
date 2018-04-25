<?php include 'php/header.php' ?>
<head>
    <title>Suivi du colis</title>
</head>
<?php
if (isset($_SESSION['Droits']) && $_SESSION['Droits'] == 0)
    echo "<center><p class='error'>Veuillez vous connecter pour pouvoir accéder à cette page!</p></center>";
else {
?>
<div id="wrapper">
    <div id="featured-wrapper">
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
    </div>
</div>
<?php }?>
</body>
</html>