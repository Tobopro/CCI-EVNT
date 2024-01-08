<?php

define('APP_BASE_PATH', realpath(__DIR__ . '/../'));
// Import Helpers

require_once __DIR__ . "/../helpers/path_functions.php";

// Import

require_once __DIR__ . "/../Models/UserModel.php";
require_once __DIR__ . "/../Controllers/UserController.php";

// Start sessions
session_start();