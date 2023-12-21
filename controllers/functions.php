<?php


function connectionDB()
{

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
        $message = "Vous êtes bien inscrit" . ' ' . $prenom . ' ' . $nom;
        $type_message = "success";
        $_SESSION['auth'] = true;
        header('Location: home.php?message=' . $message . '&type_message=' . $type_message);

    } else {
        echo "Error: " . $db->errorInfo()[2];
    }
}

function createEvent($db, $event_name, $event_date, $event_time, $event_adress, $event_description, $event_category, $event_price, $event_price_info, $event_nbplace, $is_no_limit, $is_free_entry)
{
    $result = $db->exec("INSERT INTO events (event_name, event_date, event_time, event_adress, event_description, event_category, event_price, event_price_info, event_nbplace, is_no_limit, is_free_entry) VALUES ('$event_name', '$event_date', '$event_time', '$event_adress', '$event_description', '$event_category', '$event_price', '$event_price_info', '$event_nbplace', '$is_no_limit', '$is_free_entry')");

    if ($result !== false) {
        $message = "Votre évènement a bien été créé";
        $type_message = "success";
        header('Location: creation_event.php?message=' . $message . '&type_message=' . $type_message);
    } else {
        echo "Error: " . $db->errorInfo()[2];
    }
}