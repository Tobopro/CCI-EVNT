<?php

namespace Controllers;

require_once __DIR__ . '/../bootstrap/app.php';

Use Models\Evnt;
use Auth;
use DB;



Class AllEventsController{
        public static function display(){

            if (isset($_SESSION['admin'])) {
                if($_SESSION['admin']==true){
            $db = DB::getDB();
            $allevnts = Evnt::getAllEvents($db);

            foreach ($allevnts as $event) :
                $idEvent = $event['idEvent'];
                $event = Evnt::hydrate($event);
                $event->setId($idEvent); // Affectez l'ID à la propriété de l'objet
                $hydratedEvents[] = $event;
            endforeach;

            include('../views/my_events.php');
            } 
            }else{
                Auth::isAdminOrRedirect();
            }
            
        }
}
