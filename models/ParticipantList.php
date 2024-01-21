<?php

namespace Models;

use Controllers\EventPageController;
use DB;

class ParticipantList
{
    const PARTICIPANT_LIST_TABLE = 'isAccepted';
    const ISLIKED_TABLE = 'isliked';
    protected ?int $idEvent;
    protected ?int $idOwner;
    protected ?array $participants;

    public function __construct(?int $idEvent)
    {
        self::setIdEvent($idEvent);
        $this->participants = [];
    }

    public static function hydrate(?array $data): ?ParticipantList
    {
        $data['participantList'] ?? null;
        $data['idOwner'] ?? null;
        $participantList = new ParticipantList($data['idEvent']) ?? null;
        if ($data['idOwner']) {
            $participantList->idOwner = $data["idOwner"];
        }
        if ($data['participantList']) {
            $participantList->participants = $data['participantList'];
        }

        return $participantList;
    }
    public function getIdEvent(): ?int
    {
        return $this->idEvent;
    }

    public function getIdOwner(): ?int
    {
        return $this->idOwner;
    }

    public function getParticipants(): ?array
    {
        return $this->participants;
    }

    public function setIdEvent(?int $idEvent): void
    {
        $this->idEvent = $idEvent;
    }

    public function setIdOwner(?int $idOwner): void
    {
        $this->idOwner = $idOwner;
    }

    public function displayParticipants()
    {
        $list = "";
        $participants = $this->getParticipants();
        foreach ($participants as $participant) {
            $list .= "<form action='" . EventPageController::URL_HANDLER . "' method='POST'>";
            $list .= "<input type='text' name='idEvent' value='" . $this->getIdEvent() . "' hidden>";
            $list .= "<div class='d-flex justify-content-between'> <div class='ms-2 pt-2'>" . $participant["firstName"] . " " . $participant['lastName'] . "</div>";
            if ($this->idOwner == $_SESSION[\Auth::SESSION_KEY]) {
                $list .= "<input type='text' name='idUser' value='" . $participant["idUser"] . "' hidden>";
                $list .= "<div class='pe-2'>";
                if
                (!$participant["isaccepted"]) {
                    $list .= "<button type='submit' name='button' value='accept' class='btn btn-success'><i class='fa-solid fa-check'></i></button>";
                }
                $list .= "<button type='submit' name='button' value='remove' class='btn btn-danger ms-2'><i class='fa-solid fa-x'></i></button>";
            }
            $list .= "</div></form>";
        }
        echo $list;
    }
    public static function join(?array $data)
    {
        return
            DB::insert(self::PARTICIPANT_LIST_TABLE, $data);
    }
    public static function getParticipantByEvntId(
        ?int $id,
        ?int
        $idUser = null
    ): ?array {
        $request = "SELECT users.firstName, users.lastName, users.idUser, isAccepted.isaccepted
            FROM users 
            JOIN isAccepted 
            ON users.idUser = isAccepted.idUser 
            WHERE isAccepted.idEvent = :idEvent";
        $data["idEvent"] = $id;
        if ($idUser) {
            $request
                .= " AND isAccepted.idUser = :idUser";
            $data["idUser"] = $idUser;
        }
        return DB::fetch($request, $data);
    }
    public
        function acceptPending(
        ?int $idUser
    ) {
        $this->toAccepted();
        $data['isaccepted'] = $this->participants['isaccepted'];
        return DB::update(self::PARTICIPANT_LIST_TABLE, $data, $idUser, 'idUser');
    }

    public function toAccepted()
    {
        $this->participants['isaccepted'] = 1;
    }
    public static function deleteParticipation(int $userId, int $eventId): int|false
    {
        return DB::statement(
            "DELETE FROM isAccepted WHERE idUser = :idUser AND idEvent = :idEvent",
            ['idUser' => $userId, 'idEvent' => $eventId],
        );
    }
}