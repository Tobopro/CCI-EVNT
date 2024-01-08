<?php
use Classes\Evnt;
use \Helpers\DB;
require_once("../helpers/DB.php");
require_once("classes/Evnt.php");

session_start();
require("functions.php");

// Assuming the connection function is now a static method of the DB class
$db = DB::getDB();

$event_name_register = isset($_POST["input-event-title"]) ? $_POST["input-event-title"] : "";
$event_date_register = isset($_POST["input-event-date"]) ? $_POST["input-event-date"] : "";
$event_time_register = isset($_POST["hour"]) ? $_POST["hour"] : "";
$event_adress_register = isset($_POST["adresse"]) ? $_POST["adresse"] : "";
$event_description_register = isset($_POST["description"]) ? $_POST["description"] : "";
$event_category_register = isset($_POST["categories"]) ? $_POST["categories"] : "";
$event_price_register = isset($_POST["price"]) ? $_POST["price"] : "";
$is_free_entry_register = isset($_POST["is_free_entry"]) ? $_POST["is_free_entry"] : "";
$event_nbplace_register = isset($_POST["nombreParticipants"]) ? $_POST["nombreParticipants"] : "";


$event_name_register = "test";
$event_date_register = "2021-06-01";
$event_time_register = "12:00";
$event_adress_register = "test";
$event_description_register = "test";
$event_category_register = "1";
$event_price_register = "10";
$is_free_entry_register = "1";
$event_nbplace_register = "10";

if (!empty($event_name_register) &&
    !empty($event_date_register) &&
    !empty($event_adress_register) &&
    !empty($event_description_register) &&
    !empty($event_price_register) &&
    !empty($event_nbplace_register) && 
    !empty($is_free_entry_register) &&
    !empty($event_category_register)) {

    $event = new Evnt(
        $event_name_register,
        $event_date_register,
        $event_adress_register,
        $event_description_register,
        $event_price_register,
        null, // Assuming $event_price_info_register is not used in the constructor
        $event_nbplace_register,
        $is_free_entry_register,
        // Assuming you have user and category IDs; replace the values accordingly
        1, // Example user ID, replace with your logic
        $event_category_register,
        "", // Assuming $urlImage is not provided in the form
        0, // Initial likes count
        0  // Initial reports count
    );

    $event->createEvent($db);
    $message = "Votre évènement a bien été créé";
    $type_message = "success";
    header('Location: ../public/index.php?url=creation_EVNT&'.'message=' . $message . '&type_message=' . $type_message);
} else {
    $message = "Vous n'avez pas bien rempli les informations";
    $type_message = "danger";
    header('Location: ../public/index.php?url=creation_EVNT&'.'message=' . $message . '&type_message=' . $type_message);
}
