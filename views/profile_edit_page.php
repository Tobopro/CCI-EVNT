<main>
    <?php displayErrorsAndMessages(); ?>
    <form action="<?php echo $actionUrl ?>">
        <input type="text" name="action" value="update" hidden>
        <div class="cover-and-info-edit">
            <div class="cover-edit-picture">
                <div class="cover-edit-picture__btn">
                    <input type="submit" value="Enregistrer">
                </div>
                <a href="#">
                    <div>
                        <img class="cover-edit-picture__img"
                            src="./assets/img/tourne-disque-tournant-vinyle-vintage.jpg" alt="bannière de profil">
                        <img class="cover-edit-picture__icon" src="./assets/img/icone/camera-solid.svg"
                            alt="modification de bannière de profil">
                    </div>
                </a>
            </div>
            <div id="profile-edit-up" class="row m-0">
                <a href="#">
                    <div id="profile-edit-picture" class="col-4 col-md-2 col-lg-2">
                        <img id="profile-edit-picture__img" src="./assets/img/portrait.jpg" alt="photo de profil">
                        <img id="profile-edit-picture__icon" src="./assets/img/icone/camera-solid.svg"
                            alt="modification de photo de profil">
                    </div>
                </a>
                <div id="profile-name" class="col-2  ms-md-5 ms-lg-0 position-relative ">
                    <label for="firstName">Nom :</label>
                    <input type="text" id="firstName" value="<?php echo $user->getFirstName() ?>">
                    <br>
                    <label for="lastName">Prénom :</label>
                    <input type="text" id="lastName" value="<?php echo $user->getLastName() ?>">
                </div>
                <div id="profile-edit-numbers" class="col-4 col-md-4 col-lg-2 offset-2 offset-lg-6">
                    <div class="row">
                        <div class="col-12 ">
                            <label for="city">Ville :</label>
                            <input type="text" id="city" name="city" value="<?php echo $user->getCity() ?>">
                        </div>
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

        <?php echo $user->getisDisplayPastEvnts() ?>

        <div class="container toggle-edit">
            <div class="row mx-3 mt-md-5">
                <div class="box--yellow">
                    <p>Profil public</p>
                    <label class="switch">
                        <input type="checkbox" name="isPublic" <?php echo $user->getisPublic() ? 'checked' : '' ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="box--yellow">
                    <p>Afficher mes évènement à venir</p>
                    <label class="switch">
                        <input type="checkbox" name="showFutureEvnts"
                            <?php echo $user->getisDisplayFutureEvnts() ? 'checked' : '' ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="box--yellow">
                    <p>afficher mes évènements passées</p>
                    <label class="switch">
                        <input type="checkbox" name="showPastEvnts"
                            <?php echo $user->getisDisplayPastEvnts() ? 'checked' : '' ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="box--yellow">
                    <p>afficher mon compteur d'évènement</p>
                    <label class="switch">
                        <input type="checkbox" name="showEvntScores"
                            <?php echo $user->getisDisplayEvntScores() ? 'checked' : '' ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
    </form>
</main>