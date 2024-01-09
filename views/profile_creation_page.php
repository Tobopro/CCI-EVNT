<main>
    <?php
    var_dump($_SESSION);
    displayErrorsAndMessages(); ?>
    <h2>Création de compte</h2>
    <form action=<?php echo $actionURL ?> method="POST">
        <input type="text" name="action" value="store" hidden>
        <label for="lastName">Nom:</label>
        <input id="lastName" type="text" name="lastName" required>

        <label for="firstName">Prénom:</label>
        <input id="firstName" type="text" name="firstName" required>

        <label for="mail">Email:</label>
        <input id="mail" type="email" name="mail" required>

        <label for="password">Mot de passe:</label>
        <input id="password" type="password" name="password" required>

        <label for="password">Confirmer le mot de passe:</label>
        <input id="password" type="password" name="passwordConfirmation" required>

        <button type="submit">Valider</button>
    </form>
</main>