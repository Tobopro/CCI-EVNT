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

