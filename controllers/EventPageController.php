<?php

namespace Controllers;

use Models\Evnt;
use DB;
use Auth;
use Models\ParticipantList;

// require_once __DIR__ . '/../bootstrap/app.php';



class EventPageController
{

    const URL_INDEX = '/?url=dashboard';
    const URL_HANDLER = '/handlers/participant-list-handler.php';

    public function evntPage()
    {
        Auth::isAuthOrRedirect();
        $listUrl = self::URL_HANDLER;
        $id = $_GET['id'] ?? null;
        $evnt = self::getCurrentEvntById($id);
        $data['idEvent'] = $evnt->getId();
        $data['idOwner'] = $evnt->getIdUser();
        $data['participantList'] = self::getParticipantByEvntId($id);
        $participantsList = ParticipantList::hydrate($data);
        $heartIcon = self::showHeartIcon();
        require_once base_path("Views/evnt-page.php");
    }

    public function joinEvnt()
    {
        $id = $_POST['id'] ?? null;
        $user = $_SESSION[Auth::SESSION_KEY] ?? null;
        $data = [
            "idUser" => $user,
            "idEvent" => $id,
            "isAccepted" => 1
        ];

        //check evnt
        $evnt = DB::fetch("SELECT * FROM events WHERE idEvent = :id;", ['id' => $id]);
        if (!$evnt or count($evnt) > 1) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectAndExit(self::URL_INDEX);
        }


        $state = ParticipantList::join($data); // TODO verify if the event is full
        if ($state) {
            success("Vous avez rejoint l'Evnt");
            redirectAndExit("/?url=evnt&id=" . $id);
        } else {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectAndExit(self::URL_INDEX);
        }

    }

    public function leavingEvnt()
    {
        $id = $_POST['id'] ?? null;

        //check evnt
        $evnt = DB::fetch("SELECT * FROM events WHERE idEvent = :id;", ['id' => $id]);
        if (!$evnt or count($evnt) > 1) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectAndExit(self::URL_INDEX);
        }

        $state = self::deleteParticipation();
        if ($state) {
            success("Vous avez quitté l'Evnt");
            redirectAndExit("/?url=evnt&id=" . $id);
        } else {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectAndExit(self::URL_INDEX);
        }
    }

    public function deleteParticipation(): int|false
    {
        $eventId = $_POST['id'] ?? null;
        $userId = $_SESSION[Auth::SESSION_KEY] ?? null;
        return self::staticDeleteParticipation($userId, $eventId);
    }

    public static function staticDeleteParticipation(int $userId, int $eventId): int|false
    {
        return DB::statement(
            "DELETE FROM isAccepted WHERE idUser = :idUser AND idEvent = :idEvent",
            ['idUser' => $userId, 'idEvent' => $eventId],
        );
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



    public function getParticipantByEvntId(?int $id): ?array
    {
        return DB::fetch("SELECT users.firstName, users.lastName, users.idUser FROM users JOIN isAccepted ON users.idUser = isAccepted.idUser WHERE isAccepted.idEvent = :idEvent", ["idEvent" => $id]);

    }

    public static function showJoinLeftButton($evnt)
    {
        if (isset($_SESSION[Auth::SESSION_KEY]) && $evnt->isParticipatingTo($evnt->getId(), $_SESSION[Auth::SESSION_KEY]) == !NULL && $evnt->isParticipatingTo($evnt->getId(), $_SESSION[Auth::SESSION_KEY]) == true) {
            $value = "leaving";
            $text = "Quitter";
        } else {
            $value = "join";
            $text = "Rejoindre";
        }
        require_once base_path("views/components/joinLeaveEvnt.php");
    }

    public static function likeStatic(?array $data)
    {
        return DB::insert('isliked', $data);
    }

    public static function unlikeStatic(?array $data)
    {
        return DB::statement(
            "DELETE FROM isLiked WHERE idUser = :idUser AND idEvent = :idEvent",
            $data
        );
    }

    public static function isLikedStatic(?array $data)
    {
        return DB::statement("SELECT * FROM isliked WHERE idUser = :idUser AND idEvent = :idEvent", $data);
    }

    public static function Likes()
    {
        $id = $_POST['id'] ?? null;
        $user = $_SESSION[Auth::SESSION_KEY] ?? null;
        $data = [
            "idUser" => $user,
            "idEvent" => $id
        ];
        if (self::isLikedStatic($data) == 0) {
            $state = self::likeStatic($data);
            if ($state) {
                success("Vous avez aimé l'Evnt");
                redirectAndExit("/?url=evnt&id=" . $id);
            } else {
                errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
                redirectAndExit(self::URL_INDEX);
            }
        } else {
            $state = self::unlikeStatic($data);
            if ($state) {
                errors("Vous n'aimez plus l'Evnt");
                redirectAndExit("/?url=evnt&id=" . $id);
            } else {
                errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
                redirectAndExit(self::URL_INDEX);
            }
        }

    }


    public static function showHeartIcon()
    {

        $id = $_GET['id'] ?? null;
        $user = $_SESSION[Auth::SESSION_KEY] ?? null;
        $data = [
            "idUser" => $user,
            "idEvent" => $id
        ];
        if (self::isLikedStatic($data) == 0) {
            $heartIcon = 'fa-regular';
        } else {
            $heartIcon = 'fa-solid';
        }
        return $heartIcon;
    }
}