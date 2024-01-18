<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <section id="filter" class="container-fluid">
        <!-- Selection Filter -->
        <div class="row bg-warning d-flex justify-content-end mt-md-3 border rounded mx-0 mx-lg-5 py-2">



            <form action="" method="GET">
                <label for="search">Rechercher: </label>
                <input id="search" type="text" name="search" value="<?php $searchField ?>">
                <input type="hidden" name="url" value="my_events">
                <input type="submit" value="Rechercher">

            </form>
        </div>
    </section>

        <h2 class="title-section col-6">Tous les événements</h2>
        <a class="col-6" href="index.php?url=my_users"><h2 class="title-section">Tous les utilisateurs</h2></a>
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
        <?php foreach ($hydratedEvents as $hydratedEvent) : ?>
       
            <article class="evnt-single col-3 m-5">
                <a href="">
                    <img class="img-une" src="assets/img/energetic-dancer-dynamic-glamorous-light.jpg"
                        alt="photographie d'un groupe de fêtard" />
                    <div class="padding-evnt">
                        <ul class="details-evnt">
                            <!-- Ville -->
                            <li><img src="assets/img/icons/icon-map-marker.svg" alt="icone map marker" /> <?= $hydratedEvent->getAdress() ?></li>
                            <!-- Date -->
                            <li><img src="assets/img/icons/icon-calendar.svg" alt="icone calendrier" /> <?= $hydratedEvent->getDateEvnt() ?></li>
                            <!-- Participants -->
                            <li><img src="assets/img/icons/icon-group.svg" alt="icone groupe" /> <?= $hydratedEvent->getNbParticipants() ?>/<?= $hydratedEvent->getNbParticipants() ?></li>
                        </ul>
                        <h3><?= $hydratedEvent->getTitle() ?></h3>
                        <p><?= substr($hydratedEvent->getDescription(), 0
                        , 25) . '...' ?></p>
                        <ul class="liste-categories">
                           <?php $hydratedEvent->getCategoryName()?>
                        </ul>
                            <a class="btn btn-danger" href="handlers/evnt_delete_handler.php?id=<?= $hydratedEvent->getId() ?>">Supprimer</a>

                    </div>
                </a>
            </article>
        <?php endforeach; ?>
        
    </div>
</div>
