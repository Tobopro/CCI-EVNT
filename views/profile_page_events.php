<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <h2 class="title-section col-6">Tous mes événements</h2>
        <div class="justify-content-center d-flex">
            <p>
                <?php
                // Supposons que $totalPages soit le nombre total de pages
                for ($i = 1; $i <= $totalPages; $i++) {
                    echo '<a style="color:black; text-decoration:underline;" href="?url=my_events&page=' . $i . '">' . $i . '</a> ';
                }
                ?>
            </p>
        </div>
        <?php foreach ($hydratedEvents as $hydratedEvent): ?>

            <article class="evnt-single col-3 m-5">
                <a href="<?php ec('?url=evnt&id=' . $hydratedEvent->getId()) ?>">
                    <img class="img-une" src="assets/img/energetic-dancer-dynamic-glamorous-light.jpg"
                        alt="photographie d'un groupe de fêtard" />
                    <div class="padding-evnt">
                        <ul class="details-evnt">
                            <!-- Ville -->
                            <li><img src="assets/img/icons/icon-map-marker.svg" alt="icone map marker" />
                                <?php echo $hydratedEvent->getAdress() ?>
                            </li>
                            <!-- Date -->
                            <li><img src="assets/img/icons/icon-calendar.svg" alt="icone calendrier" />
                                <?php echo $hydratedEvent->getDateEvnt() ?>
                            </li>
                            <!-- Participants -->
                            <li><img src="assets/img/icons/icon-group.svg" alt="icone groupe" />
                                <?php echo $hydratedEvent->getNbParticipants() ?>/
                                <?php echo $hydratedEvent->getNbParticipants() ?>
                            </li>
                        </ul>
                        <h3>
                            <?php echo $hydratedEvent->getTitle() ?>
                        </h3>
                        <p>
                            <?php echo substr(
                                $hydratedEvent->getDescription(),
                                0
                                ,
                                50
                            ) . '...' ?>
                        </p>
                        <ul class="liste-categories">
                            <?php $hydratedEvent->getCategoryName() ?>
                        </ul>
                        <a class="btn btn-danger"
                            href="handlers/evnt_delete_handler.php?id=<?php echo $hydratedEvent->getId() ?>">Supprimer</a>

                    </div>
                </a>
            </article>
        <?php endforeach; ?>

    </div>
</div>