<form action="handlers/user_login.php" method="POST">
        <input type="text" name="action" value="check" hidden>

        <label for="input-login">E-mail</label>
        <input type="text" name="email" id="input-email">
        <br>

        <label for="input-password">Mot de passe</label>
        <input type="password" name="password" id="input-password">
        <br>

        <input type="submit" value="Se connecter">
    </form>