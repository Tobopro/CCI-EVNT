<?php

require_once("/laragon/www/CCI-EVNT/models/Evnt.php");
require_once("/laragon/www/CCI-EVNT/helpers/class/DB.php");

use Models\Evnt;

if (isset($_GET['id'])) {
    $eventId = $_GET['id'];
    $db = DB::getDB(); // Ajustez cela en fonction de votre méthode de connexion à la base de données

    // Vérifiez si l'événement existe
    $event = Evnt::getEventById($db, $eventId);
    if (!$event) {
        echo "Événement non trouvé !";
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Gérez la soumission du formulaire pour supprimer l'événement de la base de données
        $event = Evnt::hydrate($event);
        $result = $event->deleteEvent($db, $eventId);

        if ($result) {
            // Redirigez vers la page de liste des événements après la suppression
            header("Location: ../index.php?url=my_events");
            exit;
        } else {
            echo "Erreur lors de la suppression de l'événement !";
        }
    }

    // Affiche le formulaire de confirmation de suppression de l'événement
    echo '<div style="text-align: center; margin-top: 50px;">';
    echo '<h2>Confirmer la suppression de l\'événement</h2>';
    echo '<p>Êtes-vous sûr de vouloir supprimer cet événement ?</p>';
    echo '<form method="POST" action="evnt_delete_handler.php?id=' . $eventId . '">';
    echo '<button class="btn btn-danger" type="submit">Supprimer l\'événement</button>';
    echo '</form>';
    echo '</div>';
} else {
    echo "ID de l'événement non fourni !";
}