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

    public function evntPage()
    {
        $id = $_GET['id'] ?? null;
        $evnt = self::getCurrentEvntById($id);
        $participants = self::getNbParticipantByEvntId($id);
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


        $state = ParticipantList::join($data);
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



    public function getNbParticipantByEvntId(?int $id): ?array
    {
        return DB::fetch("SELECT users.firstName, users.lastName FROM users JOIN isAccepted ON users.idUser = isAccepted.idUser WHERE isAccepted.idEvent = :idEvent", ["idEvent" => $id]);

    }

    public static function showJoinLeftButton($evnt)
    {
        if (isset($_SESSION[Auth::SESSION_KEY]) && $evnt->isParticipatingTo($evnt->getId(), $_SESSION[Auth::SESSION_KEY]) == !NULL && $evnt->isParticipatingTo($evnt->getId(), $_SESSION[Auth::SESSION_KEY]) == true) {
            echo '
                        <a href="" class="evnt-page__join d-flex justify-content-center align-items-center ">
                            <div id="submit-box" class="mx-2 fs-1 w-100">
                                <form action="handlers/evnt-handler.php" method="POST">
                                    <input type="text" name="action" value="leaving" hidden>
                                    <input type="text" name="id" value="' . $evnt->getId() . '" hidden>
                                    <button type="submit" class="w-100 evnt-confirm-button">Quitter l\'Evnt</button>
                                </form>
                            </div>
                        </a>';
        } else {

            echo '
                        <a href="" class="evnt-page__join d-flex justify-content-center align-items-center ">
                            <div id="submit-box" class="mx-2 fs-1 w-100">
                                <form action="handlers/evnt-handler.php" method="POST">
                                    <input type="text" name="action" value="join" hidden>
                                    <input type="text" name="id" value="' . $evnt->getId() . '" hidden>
                                    <button type="submit" class="w-100 evnt-confirm-button">Rejoindre l\'Evnt</button>
                                </form>
                            </div>
                        </a>';
        }

        ;
    }
}