<?php
require_once __DIR__ . '/../../bootstrap/app.php';

// Check auth
Auth::isAuthOrRedirect();

if (!empty($_POST['action'])) {
    $controller = new Controllers\UsersController();

    if ($_POST['action'] === 'store') {
        $controller->store();
    } elseif ($_POST['action'] === 'delete') {
        $controller->delete();
    } elseif ($_POST['action'] === 'update') {
        $controller->update();
    }
}

// Remove errors, success and old data
App::terminate();

// Unknown action
redirectAndExit(Controllers\UsersController::URL_INDEX);