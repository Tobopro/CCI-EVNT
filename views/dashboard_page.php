<main>
    <section id="filter" class="container-fluid">
        <!-- Selection Filter -->
        <div class="row bg-warning d-flex justify-content-end mt-md-3 border rounded mx-0 mx-lg-5 py-2 ">
            <div
                class="col-5 offset-7  col-md-3 offset-md-9 col-lg-2 offset-lg-10 d-flex  align-items-center justify-content-center ">

                <i class="fa-solid fa-arrow-down-short-wide fa" style="color: #000000;"></i> Filter par
            </div>
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
 <?php foreach ($eventsToDisplay as $event) : ?>
            <div class="card-desktop col-5 m-3">
                <div class="card-desktop__top">
                    <img class="card-desktop__top-img" src="../public/assets/img/new-years-party-is-being-celebrated.jpg" alt="">
                    <div class="card-desktop__top-cat">
                        
                    </div>
                </div>
                <div class="card-desktop__bot">
                    <div class="card-desktop__bot-left">
                        <div class="card-desktop__bot-left-content">
                            <h3><?= $event['title']; ?></h3>
                            <h5><?= $event['description']; ?></h5>
                        </div>
                        <a class="card-desktop__bot-left-btn" href="?url=page_EVNT">Page de l'Evnt</a>
                    </div>
                    <div class="card-desktop__bot-right">
                        <div class="card-desktop__bot-right-i">
                            <i class="fa-regular fa-heart card-desktop__bot-right-i-like"></i>
                            <i class="fa-solid fa-share-nodes card-desktop__bot-right-i-share"></i>
                        </div>
                        <div class="card-desktop__bot-right-u">
                            <i class="fa-solid fa-user"></i>
                            <p><?= $event['nbParticipants']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
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
    </section>
</main>


</html>