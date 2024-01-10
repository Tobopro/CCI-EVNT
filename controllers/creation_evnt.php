<?php
require_once("../models/Evnt.php");
require_once("../helpers/class/DB.php");

use Models\Evnt;


$db = DB::getDB();

$categories = Evnt::getCategories($db);


require_once("../views/event_creation_page.php");