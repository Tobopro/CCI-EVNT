<?php

require_once("/laragon/www/CCI-EVNT/models/Evnt.php");
require_once("/laragon/www/CCI-EVNT/helpers/class/DB.php");

use Models\Evnt;

if (isset($_GET['id'])) {
    $eventId = $_GET['id'];
    $db = DB::getDB(); // Adjust this based on your database connection method

    // Check if the event exists
    $event = Evnt::getEventById($db, $eventId);
    if (!$event) {
        echo "Event not found!";
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Handle form submission to delete the event from the database
        $event= Evnt::hydrate($event);
        $result = $event->deleteEvent($db, $eventId);

        if ($result) {
            // Redirect to the events list page after deleting
            header("Location: ../index.php?url=my_events");
            exit;
        } else {
            echo "Error deleting the event!";
        }
    }

    // Display confirmation form for deleting the event
    echo "Are you sure you want to delete the event?";
    echo '<form method="POST" action="evnt_delete_handler.php?id=' . $eventId . '">';
    echo '<button type="submit">Delete Event</button>';
    echo '</form>';
} else {
    echo "Event ID not provided!";
}
?>
