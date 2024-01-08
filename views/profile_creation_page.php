<main>
    <?php displayErrorsAndMessages(); ?>
    <h2>Création de compte</h2>
    <form action=<?php echo $actionURL ?> method="POST">
        <input type="text" name="action" value="store" hidden>
        <label for="lastName">Nom:</label>
        <input type="text" name="lastName" required>

        <label for="firstName">Prénom:</label>
        <input type="text" name="firstName" required>

        <label for="mail">Email:</label>
        <input type="email" name="mail" required>

        <label for="password">Mot de passe:</label>
        <input type="password" name="password" required>

        <label for="password">Confirmer le mot de passe:</label>
        <input type="password" name="passwordConfirmation" required>

        <button type="submit">Valider</button>
    </form>
</main>