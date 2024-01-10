<?php

require_once("../models/Evnt.php");
require_once("../helpers/class/DB.php");

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
        // Add your validation and delete logic here

        // Redirect to the events list page after deleting
        header("Location: events_list.php");
        exit;
    }

    // Display confirmation form for deleting the event
    echo "Are you sure you want to delete the event?";
    echo '<form method="POST" action="delete.php?id=' . $eventId . '">';
    echo '<button type="submit">Delete Event</button>';
    echo '</form>';
} else {
    echo "Event ID not provided!";
}
?>
