<?php

define('APP_BASE_PATH', realpath(__DIR__ . '/../'));
// Import Helpers

require_once __DIR__ . "/../helpers/path_functions.php";
require_once __DIR__ . "/../helpers/redirect_functions.php";
require_once __DIR__ . "/../helpers/session_functions.php";


// Import

require_once __DIR__ . "/../Models/UserModel.php";
require_once __DIR__ . "/../Controllers/UsersController.php";

// Start sessions
session_start();