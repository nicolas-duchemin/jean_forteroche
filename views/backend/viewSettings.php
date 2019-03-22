<?php 

$title = 'Paramètres de connexion';

ob_start(); 

    ?>

    <h3>Changement d'identifiant</h3>
    
    <form action="index.php?action=editUsername" method="post">
        <div class="bloc">
            <p>Votre identifiant actuel est : <strong><?= htmlspecialchars($_SESSION['username']) ?></strong></p>
            <p><label class="settings" for="newUsernameOne">Veuillez indiquer votre nouvel identifiant : </label></p>
            <p><input type="text" id="newUsernameOne" name="newUsernameOne"></p>
            <p><label class="settings" for="newUsernameTwo">Veuillez confirmer votre nouvel identifiant : </label></p>
            <p><input type="text" id="newUsernameTwo" name="newUsernameTwo"></p>
            <p class="small"></br>Attention ! Vous allez être déconnecté suite au changement d'identifiant. Vous devrez vous reconnecter avec votre nouvel identifiant et votre ancien mot de passe.</p>
        </div>
        <p class="buttonArea"><input class="button" type="submit" value="Modifier"></p>
    </form>
        
    <h3>Changement de mot de passe</h3>

    <form action="index.php?action=editPassword" method="post">
        <div class="bloc">
            <p><label class="settings" for="newPasswordOne">Veuillez indiquer votre nouveau mot de passe : </label></p>
            <p><input type="password" id="newPasswordOne" name="newPasswordOne"></p>
            <p><label class="settings" for="newPasswordTwo">Veuillez confirmer votre nouveau mot de passe : </label></p>
            <p><input type="password" id="newPasswordTwo" name="newPasswordTwo"></p>
            <p class="small"></br>Attention ! Vous allez être déconnecté suite au changement de mot de passe. Vous devrez vous reconnecter avec votre nouveau mot de passe et votre ancien identifiant.</p>
        </div>
        <p class="buttonArea"><input class="button" type="submit" value="Modifier"></p>
    </form>

    <?php 

$content = ob_get_clean();

require('templateBackend.php'); 

?>