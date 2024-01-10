<?php

require_once("../models/Evnt.php");
require_once("../helpers/class/DB.php");

Use Models\Evnt;

$db = DB::getDB();
$allevnts = Evnt::getAllEvents($db);


echo '<div class="container-fluid">';
echo '<div class="row d-flex justify-content-center">';
echo '<h2 class="title-section">Tous les événements</h2>';
foreach ($allevnts as $event) {
    $idEvent = $event['idEvent'];
    $event = Evnt::hydrate($event);

    echo '<article class="evnt-single col-3 m-5">
        <a href="">
            <img class="img-une" src="assets/img/energetic-dancer-dynamic-glamorous-light.jpg"
                alt="photographie d\'un groupe de fêtard" />
            <div class="padding-evnt">
                <ul class="details-evnt">
                    <!-- Ville -->
                    <li><img src="assets/img/icons/icon-map-marker.svg" alt="icone map marker" /> ' . $event->getAdress() . '</li>
                    <!-- Date -->
                    <li><img src="assets/img/icons/icon-calendar.svg" alt="icone calendrier" /> ' . $event->getDateEvnt() . '</li>
                    <!-- Participants -->
                    <li><img src="assets/img/icons/icon-group.svg" alt="icone groupe" /> ' . $event->getNbParticipants() . '/' . $event->getNbParticipants() . '</li>
                </ul>
                <h3>' . $event->getTitle() . '</h3>
                <ul class="liste-categories">';
                
               

    echo '</ul>
             <a class="btn btn-danger" href="handlers/evnt_delete_handler.php?id=' . $idEvent . '">Delete</a>
            </div>
        </a>
    </article>';
}

echo '</div>';
echo '</div>';

?>
