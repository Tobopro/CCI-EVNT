<?php
session_start();
require("functions.php");

$db = connection_dbb();

$event_name_register = isset($_POST["title"]) ? $_POST["title"] : "";
$event_date_register = isset($_POST["date"]) ? $_POST["date"] : "";
$event_time_register = isset($_POST["time"]) ? $_POST["time"] : "";
$event_adress_register = isset($_POST["adress"]) ? $_POST["adress"] : "";
$event_description_register = isset($_POST["description"]) ? $_POST["description"] : "";
$event_category_register = isset($_POST["category"]) ? $_POST["category"] : "";
$event_price_register = isset($_POST["price"]) ? $_POST["price"] : "";
// $event_price_info_register = isset($_POST["priceInfo"]) ? $_POST["priceInfo"] : "";
$is_free_entry_register = isset($_POST["isFree"]) ? $_POST["isFree"] : "";
$event_nbplace_register = isset($_POST["nbplace"]) ? $_POST["nbplace"] : "";



if (!empty($event_name_register) &&
    !empty($event_date_register) &&
    !empty($event_time_register) &&
    !empty($event_adress_register) &&
    !empty($event_description_register) &&
    !empty($event_price_register) &&
    !empty($event_nbplace_register) && 
    !empty($is_free_entry_register)) {
    createEvent($db, $event_name_register, $event_date_register, $event_time_register, $event_adress_register, $event_description_register, $event_category_register, $event_price_register, $event_nbplace_register, $is_free_entry_register);
    $message="Votre évènement a bien été créé";
    $type_message = "success";
    header('Location: ../public/index.php?url=creation_EVNT&'.'message=' . $message . '&type_message=' . $type_message);

}

else {
    $message="Vous n'avez pas bien rempli les informations";
    $type_message = "danger";
   header('Location: ../public/index.php?url=creation_EVNT&'.'message=' . $message . '&type_message=' . $type_message);


}
