<?php

namespace Controllers;

require_once __DIR__ . '/../bootstrap/app.php';

Use Models\Evnt;
Use DB;


Class HomepageController {

 public static function show(){
    $db = DB::getDB();
   $events = Evnt::getLastSixEvents($db);

   $hydratedEvents = [];
   foreach ($events as $eventData) {
        $eventInstance = Evnt::hydrate($eventData);
        $hydratedEvents[] = $eventInstance;

   
 }
  include('../views/homepage.php');
 }

}