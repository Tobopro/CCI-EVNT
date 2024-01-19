<?php
require_once __DIR__ . '/../bootstrap/app.php';

use Controllers\AllEventsController;
use Controllers\EventPageController;
use Controllers\MobileMapController;
use controllers\UsersController;
use Controllers\LogoutController;
use Controllers\LoginController;
use Controllers\CreationEventController;
use Controllers\ErrorController;
use Controllers\HomepageController;
use Controllers\LegalController;

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Accueil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/sass/main.css">
    <!-- Highest Praise font  -->
    <link rel="stylesheet" href="https://use.typekit.net/ace6zhm.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <script defer src="assets/javascript/script-login.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script defer src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script defer src="./assets/javascript/dashboard.js"></script>
    <script defer type="text/javascript" src="assets/javascript/script-homepage.js"></script>
    <script defer type="text/javascript" src="assets/javascript/tom-script.js"></script>
</head>


<?php

if (!empty($_GET)) {
    if ($_GET['url'] !== 'home') {
        $body = "<body class = 'body-background";
        if ($_GET['url'] === 'profile' or $_GET['url'] === 'edition_profil' or $_GET['url'] === 'evnt') {
            $body .= " with-no-margin";
        }
        $body .= "'>";
        echo $body;
    }
}

include("../views/header.php");

if (isset($_GET['url'])) {
    switch ($_GET['url']) {
        case 'home':
            $controller = new HomepageController();
            $controller->show();
            break;
        case 'login':
            $controller = new LoginController();
            $controller->show();
        case 'logout':
            $controller = new LogoutController();
            $controller->logOut();
            break;
        case 'dashboard':
            $controller = new DashboardController();
            $controller->index();
            break;
        case 'profile':
            $controller = new UsersController();
            $controller->index();
            break;
        // case 'page_EVNT':
        //     $controller = new EventPageController();
        //     $controller->show();
            // break;
        case 'evnt':
            $controller = new EventPageController();
            $controller->evntPage();
            break;
        case 'creation_EVNT':
            $controller = new CreationEventController();
            $controller->form();
            break;
        case 'edition_profil':
            $controller = new UsersController();
            $controller->edit();
            break;
        case 'my_events':
            $controller = new AllEventsController();
            $controller->index(9,'Admin');
            break;
        case 'personnal_events':
            $controller = new AllEventsController();
            $controller->index(6,'User');
            break;
        case 'my_users':
            $controller = new UsersController();
            $controller->indexAllUsers();
            break;
        case 'carte':
            $controller = new MobileMapController();
            $controller->show();
            break;
        case 'mentions':
            $controller = new LegalController();
            $controller->show();
            break;
        case 'creation_profile':
            $controller = new UsersController();
            $controller->create();
            break;
        case 'delete':
            $controller = new UsersController();
            $controller->delete();
            break;
        case 'my_users_update':
            $controller = new UsersController();
            $controller->displayUpdateAll();
            break;
        // case 'test':
        //     require_once base_path("Views/test.php");
        //     break;
        default:
            $controller = new ErrorController();
            $controller->wrongURL();
            break;
    }
} else {
    $controller = new HomepageController();
    $controller->show();
}

if (!empty($_GET)) {
    if ($_GET['url'] !== 'home') {
        include('../views/footer.php');
        echo "</body>";
    } elseif ($_GET['url'] === 'home' or $_GET['']) {
        echo "<script defer src='./assets/javascript/card-hcarousel.js'></script>";
    }
}

App::terminate();
?>

</html>