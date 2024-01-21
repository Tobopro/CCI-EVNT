<?php

namespace Models;

use DB;

class ParticipantList
{
    const PARTICIPANT_LIST_TABLE = 'isAccepted';
    const ISLIKED_TABLE='isliked';
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
        $participantList = new ParticipantList($data['idEvent'])?? null;
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
        foreach ($participants as $participant) {
            echo "<li>" . $participant["firstName"] . " " . $participant['lastName'] . "</li>";
        }

    }
    public static function join(?array $data)
    {
        return DB::insert(self::PARTICIPANT_LIST_TABLE, $data);
    }

    
}