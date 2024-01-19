<?php

namespace Models;

use DB;

require_once __DIR__ . "/../models/Model.php";
class ParticipantList extends Model
{
    const PARTICIPANT_LIST_TABLE = 'isAccepted';
    protected ?int $idEvent;
    protected ?int $idOwner;
    protected ?array $participants;

    public function __construct(?int $idEvent)
    {
        self::setIdEvent($idEvent);
    }

    public static function hydrate(array $data): ParticipantList
    {
        $data['$participantList'] ?? null;
        $participantList = new ParticipantList($data['idEvent']);
        $participantList->idOwner = $data["idOwner"];
        if ($data['$participantList']) {
            foreach ($data['$participantList'] as $participants) {
                array_push($participantList->participants, $participants);
            }
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

    public static function join(?array $data)
    {
        return DB::insert(self::PARTICIPANT_LIST_TABLE, $data);
    }
}