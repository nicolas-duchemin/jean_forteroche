<?php 

$title = 'Connexion';

ob_start(); 

    ?>

    <h1>BILLET SIMPLE POUR L'ALASKA</h1>

    <h2>ESPACE RÉSERVÉ</h2>
    
    <form action="index.php?action=inscription" method="post">
        <fieldset>
            <legend>INSCRIPTION</legend> 
            <p><label for="username">Identifiant</label> <input type="text" id="username" name="username" size="58"></p>
            <p><label for="password">Mot de passe</label> <input type="password" id="password" name="password" size="58"></p>
            <p><input type="submit" value="S'inscrire"></p>
        </fieldset>
    </form>

    <form action="index.php?action=connection" method="post">
        <fieldset>
            <legend>CONNEXION</legend> 
            <p><label for="username">Identifiant</label> <input type="text" id="username" name="username" size="58"></p>
            <p><label for="password">Mot de passe</label> <input type="password" id="password" name="password" size="58"></p>
            <p><input type="submit" value="Se connecter"></p>
        </fieldset>
    </form>
    

    <?php 

$content = ob_get_clean();

require('template.php'); 

?>