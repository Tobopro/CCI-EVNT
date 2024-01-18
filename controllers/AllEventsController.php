<?php

namespace Controllers;

require_once __DIR__ . '/../bootstrap/app.php';

Use Models\Evnt;
use Auth;
use DB;



Class AllEventsController{     
       public static function index()
        {
            $db = DB::getDB();

            // Get all events 
            $events = Evnt::getAllEvents($db);

            // Number of items wanted by page
            $itemsPerPage = 9;
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
            if (isset($_GET['search']) && ($_GET['search']!== '')) {
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

                        $k = ':search'.$key;
                        $searchFields[$k] = '%'.$search.'%';
                        unset($searchFields[$key]);
                        $whereSearchSQL .=
                        ' title LIKE '.$k
                            .' OR description LIKE '.$k;
                    }
                        $whereSQL = $whereSearchSQL;
                
                        $eventsFiltered = DB::fetch(
                        // SQL
                        "SELECT * FROM events WHERE"
                        .$whereSQL,
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

}
