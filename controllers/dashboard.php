<?php

use Classes\Evnt;
use \Helpers\DB;
require_once("../helpers/DB.php");
require_once("classes/Evnt.php");




$db = DB::getDB();

// Assuming Evnt::getAllEvents returns an array of events
$events = Evnt::getAllEvents($db);


// Include your view
include('../views/dashboard_test.php');
?>
