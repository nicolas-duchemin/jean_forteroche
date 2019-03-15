<?php 

$title = 'Paramètres de connexion';

ob_start(); 

    ?>

    <h1>BILLET SIMPLE POUR L'ALASKA</h1>

    <h2>PARAMÈTRES DE CONNEXION</h2>

    <h3>Changement d'identifiant</h3>

    <p>Votre identifiant actuel est : <?= $_SESSION['username'] ?></p>
        
    <form action="index.php?action=editUsername" method="post">
        <p><label for="newUsernameOne">Veuillez indiquer votre nouvel identifiant : </label> <input type="text" id="newUsernameOne" name="newUsernameOne" size="58"></p>
        <p><label for="newUsernameTwo">Veuillez confirmer votre nouvel identifiant : </label> <input type="text" id="newUsernameTwo" name="newUsernameTwo" size="58"></p>
        <p><input type="submit" value="Envoyer"></p>
    </form>

    <h3>Changement de mot de passe</h3>

    <form action="index.php?action=editPassword" method="post">
        <p><label for="newPasswordOne">Veuillez indiquer votre nouveau mot de passe : </label> <input type="password" id="newPasswordOne" name="newPasswordOne" size="58"></p>
        <p><label for="newPasswordTwo">Veuillez confirmer votre nouveau mot de passe : </label> <input type="password" id="newPasswordTwo" name="newPasswordTwo" size="58"></p>
        <p><input type="submit" value="Envoyer"></p>
    </form>
    
    <?php 

$content = ob_get_clean();

require('templateBackend.php'); 

?>