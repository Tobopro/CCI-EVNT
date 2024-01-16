<?php
require_once __DIR__ . '/../../bootstrap/app.php';

if (!empty($_POST['action'])) {
    $controller = new Controllers\EventPageController();

    if ($_POST['action'] === 'join') {
        Auth::isAuthOrRedirect();
        $controller->joinEvnt();
    }
}