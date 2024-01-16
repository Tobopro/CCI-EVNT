<?php

namespace Controllers;

use Models\Evnt;
use DB;

// require_once __DIR__ . '/../bootstrap/app.php';



class EventPageController
{

    const URL_INDEX = '/?url=dashboard';

    public static function show()
    {
        include('../views/evnt-page.php');
    }


    public function evntPage()
    {
        $id = $_GET['id'] ?? null;
        $evnt = self::getCurrentEvntById($id);
        require_once base_path("Views/evnt-page.php");
    }


    static function getCurrentEvntbyId(?int $id): Evnt
    {
        if (!$id) {
            errors('404. Page introuvable');
            redirectAndExit(self::URL_INDEX);
        }
        $evnt = DB::fetch(
            "SELECT * FROM events WHERE idEvent = :idEvent",
            ['idEvent' => $id]
        );
        if ($evnt === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectAndExit(self::URL_INDEX);
        }
        if (empty($evnt)) {
            errors('404. Page introuvable');
            redirectAndExit(self::URL_INDEX);
        }

        return Evnt::hydrate($evnt[0]);
    }
}