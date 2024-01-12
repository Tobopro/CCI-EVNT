<?php


namespace Controllers;

require_once __DIR__ . '/../bootstrap/app.php';

use Models\Evnt;
use DB;


class CreationEventController {

    public static function form(){
        $db = DB::getDB();
        //used in view
        $categories = Evnt::getCategories($db);
        include("../views/event_creation_page.php");
    }

    public static function createEvent(){

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

            $event_adress_register = str_replace("'", "\'", $event_adress_register);
            $event_description_register = str_replace("'", "\'", $event_description_register);
            $event_name_register = str_replace("'", "\'", $event_name_register);
            $event_name_register = str_replace('"', '\"', $event_name_register);
            $event_description_register = str_replace('"', '\"', $event_description_register);
            $event_adress_register = str_replace('"', '\"', $event_adress_register);

            if (strlen($event_name_register) < 5 ) {
                $message = "Le titre doit contenir au moins 5 lettres et ne peut contenir que des lettres, des chiffres, des apostrophes et des guillemets.";
                $type_message = "danger";
                header('Location: ../index.php?url=creation_EVNT&' . 'message=' . $message . '&type_message=' . $type_message);
            } elseif (strlen($event_description_register) < 10) {
                $message = "La description doit contenir au moins 10 lettres et ne peut contenir que des lettres, des chiffres, des apostrophes et des guillemets.";
                $type_message = "danger";
                header('Location: ../index.php?url=creation_EVNT&' . 'message=' . $message . '&type_message=' . $type_message);
            } elseif ($event_price_register < 0) {
                $message = "Le prix ne peut pas être négatif. Si l'événement est gratuit, remplissez 0.";
                $type_message = "danger";
                header('Location: ../index.php?url=creation_EVNT&' . 'message=' . $message . '&type_message=' . $type_message);
            } elseif (empty($event_adress_register)) {
                $message = "Veuillez entrer une adresse.";
                $type_message = "danger";
                header('Location: ../index.php?url=creation_EVNT&' . 'message=' . $message . '&type_message=' . $type_message);
            } else {
                if (!empty($event_name_register) &&
                !empty($event_date_register) &&
                !empty($event_adress_register) &&
                !empty($event_description_register) &&
                !empty($event_price_register) &&
                !empty($event_nbplace_register) && 
                !empty($event_category_register)) {
                // Creation EVNT
                $event = new Evnt(
                    $event_name_register,
                    $event_date_register,
                    $event_adress_register,
                    $event_description_register,
                    $event_price_register,
                    null, // $priceInfoTODO
                    $event_nbplace_register,
                    $is_free_entry_register,
                    1, // user ID preset, TODO
                    $event_category_register,
                    "", // Assuming $urlImage is not provided in the form
                    0, // Initial likes count
                    0  // Initial reports count
                );

                // Success
                $event->createEvent($db);
                
                $message = "Votre évènement a bien été créé";
                $type_message = "success";
                header('Location: ../index.php?url=creation_EVNT&'.'message=' . $message . '&type_message=' . $type_message);
                exit(); 
            }
            //Error 
            $message = "Il y a eu une erreur.";
            $type_message = "danger";
            header('Location: ../index.php?url=creation_EVNT&'.'message=' . $message . '&type_message=' . $type_message);
            exit();

        } 
    }
}