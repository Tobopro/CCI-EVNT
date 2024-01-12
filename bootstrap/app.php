<?php

define('APP_BASE_PATH', realpath(__DIR__ . '/../'));
// Import Helpers

require_once __DIR__ . "/../helpers/path_functions.php";
require_once __DIR__ . "/../helpers/redirect_functions.php";
require_once __DIR__ . "/../helpers/session_functions.php";

// Import class helpers
require_once __DIR__ . '/../helpers/class/App.php';
require_once __DIR__ . '/../helpers/class/DB.php';
require_once __DIR__ . '/../helpers/class/Auth.php';


// Import

require_once __DIR__ . "/../Models/User.php";
require_once __DIR__ . "/../models/Evnt.php";
require_once __DIR__ . "/../Controllers/UsersController.php";
require_once __DIR__ . "/../controllers/DashboardController.php";
require_once __DIR__ . "/../controllers/LogoutController.php";
require_once __DIR__ . "/../controllers/LoginController.php";
require_once __DIR__ . "/../controllers/CreationEventController.php";




// Start sessions
session_start();