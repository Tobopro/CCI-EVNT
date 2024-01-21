<main>
    <div class="evnt-page__banner">
    </div>
    <div class="evnt-page-container">
        <?php

        use Controllers\EventPageController;

        displayErrorsAndMessages(); ?>
        <section class="text-content">
            <div class="evnt-page">
                <div class="evnt-page__left-block">
                    <div class="box--yellow evnt-page__title">
                        <h1 class="">
                            <?php ec($evnt->getTitle()) ?>
                        </h1>
                    </div>
                    <div class="evnt-page__date-cost">
                        <div class="box--yellow evnt-page__date">
                            <p>
                                <?php ec($evnt->getDateEvnt()) ?>
                            </p>
                        </div>
                        <div class="box--yellow evnt-page__cost">
                            <p>
                                <?php ec($evnt->getIsFreeEntry() ? "Gratuit" : "Payant");

                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="evnt-page__participant-desc">
                        <div class="evnt-page__participant box--yellow">
                            <div>
                                <h2 class="title"> <i class="fa-solid fa-user-group me-2"></i>
                                    <?php ec(count($participantsList->getParticipants()) . "/" . $evnt->getNbParticipants()) ?>
                                </h2>
                            </div>
                            <div class="evnt-page__participant-list">
                                <ul>
                                    <?php
                                    $participantsList->displayParticipants();
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <div class="evnt-page__description box--yellow">
                                <p>
                                    <?php ec($evnt->getDescription()) ?>
                                </p>
                            </div>
                            <div class="evnt-page__icon">
                                <a href=""
                                    class="d-none box--yellow evnt-page__icon--share d-flex justify-content-center align-items-center ">
                                    <i class="fa-solid fa-share-from-square fa-2xl"></i>
                                </a>
                              
                                <form action="handlers/evnt-handler.php" method="POST" class='w-100' >
                                    <input type="text" name="action" value="isLiked" hidden>
                                    <input type="number" name="id" value="<?php echo $evnt->getId() ?>" hidden>
                                    <button type="submit" class="box--yellow evnt-page__icon--like  d-flex justify-content-center align-items-center">
                                    <?php echo '<i class="'.$heartIcon.' fa-heart fa-2xl "></i>' ;?>
                                    </button>
                                </form>
                    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="evnt-page__right-block ">
                    <div class="box--yellow evnt-page__adress ">
                        <p>
                            <?php ec($evnt->getAdress()); ?>
                        </p>
                        <div id="map" class="evnt-map"></div>
                    </div>

                    <?php
                    EventPageController::showJoinLeftButton($evnt);
                    ?>
                </div>
            </div>
        </section>
    </div>
</main>