<?php 

$title = 'Espace réservé';

ob_start(); 

    ?>

    <h3>Connexion</h3>
    <form action="index.php?action=signIn" method="post">
        <div class="bloc">
            <p><label for="username">Identifiant</label></p>
            <p><input type="text" id="username" name="username" placeholder="Identifiant"></p>
            <p><label for="password">Mot de passe</label></p>
            <p><input type="password" id="password" name="password" placeholder="Mot de passe"></p>
        </div>    
        <p class="buttonArea"><input class="button" type="submit" value="Se connecter"></p>
    </form>
    
    <!--- Debugging -----------------------------

    <h3>Inscription</h3>
    <form action="index.php?action=addUser" method="post">
        <div class="bloc">
            <p><label for="username">Identifiant</label><p>
            <p><input type="text" id="username" name="username" placeholder="Identifiant"></p>
            <p><label for="password">Mot de passe</label><p>
            <p><input type="password" id="password" name="password" placeholder="Mot de passe"></p>
        </div>
        <p class="buttonArea"><input class="button" type="submit" value="S'inscrire"></p>
    </form> 

    -------------------------------------------->   

    <?php 

$content = ob_get_clean();

require('template.php'); 

?>