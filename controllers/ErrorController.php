<?php

namespace Controllers;

require_once __DIR__ . '/../bootstrap/app.php';



Class ErrorController {

 public static function wrongURL(){
    include('../views/error-page.php');
 }

}

