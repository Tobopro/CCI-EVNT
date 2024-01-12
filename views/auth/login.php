<?php
if (isset($_GET['message']) && isset($_GET['type_message'])) {
    echo '<div class="alert   mx-5 alert-' . $_GET['type_message'] . ' alert-dismissible fade show" role="alert">
    <strong>' . $_GET['message'] . '</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

?>

<main>
    <div class="container">
        <h1>Se connecter</h1>

        <form action="handlers/user_login.php" method="POST" class="needs-validation" novalidate>

            <input type="text" name="action" value="check" hidden>

            <div class="mb-3">
                <label for="input-email" class="form-label">E-mail</label>
                <input type="text" name="email" id="input-email" class="form-control" required>
                <div class="invalid-feedback">
                    Veuillez fournir une adresse e-mail valide.
                </div>
            </div>

            <div class="mb-3">
                <label for="input-password" class="form-label">Mot de passe</label>
                <input type="password" name="password" id="input-password" class="form-control" required>
                <div class="invalid-feedback">
                    Veuillez fournir un mot de passe.
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>



            <p>Vous n'avez pas encore de compte ? </p>
            <a href="?url=creation_profile" class="btn btn-primary">
                Créez le !
            </a>
        </form>
</main>