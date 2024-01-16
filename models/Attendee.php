<?php
namespace Models;

require_once __DIR__ . "/../bootstrap/app.php";

use DB;

class Attendee
{
    const PARTIPCATING_TALBE = "isAccepted";
    public function join(?array $data)
    {
        return DB::insert(self::PARTIPCATING_TALBE, $data);
    }
}