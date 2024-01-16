<?php
require_once __DIR__ . '/../../bootstrap/app.php';


if (!empty($_POST['action'])) {
    $controller = new Controllers\UsersController();

    if ($_POST['action'] === 'store') {
        Auth::isGuestOrRedirect();
        $controller->store();
    } elseif ($_POST['action'] === 'delete') {
        Auth::isAuthOrRedirect();
        $_SESSION['POST'] = $_POST;
        if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
            $controller->deleteAsAdmin();
        } else {
            $controller->delete();
        }

    } elseif ($_POST['action'] === 'displayUpdateForm') {
        Auth::isAdminOrRedirect();
        $controller->displayUpdateAll();
        exit;
    } elseif ($_POST['action'] === 'UpdateAsAdmin') {
        Auth::isAdminOrRedirect();

        $controller->updateAsAdmin();

    } elseif ($_POST['action'] === 'update') {
        Auth::isAuthOrRedirect();
        $controller->update();
    }
}

if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
    redirectAndExit('/index.php?url=my_users');
} else {
    // Remove errors, success and old data
    App::terminate();
    // Unknown action
    redirectAndExit(Controllers\UsersController::URL_INDEX);
}