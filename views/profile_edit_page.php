<main>
    <div class="cover-and-info-edit">
        <div class="cover-edit-picture">
            <button class="cover-edit-picture__btn">
                <a href="index.php?url=profile">Enrengistrer</a>
            </button>

            <form action="" method="POST">
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
                <p> DOE <br> John</p>
            </div>
            <div id="profile-edit-numbers" class="col-4 col-md-4 col-lg-2 offset-2 offset-lg-6">
                <div class="row">
                    <div class="col-12 ">
                        Ville: Strasbourg
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

    <div class="container toggle-edit">
        <div class="row mx-3 mt-md-5">
            <div class="box--yellow">
                <p>Profil public</p>
                <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span>
                </label>
            </div>
            <div class="box--yellow">
                <p>Afficher mes évènement à venir</p>
                <label class="switch">
                    <input type="checkbox" name="">
                    <span class="slider round"></span>
                </label>
            </div>
            <div class="box--yellow">
                <p>afficher mes évènements passées</p>
                <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span>
                </label>
            </div>
            <div class="box--yellow">
                <p>afficher mon compteur d'évènement</p>
                <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    </form>
</main>