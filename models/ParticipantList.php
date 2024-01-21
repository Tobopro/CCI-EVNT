<?php

namespace Models;

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
        $participants = $this->getParticipants();
        $list = '';
        foreach ($participants as $participant) {
            $list.= "<div>" . $participant["firstName"] . " " . $participant['lastName']
            if(/* je suis le propriétaire de l'event */)
            <input type='text' name='idUser'value=" . $participant["idUser"] . " hidden></input>
            <button type='submit' name='button' value='accept' class='btn btn-success'><i class='fa-solid fa-check'></i></button>
            <button type='submit' name='button' value='remove' class='btn btn-danger'><i class='fa-solid fa-x'></i></button>
            $list .= "</div>";
        }

    }
    public static function join(?array $data)
    {
        return DB::insert(self::PARTICIPANT_LIST_TABLE, $data);
    }


}