<main>
    <div class="container">
        <div class="row">
            <?php displayErrorsAndMessages(); ?>
            <h2>Création de compte</h2>
            <form action=<?php ec($actionUrl) ?> method="POST" name="inscription">
                <input type="hidden" name="action" value="store" hidden>
                <div class="form-group">
                    <label for="lastName">Nom</label>
                    <input class="form-control" id="lastName" type="text" name="lastName" required>
                </div>
                <div class="form-group">
                    <label for="firstName">Prénom</label>
                    <input class="form-control" id="firstName" type="text" name="firstName" required>
                </div>
                <div class="form-group">
                    <label for="mail">Email</label>
                    <input class="form-control" id="mail" type="email" name="mail" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input class="form-control" id="password" type="password" name="password" required>
                    <p class="text-secondary">Le mot de passe doit contenir au moins 12 caractères dont 1 majuscule, 1
                        minuscule, 1 caractère
                        spéciale parmis les suivants : #?!@$%^&*-</p>
                </div>
                <br>
                <div class="form-group">
                    <label for="password">Confirmer le mot de passe</label>
                    <input class="form-control" id="passwordConfirmation" type="password" name="passwordConfirmation"
                        required>
                </div>
                <br>
                <button class="btn btn-primary" type="submit">Valider</button>
            </form>
        </div>
    </div>
</main>