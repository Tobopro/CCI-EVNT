<?php
use controllers\UsersController;

require_once __DIR__ . '/../bootstrap/app.php';
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

    <!-- <link rel="stylesheet" type="text/css" href="../flickity/flickity.min.css"> -->


    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    <script defer src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script defer src="./assets/javascript/dashboard.js"></script>
    <script defer type="text/javascript" src="assets/javascript/script-homepage.js"></script>
    <!-- <script defer type="text/javascript" src="../flickity/flickity.pkgd.min.js"></script> -->
    <script defer type="text/javascript" src="assets/javascript/tom-script.js"></script>


</head>


<?php
if ($_GET['url'] !== 'home') {
    echo "<body class = body-background>";
}
?>
<?php
include("../views/header.php");
?>
<?php

if (isset($_GET['url'])) {
    switch ($_GET['url']) {
        case 'home':
            require '../views/homepage.php';
            break;
        case 'dashboard':
            require '../controllers/dashboard.php';
            break;
        case 'profile':
            require '../views/profile_page.php';
            break;
        case 'page_EVNT':
            require '../views/evnt-page.php';
            break;
        case 'creation_EVNT':
            require '../views/event_creation_page.php';
            break;
        case 'edition_profil':
            require '../views/profile_edit_page.php';
            break;
        case 'carte':
            require '../views/mobile_map_page.php';
            break;
        case 'mentions':
            require '../views/legal.php';
            break;
        case 'creation_profil':
            require_once base_path('Controllers/UsersController.php');
            $controller = new UsersController();
            $controller->create();
            break;
        default:
            require '../views/homepage.php';
            break;
    }
} else {
    require '../views/homepage.php';
}

?>
<?php

if ($_GET['url'] === 'home') {
    echo "<script defer src='./assets/javascript/card-hcarousel.js'></script>";
}

if ($_GET['url'] !== 'home') {
    include('../views/footer.php');
}

?>
<?php
if ($_GET['url'] !== 'home') {
    echo "</body>";
}
?>

</html>