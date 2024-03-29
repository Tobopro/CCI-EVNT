<main>
    <?php displayErrorsAndMessages(); ?>
    <form action="<?php ec($actionUrl) ?>" method="POST">
        <input type="text" name="action" value="update" hidden>
        <input type="text" name="id" value="<?php ec($user->getUserId()); ?>" hidden>
        <div class="cover-and-info-edit">
            <div class="cover-edit-picture">
                <div class="cover-edit-picture__btn">

                </div>
                <a href="#">
                    <div>
                        <img class="cover-edit-picture__img" src="<?php ec($user->getCoverPicture()) ?>"
                            alt="bannière de profil">
                        <img class="cover-edit-picture__icon" src="./assets/img/icone/camera-solid.svg"
                            alt="modification de bannière de profil">
                    </div>
                </a>
            </div>
            <div id="profile-edit-up" class="row m-0">
                <a href="#">
                    <div id="profile-edit-picture" class="col-4 col-md-2 col-lg-2">
                        <img id="profile-edit-picture__img" src="<?php ec($user->getProfilePicture()) ?>"
                            alt="photo de profil">
                        <img id="profile-edit-picture__icon" src="./assets/img/icone/camera-solid.svg"
                            alt="modification de photo de profil">
                    </div>
                </a>
                <div id="profile-name"
                    class="col-9  ms-md-5 ms-lg-0 position-relative d-sm-flex justify-content-between">
                    <div class="d-flex flex-column">
                        <label for="lastName">Nom :</label>
                        <input type="text" id="lastName" name="lastName" value="<?php ec($user->getLastName()) ?>">
                        <br>
                        <label for="firstName">Prénom :</label>
                        <input type="text" id="firstName" name="firstName" value="<?php ec($user->getFirstName()) ?>">
                    </div>
                    <div class="d-flex flex-column">
                        <label for="city">Ville :</label>
                        <input type="text" id="city" name="city" value="<?php ec($user->getCity()) ?>">
                    </div>
                </div>
                <div id="profile-edit-numbers">
                    <div class="row">
                        <div class="col-12 d-block d-lg-none ">
                            X Abonnés
                        </div>
                        <div class="col-12 d-block d-lg-none">
                            X Événements
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container toggle-edit">
            <div class="row mx-3 mt-md-5">
                <div class="box--yellow">
                    <p>Profil public</p>
                    <label class="switch">
                        <input type="checkbox" name="isPublic" <?php ec($user->getisPublic() ? 'checked' : '') ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="box--yellow">
                    <p>Afficher mes évènement à venir</p>
                    <label class="switch">
                        <input type="checkbox" name="showFutureEvnts"
                            <?php ec($user->getisDisplayFutureEvnts() ? 'checked' : '') ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="box--yellow">
                    <p>afficher mes évènements passées</p>
                    <label class="switch">
                        <input type="checkbox" name="showPastEvnts"
                            <?php ec($user->getisDisplayPastEvnts() ? 'checked' : '') ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="box--yellow">
                    <p>afficher mon compteur d'évènement</p>
                    <label class="switch">
                        <input type="checkbox" name="showEvntScores"
                            <?php ec($user->getisDisplayEvntScores() ? 'checked' : '') ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="edit-page-delete">
            <button type="submit" value="Enregistrer" class="btn btn-success">Enregistrer les modifications</button>
        </div>
    </form>
    <div class="edit-page-delete">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Supprimer mon compte
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-body">
                        Êtes vous sûr de vouloir supprimer votre compte ? <br>
                        Cette action est irréversible.
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Retour</button>
                        <form action="<?php ec($actionUrl) ?>" method="POST">
                            <input type="text" name="action" value="delete" hidden>
                            <input type="text" name="id" value="<?php ec($_SESSION[Auth::SESSION_KEY]) ?>" hidden>
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

</main>