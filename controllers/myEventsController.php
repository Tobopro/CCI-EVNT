<?php

require_once("../models/Evnt.php");
require_once("../helpers/class/DB.php");

Use Models\Evnt;

$db = DB::getDB();
$allevnts = Evnt::getAllEvents($db);





foreach ($allevnts as $event) :
    $idEvent = $event['idEvent'];
    $event = Evnt::hydrate($event);
    $event->setId($idEvent); // Affectez l'ID à la propriété de l'objet
    $hydratedEvents[] = $event;
endforeach;

include('../views/my_events.php');
