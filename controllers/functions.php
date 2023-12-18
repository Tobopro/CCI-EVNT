<?php 


function connection_dbb(){

$dsn = "mysql:host=localhost;port=3306;dbname=evnt;charset=utf8";
try {
    $db = new PDO($dsn, "test", "test");
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

return $db;

}

function registerUser($db, $nom, $prenom, $email, $password)
{
    $result = $db->exec("INSERT INTO users (nom, prenom, email, password) VALUES ('$nom', '$prenom', '$email', '$password')");

    if ($result !== false) {
        $message = "Vous êtes bien inscrit".' '.$prenom.' '.$nom;
        $type_message = "success";
        $_SESSION['auth'] = true;
        header('Location: home.php?message=' . $message . '&type_message=' . $type_message);
       
    } else {
        echo "Error: " . $db->errorInfo()[2];
    }
}

function createEvent($db, $event_name_register, $event_date_register, $event_adress_register, $event_description_register, $event_category_register, $event_price_register, $event_nbplace_register, $is_free_entry_register)
{
    $result = $db->exec("INSERT INTO events (title, dateEvnt, adress, description,  price, priceInfo, nbParticipants, isFreeEntry, idUser) VALUES ('$event_name_register', '$event_date_register', '$event_adress_register', '$event_description_register',  '$event_price_register',' ', '$event_nbplace_register', '$is_free_entry_register', '1')");

    if ($result !== false) {
        $message = "Votre évènement a bien été créé";
        $type_message = "success";
        header('Location: creation_event.php?message=' . $message . '&type_message=' . $type_message);
    } else {
        echo "Error: " . $db->errorInfo()[2];
    }
}