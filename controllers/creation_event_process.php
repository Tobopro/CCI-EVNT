<?php
use Models\Evnt;

require_once("/laragon/www/CCI-EVNT/models/Evnt.php");
require_once("/laragon/www/CCI-EVNT/helpers/class/DB.php");

session_start();
require("functions.php");

// Assuming the connection function is now a static method of the DB class
$db = DB::getDB();

$event_name_register = isset($_POST["title"]) ? $_POST["title"] : "";
$event_date_register = isset($_POST["date"]) ? $_POST["date"] : "";
$event_time_register = isset($_POST["time"]) ? $_POST["time"] : "";
$event_adress_register = isset($_POST["adress"]) ? $_POST["adress"] : "";
$event_description_register = isset($_POST["description"]) ? $_POST["description"] : "";
$event_category_register = isset($_POST["category"]) ? $_POST["category"] : "";
$event_price_register = isset($_POST["price"]) ? $_POST["price"] : "";


$is_free_entry_register = isset($_POST["isFree"]) ? ($_POST["isFree"] ? 1 : 0) : 0;

$event_nbplace_register = isset($_POST["nbplace"]) ? $_POST["nbplace"] : "";







 if (strlen($event_name_register) < 5) {
    $message = "Le titre doit contenir au moins 5 lettres.";
    $type_message = "danger";
    header('Location: ../index.php?url=creation_EVNT&'.'message=' . $message . '&type_message=' . $type_message);
} elseif (strlen($event_description_register) < 10) {
    $message = "La description doit contenir au moins 10 lettres.";
    $type_message = "danger";
    header('Location: ../index.php?url=creation_EVNT&'.'message=' . $message . '&type_message=' . $type_message);
} elseif ($event_price_register < 0) {
    $message = "Le prix ne peut pas être négatif. Si l'événement est gratuit, remplissez 0.";
    $type_message = "danger";
    header('Location: ../index.php?url=creation_EVNT&'.'message=' . $message . '&type_message=' . $type_message);
} elseif (empty($event_adress_register)) {
    $message = "Veuillez entrer une adresse.";
    $type_message = "danger";
    header('Location: ../index.php?url=creation_EVNT&'.'message=' . $message . '&type_message=' . $type_message);
} else {

    if (!empty($event_name_register) &&
    !empty($event_date_register) &&
    !empty($event_adress_register) &&
    !empty($event_description_register) &&
    !empty($event_price_register) &&
    !empty($event_nbplace_register) && 
    !empty($event_category_register)) {
    // Création de l'événement
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

    // Enregistrement de l'événement
    $event->createEvent($db);
    
    $message = "Votre évènement a bien été créé";
    $type_message = "success";
    header('Location: ../index.php?url=creation_EVNT&'.'message=' . $message . '&type_message=' . $type_message);
    exit(); // Ajout de l'exit après la redirection pour éviter l'exécution du code suivant
}

// En cas d'échec de la validation, redirection avec le message d'erreur
header('Location: ../index.php?url=creation_EVNT&'.'message=' . $message . '&type_message=' . $type_message);
exit(); // Ajout de l'exit après la redirection pour éviter l'exécution du code suivant

} 

?>