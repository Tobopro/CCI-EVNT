



<main>

  <?php
    if (isset($_GET['message']) && isset($_GET['type_message'])) {
        echo '<div class="alert   mx-5 alert-' . $_GET['type_message'] . ' alert-dismissible fade show" role="alert">
    <strong>' . $_GET['message'] . '</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }

    ?>



<section id="filter" class="container-fluid">
        <!-- Selection Filter -->
        <div class="row bg-warning d-flex justify-content-end mt-md-3 border rounded mx-0 mx-lg-5 py-2">
          
     
        
        <form action="" method="GET">
                 <label for="search">Rechercher: </label>
    <input id="search" type="text" name="search" value="<?php $searchField ?>">
      <input type="hidden" name="url" value="dashboard">
       <input type="submit" value="Rechercher">    

    </form>
        </div>
    </section>

    <section id="event" class="container-fluid">
        <!-- Event -->

        <div class="row mx-5 d-flex justify-content-between">
            <div class="col-lg-6 d-none d-lg-block ">
                <section id="map_event">
                    <!-- map placeholder -->
                    <div id="map" class="map-dashboard"></div>
                </section>
            </div>
            <div class="col-lg-4 col-12 events_event p-0 me-lg-3">
                <div class="events_event__cards row">
                    <?php foreach ($hydratedEvents as $hydratedEvent): ?>
                        <article class="evnt-single mb-2">
                            <a href="">
                                <img class="img-une" src="assets/img/energetic-dancer-dynamic-glamorous-light.jpg"
                                    alt="photographie d'un groupe de fêtard" />
                                <div class="padding-evnt">
                                    <ul class="details-evnt">
                                        <li><img src="assets/img/icons/icon-map-marker.svg" alt="icone map marker" /> <?= $hydratedEvent->getAdress(); ?></li>
                                        <li><img src="assets/img/icons/icon-calendar.svg" alt="icone calendrier" /> <?= $hydratedEvent->getDateEvnt(); ?></li>
                                        <li><img src="assets/img/icons/icon-group.svg" alt="icone groupe" /> <?= $hydratedEvent->getNbParticipants(); ?></li>
                                    </ul>
                                    <h3><?= $hydratedEvent->getTitle(); ?></h3>
                                    <ul class="liste-categories">
                                        <li><?php $hydratedEvent->getCategoryName();?></li>
                                        
                                    </ul>
                                </div>
                            </a>
                        </article>
                    <br>
                    <?php endforeach; ?>
                    <div class="justify-content-center d-flex">
                        <p>
                            <?php
                            // Supposons que $totalPages soit le nombre total de pages
                            for ($i = 1; $i <= $totalPages; $i++) {
                                echo '<a style="color:black; text-decoration:underline;" href="?url=dashboard&page=' . $i . '">' . $i . '</a> ';
                            }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
