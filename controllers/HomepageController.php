<?php

namespace Controllers;

require_once __DIR__ . '/../bootstrap/app.php';



Class HomepageController {

 public static function show(){
    include('../views/homepage.php');
 }

}

