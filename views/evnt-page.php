<main>
    <div class="evnt-page__banner">
    </div>
    <div class="evnt-page-container">
        <?php displayErrorsAndMessages(); ?>
        <section class="text-content">
            <div class="evnt-page">
                <div class="evnt-page__left-block">
                    <div class="box--yellow evnt-page__title">
                        <h1 class="">
                            <?php echo $evnt->getTitle() ?>
                        </h1>
                    </div>
                    <div class="evnt-page__date-cost">
                        <div class="box--yellow evnt-page__date">
                            <p>
                                <?php echo $evnt->getDateEvnt(); ?>
                            </p>
                        </div>
                        <div class="box--yellow evnt-page__cost">
                            <p>
                                <?php echo $evnt->getIsFreeEntry() ? "Gratauit" : "Payant" ?>
                            </p>
                        </div>
                    </div>
                    <div class="evnt-page__participant-desc">
                        <div class="evnt-page__participant box--yellow">
                            <div>
                                <h2 class="title"> <i class="fa-solid fa-user-group me-2"></i>
                                    <?php echo count($participants) . "/" . $evnt->getNbParticipants() ?>
                                </h2>
                            </div>
                            <div class="evnt-page__participant-list">
                                <ul>
                                    <?php
                                    foreach ($participants as $participant) {
                                        echo "<li>" . $participant["firstName"] . " " . $participant['lastName'] . "</li>";
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <div class="evnt-page__description box--yellow">
                                <p>
                                    <?php echo $evnt->getDescription() ?>
                                </p>
                            </div>
                            <div class="evnt-page__icon">
                                <a href=""
                                    class="box--yellow evnt-page__icon--share d-flex justify-content-center align-items-center ">
                                    <i class="fa-solid fa-share-from-square fa-2xl"></i>
                                </a>
                                <a href=""
                                    class="box--yellow evnt-page__icon--like  d-flex justify-content-center align-items-center">
                                    <i class="fa-regular fa-heart fa-2xl"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="evnt-page__right-block ">
                    <div class="box--yellow evnt-page__adress ">
                        <p>
                            <?php echo $evnt->getAdress(); ?>
                        </p>
                        <div id="map" class="evnt-map"></div>
                    </div>
                   
                    <?php 
                    if($evnt->isParticipatingTo($evnt->getId(),$_SESSION[Auth::SESSION_KEY])==!NULL && $evnt->isParticipatingTo($evnt->getId(),$_SESSION[Auth::SESSION_KEY])==true ){
                     echo '
                        <a href="" class="evnt-page__join d-flex justify-content-center align-items-center ">
                            <div id="submit-box" class="mx-2 fs-1 w-100">
                                <form action="handlers/evnt-handler.php" method="POST">
                                    <input type="text" name="action" value="leaving" hidden>
                                    <input type="text" name="id" value="' . $evnt->getId() . '" hidden>
                                    <button type="submit" class="w-100 evnt-confirm-button">Quitter l\'Evnt</button>
                                </form>
                            </div>
                        </a>';
                    }else {

                   echo '
                        <a href="" class="evnt-page__join d-flex justify-content-center align-items-center ">
                            <div id="submit-box" class="mx-2 fs-1 w-100">
                                <form action="handlers/evnt-handler.php" method="POST">
                                    <input type="text" name="action" value="join" hidden>
                                    <input type="text" name="id" value="' . $evnt->getId() . '" hidden>
                                    <button type="submit" class="w-100 evnt-confirm-button">Rejoindre l\'Evnt</button>
                                </form>
                            </div>
                        </a>';
                    }
                    
                    ;
                    ?>
                </div>
            </div>
        </section>
    </div>
</main>