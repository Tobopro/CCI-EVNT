<?php 


require_once __DIR__.'/../../bootstrap/app.php';

use Controllers\UsersController;

if (!empty($_POST['action'])) {
    $controller = new Controllers\UsersController();

    if ($_POST['action'] === 'store') {
        $controller->store();
    } elseif ($_POST['action'] === 'delete') {
        Auth::isAuthOrRedirect();
        $_SESSION['POST'] = $_POST;
        $controller->delete();
    } elseif ($_POST['action'] === 'update') {
        Auth::isAuthOrRedirect();
        $controller->update();
    }
}