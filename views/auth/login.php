<main>
    <form action="handlers/user_login.php" method="POST">
        <input type="text" name="action" value="check" hidden>

        <label for="input-login">E-mail</label>
        <input type="text" name="email" id="input-email">
        <br>

        <label for="input-password">Mot de passe</label>
        <input type="password" name="password" id="input-password">
        <br>

        <input type="submit" value="Se connecter">

        <p>Vous n'avez pas encore de compte ? </p>
        <a href="?url=creation_profile" class="evnt-confirm-button">
            Créez le !
        </a>
    </form>
</main>