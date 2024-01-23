<?php

namespace Controllers;

require_once __DIR__ . '/../bootstrap/app.php';

use Models\Evnt;
use Auth;
use DB;
use Models\User;

class AllEventsController
{
    public static function index($itemsPerPage,$PerOrAdmin)
    {

          $db = DB::getDB();
          //PerOrAdmin used for Admin accessing either to the back office or to his own events
        if(isset($_SESSION['admin']) && $PerOrAdmin=='Admin'){

              
                // Get all events 
                $events = Evnt::getAllEvents($db);
                // Get Current page 
                $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                // Calculate start index
                $startIndex = ($currentPage - 1) * $itemsPerPage;
                // Get end index
                $endIndex = $startIndex + $itemsPerPage;
                // Get all events to display
                $eventsToDisplay = array_slice($events, $startIndex, $itemsPerPage);
                // Total number of events
                $totalEvents = count($events);
                // Total number of pages necessary ( used in view )
                $totalPages = ceil($totalEvents / $itemsPerPage);
                // Filter by search
                if (isset($_GET['search']) && ($_GET['search'] !== '')) {
                    $searchField = $_GET['search'] ?? '';
                    $whereSearchSQL = '';
                    $searchFields = explode(' ', $searchField);
                    $whereSearchSQL = '';
                    foreach ($searchFields as $key => $search) {
                        if (empty($search)) {
                            unset($searchFields[$key]);
                            continue;
                        }

                        if ($whereSearchSQL) {
                            $whereSearchSQL .= ' OR ';
                        }

                        $k = ':search' . $key;
                        $searchFields[$k] = '%' . $search . '%';
                        unset($searchFields[$key]);
                        $whereSearchSQL .=
                            ' title LIKE ' . $k
                            . ' OR description LIKE ' . $k;
                    }
                    $whereSQL = $whereSearchSQL;

                    $eventsFiltered = DB::fetch(
                        // SQL
                        "SELECT * FROM events WHERE"
                        . $whereSQL,
                        $searchFields,
                    );

                    // Get filtered events to display
                    $eventsFilteredToDisplay = array_slice($eventsFiltered, $startIndex, $itemsPerPage);
                    // Total events filtered
                    $totalEvents = count($eventsFiltered);
                    // Total number necessary ( used in view ) 
                    $totalPages = ceil($totalEvents / $itemsPerPage);
                    $hydratedEvents = [];
                    foreach ($eventsFilteredToDisplay as $event) {
                        $eventInstance = Evnt::hydrate($event);
                        $hydratedEvents[] = $eventInstance;
                    }

                } else {
                    // Hydrate All Events
                    $hydratedEvents = [];
                    foreach ($eventsToDisplay as $eventData) {
                        $eventInstance = Evnt::hydrate($eventData);
                        $hydratedEvents[] = $eventInstance;
                    }
                }
                // Include view
                include('../views/my_events.php');
            }
            elseif(Auth::getCurrentUser() && $PerOrAdmin=='User'){

                $idUser=$_SESSION[Auth::SESSION_KEY];
                 // Get all events 
                $events = Evnt::getAllEventsOfUser($db,$idUser);
                // Get Current page 
                $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                // Calculate start index
                $startIndex = ($currentPage - 1) * $itemsPerPage;
                // Get end index
                $endIndex = $startIndex + $itemsPerPage;
                // Get all events to display
                $eventsToDisplay = array_slice($events, $startIndex, $itemsPerPage);
                // Total number of events
                $totalEvents = count($events);
                // Total number of pages necessary ( used in view )
                $totalPages = ceil($totalEvents / $itemsPerPage);
                
                    // Hydrate All Events
                    $hydratedEvents = [];
                    foreach ($eventsToDisplay as $eventData) {
                        $eventInstance = Evnt::hydrate($eventData);
                        $hydratedEvents[] = $eventInstance;
                    
                }
                // Include view
                include('../views/profile_page_events.php');
            }
            else{
                Auth::isAuthOrRedirect();
            }
    }

  

}