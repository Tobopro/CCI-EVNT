<?php

use Models\Evnt;

require_once("../models/Evnt.php");




$db = DB::getDB();

// Assuming Evnt::getAllEvents returns an array of events
$events = Evnt::getAllEvents($db);




$itemsPerPage = 8;
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

$startIndex = ($currentPage - 1) * $itemsPerPage;
$endIndex = $startIndex + $itemsPerPage;

$eventsToDisplay = array_slice($events, $startIndex, $itemsPerPage);

// Affichez les événements dans $eventsToDisplay

$totalEvents = count($events);
$itemsPerPage = 8;
$totalPages = ceil($totalEvents / $itemsPerPage);

foreach ($eventsToDisplay as $eventData): 
$eventInstance= Evnt::hydrate($eventData);
endforeach;



// Include your view
include('../views/dashboard_page.php');
