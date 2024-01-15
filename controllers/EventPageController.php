<?php

namespace Controllers;

require_once __DIR__ . '/../bootstrap/app.php';



class EventPageController
{

    public static function show()
    {
        include('../views/evnt-page.php');
    }


    public function evntPage()
    {
        $id = $_GET['id'];
        var_dump($id);
        require_once base_path("Views/evnt-page.php");
    }
}